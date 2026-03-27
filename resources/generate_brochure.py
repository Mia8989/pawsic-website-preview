#!/usr/bin/env python3
"""Generate PAWSIC 2-page brochure PDF using ReportLab."""

from reportlab.lib.pagesizes import letter
from reportlab.lib.colors import HexColor
from reportlab.lib.units import inch
from reportlab.pdfgen import canvas
from reportlab.lib.enums import TA_LEFT, TA_CENTER, TA_RIGHT
from reportlab.platypus import Paragraph, Frame
from reportlab.lib.styles import ParagraphStyle
import os

# Brand colors
NAVY = HexColor("#0C1F3F")
INDIGO = HexColor("#1E3A6E")
LOGO_BLUE = HexColor("#1A5494")
BLUE_ACCENT = HexColor("#2B7CCA")
BLUE_BRIGHT = HexColor("#38B6FF")
GOLD = HexColor("#C9A84C")
CREAM = HexColor("#FAF8F4")
WHITE = HexColor("#FFFFFF")
TEXT_BODY = HexColor("#3d4a5c")
TEXT_MUTED = HexColor("#7a8699")

WIDTH, HEIGHT = letter  # 612 x 792

OUTPUT_PATH = os.path.join(os.path.dirname(os.path.abspath(__file__)), "pawsic-brochure.pdf")


