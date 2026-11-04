#!/bin/bash
# Scoped production deploy: publishes ONLY the /meet/ booking page to pawsic.org.
# Does NOT touch any other page, so staged/unreviewed changes elsewhere in the
# source are NOT published. Booking backend: brands/PAWSIC/automations/booking-worker/
#
# Usage:  bash deploy-meet-scoped.sh
set -e

SRC="$(cd "$(dirname "$0")" && pwd)"

# Stop if someone edited the live repo outside this Mac (e.g. through claude.ai/code)
# since the last sync; deploying now would overwrite their change.
EDITS_CHECK="$SRC/../../../../scripts/site-edits-check.sh"
"$EDITS_CHECK" pawsic
DEPLOY="/tmp/pawsic-meet-scoped-deploy"

echo "=== Scoped /meet/ deploy ==="
rm -rf "$DEPLOY"
git clone --depth 1 https://github.com/Mia8989/pawsic-website-preview.git "$DEPLOY"

mkdir -p "$DEPLOY/meet"
cp "$SRC/meet/index.html" "$DEPLOY/meet/index.html"

# Resolve <!-- INCLUDE:*.html --> placeholders (nav, banner, footer) from source _includes
python3 - "$SRC" "$DEPLOY/meet/index.html" <<'PY'
import os, re, sys
src, page = sys.argv[1], sys.argv[2]
def load(name):
    with open(os.path.join(src, '_includes', name)) as f:
        return f.read().rstrip('\n')
with open(page) as f: c = f.read()
n = re.sub(r'<!-- INCLUDE:([\w.\-/]+) -->', lambda m: load(m.group(1)), c)
with open(page, 'w') as f: f.write(n)
print(f"  resolved includes: meet/index.html (changed={n != c})")
PY
[ -f "$DEPLOY/CNAME" ] || echo "pawsic.org" > "$DEPLOY/CNAME"

cd "$DEPLOY"
git add meet
echo "--- staged changes ---"
git status --short
if git diff --cached --quiet; then
  echo "Nothing to deploy."
  exit 0
fi
git commit -m "Add Meet with PAWSIC booking page (/meet/)"
git push origin HEAD:main
"$EDITS_CHECK" pawsic --mark
echo ""
echo "=== Deployed ==="
echo "  https://pawsic.org/meet/"
