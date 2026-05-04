#!/usr/bin/env python3
"""Refresh shop/index.html with the latest Printify product data.

Reads PRINTIFY_TOKEN from env. Pulls all visible products with storefront
URLs, deduplicates by title, and rewrites the product cards section of
shop/index.html in place. The page layout, styles, and category sections
are preserved -- only product cards (image, price, URL) are updated.

Usage:
    PRINTIFY_TOKEN=xxx python3 scripts/refresh-shop.py

Exit codes:
    0  page updated (or already up to date)
    1  fetch error / no products returned
"""
import os
import re
import sys
from pathlib import Path

import requests

TOKEN = os.environ.get("PRINTIFY_TOKEN")
if not TOKEN:
    print("ERROR: PRINTIFY_TOKEN env var required", file=sys.stderr)
    sys.exit(1)

SHOP_ID = 27367922
HEADERS = {"Authorization": f"Bearer {TOKEN}"}
BASE = f"https://api.printify.com/v1/shops/{SHOP_ID}"

ROOT = Path(__file__).resolve().parent.parent
INDEX_PATH = ROOT / "shop" / "index.html"

# Map Printify product title -> on-page (display name, category, description, optional tag)
SECTIONS = [
    ("Drinkware", [
        ("PAWSIC Accent Coffee Mug", "Accent Coffee Mug — Logo", "Drinkware",
         "Start your clinical day with purpose. 11 oz accent mug with the PAWSIC logo on a crisp white body and contrasting handle.", "Popular"),
        ("PAWSIC Accent Coffee Mug — You've Got Skin", "Accent Mug — You've Got Skin", "Drinkware",
         "Witty, warm, and on-brand. \"You've Got Skin, You're In.\" on an 11 oz accent mug.", None),
        ("PAWSIC Accent Coffee Mug - Everyone has skin", "Accent Mug — Everyone Has Skin", "Drinkware",
         "Bold, inclusive, unforgettable. \"Everyone Has Skin. Everyone Needs PAWSIC.\" on an 11 oz accent mug.", None),
        ("PAWSIC Accent Coffee Mug - Skin Health Matters", "Accent Mug — Skin Health Matters", "Drinkware",
         "A daily reminder that wound and skin care saves lives. \"Skin Health Matters.\" on an 11 oz accent mug.", None),
        ("PAWSIC Accent Coffee Mug — Advancing Wound Care", "Accent Mug — Advancing Wound Care", "Drinkware",
         "The mission, on your morning mug. \"Advancing Wound Care & Skin Health Education.\" on an 11 oz accent mug.", None),
        ("PAWSIC Ceramic Mug", "Ceramic Mug", "Drinkware",
         "Classic ceramic mug with the PAWSIC logo. Dishwasher- and microwave-safe.", None),
        ("PAWSIC 20oz Tumbler", "20oz Tumbler", "Drinkware",
         "The clinician's go-to for all-day hydration. Keeps drinks cold 24 hours, hot 12 hours.", None),
        ("PAWSIC 22oz Copper Insulated Tumbler", "22oz Copper Tumbler", "Drinkware",
         "Premium copper vacuum insulation keeps your drink perfect through an entire clinical day.", None),
        ("PAWSIC Protein Shaker", "Protein Shaker", "Drinkware",
         "For the clinician who takes care of themselves too. Branded PAWSIC shaker for every day.", None),
        ("PAWSIC Sport Bottle", "Sport Bottle", "Drinkware",
         "Leak-proof sport bottle for clinic shifts and conference days.", None),
        ("PAWSIC Travel Mug", "Travel Mug", "Drinkware",
         "Insulated travel mug to keep coffee hot through morning rounds.", None),
    ]),
    ("Apparel", [
        ('PAWSIC "Every Wound Tells a Story" Tee — WE ARE PAWSIC', 'Every Wound Tee — We Are PAWSIC', "Apparel",
         "Comfort Colors 1717 garment-dyed heavyweight tee. \"Every Wound Tells a Story.\" + \"WE ARE PAWSIC\" on the chest. The shirt the wound care community asked for.", "New"),
        ('PAWSIC "Every Wound Tells a Story" Sweatshirt — WE ARE PAWSIC', 'Every Wound Sweatshirt — We Are PAWSIC', "Apparel",
         "Comfort Colors 1466 garment-dyed heavyweight crewneck. \"Every Wound Tells a Story.\" + \"WE ARE PAWSIC\" on the chest. Premium 9.5 oz cotton fleece.", "New"),
        ("PAWSIC Garment-Dyed T-Shirt", "Garment-Dyed T-Shirt", "Apparel",
         "Comfort Colors unisex tee. Soft, worn-in feel with the PAWSIC design.", None),
        ("PAWSIC T-Shirt", "T-Shirt", "Apparel",
         "Classic unisex tee with the PAWSIC design.", None),
        ("PAWSIC Lightweight Crewneck Sweatshirt", "Crewneck Sweatshirt", "Apparel",
         "Comfort Colors lightweight crewneck. Ideal for fall conferences, early rounds, and everyday wear.", None),
        ("PAWSIC Quarter-Zip Pullover", "Quarter-Zip Pullover", "Apparel",
         "Sport-Tek unisex quarter-zip. Professional enough for the clinic, comfortable enough for everything else.", None),
        ("PAWSIC Embroidered Polo Shirt", "Embroidered Polo Shirt", "Apparel",
         "PAWSIC logo precision-embroidered on the chest. Ideal for wound care professionals and team events.", None),
        ("PAWSIC Hoodie", "Hoodie", "Apparel",
         "Cozy unisex hoodie with the PAWSIC design.", None),
        ("PAWSIC Baby Onesie", "Baby Onesie", "Apparel",
         "The newest wound care advocate in the family. Soft cotton snap-closure onesie with the PAWSIC logo.", None),
        ("PAWSIC Joggers", "Joggers", "Apparel",
         "Soft, comfortable joggers with the PAWSIC logo.", None),
    ]),
    ("Headwear", [
        ("PAWSIC Bucket Hat", "Bucket Hat", "Headwear",
         "AS Colour bucket hat with embroidered PAWSIC logo. Sun protection meets professional pride.", None),
        ("PAWSIC Snapback Hat", "Snapback Hat", "Headwear",
         "Yupoong structured snapback with embroidered PAWSIC logo. Adjustable fit, sharp look.", None),
        ("PAWSIC Dad Hat", "Dad Hat", "Headwear",
         "Classic six-panel dad hat with embroidered PAWSIC logo.", None),
        ("PAWSIC Ribbed Knit Beanie", "Ribbed Knit Beanie", "Headwear",
         "Atlantis Headwear embroidered beanie. Perfect for fall conferences and cold clinical mornings.", None),
    ]),
    ("Bags & Carriers", [
        ("PAWSIC Cotton Canvas Tote Bag", "Cotton Canvas Tote", "Bags",
         "Sturdy cotton canvas tote. Roomy enough for conference materials, CE workbooks, and everything in between.", None),
        ("PAWSIC Tote Bag", "Tote Bag", "Bags",
         "Everyday tote with the PAWSIC design.", None),
        ("PAWSIC Laptop Sleeve", "Laptop Sleeve", "Bags",
         "Padded laptop sleeve with PAWSIC design. Protect your tools and represent your profession.", None),
        ("PAWSIC Fanny Pack", "Fanny Pack", "Bags",
         "Hands-free and ready for anything. Ideal for conferences, clinical outreach days, and community events.", None),
        ("PAWSIC Drawstring Bag", "Drawstring Bag", "Bags",
         "Lightweight and durable. Perfect for conference day with PAWSIC design on the front.", None),
        ("PAWSIC Backpack", "Backpack", "Bags",
         "Durable backpack with the PAWSIC logo for daily clinical use.", None),
    ]),
    ("Accessories & Stationery", [
        ("PAWSIC Hardcover Notebook", "Hardcover Notebook", "Stationery",
         "Document breakthroughs and CE notes from every wound care conference. Premium hardcover.", None),
        ("PAWSIC Spiral Notebook", "Spiral Notebook", "Stationery",
         "Spiral-bound notebook with the PAWSIC logo for easy note-taking.", None),
        ("PAWSIC Phone Case", "Phone Case", "Accessories",
         "Carry your commitment to wound care everywhere. Slim protective case for all major iPhone and Samsung models.", None),
        ("PAWSIC Keyring Tag", "Keyring Tag", "Accessories",
         "A small daily reminder of why wound care and skin health matters. UV-printed PAWSIC logo, goes everywhere you do.", None),
        ("PAWSIC Pin Button", "Pin Button", "Accessories",
         "Show your PAWSIC pride on your lanyard, lab coat, or bag. A small but meaningful way to represent the wound care community.", None),
        ("PAWSIC Bracelet", "Bracelet", "Accessories",
         "Stainless steel bracelet with laser-engraved PAWSIC logo. Elegant and meaningful.", None),
        ("PAWSIC Lanyard", "Lanyard", "Accessories",
         "Comfortable lanyard with the PAWSIC logo for badges, keys, or ID cards.", None),
    ]),
    ("Stickers", [
        ("PAWSIC Square Stickers", "Square Stickers", "Stickers",
         "Waterproof vinyl square stickers with the PAWSIC logo. For laptops, water bottles, and badge holders.", None),
        ("PAWSIC Die-Cut Sticker", "Die-Cut Sticker", "Stickers",
         "Precision die-cut shaped to the PAWSIC logo. Vibrant waterproof vinyl for badge reels, bottles, and laptops.", None),
        ("PAWSIC Bumper Sticker", "Bumper Sticker", "Stickers",
         "Weatherproof bumper sticker with the PAWSIC logo.", None),
    ]),
    ("Home & Office", [
        ("PAWSIC Canvas Wall Art", "Canvas Wall Art", "Home & Office",
         "Bring the PAWSIC mission into your clinic, office, or home. Premium stretched matte canvas in multiple sizes.", None),
        ("PAWSIC Poster", "Poster", "Home & Office",
         "Premium poster print with the PAWSIC mission design.", None),
        ("PAWSIC Mouse Pad", "Mouse Pad", "Home & Office",
         "Soft mouse pad with the PAWSIC logo for your clinical workstation.", None),
        ("PAWSIC Coaster", "Coaster", "Home & Office",
         "PAWSIC coaster set for the office, clinic, or home.", None),
    ]),
]