def draw_page1(c):
    """Page 1: Header, intro, at-a-glance stats, what we provide, patient-centered model."""

    # --- Top header bar ---
    c.setFillColor(NAVY)
    c.rect(0, HEIGHT - 80, WIDTH, 80, fill=1, stroke=0)

    # PAWSIC name
    c.setFillColor(WHITE)
    c.setFont("Helvetica-Bold", 22)
    c.drawString(40, HEIGHT - 52, "PAWSIC")

    # Tagline
    c.setFont("Helvetica", 9)
    c.drawString(40, HEIGHT - 68, "Post-Acute Wound & Skin Integrity Council")

    # Website
    c.setFillColor(GOLD)
    c.setFont("Helvetica-Bold", 10)
    c.drawRightString(WIDTH - 40, HEIGHT - 52, "pawsic.org")
    c.setFillColor(HexColor("#aab4c4"))
    c.setFont("Helvetica", 8)
    c.drawRightString(WIDTH - 40, HEIGHT - 66, "Elevating Wound Care Across Post-Acute Settings")

    # --- Gold accent line ---
    c.setStrokeColor(GOLD)
    c.setLineWidth(3)
    c.line(0, HEIGHT - 83, WIDTH, HEIGHT - 83)

    # --- Main headline ---
    y = HEIGHT - 120
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 20)
    c.drawString(40, y, "Who Is PAWSIC?")

    # --- Intro text ---
    y -= 22
    style_body = ParagraphStyle(
        "body", fontName="Helvetica", fontSize=9.5, leading=13,
        textColor=TEXT_BODY, alignment=TA_LEFT
    )
    intro_text = (
        "PAWSIC is a nonprofit professional council dedicated to advancing wound care, "
        "skin integrity, and tissue health across post-acute healthcare settings. We connect "
        "clinicians, educators, and industry partners to improve patient outcomes through "
        "evidence-based education, collaboration, and advocacy."
    )
    p = Paragraph(intro_text, style_body)
    pw, ph = p.wrap(WIDTH - 80, 200)
    p.drawOn(c, 40, y - ph)
    y -= (ph + 18)

    # --- AT A GLANCE section ---
    c.setFillColor(CREAM)
    c.rect(30, y - 72, WIDTH - 60, 72, fill=1, stroke=0)
    # Rounded corners effect with small header
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 10)
    c.drawString(45, y - 16, "AT A GLANCE")

    stats = [
        ("500+", "Clinicians Served"),
        ("50+", "CE Hours Offered"),
        ("100%", "Evidence-Based"),
        ("Nationwide", "Post-Acute Reach"),
    ]
    stat_x = 45
    stat_w = (WIDTH - 90) / 4
    for i, (num, label) in enumerate(stats):
        sx = stat_x + i * stat_w
        c.setFillColor(LOGO_BLUE)
        c.setFont("Helvetica-Bold", 16)
        c.drawString(sx, y - 40, num)
        c.setFillColor(TEXT_MUTED)
        c.setFont("Helvetica", 7.5)
        c.drawString(sx, y - 52, label)

    y -= 90

    # --- WHAT WE PROVIDE section ---
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 13)
    c.drawString(40, y, "What We Provide")
    y -= 6

    # Gold underline
    c.setStrokeColor(GOLD)
    c.setLineWidth(2)
    c.line(40, y, 160, y)
    y -= 18

    checklist_items = [
        ("Accredited CE/CME Programs", "Evidence-based continuing education for wound care professionals"),
        ("Annual Conference & Events", "National gatherings for clinical learning and networking"),
        ("Professional Networking", "Connect with wound care clinicians and experts nationwide"),
        ("Clinical Resources & Tools", "Assessment frameworks, treatment protocols, and best practices"),
        ("Advocacy & Standards", "Promoting elevated wound care standards in post-acute settings"),
        ("Membership Benefits", "Professional development, CE access, and community membership"),
        ("Industry Partnerships", "Sponsorship and collaboration opportunities for wound care companies"),
    ]

    style_check_title = ParagraphStyle(
        "ctitle", fontName="Helvetica-Bold", fontSize=9, leading=11, textColor=NAVY
    )
    style_check_desc = ParagraphStyle(
        "cdesc", fontName="Helvetica", fontSize=7.5, leading=10, textColor=TEXT_MUTED
    )

    for title, desc in checklist_items:
        # Checkmark
        c.setFillColor(BLUE_ACCENT)
        c.setFont("Helvetica-Bold", 10)
        c.drawString(44, y, "\u2713")

        pt = Paragraph(title, style_check_title)
        pw, ph = pt.wrap(230, 50)
        pt.drawOn(c, 60, y - 2)

        pd = Paragraph(desc, style_check_desc)
        pw2, ph2 = pd.wrap(230, 50)
        pd.drawOn(c, 60, y - 2 - ph)

        y -= (ph + ph2 + 6)

    # --- PATIENT-CENTERED MODEL section (right column area) ---
    # Draw on the right half of the page
    rx = WIDTH / 2 + 10
    rw = WIDTH / 2 - 50
    ry = HEIGHT - 200

    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 13)
    c.drawString(rx, ry, "Patient-Centered Model")
    ry -= 6
    c.setStrokeColor(GOLD)
    c.setLineWidth(2)
    c.line(rx, ry, rx + 170, ry)
    ry -= 16

    # Concentric rings description
    style_model = ParagraphStyle(
        "model", fontName="Helvetica", fontSize=8.5, leading=11.5, textColor=TEXT_BODY
    )
    model_intro = (
        "PAWSIC's approach places the patient and family at the center, "
        "surrounded by a multidisciplinary care team across all post-acute settings."
    )
    pm = Paragraph(model_intro, style_model)
    pmw, pmh = pm.wrap(rw, 200)
    pm.drawOn(c, rx, ry - pmh)
    ry -= (pmh + 14)

    # Draw concentric circles
    cx = rx + rw / 2
    cy = ry - 70
    radii = [65, 48, 28]
    colors = [HexColor("#e8eef6"), HexColor("#c5d5e8"), LOGO_BLUE]

    for i, (r, col) in enumerate(zip(radii, colors)):
        c.setFillColor(col)
        c.setStrokeColor(WHITE)
        c.setLineWidth(1.5)
        c.circle(cx, cy, r, fill=1, stroke=1)

    # Center text
    c.setFillColor(WHITE)
    c.setFont("Helvetica-Bold", 8)
    c.drawCentredString(cx, cy + 3, "Patient")
    c.setFont("Helvetica", 6.5)
    c.drawCentredString(cx, cy - 7, "& Family")

    # Inner ring label
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 6.5)
    c.drawCentredString(cx, cy + 38, "Team Members")

    # Outer ring label
    c.setFillColor(INDIGO)
    c.setFont("Helvetica-Bold", 6.5)
    c.drawCentredString(cx, cy + 58, "Settings")

    ry = cy - 80

    # Team Members pills
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 9)
    c.drawString(rx, ry, "Team Members")
    ry -= 14

    team_members = [
        "WOC Nurses", "RNs & LPNs", "Physicians",
        "Physical Therapists", "Dietitians", "Pharmacists",
        "Social Workers", "CNAs", "Administrators",
        "Nurse Educators", "Quality Directors", "Case Managers"
    ]

    pill_style = ParagraphStyle(
        "pill", fontName="Helvetica", fontSize=6.5, leading=8, textColor=INDIGO
    )

    px = rx
    for member in team_members:
        tw = c.stringWidth(member, "Helvetica", 6.5) + 12
        if px + tw > WIDTH - 40:
            px = rx
            ry -= 14
        # Pill background
        c.setFillColor(HexColor("#e8eef6"))
        c.roundRect(px, ry - 2, tw, 12, 6, fill=1, stroke=0)
        c.setFillColor(INDIGO)
        c.setFont("Helvetica", 6.5)
        c.drawString(px + 6, ry + 1, member)
        px += tw + 5

    ry -= 24

    # Settings pills
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 9)
    c.drawString(rx, ry, "Care Settings")
    ry -= 14

    settings = [
        "Skilled Nursing", "Long-Term Care", "Home Health",
        "Hospice", "Rehab Facilities", "Assisted Living",
        "Outpatient Clinics", "Telehealth"
    ]

    px = rx
    for setting in settings:
        tw = c.stringWidth(setting, "Helvetica", 6.5) + 12
        if px + tw > WIDTH - 40:
            px = rx
            ry -= 14
        c.setFillColor(HexColor("#faf5e8"))
        c.roundRect(px, ry - 2, tw, 12, 6, fill=1, stroke=0)
        c.setFillColor(HexColor("#8a7434"))
        c.setFont("Helvetica", 6.5)
        c.drawString(px + 6, ry + 1, setting)
        px += tw + 5

    # --- Footer bar ---
    c.setFillColor(NAVY)
    c.rect(0, 0, WIDTH, 28, fill=1, stroke=0)
    c.setFillColor(GOLD)
    c.setFont("Helvetica", 7)
    c.drawCentredString(WIDTH / 2, 10, "pawsic.org  |  info@pawsic.org  |  Follow us on LinkedIn, YouTube, Instagram, Facebook")


