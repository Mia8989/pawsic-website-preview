const fs = require("fs");
const {
  Document, Packer, Paragraph, TextRun, Table, TableRow, TableCell,
  Header, Footer, AlignmentType, LevelFormat,
  HeadingLevel, BorderStyle, WidthType, ShadingType,
  PageNumber, PageBreak
} = require("docx");

// PAWSIC Brand Colors
const NAVY = "0C1F3F";
const BLUE = "38B6FF";
const TEAL = "3A9E8F";
const RED = "DC2626";
const GRAY = "666666";
const LIGHT_GRAY = "F0F0F0";

// Helpers
function heading1(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_1,
    children: [new TextRun(text)],
  });
}

function heading2(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_2,
    children: [new TextRun(text)],
  });
}

function heading3(text) {
  return new Paragraph({
    heading: HeadingLevel.HEADING_3,
    children: [new TextRun(text)],
  });
}

function body(text) {
  return new Paragraph({
    spacing: { after: 120 },
    children: [new TextRun({ text, size: 22 })],
  });
}

function bodyBold(text) {
  return new Paragraph({
    spacing: { after: 120 },
    children: [new TextRun({ text, size: 22, bold: true })],
  });
}

function bodyItalic(text) {
  return new Paragraph({
    spacing: { after: 120 },
    children: [new TextRun({ text, size: 22, italics: true, color: GRAY })],
  });
}

function bullet(text, boldPrefix) {
  const children = [];
  if (boldPrefix) {
    children.push(new TextRun({ text: boldPrefix + " ", size: 22, bold: true }));
    children.push(new TextRun({ text, size: 22 }));
  } else {
    children.push(new TextRun({ text, size: 22 }));
  }
  return new Paragraph({
    numbering: { reference: "bullets", level: 0 },
    spacing: { after: 60 },
    children,
  });
}

function numberedItem(text, ref) {
  return new Paragraph({
    numbering: { reference: ref || "numbers1", level: 0 },
    spacing: { after: 60 },
    children: [new TextRun({ text, size: 22 })],
  });
}

function numberedItemBold(boldText, normalText, ref) {
  return new Paragraph({
    numbering: { reference: ref || "numbers1", level: 0 },
    spacing: { after: 60 },
    children: [
      new TextRun({ text: boldText + " ", size: 22, bold: true }),
      new TextRun({ text: normalText, size: 22 }),
    ],
  });
}

function calloutBox(title, text, color) {
  const fill = color === "red" ? "FEF2F2" : color === "blue" ? "EFF6FF" : color === "green" ? "F0FDF4" : "FFFBEB";
  const titleColor = color === "red" ? RED : color === "blue" ? "1D4ED8" : color === "green" ? TEAL : "D97706";
  const borderColor = color === "red" ? "FCA5A5" : color === "blue" ? "93C5FD" : color === "green" ? "86EFAC" : "FCD34D";

  const border = { style: BorderStyle.SINGLE, size: 1, color: borderColor };
  const leftBorder = { style: BorderStyle.SINGLE, size: 6, color: titleColor };

  return new Table({
    width: { size: 9360, type: WidthType.DXA },
    columnWidths: [9360],
    rows: [
      new TableRow({
        children: [
          new TableCell({
            borders: { top: border, bottom: border, right: border, left: leftBorder },
            width: { size: 9360, type: WidthType.DXA },
            shading: { fill, type: ShadingType.CLEAR },
            margins: { top: 100, bottom: 100, left: 160, right: 160 },
            children: [
              new Paragraph({
                spacing: { after: 60 },
                children: [new TextRun({ text: title.toUpperCase(), size: 18, bold: true, color: titleColor })],
              }),
              new Paragraph({
                children: [new TextRun({ text, size: 20 })],
              }),
            ],
          }),
        ],
      }),
    ],
  });
}

function spacer() {
  return new Paragraph({ spacing: { after: 80 }, children: [] });
}

function pageBreakPara() {
  return new Paragraph({ children: [new PageBreak()] });
}

function sectionDivider() {
  return new Paragraph({
    spacing: { before: 200, after: 200 },
    border: { bottom: { style: BorderStyle.SINGLE, size: 2, color: TEAL, space: 8 } },
    children: [],
  });
}

// ============================
// BUILD DOCUMENT
// ============================

