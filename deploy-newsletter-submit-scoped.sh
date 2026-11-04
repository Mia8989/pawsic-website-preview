#!/bin/bash
# Scoped production deploy: publishes ONLY /newsletter-submit/ to pawsic.org.
# Does NOT touch any other page. Usage: bash deploy-newsletter-submit-scoped.sh
set -e
SRC="$(cd "$(dirname "$0")" && pwd)"

# Stop if someone edited the live repo outside this Mac (e.g. through claude.ai/code)
# since the last sync; deploying now would overwrite their change.
EDITS_CHECK="$SRC/../../../../scripts/site-edits-check.sh"
"$EDITS_CHECK" pawsic
DEPLOY="/tmp/pawsic-newsletter-submit-deploy"
rm -rf "$DEPLOY"
git clone --depth 1 https://github.com/Mia8989/pawsic-website-preview.git "$DEPLOY"
mkdir -p "$DEPLOY/newsletter-submit"
cp "$SRC/newsletter-submit/index.html" "$DEPLOY/newsletter-submit/index.html"
[ -f "$DEPLOY/CNAME" ] || echo "pawsic.org" > "$DEPLOY/CNAME"
cd "$DEPLOY"
git add newsletter-submit
git status --short
if git diff --cached --quiet; then echo "Nothing to deploy."; exit 0; fi
git commit -m "Add unlisted newsletter contributor page (/newsletter-submit/)

Co-Authored-By: Claude Sonnet 5.5 <noreply@anthropic.com>"
git push origin HEAD:main
"$EDITS_CHECK" pawsic --mark
echo "Deployed: https://pawsic.org/newsletter-submit"