def draw_page2(c):
    """Page 2: Who We Serve, How to Get Involved, footer."""

    # --- Top header bar (slimmer) ---
    c.setFillColor(NAVY)
    c.rect(0, HEIGHT - 50, WIDTH, 50, fill=1, stroke=0)
    c.setFillColor(WHITE)
    c.setFont("Helvetica-Bold", 16)
    c.drawString(40, HEIGHT - 35, "PAWSIC")
    c.setFillColor(GOLD)
    c.setFont("Helvetica", 8)
    c.drawRightString(WIDTH - 40, HEIGHT - 35, "pawsic.org")

    # Gold accent
    c.setStrokeColor(GOLD)
    c.setLineWidth(2)
    c.line(0, HEIGHT - 52, WIDTH, HEIGHT - 52)

    y = HEIGHT - 80

    # --- WHO WE SERVE section ---
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 15)
    c.drawString(40, y, "Who We Serve")
    y -= 6
    c.setStrokeColor(GOLD)
    c.setLineWidth(2)
    c.line(40, y, 150, y)
    y -= 20

    audiences = [
        ("Wound Care Nurses", "WOC-certified and aspiring wound care specialists providing direct patient care in post-acute settings."),
        ("Facility Administrators", "Directors of nursing and administrators overseeing wound care programs and quality outcomes."),
        ("Healthcare Organizations", "Post-acute care facilities committed to evidence-based wound management standards."),
        ("Industry Partners", "Medical device and wound care product companies seeking educational partnership opportunities."),
        ("Nurse Educators", "Clinical instructors developing wound care curriculum and training programs."),
        ("Long-Term Care Staff", "Skilled nursing facility teams managing chronic wound patients."),
        ("Home Health Providers", "Home-based wound care professionals managing patients in community settings."),
        ("Rehab Therapists", "Physical and occupational therapists addressing wound-related mobility and function."),
    ]

    # Layout in 2 columns
    col_w = (WIDTH - 100) / 2
    left_x = 40
    right_x = WIDTH / 2 + 10

    style_aud_title = ParagraphStyle(
        "atitle", fontName="Helvetica-Bold", fontSize=9, leading=11, textColor=NAVY
    )
    style_aud_desc = ParagraphStyle(
        "adesc", fontName="Helvetica", fontSize=7.5, leading=10, textColor=TEXT_BODY
    )

    col_y = [y, y]  # Track y for left and right columns

    for i, (title, desc) in enumerate(audiences):
        col = i % 2
        ax = left_x if col == 0 else right_x

        # Icon dot
        c.setFillColor(BLUE_ACCENT)
        c.circle(ax + 4, col_y[col] + 2, 3, fill=1, stroke=0)

        pt = Paragraph(title, style_aud_title)
        pw, ph = pt.wrap(col_w - 20, 50)
        pt.drawOn(c, ax + 14, col_y[col] - 2)

        pd = Paragraph(desc, style_aud_desc)
        pw2, ph2 = pd.wrap(col_w - 20, 80)
        pd.drawOn(c, ax + 14, col_y[col] - 2 - ph)

        col_y[col] -= (ph + ph2 + 12)

    y = min(col_y) - 10

    # --- Divider ---
    c.setStrokeColor(HexColor("#e0e4ea"))
    c.setLineWidth(0.5)
    c.line(40, y, WIDTH - 40, y)
    y -= 22

    # --- HOW TO GET INVOLVED section ---
    c.setFillColor(NAVY)
    c.setFont("Helvetica-Bold", 15)
    c.drawString(40, y, "How to Get Involved")
    y -= 6
    c.setStrokeColor(GOLD)
    c.setLineWidth(2)
    c.line(40, y, 185, y)
    y -= 22

    steps = [
        ("Join Free Membership", "Create your free PAWSIC account at memberships.pawsic.org and gain access to our professional community."),
        ("Explore CE Programs", "Browse our accredited continuing education webinars, courses, and on-demand learning library."),
        ("Attend Events", "Register for our annual conference, regional workshops, and live educational webinars."),
        ("Earn CE Credits", "Complete accredited courses and track your continuing education progress through your member dashboard."),
        ("Connect & Network", "Join our professional community to collaborate with wound care clinicians and experts nationwide."),
        ("Become a Sponsor", "Partner with PAWSIC through educational sponsorship and exhibit opportunities."),
    ]

    style_step_num = ParagraphStyle(
        "snum", fontName="Helvetica-Bold", fontSize=14, leading=16, textColor=GOLD
    )
    style_step_title = ParagraphStyle(
        "stitle", fontName="Helvetica-Bold", fontSize=9.5, leading=12, textColor=NAVY
    )
    style_step_desc = ParagraphStyle(
        "sdesc", fontName="Helvetica", fontSize=7.5, leading=10, textColor=TEXT_BODY
    )

    # 2 columns, 3 rows
    col_w = (WIDTH - 100) / 2
    col_y = [y, y]

    for i, (title, desc) in enumerate(steps):
        col = i % 2
        sx = left_x if col == 0 else right_x

        # Step number circle
        c.setFillColor(NAVY)
        c.circle(sx + 10, col_y[col] + 2, 10, fill=1, stroke=0)
        c.setFillColor(GOLD)
        c.setFont("Helvetica-Bold", 10)
        c.drawCentredString(sx + 10, col_y[col] - 2, str(i + 1))

        pt = Paragraph(title, style_step_title)
        pw, ph = pt.wrap(col_w - 35, 50)
        pt.drawOn(c, sx + 26, col_y[col] - 2)

        pd = Paragraph(desc, style_step_desc)
        pw2, ph2 = pd.wrap(col_w - 35, 80)
        pd.drawOn(c, sx + 26, col_y[col] - 2 - ph)

        col_y[col] -= (ph + ph2 + 16)

    y = min(col_y) - 6

    # --- CTA box ---
    cta_h = 55
    c.setFillColor(INDIGO)
    c.roundRect(40, y - cta_h, WIDTH - 80, cta_h, 8, fill=1, stroke=0)

    c.setFillColor(WHITE)
    c.setFont("Helvetica-Bold", 13)
    c.drawCentredString(WIDTH / 2, y - 22, "Ready to Elevate Your Practice?")
    c.setFillColor(GOLD)
    c.setFont("Helvetica", 9)
    c.drawCentredString(WIDTH / 2, y - 38, "Join PAWSIC today at memberships.pawsic.org/register/free-membership")

    # --- Footer bar ---
    c.setFillColor(NAVY)
    c.rect(0, 0, WIDTH, 40, fill=1, stroke=0)

    c.setFillColor(WHITE)
    c.setFont("Helvetica", 7)
    c.drawCentredString(WIDTH / 2, 24, "PAWSIC  |  Post-Acute Wound & Skin Integrity Council  |  pawsic.org  |  info@pawsic.org")

    c.setFillColor(TEXT_MUTED)
    c.setFont("Helvetica", 6)
    c.drawCentredString(
        WIDTH / 2, 12,
        "This brochure is for informational purposes only and does not constitute medical advice. "
        "All content is evidence-based and developed by qualified healthcare professionals."
    )
    c.setFont("Helvetica", 5.5)
    c.drawCentredString(WIDTH / 2, 4, "Copyright 2026 PAWSIC. All rights reserved.")


def main():
    c = canvas.Canvas(OUTPUT_PATH, pagesize=letter)
    c.setTitle("PAWSIC - Who We Are")
    c.setAuthor("PAWSIC")
    c.setSubject("Post-Acute Wound & Skin Integrity Council - Organizational Brochure")

    # Page 1
    draw_page1(c)
    c.showPage()

    # Page 2
    draw_page2(c)
    c.showPage()

    c.save()
    print(f"Brochure generated: {OUTPUT_PATH}")
    print(f"File size: {os.path.getsize(OUTPUT_PATH) / 1024:.1f} KB")


if __name__ == "__main__":
    main()