CAT_SLUGS = {
    "Drinkware": "drinkware",
    "Apparel": "apparel",
    "Headwear": "headwear",
    "Bags & Carriers": "bags",
    "Accessories & Stationery": "accessories",
    "Stickers": "stickers",
    "Home & Office": "home-office",
}

ARROW = ('<svg width="14" height="14" viewBox="0 0 24 24" fill="none" '
         'stroke="currentColor" stroke-width="2.5" aria-hidden="true">'
         '<path d="M5 12h14M12 5l7 7-7 7"/></svg>')


def fetch_published():
    """Return {title: {url, price, price_max, img}} for live products.

    If two products share a title, the LATER one (in API order) wins. Rename
    duplicates in Printify to give every variant its own unique title and
    every variant its own card on the page.
    """
    products = requests.get(f"{BASE}/products.json", headers=HEADERS, timeout=30).json().get("data", [])
    out = {}
    for p in products:
        d = requests.get(f"{BASE}/products/{p['id']}.json", headers=HEADERS, timeout=30).json()
        if not d.get("visible"):
            continue
        handle = (d.get("external") or {}).get("handle")
        if not handle:
            continue
        title = d["title"]
        prices = [v["price"] for v in d.get("variants", []) if v.get("is_enabled")]
        out[title] = {
            "url": handle,
            "price": min(prices) / 100 if prices else 0,
            "price_max": max(prices) / 100 if prices else 0,
            "img": d.get("images", [{}])[0].get("src", ""),
        }
    return out


