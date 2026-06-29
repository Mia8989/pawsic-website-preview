#!/bin/bash
# Scoped production deploy: publishes ONLY the public /qapi/ page and the
# corrected /qapi-ahca/ page to pawsic.org. Does NOT touch any other page,
# so staged/unreviewed changes elsewhere in the source are NOT published.
#
# Usage:  bash deploy-qapi-scoped.sh
set -e

SRC="$(cd "$(dirname "$0")" && pwd)"
DEPLOY="/tmp/pawsic-qapi-scoped-deploy"

echo "=== Scoped QAPI deploy ==="
rm -rf "$DEPLOY"
echo "Cloning live deploy repo..."
git clone --depth 1 https://github.com/Mia8989/pawsic-website-preview.git "$DEPLOY"

# Copy only the two pages we are publishing
mkdir -p "$DEPLOY/qapi/assets"
cp "$SRC/qapi/index.html"        "$DEPLOY/qapi/index.html"
cp "$SRC/qapi/assets/"*          "$DEPLOY/qapi/assets/"
cp "$SRC/qapi-ahca/index.html"   "$DEPLOY/qapi-ahca/index.html"

# Resolve <!-- INCLUDE:*.html --> placeholders using the source _includes
python3 - "$SRC" "$DEPLOY" <<'PY'
import os, re, sys
src, deploy = sys.argv[1], sys.argv[2]
inc = os.path.join(src, '_includes')
def load(name):
    with open(os.path.join(inc, name)) as f:
        return f.read().rstrip('\n')
for rel in ['qapi/index.html', 'qapi-ahca/index.html']:
    p = os.path.join(deploy, rel)
    with open(p) as f: c = f.read()
    n = re.sub(r'<!-- INCLUDE:([\w.\-/]+) -->', lambda m: load(m.group(1)), c)
    with open(p, 'w') as f: f.write(n)
    print(f"  resolved includes: {rel} (changed={n != c})")
PY

# Preserve the custom domain
[ -f "$DEPLOY/CNAME" ] || echo "pawsic.org" > "$DEPLOY/CNAME"

cd "$DEPLOY"
git add qapi qapi-ahca
echo "--- staged changes ---"
git status --short
if git diff --cached --quiet; then
  echo "Nothing to deploy."
  exit 0
fi
git commit -m "Add public QAPI Workshop page (/qapi/) and correct speaker credentials on /qapi-ahca/"
git push origin HEAD:main
echo ""
echo "=== Deployed ==="
echo "  https://pawsic.org/qapi/"
echo "  https://pawsic.org/qapi-ahca/  (credentials corrected)"
