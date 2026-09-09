#!/bin/bash
# Scoped production deploy for the organization / group membership pages.
# Publishes ONLY:
#   /membership/                          (updated with the cross-link section, no group pricing)
#   /membership/organizations/            public overview, no pricing
#   /membership/organizations/pricing/    unlisted pricing ladder (noindex, not in sitemap)
#   /membership/groups/                   public overview, no pricing
#   /membership/groups/pricing/           unlisted pricing ladder (noindex, not in sitemap)
#   /organizations/  /groups/             short print + QR redirects
#   sitemap.xml
# Does NOT touch any other page on pawsic.org.
# Usage:  bash deploy-org-membership-scoped.sh
set -e
SRC="$(cd "$(dirname "$0")" && pwd)"
DEPLOY="/tmp/pawsic-org-membership-deploy"
rm -rf "$DEPLOY"
git clone --depth 1 https://github.com/Mia8989/pawsic-website-preview.git "$DEPLOY"

mkdir -p "$DEPLOY/membership/organizations/pricing/assets" "$DEPLOY/membership/groups/pricing/assets"
cp "$SRC/membership.html" "$DEPLOY/membership/index.html"
cp "$SRC/membership/organizations/index.html" "$DEPLOY/membership/organizations/index.html"
cp "$SRC/membership/organizations/pricing/index.html" "$DEPLOY/membership/organizations/pricing/index.html"
cp "$SRC/membership/organizations/pricing/assets/"* "$DEPLOY/membership/organizations/pricing/assets/"
cp "$SRC/membership/groups/index.html" "$DEPLOY/membership/groups/index.html"
cp "$SRC/membership/groups/pricing/index.html" "$DEPLOY/membership/groups/pricing/index.html"
cp "$SRC/membership/groups/pricing/assets/"* "$DEPLOY/membership/groups/pricing/assets/"
cp "$SRC/sitemap.xml" "$DEPLOY/sitemap.xml"

# Remove the old flat asset folders if a previous deploy created them
rm -rf "$DEPLOY/membership/organizations/assets" "$DEPLOY/membership/groups/assets"

python3 - "$SRC" "$DEPLOY" <<'PY'
import os, re, sys
src, deploy = sys.argv[1], sys.argv[2]
inc = os.path.join(src, '_includes')

def load(name):
    with open(os.path.join(inc, name)) as f:
        return f.read().rstrip('\n')

pages = [
    'membership/index.html',
    'membership/organizations/index.html',
    'membership/organizations/pricing/index.html',
    'membership/groups/index.html',
    'membership/groups/pricing/index.html',
]
for rel in pages:
    p = os.path.join(deploy, rel)
    c = open(p).read()
    n = re.sub(r'<!-- INCLUDE:([\w.\-/]+) -->', lambda m: load(m.group(1)), c)
    open(p, 'w').write(n)
    print("  resolved includes:", rel)

# Short redirect URLs for print, rack cards, and QR codes
redirect_tpl = """<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="canonical" href="{url}">
  <meta http-equiv="refresh" content="0;url={url}">
  <title>Redirecting...</title>
</head>
<body>
  <script>window.location.replace('{url}');</script>
</body>
</html>"""
aliases = {
    'organizations': 'https://pawsic.org/membership/organizations/',
    'groups': 'https://pawsic.org/membership/groups/',
}
for folder, url in aliases.items():
    d = os.path.join(deploy, folder)
    os.makedirs(d, exist_ok=True)
    with open(os.path.join(d, 'index.html'), 'w') as f:
        f.write(redirect_tpl.format(url=url))
    print("  redirect: /%s/ -> %s" % (folder, url))
PY

[ -f "$DEPLOY/CNAME" ] || echo "pawsic.org" > "$DEPLOY/CNAME"

cd "$DEPLOY"
git add membership organizations groups sitemap.xml
git status --short
if git diff --cached --quiet; then echo "Nothing to deploy."; exit 0; fi
git commit -q -m "Organization and group membership: public pages without pricing, unlisted pricing pages, short print URLs"
git push -q origin HEAD:main
echo ""
echo "=== Deployed (allow 1 to 2 minutes for GitHub Pages) ==="
echo "  Public:   https://pawsic.org/organizations   -> /membership/organizations/"
echo "  Public:   https://pawsic.org/groups          -> /membership/groups/"
echo "  Unlisted: https://pawsic.org/membership/organizations/pricing/"
echo "  Unlisted: https://pawsic.org/membership/groups/pricing/"