def card(api_title, name, cat, desc, tag, idx, pubs):
    if api_title not in pubs:
        return None
    p = pubs[api_title]
    delay = f" reveal-delay-{idx}" if idx > 0 else ""
    tag_html = (f'<span class="product-tag tag-{"popular" if tag == "Popular" else "new"}">{tag}</span>'
                if tag else "")
    price = f"From ${int(p['price'])}" if p["price"] != p["price_max"] else f"${int(p['price'])}"
    return f'''            <div class="product-card reveal{delay}">
              <div class="product-img-wrap">
                <img src="{p["img"]}" alt="{api_title}" loading="lazy">
                {tag_html}
              </div>
              <div class="product-body">
                <p class="product-category">{cat}</p>
                <h3 class="product-name">{name}</h3>
                <p class="product-desc">{desc}</p>
                <div class="product-footer">
                  <span class="product-price">{price}</span>
                  <a href="{p["url"]}" class="btn-shop" target="_blank" rel="noopener noreferrer">Shop {ARROW}</a>
                </div>
              </div>
            </div>'''


def build_products_section(pubs):
    blocks = []
    for cat_name, items in SECTIONS:
        cards = [c for i, item in enumerate(items) if (c := card(*item, i, pubs))]
        if not cards:
            continue
        slug = CAT_SLUGS[cat_name]
        blocks.append(f'''        <!-- {cat_name} -->
        <div class="category-block" data-cat="{slug}" id="cat-{slug}">
          <div class="category-header">
            <h3>{cat_name}</h3>
            <div class="category-line"></div>
          </div>
          <div class="product-grid">

{chr(10).join(cards)}

          </div>
        </div>''')
    return "\n\n".join(blocks)


def main():
    pubs = fetch_published()
    if not pubs:
        print("ERROR: no published products returned from Printify", file=sys.stderr)
        sys.exit(1)
    print(f"Fetched {len(pubs)} published products")

    section = build_products_section(pubs)
    html = INDEX_PATH.read_text()
    pattern = re.compile(
        r'(<p class="section-desc">[^<]*</p>\n\n        <div class="filter-bar"[\s\S]*?</div>\n\n)'
        r'([\s\S]*?)'
        r'(\n      </div>\n    </section>\n\n    <!-- Cause section -->)'
    )
    m = pattern.search(html)
    if not m:
        print("ERROR: could not locate products section in index.html", file=sys.stderr)
        sys.exit(1)
    new_html = html[:m.end(1)] + section + m.group(3) + html[m.end():]
    if new_html == html:
        print("No change.")
        return
    INDEX_PATH.write_text(new_html)
    print(f"Updated {INDEX_PATH}")


if __name__ == "__main__":
    main()