const doc = new Document({
  styles: {
    default: {
      document: { run: { font: "Arial", size: 22 } },
    },
    paragraphStyles: [
      {
        id: "Heading1", name: "Heading 1", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 36, bold: true, font: "Arial", color: NAVY },
        paragraph: { spacing: { before: 360, after: 200 }, outlineLevel: 0 },
      },
      {
        id: "Heading2", name: "Heading 2", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 28, bold: true, font: "Arial", color: NAVY },
        paragraph: { spacing: { before: 280, after: 140 }, outlineLevel: 1 },
      },
      {
        id: "Heading3", name: "Heading 3", basedOn: "Normal", next: "Normal", quickFormat: true,
        run: { size: 24, bold: true, font: "Arial", color: NAVY },
        paragraph: { spacing: { before: 200, after: 100 }, outlineLevel: 2 },
      },
    ],
  },
  numbering: {
    config: [
      {
        reference: "bullets",
        levels: [{
          level: 0, format: LevelFormat.BULLET, text: "\u2022", alignment: AlignmentType.LEFT,
          style: { paragraph: { indent: { left: 720, hanging: 360 } } },
        }],
      },
      {
        reference: "numbers1",
        levels: [{
          level: 0, format: LevelFormat.DECIMAL, text: "%1.", alignment: AlignmentType.LEFT,
          style: { paragraph: { indent: { left: 720, hanging: 360 } } },
        }],
      },
      {
        reference: "numbers2",
        levels: [{
          level: 0, format: LevelFormat.DECIMAL, text: "%1.", alignment: AlignmentType.LEFT,
          style: { paragraph: { indent: { left: 720, hanging: 360 } } },
        }],
      },
    ],
  },
  sections: [
    // =====================
    // COVER PAGE
    // =====================
    {
      properties: {
        page: {
          size: { width: 12240, height: 15840 },
          margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
        },
      },
      children: [
        new Paragraph({ spacing: { before: 3600 }, children: [] }),
        new Paragraph({
          alignment: AlignmentType.CENTER,
          spacing: { after: 200 },
          children: [new TextRun({ text: "PAWSIC", size: 56, bold: true, font: "Arial", color: NAVY })],
        }),
        new Paragraph({
          alignment: AlignmentType.CENTER,
          spacing: { after: 100 },
          children: [new TextRun({ text: "Post-Acute Wound & Skin Integrity Council", size: 24, font: "Arial", color: TEAL })],
        }),
        new Paragraph({
          alignment: AlignmentType.CENTER,
          spacing: { before: 600, after: 200 },
          border: { top: { style: BorderStyle.SINGLE, size: 2, color: TEAL, space: 16 }, bottom: { style: BorderStyle.SINGLE, size: 2, color: TEAL, space: 16 } },
          children: [new TextRun({ text: "Community Forum Guidelines", size: 44, bold: true, font: "Arial", color: NAVY })],
        }),
        new Paragraph({
          alignment: AlignmentType.CENTER,
          spacing: { before: 400, after: 100 },
          children: [new TextRun({ text: "Compiled for Review", size: 24, font: "Arial", color: GRAY })],
        }),
        new Paragraph({
          alignment: AlignmentType.CENTER,
          spacing: { after: 100 },
          children: [new TextRun({ text: "DRAFT -- FOR APPROVAL", size: 28, bold: true, font: "Arial", color: RED })],
        }),
        new Paragraph({
          alignment: AlignmentType.CENTER,
          spacing: { before: 600 },
          children: [new TextRun({ text: "March 2026", size: 22, font: "Arial", color: GRAY })],
        }),
        new Paragraph({
          alignment: AlignmentType.CENTER,
          spacing: { after: 100 },
          children: [new TextRun({ text: "Prepared by: AI Powered Dahlia (Dahlia Imanbay)", size: 20, font: "Arial", color: GRAY })],
        }),
      ],
    },

    // =====================
    // TABLE OF CONTENTS
    // =====================
    {
      properties: {
        page: {
          size: { width: 12240, height: 15840 },
          margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
        },
      },
      headers: {
        default: new Header({
          children: [new Paragraph({
            alignment: AlignmentType.RIGHT,
            children: [new TextRun({ text: "PAWSIC Community Forum Guidelines -- DRAFT", size: 16, color: GRAY, italics: true })],
          })],
        }),
      },
      footers: {
        default: new Footer({
          children: [new Paragraph({
            alignment: AlignmentType.CENTER,
            children: [
              new TextRun({ text: "Page ", size: 16, color: GRAY }),
              new TextRun({ children: [PageNumber.CURRENT], size: 16, color: GRAY }),
            ],
          })],
        }),
      },
      children: [
        new Paragraph({
          spacing: { after: 400 },
          children: [new TextRun({ text: "Table of Contents", size: 36, bold: true, color: NAVY })],
        }),
        spacer(),
        new Paragraph({ spacing: { after: 200 }, children: [new TextRun({ text: "1. General Discussion Forum Guidelines", size: 24, color: NAVY })] }),
        new Paragraph({ spacing: { after: 200 }, children: [new TextRun({ text: "2. Patient Voice Forum Guidelines", size: 24, color: NAVY })] }),
        new Paragraph({ spacing: { after: 200 }, children: [new TextRun({ text: "3. Professional Practice Forum Guidelines", size: 24, color: NAVY })] }),
        new Paragraph({ spacing: { after: 200 }, children: [new TextRun({ text: "4. Clinical Q&A Forum Guidelines", size: 24, color: NAVY })] }),
        new Paragraph({ spacing: { after: 200 }, children: [new TextRun({ text: "5. Skin Failure SIG Forum Rules & Guidelines", size: 24, color: NAVY })] }),
        spacer(),
        spacer(),
        new Paragraph({
          spacing: { after: 100 },
          children: [new TextRun({ text: "Each section below contains the complete guidelines for the respective PAWSIC community forum. These guidelines govern member conduct, content standards, HIPAA compliance, and moderation policies.", size: 22, color: GRAY })],
        }),
      ],
    },

    // =====================
    // 1. GENERAL DISCUSSION
    // =====================
    {
      properties: {
        page: {
          size: { width: 12240, height: 15840 },
          margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
        },
      },
      headers: {
        default: new Header({
          children: [new Paragraph({
            alignment: AlignmentType.RIGHT,
            children: [new TextRun({ text: "PAWSIC Community Forum Guidelines -- DRAFT", size: 16, color: GRAY, italics: true })],
          })],
        }),
      },
      footers: {
        default: new Footer({
          children: [new Paragraph({
            alignment: AlignmentType.CENTER,
            children: [
              new TextRun({ text: "Page ", size: 16, color: GRAY }),
              new TextRun({ children: [PageNumber.CURRENT], size: 16, color: GRAY }),
            ],
          })],
        }),
      },
      children: [
        heading1("1. PAWSIC Community Forum -- General Discussion Guidelines"),
        new Paragraph({
          spacing: { after: 60 },
          children: [new TextRun({ text: "Forum Type: Open Community Forum", size: 20, italics: true, color: TEAL })],
        }),
        spacer(),
        body("Welcome to the PAWSIC General Discussion Forum! This is an open community space for wound care professionals, caregivers, patients, students, and anyone interested in post-acute wound and skin integrity topics."),
        body("To maintain a safe, respectful, and legally compliant environment, all participants must follow these guidelines."),
        spacer(),

        // 1. Medical Disclaimer
        heading2("1. Medical Disclaimer -- IMPORTANT"),
        calloutBox("Critical Disclaimer", "This forum does NOT provide medical advice, diagnosis, or treatment recommendations. All content shared by members reflects individual opinions and experiences and should NOT be considered a substitute for professional medical judgment.", "red"),
        spacer(),
        body("Always consult a qualified healthcare provider for medical decisions regarding wound care or any health condition. PAWSIC, its moderators, and its members are not liable for any actions taken based on information shared in this forum."),

        // 2. No Individualized Medical Guidance
        heading2("2. No Individualized Medical Guidance"),
        bullet("Do NOT request or provide specific treatment plans, medication advice, or diagnostic opinions for individual cases"),
        bullet('Do NOT ask questions like "What should I do about my wound?" or "Is this treatment right for my patient?" -- these require direct consultation with a licensed healthcare provider'),
        bullet("General educational discussion about wound care topics, evidence-based practices, and published research is welcome"),

        // 3. HIPAA
        heading2("3. Patient Privacy & HIPAA Compliance"),
        calloutBox("Zero Tolerance -- Privacy Violations", "Violations of patient privacy may result in immediate removal and reporting to the appropriate authorities.", "red"),
        spacer(),
        bullet("NEVER share real patient names, initials, photos, or any identifying information"),
        bullet("Do NOT post details that could identify a specific patient, even indirectly (facility name + date + wound description = identifiable)"),
        bullet('If discussing clinical scenarios, use only fully de-identified composite or fictional examples and clearly label them as such (e.g., "Illustrative case -- details altered to protect privacy")'),

        // 4. Evidence-Based Discussion
        heading2("4. Evidence-Based Discussion Standards"),
        bullet("When sharing clinical information, statistics, or treatment outcomes, cite credible sources (peer-reviewed journals, clinical practice guidelines, recognized professional organizations)"),
        bullet('Avoid absolute or unsubstantiated claims. Use appropriate language such as "evidence suggests," "studies indicate," or "research demonstrates"'),
        bullet('Do NOT use terms like "guaranteed results," "miracle cure," "100% effective," or any language implying certain outcomes'),

        // 5. No Product Promotion
        heading2("5. No Product Promotion or Commercial Content"),
        bullet("Do NOT promote, endorse, or advertise specific commercial products, devices, or brands"),
        bullet("Do NOT post affiliate links, sales pitches, or unsolicited promotional content"),
        bullet("Discussion of product categories or treatment modalities in an educational context is acceptable, but must remain balanced and non-promotional"),
        bullet("Any commercial relationships or conflicts of interest must be disclosed"),

        // 6. Professional Conduct
        heading2("6. Respectful & Professional Conduct"),
        bullet("Treat all members with courtesy and respect, regardless of their professional background, experience level, or perspective"),
        bullet("No harassment, discrimination, bullying, personal attacks, or inflammatory language"),
        bullet("Disagreements should be handled constructively and supported by evidence, not personal opinion or emotion"),

        // 7. Stay On Topic
        heading2("7. Stay On Topic"),
        bullet("Keep discussions relevant to wound care, skin integrity, post-acute care, professional development, or related healthcare topics"),
        bullet("Off-topic posts may be moved or removed by moderators"),

        // 8. Privacy
        heading2("8. Privacy & Personal Information"),
        bullet("Do NOT share another person's personal or contact information without their explicit consent"),
        bullet("Protect your own privacy -- avoid sharing sensitive personal details in a public forum"),

        // 9. Illegal Content
        heading2("9. No Illegal or Inappropriate Content"),
        bullet("Do not share pirated materials, copyrighted content without permission, or anything that violates applicable laws or regulations"),
        bullet("Do not promote off-label use of FDA-regulated medical devices or products"),

        // 10. Moderation
        heading2("10. Moderator Authority & Enforcement"),
        bullet("Moderators ensure this community remains safe, compliant, and constructive. Respect their decisions"),
        bullet("Violations may result in content removal, temporary suspension, or permanent ban depending on severity"),
        bullet("PAWSIC reserves the right to remove any content that poses a legal, compliance, or safety risk"),
        spacer(),
        calloutBox("Appeals & Questions", "If you believe a moderation decision was made in error or have questions about these guidelines, contact PAWSIC at community@pawsic.org.", "blue"),

        // Limitation of Liability
        heading2("Limitation of Liability"),
        body("By participating in this forum, you acknowledge and agree that:"),
        bullet("PAWSIC provides this forum as an educational and community resource only"),
        bullet("PAWSIC does not verify the credentials, qualifications, or accuracy of information shared by individual members"),
        bullet("PAWSIC is not responsible for any harm, injury, or damages resulting from reliance on information shared in this forum"),
        bullet("You are solely responsible for your own healthcare decisions and should consult qualified professionals accordingly"),
        bullet("PAWSIC reserves the right to modify these guidelines at any time"),
        spacer(),
        bodyBold("By posting in this forum, you agree to these guidelines and acknowledge the disclaimers above."),
      ],
    },

    // =====================
    // 2. PATIENT VOICE
    // =====================
    {
      properties: {
        page: {
          size: { width: 12240, height: 15840 },
          margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
        },
      },
      headers: {
        default: new Header({
          children: [new Paragraph({
            alignment: AlignmentType.RIGHT,
            children: [new TextRun({ text: "PAWSIC Community Forum Guidelines -- DRAFT", size: 16, color: GRAY, italics: true })],
          })],
        }),
      },
      footers: {
        default: new Footer({
          children: [new Paragraph({
            alignment: AlignmentType.CENTER,
            children: [
              new TextRun({ text: "Page ", size: 16, color: GRAY }),
              new TextRun({ children: [PageNumber.CURRENT], size: 16, color: GRAY }),
            ],
          })],
        }),
      },
      children: [
        heading1("2. Patient Voice Forum -- Community Guidelines"),
        new Paragraph({
          spacing: { after: 60 },
          children: [new TextRun({ text: "Forum Type: Community Forum (Patients, Caregivers & Advocates)", size: 20, italics: true, color: TEAL })],
        }),
        spacer(),
        body("A space for patients, caregivers, and advocates to share experiences related to wound care and skin integrity in post-acute settings."),
        body("Your voice matters. These guidelines help us keep this community safe, supportive, and empowering for everyone."),
        spacer(),

        // Sharing Your Experience
        heading2("Sharing Your Experience"),
        bullet("You are welcome to share your personal healing journey, caregiving experiences, and questions about navigating wound care"),
        bullet("Your stories help the PAWSIC community better understand the patient perspective and improve care delivery"),
        spacer(),
        calloutBox("Your Story Has Power", "Every experience shared here contributes to a better understanding of wound care from the patient and caregiver perspective. Thank you for being part of this community.", "green"),

        // Medical Advice Disclaimer
        heading2("Medical Advice Disclaimer"),
        calloutBox("Important -- Please Read", "This forum is not a substitute for professional medical advice, diagnosis, or treatment. Never delay or disregard professional medical advice because of something you read here.", "red"),
        spacer(),
        bullet("No member, moderator, or PAWSIC representative is providing clinical recommendations through this forum"),
        bullet("If you are experiencing a medical emergency, contact your healthcare provider or call 911 immediately", "IMPORTANT:"),

        // Privacy and Safety
        heading2("Privacy and Safety"),
        bullet("Do not share your full name, facility name, provider names, medical record numbers, insurance details, or any information that could identify you or others"),
        bullet("If sharing photos of wounds or skin conditions, ensure no identifying features (face, tattoos, birthmarks, name bands) are visible"),
        bullet("PAWSIC reserves the right to remove any content that may compromise patient privacy"),
        spacer(),
        calloutBox("Protect Yourself", "This is a public community space. Be mindful of what personal details you share. You can tell your story without revealing information that could identify you, your facility, or your providers.", "yellow"),

        // Respect and Conduct
        heading2("Respect and Conduct"),
        bullet("Treat all members with empathy and respect. Wound care journeys are deeply personal"),
        bullet("No harassment, discrimination, bullying, or personal attacks"),
        bullet("Do not dismiss or minimize another person's experience"),

        // Product and Treatment Discussions
        heading2("Product and Treatment Discussions"),
        bullet("You may share your personal experience with treatments or products, but do not present personal experience as clinical evidence"),
        bullet('Statements like "this cured me" or "this product is the only thing that works" are not permitted. Use language such as "in my experience" or "my provider recommended"'),
        bullet("No product promotions, affiliate links, or sales solicitations"),
        spacer(),
        calloutBox("Helpful Language", 'Instead of: "This cream cured my wound -- everyone should use it!" Try: "In my experience, my provider recommended a specific type of barrier cream and it helped with my healing process."', "blue"),

        // Content Moderation
        heading2("Content Moderation"),
        bullet("Moderators may edit, move, or remove posts that violate these guidelines"),
        bullet("Repeated violations may result in temporary or permanent suspension"),
        bullet("Moderator decisions are final"),
        spacer(),
        calloutBox("Questions or Concerns?", "If you have questions about these guidelines or believe a moderation decision was made in error, contact PAWSIC at community@pawsic.org.", "blue"),
        spacer(),
        bodyBold("By participating, you acknowledge that PAWSIC is not liable for any actions taken based on information shared in this forum."),
      ],
    },

    // =====================
    // 3. PROFESSIONAL PRACTICE
    // =====================
    {
      properties: {
        page: {
          size: { width: 12240, height: 15840 },
          margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
        },
      },
      headers: {
        default: new Header({
          children: [new Paragraph({
            alignment: AlignmentType.RIGHT,
            children: [new TextRun({ text: "PAWSIC Community Forum Guidelines -- DRAFT", size: 16, color: GRAY, italics: true })],
          })],
        }),
      },
      footers: {
        default: new Footer({
          children: [new Paragraph({
            alignment: AlignmentType.CENTER,
            children: [
              new TextRun({ text: "Page ", size: 16, color: GRAY }),
              new TextRun({ children: [PageNumber.CURRENT], size: 16, color: GRAY }),
            ],
          })],
        }),
      },
      children: [
        heading1("3. Professional Practice Forum -- Community Guidelines"),
        new Paragraph({
          spacing: { after: 60 },
          children: [new TextRun({ text: "Forum Type: Professionals Only", size: 20, italics: true, color: TEAL })],
        }),
        spacer(),
        body("A peer-to-peer forum for licensed healthcare professionals to discuss wound care practice, workflows, protocols, and professional development in post-acute settings."),
        body("This space is designed for clinician-to-clinician dialogue grounded in evidence, professionalism, and a shared commitment to advancing wound care practice."),
        spacer(),

        // Professional Standards
        heading2("Professional Standards"),
        bullet("This forum is intended for licensed healthcare professionals including physicians, nurse practitioners (NPs), physician assistants (PAs), nurses, wound care specialists (WOC-certified and aspiring), physical therapists, occupational therapists, podiatrists, registered dietitians, pharmacists, dermatologists, licensed clinical social workers, and post-acute care administrators"),
        bullet("Discussions should reflect the professional standards expected of licensed clinicians"),

        // Medical Advice Disclaimer
        heading2("Medical Advice Disclaimer"),
        calloutBox("Important Disclaimer", "Content shared here represents individual professional perspectives and peer discussion only. It does not constitute clinical guidelines, institutional policy, or PAWSIC-endorsed treatment protocols.", "red"),
        spacer(),
        bullet("No provider-patient relationship is established through forum participation"),
        bullet("PAWSIC assumes no liability for clinical decisions made based on forum discussions. All clinical decisions must be made in the context of individual patient assessment by the treating provider"),

        // Evidence-Based Discussion
        heading2("Evidence-Based Discussion"),
        bullet("When referencing clinical data, outcomes, or treatment approaches, cite peer-reviewed sources whenever possible (e.g., journal name, year, guideline body)"),
        bullet('Use hedging language consistent with clinical evidence: "evidence suggests," "studies indicate," "current guidelines recommend" -- not "this will heal" or "guaranteed results"'),
        bullet("Do not cite sources older than 7 years as current evidence unless they are recognized landmark or foundational studies"),
        spacer(),
        calloutBox("Citation Best Practice", 'Example: "Per the 2022 NPUAP/EPUAP/PPPIA guidelines, repositioning schedules should be individualized based on tissue tolerance and support surface characteristics." Including the source, year, and organization strengthens every discussion.', "green"),

        // HIPAA Compliance
        heading2("HIPAA Compliance (Mandatory)"),
        calloutBox("Zero Tolerance", "Violation of patient privacy will result in immediate content removal and potential suspension.", "red"),
        spacer(),
        bullet("Never share real patient names, initials, facility names, dates of service, photos with identifiable features, or any of the 18 HIPAA identifiers"),
        bullet("Case discussions must use fully de-identified or composite/fictional scenarios and must be clearly labeled as such"),

        // Product and Device Mentions
        heading2("Product and Device Mentions"),
        bullet("Discuss product categories and clinical approaches freely, but do not promote specific brands as superior without supporting evidence"),
        bullet("Do not promote off-label use of FDA-cleared devices"),
        bullet("If you have a financial relationship with a manufacturer or commercial interest, disclose it in your post"),
        bullet("No sales pitches, affiliate links, or unsolicited commercial promotions"),
        spacer(),
        calloutBox("Disclosure Required", "Any financial relationship with a manufacturer, distributor, or commercial entity whose products are relevant to your post must be disclosed. Transparency builds trust in peer-to-peer clinical dialogue.", "yellow"),

        // Respect and Professionalism
        heading2("Respect and Professionalism"),
        bullet("Disagreements are expected in clinical discourse -- engage with evidence and respect, not personal attacks"),
        bullet("Do not disparage colleagues, institutions, or competing organizations"),
        bullet("Scope-of-practice discussions must remain respectful and evidence-informed"),

        // Content Moderation
        heading2("Content Moderation"),
        bullet("Moderators may flag, edit, or remove posts that violate these guidelines"),
        bullet("Content with unsubstantiated clinical claims may be removed or tagged with a disclaimer"),
        bullet("Repeated violations may result in temporary or permanent suspension"),
        spacer(),
        calloutBox("Questions or Concerns?", "Contact PAWSIC at community@pawsic.org with questions about these guidelines or moderation decisions.", "blue"),
        spacer(),
        bodyBold("By participating, you acknowledge that PAWSIC provides this forum as an educational peer-exchange platform and assumes no liability for clinical outcomes resulting from information discussed here."),
      ],
    },

    // =====================
    // 4. CLINICAL Q&A
    // =====================
    {
      properties: {
        page: {
          size: { width: 12240, height: 15840 },
          margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
        },
      },
      headers: {
        default: new Header({
          children: [new Paragraph({
            alignment: AlignmentType.RIGHT,
            children: [new TextRun({ text: "PAWSIC Community Forum Guidelines -- DRAFT", size: 16, color: GRAY, italics: true })],
          })],
        }),
      },
      footers: {
        default: new Footer({
          children: [new Paragraph({
            alignment: AlignmentType.CENTER,
            children: [
              new TextRun({ text: "Page ", size: 16, color: GRAY }),
              new TextRun({ children: [PageNumber.CURRENT], size: 16, color: GRAY }),
            ],
          })],
        }),
      },
      children: [
        heading1("4. Clinical Q&A Forum -- Community Guidelines"),
        new Paragraph({
          spacing: { after: 60 },
          children: [new TextRun({ text: "Forum Type: Evidence-Based Exchange", size: 20, italics: true, color: TEAL })],
        }),
        spacer(),
        body("A structured forum for evidence-based clinical questions and answers related to wound assessment, prevention, treatment, and skin integrity in post-acute care."),
        body("Ask clearly. Answer with evidence. Learn from each other."),
        spacer(),

        // Medical Advice Disclaimer
        heading2("Medical Advice Disclaimer"),
        calloutBox("Important Disclaimer", "Responses in this forum reflect individual clinical knowledge and peer expertise. They are not PAWSIC-endorsed clinical recommendations, practice guidelines, or medical advice. No provider-patient relationship is created through this forum.", "red"),
        spacer(),
        bullet("All clinical decisions must be made by the treating provider based on individual patient assessment"),
        bullet("PAWSIC, its moderators, and responding clinicians assume no liability for patient outcomes resulting from information shared in this forum"),

        // Asking Questions
        heading2("Asking Questions"),
        bullet("Frame clinical questions clearly with relevant (de-identified) context: wound type, care setting, patient population, current interventions"),
        bullet("Never include real patient identifiers, facility names, or any information that could identify a specific patient. Use composite or hypothetical scenarios"),
        bullet("Specify whether you are asking about general best practice, a specific clinical scenario, or seeking resource recommendations"),
        spacer(),
        calloutBox("Well-Framed Question Example", '"In a skilled nursing setting, what does current evidence support for repositioning frequency in patients on high-density foam mattresses who are at end of life with limited mobility? Looking for guideline-based recommendations."', "green"),

        // Answering Questions
        heading2("Answering Questions"),
        bullet("Ground your responses in current evidence-based practice. Cite sources when possible (guideline body, journal, year)"),
        bullet("Clearly distinguish between evidence-based recommendations, institutional protocols, and personal clinical experience"),
        bullet('Use appropriate clinical terminology. Preferred: "pressure injury" (not "bedsore"), "wound closure" (not "healing guarantee")'),
        bullet('Use hedging language: "current evidence supports," "guidelines recommend," "clinical experience suggests" -- never absolute outcome claims'),
        bullet("If you lack expertise in the specific area, defer rather than speculate"),

        // HIPAA Compliance
        heading2("HIPAA Compliance (Mandatory)"),
        calloutBox("Zero Tolerance", "Violation of patient privacy will result in immediate removal and potential suspension.", "red"),
        spacer(),
        bullet("All case-based questions and answers must be fully de-identified per the HIPAA Safe Harbor method"),
        bullet("No real patient photos unless fully de-identified with documented consent (which cannot be verified through this forum -- avoid posting patient images entirely)"),

        // Conflicts of Interest
        heading2("Conflicts of Interest"),
        bullet("If your response references a product or device with which you have a financial relationship, disclose it"),
        bullet("Do not use Q&A responses as an opportunity for product promotion"),
        bullet("Provide balanced perspectives -- when mentioning a specific product, note the broader category or alternatives"),
        spacer(),
        calloutBox("Disclosure Required", "Transparency about financial relationships ensures the integrity of clinical peer exchange. If in doubt, disclose.", "yellow"),

        // Scope and Limitations
        heading2("Scope and Limitations"),
        bullet("This forum does not replace formal clinical education, CE/CME programs, or institutional clinical protocols"),
        bullet("Questions requiring urgent clinical decision-making should be directed to the treating clinical team, not this forum"),
        bullet("PAWSIC reserves the right to add editorial disclaimers to responses that may be incomplete or require additional context"),

        // Content Moderation
        heading2("Content Moderation"),
        bullet('Moderators with clinical expertise may tag responses as "peer perspective," "evidence-supported," or "needs citation"'),
        bullet("Unsubstantiated claims or responses that could lead to patient harm will be removed"),
        bullet("Repeated guideline violations may result in suspension"),
        spacer(),
        calloutBox("Questions or Concerns?", "Contact PAWSIC at community@pawsic.org with questions about these guidelines or moderation decisions.", "blue"),
        spacer(),
        bodyBold("By participating, you acknowledge that this forum is for educational peer exchange only. PAWSIC is not liable for clinical decisions or patient outcomes based on forum content."),
      ],
    },

    // =====================
    // 5. SKIN FAILURE SIG
    // =====================
    {
      properties: {
        page: {
          size: { width: 12240, height: 15840 },
          margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
        },
      },
      headers: {
        default: new Header({
          children: [new Paragraph({
            alignment: AlignmentType.RIGHT,
            children: [new TextRun({ text: "PAWSIC Community Forum Guidelines -- DRAFT", size: 16, color: GRAY, italics: true })],
          })],
        }),
      },
      footers: {
        default: new Footer({
          children: [new Paragraph({
            alignment: AlignmentType.CENTER,
            children: [
              new TextRun({ text: "Page ", size: 16, color: GRAY }),
              new TextRun({ children: [PageNumber.CURRENT], size: 16, color: GRAY }),
            ],
          })],
        }),
      },
      children: [
        heading1("5. Skin Failure SIG -- Forum Rules & Community Guidelines"),
        new Paragraph({
          spacing: { after: 60 },
          children: [new TextRun({ text: "Forum Type: Premium SIG Space (PAWSIC Premium Members Only)", size: 20, italics: true, color: TEAL })],
        }),
        spacer(),
        body("Welcome to the Skin Failure Shared Interest Group (SIG) -- a premium PAWSIC community space dedicated to advancing the understanding, assessment, and documentation of skin failure in post-acute and end-of-life care settings."),
        body("This forum exists to facilitate evidence-based dialogue among wound care professionals. The following rules ensure our discussions remain clinically rigorous, ethically sound, and beneficial for all members. By participating, you agree to these guidelines."),
        spacer(),

        // 1. Purpose & Scope
        heading2("1. Purpose & Scope"),
        body("The Skin Failure SIG focuses on:"),
        bullet("Skin failure recognition and assessment -- including distinguishing skin failure from pressure injuries, moisture-associated skin damage (MASD), and other etiologies"),
        bullet("End-of-life skin changes -- Kennedy Terminal Ulcers (KTU), Skin Changes at Life's End (SCALE), and Trombley-Brennan Terminal Tissue Injuries (TB-TTI)"),
        bullet("Documentation and regulatory considerations -- CMS survey readiness, MDS coding, care planning, and family communication"),
        bullet("Emerging research and clinical evidence -- peer-reviewed findings, clinical frameworks, and evolving definitions"),
        bullet("Interdisciplinary perspectives -- nursing, palliative care, hospice, long-term care, dermatology, and wound care specialists"),
        body("Discussions outside this scope may be redirected to the appropriate PAWSIC community forum or SIG space."),

        // 2. Who Can Participate
        heading2("2. Who Can Participate"),
        body("The Skin Failure SIG is available exclusively to PAWSIC Premium Members. Participants typically include:"),
        bullet("Wound, Ostomy, and Continence (WOC) nurses and certified wound care specialists"),
        bullet("Directors of Nursing (DONs) and clinical leadership in post-acute settings"),
        bullet("Palliative care and hospice clinicians"),
        bullet("Physicians, nurse practitioners, and physician assistants specializing in wound care"),
        bullet("Researchers and academics studying skin failure and end-of-life skin changes"),
        bullet("Quality improvement and regulatory compliance professionals"),
        spacer(),
        calloutBox("Credential Transparency", "We encourage all members to list their credentials and practice setting in their profile. This helps the community contextualize clinical perspectives and fosters trust in discussions.", "blue"),

        // 3. Core Forum Rules
        heading2("3. Core Forum Rules"),

        heading3("3.1 Evidence-Based Discussion"),
        bullet("All clinical claims, treatment recommendations, and assessment guidance must be supported by peer-reviewed evidence, clinical practice guidelines, or recognized expert consensus"),
        bullet("When citing evidence, include the source (author, journal/publication, year) whenever possible"),
        bullet("Acceptable sources include peer-reviewed journals, Cochrane Reviews, NPUAP/EPUAP/PPPIA guidelines, WOCN position statements, and AHRQ publications"),
        bullet("Clearly distinguish between established evidence, emerging research, clinical opinion, and anecdotal experience"),
        bullet('"In my clinical experience" statements are valued but should be identified as experiential rather than evidence-based'),

        heading3("3.2 Patient Privacy (HIPAA Compliance)"),
        calloutBox("Critical -- Zero Tolerance", "HIPAA compliance is mandatory and non-negotiable. Violations will result in immediate post removal and may result in permanent forum ban. PAWSIC is obligated to report suspected HIPAA violations to the appropriate authorities.", "red"),
        spacer(),
        bullet("Never share patient names, initials, dates of birth, facility names, or any combination of details that could identify a patient"),
        bullet("Never post clinical photographs that include identifiable patient features (face, tattoos, birthmarks, room numbers, facility branding) without documented HIPAA authorization"),
        bullet('When discussing clinical scenarios, use de-identified composite cases: "An 82-year-old female in a skilled nursing facility presented with..."'),
        bullet("Remove all 18 HIPAA identifiers per the Safe Harbor de-identification standard"),
        bullet("If you are uncertain whether information is identifiable, err on the side of caution and do not post it"),

        heading3("3.3 Professional Conduct"),
        bullet("Treat all members with professional respect regardless of credentials, experience level, or practice setting"),
        bullet("Disagree constructively -- challenge ideas with evidence, not personal attacks"),
        bullet("No harassment, discrimination, bullying, or intimidation of any kind"),
        bullet("Avoid condescending language toward members from different disciplines or care settings"),
        bullet("Respect that skin failure is a complex and evolving area where clinical opinions may differ -- approach disagreements as learning opportunities"),

        heading3("3.4 No Product Promotion or Commercial Bias"),
        bullet("Do not promote specific commercial products, devices, or services"),
        bullet("When discussing product categories (e.g., wound dressings, skin protectants), use generic or category names"),
        bullet("If a brand name is necessary for clinical context, include relevant alternatives for balanced representation"),
        bullet("Do not post affiliate links, referral codes, or promotional materials"),
        bullet("If you have a financial relationship with a company whose products are relevant to a discussion, disclose it"),
        spacer(),
        calloutBox("Acceptable Product Discussion", '"We\'ve had success using silicone-bordered foam dressings for sacral skin protection in hospice patients" is appropriate. "Buy [Brand X] -- it\'s the best!" is not.', "green"),

        heading3("3.5 No Direct Clinical Advice"),
        bullet("This forum is for peer education and professional discussion, not for providing direct clinical recommendations for specific patients"),
        bullet("Do not ask the forum to diagnose a specific wound or prescribe treatment for an active patient case"),
        bullet('When discussing clinical approaches, frame responses as general educational guidance: "In similar presentations, the literature supports..." rather than "You should do X for this patient"'),
        bullet("If a member is seeking urgent clinical guidance, redirect them to the appropriate clinical consult process within their facility"),

        heading3("3.6 Respect Intellectual Property"),
        bullet("Do not post copyrighted materials (full journal articles, textbook chapters, proprietary assessment tools) without permission"),
        bullet("Sharing brief citations, abstracts, or links to published work is encouraged"),
        bullet("If sharing presentation slides or original educational materials, ensure you have the right to distribute them"),
        bullet("Always credit the original author or creator when referencing someone else's work"),

        // 4. Skin Failure Specific
        heading2("4. Skin Failure -- Specific Discussion Guidelines"),
        body("Given the specialized nature of this SIG, the following additional guidelines apply:"),

        heading3("4.1 Terminology"),
        bullet("Use precise, current terminology consistent with published literature and consensus documents"),
        bullet('Recognize that "skin failure" terminology is still evolving -- be open to discussing various frameworks and definitions'),
        bullet("Common accepted terms: skin failure, Kennedy Terminal Ulcer (KTU), Skin Changes at Life's End (SCALE), Trombley-Brennan Terminal Tissue Injury (TB-TTI), unavoidable pressure injury"),
        bullet("When introducing less-established terminology, provide context and cite the source"),

        heading3("4.2 Clinical Photography"),
        bullet("Clinical photographs may be shared for educational purposes only if fully de-identified and HIPAA-compliant"),
        bullet("Photos must have no patient identifiers visible (face, name bands, facility signage, room numbers, unique markings)"),
        bullet("Include relevant clinical context: wound location, measurements, patient age range, care setting, and relevant comorbidities"),
        bullet('Label photographs as "used with HIPAA authorization" or "de-identified composite" as applicable'),
        bullet("PAWSIC moderators reserve the right to remove any photo that may compromise patient privacy"),

        heading3("4.3 End-of-Life Sensitivity"),
        bullet("Discussions about end-of-life skin changes involve deeply sensitive clinical and human situations -- maintain compassion and sensitivity at all times"),
        bullet("Focus discussions on clinical best practices, documentation approaches, and family/caregiver education strategies"),
        bullet("Respect that clinicians may have differing perspectives on palliative vs. curative goals of care as they relate to skin integrity"),
        bullet("When discussing family communication about skin failure, emphasize empathy and shared decision-making"),

        heading3("4.4 Regulatory & Documentation Discussions"),
        bullet("Discussions about CMS survey processes, MDS coding, and regulatory compliance are encouraged but must reflect current published CMS guidance"),
        bullet("Do not present personal interpretations of survey or coding rules as definitive guidance"),
        bullet("Clearly distinguish between CMS requirements, state-specific regulations, and organizational policies"),
        bullet('Share documentation templates or frameworks as "examples" rather than prescriptive standards'),

        // 5. Posting Best Practices
        heading2("5. Posting Best Practices"),
        bullet('"Differentiating skin failure from deep tissue pressure injury in hospice patients" is more helpful than "Quick question"', "Use descriptive thread titles --"),
        bullet("Check if your topic has been discussed recently to avoid duplicates", "Search before posting --"),
        bullet("Keep replies relevant to the thread. Start a new thread for a new topic", "Stay on topic --"),
        bullet("Use paragraphs, bullet points, and headers when making longer posts", "Format for readability --"),
        bullet("When asking a question, provide relevant clinical context (care setting, patient population, specific challenge) while maintaining de-identification", "Include context --"),
        bullet('It is perfectly acceptable (and encouraged) to say "I don\'t know" or "I\'m still learning about this area"', "Acknowledge uncertainty --"),
        bullet("If you asked a question and found the answer, share it with the community", "Close the loop --"),

        // 6. Moderation & Enforcement
        heading2("6. Moderation & Enforcement"),
        body("PAWSIC moderators are responsible for ensuring this space remains clinically rigorous, safe, and welcoming. All moderation decisions are guided by these rules and PAWSIC's organizational policies."),
        spacer(),
        heading3("Enforcement Actions"),
        spacer(),

        // Enforcement table
        (() => {
          const hBorder = { style: BorderStyle.SINGLE, size: 1, color: "CCCCCC" };
          const hBorders = { top: hBorder, bottom: hBorder, left: hBorder, right: hBorder };
          const headerShading = { fill: NAVY, type: ShadingType.CLEAR };
          const evenShading = { fill: "F5F5F5", type: ShadingType.CLEAR };
          const margins = { top: 60, bottom: 60, left: 100, right: 100 };

          function headerCell(text, w) {
            return new TableCell({
              borders: hBorders, width: { size: w, type: WidthType.DXA },
              shading: headerShading, margins,
              children: [new Paragraph({ children: [new TextRun({ text, size: 20, bold: true, color: "FFFFFF" })] })],
            });
          }
          function dataCell(text, w, shade) {
            return new TableCell({
              borders: hBorders, width: { size: w, type: WidthType.DXA },
              shading: shade ? evenShading : undefined, margins,
              children: [new Paragraph({ children: [new TextRun({ text, size: 20 })] })],
            });
          }

          return new Table({
            width: { size: 9360, type: WidthType.DXA },
            columnWidths: [3120, 3120, 3120],
            rows: [
              new TableRow({ children: [headerCell("Violation", 3120), headerCell("First Occurrence", 3120), headerCell("Repeat Offense", 3120)] }),
              new TableRow({ children: [dataCell("Off-topic or low-quality post", 3120, false), dataCell("Post redirected or removed with private note", 3120, false), dataCell("Temporary posting restriction", 3120, false)] }),
              new TableRow({ children: [dataCell("Unsupported clinical claims", 3120, true), dataCell("Request to add citation; post flagged", 3120, true), dataCell("Post removed; posting restriction", 3120, true)] }),
              new TableRow({ children: [dataCell("Product promotion / spam", 3120, false), dataCell("Post removed with warning", 3120, false), dataCell("Temporary or permanent ban", 3120, false)] }),
              new TableRow({ children: [dataCell("Unprofessional conduct", 3120, true), dataCell("Private warning from moderator", 3120, true), dataCell("Temporary or permanent ban", 3120, true)] }),
              new TableRow({ children: [dataCell("HIPAA violation", 3120, false), dataCell("Immediate post removal; formal warning; potential report", 3120, false), dataCell("Permanent ban; regulatory notification", 3120, false)] }),
              new TableRow({ children: [dataCell("Direct clinical advice for a specific patient", 3120, true), dataCell("Post removed; educational redirect", 3120, true), dataCell("Posting restriction", 3120, true)] }),
            ],
          });
        })(),

        spacer(),
        calloutBox("Appeals Process", "If you believe a moderation decision was made in error, contact PAWSIC at community@pawsic.org. All appeals are reviewed within 5 business days by PAWSIC leadership.", "blue"),

        // 7. How to Report
        heading2("7. How to Report a Concern"),
        body("If you see a post that violates these rules or raises a concern:"),
        numberedItemBold("Use the \"Report\" button", "on the post (if available in the forum interface)", "numbers2"),
        numberedItemBold("Email the moderation team", "at community@pawsic.org with a link to the post and a brief description of the concern", "numbers2"),
        numberedItemBold("For urgent HIPAA concerns,", "email compliance@pawsic.org immediately", "numbers2"),
        body("All reports are reviewed confidentially. Reporters are never identified to the person being reported."),

        // 8. Acknowledgment
        heading2("8. Acknowledgment"),
        body("By posting in the Skin Failure SIG forum, you acknowledge that:"),
        bullet("You have read and agree to these forum rules"),
        bullet("You understand that this forum is for professional peer education, not direct patient care advice"),
        bullet("You will comply with all applicable HIPAA, FDA, and professional conduct standards"),
        bullet("You understand that PAWSIC moderators may edit or remove posts that violate these guidelines"),
        bullet("You accept that repeated violations may result in loss of forum access"),
      ],
    },
  ],
});

// Generate file
const OUTPUT_PATH = "/Users/dahlia.imanbay/Desktop/PAWSIC_Community_Forum_Guidelines_DRAFT.docx";

Packer.toBuffer(doc).then((buffer) => {
  fs.writeFileSync(OUTPUT_PATH, buffer);
  console.log("Document created successfully: " + OUTPUT_PATH);
  console.log("File size: " + (buffer.length / 1024).toFixed(1) + " KB");
}).catch((err) => {
  console.error("Error creating document:", err);
});
