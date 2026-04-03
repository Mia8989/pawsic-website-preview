#!/bin/bash
# PAWSIC Website -- Deploy to Production (pawsic.org)
# Target: https://pawsic.org/
#
# IMPORTANT: Run this ONLY after EC Team has reviewed and approved the site.
# After this runs, mia8989.github.io/pawsic-website-preview will no longer
# work correctly as a preview -- path rewriting is removed for production.
#
# Also IMPORTANT: Run deploy-preview.sh once more BEFORE this if the EC Team
# still needs the preview URL. You cannot have both at the same time.

set -e

SOURCE_DIR="$(cd "$(dirname "$0")" && pwd)"
DEPLOY_DIR="/tmp/pawsic-production-deploy"

echo "=== PAWSIC Production Deploy ==="
echo "Source: $SOURCE_DIR"
echo "Deploy: $DEPLOY_DIR"
echo ""

# Clone or update the deploy repo
if [ ! -d "$DEPLOY_DIR/.git" ]; then
    echo "Cloning deploy repo..."
    git clone https://github.com/Mia8989/pawsic-website-preview.git "$DEPLOY_DIR"
else
    echo "Pulling latest from deploy repo..."
    cd "$DEPLOY_DIR"
    git pull origin main
    cd "$SOURCE_DIR"
fi

# 1. Sync source to deploy, excluding files that should not be deployed
rsync -av --delete \
  --exclude='.git' \
  --exclude='.gitignore' \
  --exclude='.claude' \
  --exclude='node_modules' \
  --exclude='CNAME' \
  --exclude='_archive' \
  --exclude='videos/_originals' \
  --exclude='deploy-preview.sh' \
  --exclude='deploy-production.sh' \
  "$SOURCE_DIR/" "$DEPLOY_DIR/"

# 2. Build clean URL structure from HTML files (NO path rewriting)
cd "$DEPLOY_DIR"

python3 << 'PYEOF'
import os, glob

# Map each HTML file to its clean URL folder(s)
mapping = {
    'about.html': ['about-us', 'about'],
    'advisory.html': ['advisory-committee', 'advisory'],
    'board.html': ['the-board', 'board'],
    'community.html': ['community'],
    'contact.html': ['contact'],
    'events.html': ['upcoming-events', 'events'],
    'membership.html': ['membership'],
    'patients.html': ['patients'],
    'press-releases.html': ['press-releases'],
    'programs.html': ['programs'],
    'resources.html': ['resources'],
    'services.html': ['services'],
    'sponsors.html': ['sponsorship', 'sponsors'],
    'webinars.html': ['webinars', 'courses'],
    'who-is-pawsic.html': ['who-is-pawsic'],
    'privacy-policy.html': ['privacy-policy'],
    'disclaimers.html': ['disclaimers'],
    'accessibility.html': ['accessibility'],
    'skin-failure-sig.html': ['community/skin-failure-sig'],
}

# Create clean URL folders -- no path rewriting needed for production
for src, folders in mapping.items():
    if not os.path.exists(src):
        print(f"WARNING: {src} not found, skipping")
        continue
    with open(src, 'r') as f:
        content = f.read()
    for folder in folders:
        os.makedirs(folder, exist_ok=True)
        with open(f'{folder}/index.html', 'w') as f:
            f.write(content)
        print(f"  Created: {folder}/index.html")

print("Clean URLs built successfully")
PYEOF

# 3. Write CNAME file explicitly (ensures it survives every deploy)
echo "pawsic.org" > CNAME
echo "CNAME written: pawsic.org"

# 4. Commit and push
git add -A
if git diff --cached --quiet; then
    echo "No changes to deploy."
else
    git commit -m "Production deploy: $(date '+%Y-%m-%d %H:%M')"
    git push origin main
    echo ""
    echo "=== Deployed! ==="
    echo "Live site: https://pawsic.org/"
    echo ""
    echo "Next steps:"
    echo "  1. In GitHub repo Settings > Pages -- confirm custom domain shows 'pawsic.org'"
    echo "  2. Wait for SSL certificate to be issued (green checkmark)"
    echo "  3. Then switch Cloudflare A records and www CNAME to Orange (Proxied)"
    echo "  4. Enable 'Enforce HTTPS' in GitHub Pages settings"
    echo "  5. Submit updated sitemap.xml to Google Search Console"
fi
