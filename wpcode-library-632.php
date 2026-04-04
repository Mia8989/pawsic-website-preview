<?php
/**
 * PAWSIC Library Page
 *
 * WPCode Snippet for memberships.pawsic.org
 * Post ID: 632 (Library, Project post type)
 *
 * HOW TO INSTALL:
 * 1. Go to WPCode > Add Snippet > Custom Snippet > PHP Snippet
 * 2. Paste this entire file's contents
 * 3. Set "Insert Method" to "Auto Insert"
 * 4. Set "Location" to "Run Everywhere"
 * 5. Activate the snippet
 *
 * ACCESS CONTROL:
 * Page access is handled by MemberPress Rules (not this snippet).
 *
 * NOTE: Post 632 is a WordPress Project (custom post type), not a Page.
 *
 * BOOK COVER IMAGE: https://memberships.pawsic.org/wp-content/uploads/2024/03/Chronic-wound-care-book-cover-scaled.jpg
 */

// Add body class so .page-id-632 works on custom post types
add_filter('body_class', function ($classes) {
    if (get_the_ID() == 632) {
        $classes[] = 'page-id-632';
    }
    return $classes;
});

// Inject styles into head
add_action('wp_head', function () {
    if (get_the_ID() != 632) return;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
      /* ===== Divi Nuclear Reset for page 632 ===== */
      .page-id-632 #page-container,
      .page-id-632 #et-main-area,
      .page-id-632 #main-content,
      .page-id-632 #main-content .container,
      .page-id-632 .et_pb_section,
      .page-id-632 .et_pb_row,
      .page-id-632 .et_pb_column,
      .page-id-632 .et_pb_module,
      .page-id-632 .et_pb_text_inner,
      .page-id-632 .et_pb_post_content,
      .page-id-632 .et_builder_inner_content,
      .page-id-632 .entry-content,
      .page-id-632 .et_pb_gutters3 .et_pb_column,
      .page-id-632 .et_pb_with_border,
      .page-id-632 article,
      .page-id-632 .post-content {
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
        width: 100% !important;
        float: none !important;
        border: none !important;
      }
      .page-id-632 .et_pb_post_title,
      .page-id-632 .et_pb_post_title_0,
      .page-id-632 h1.entry-title,
      .page-id-632 h1.main_title,
      .page-id-632 .page .entry-title,
      .page-id-632 .et_post_meta_wrapper {
        display: none !important;
        visibility: hidden !important;
        height: 0 !important; overflow: hidden !important;
        margin: 0 !important; padding: 0 !important;
        line-height: 0 !important; font-size: 0 !important; min-height: 0 !important;
      }
      .page-id-632 #sidebar,
      .page-id-632 .widget-area,
      .page-id-632 .et_right_sidebar #sidebar,
      .page-id-632 .et_left_sidebar #sidebar {
        display: none !important;
      }
      .page-id-632 .et_right_sidebar #left-area,
      .page-id-632 .et_left_sidebar #left-area,
      .page-id-632 #left-area {
        width: 100% !important; float: none !important;
        padding: 0 !important; border: none !important;
        margin-top: 0 !important; padding-top: 0 !important;
      }
      .page-id-632 .entry-content,
      .page-id-632 .et_pb_post_content {
        overflow: visible !important;
        padding-top: 0 !important; margin-top: 0 !important;
      }
      .page-id-632 #et-main-area,
      .page-id-632 #main-content,
      .page-id-632 #main-content .container,
      .page-id-632 .et_pb_section,
      .page-id-632 .et_pb_section:first-child,
      .page-id-632 .et_pb_row,
      .page-id-632 .et_pb_row:first-child,
      .page-id-632 .et_pb_column,
      .page-id-632 .et_pb_column:first-child,
      .page-id-632 .et_pb_module,
      .page-id-632 .et_pb_module:first-child,
      .page-id-632 article.page, .page-id-632 article.post,
      .page-id-632 .et_pb_extra_column_main,
      .page-id-632 .et_pb_post,
      .page-id-632 .et-l, .page-id-632 .et-l--post,
      .page-id-632 .et-l--body, .page-id-632 .et-l--main,
      .page-id-632 #et-boc, .page-id-632 #content-area,
      .page-id-632 .et_builder_inner_content,
      .page-id-632 .et_pb_text_inner,
      .page-id-632 .et_pb_section_0, .page-id-632 .et_pb_row_0,
      .page-id-632 .et_pb_column_0, .page-id-632 .et_pb_module_0 {
        padding-top: 0 !important; margin-top: 0 !important; min-height: 0 !important;
      }
      .page-id-632 .plib-m {
        margin-top: -50px !important;
        position: relative; z-index: 1;
      }
      .page-id-632 .entry-content > *:not(.plib-m) {
        display: none !important;
      }

      /* ===== Library Page Styles ===== */
      .plib-m,
      .plib-m div,.plib-m section,.plib-m nav,.plib-m ul,.plib-m li,
      .plib-m a,.plib-m span,.plib-m p,.plib-m h1,.plib-m h2,.plib-m h3,.plib-m h4,
      .plib-m img,.plib-m input,.plib-m svg,.plib-m label { box-sizing: border-box; }

      .plib-m {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: #3d4a5c; line-height: 1.65; -webkit-font-smoothing: antialiased;
        width: 100vw !important; max-width: 100vw !important;
        margin-left: calc(-50vw + 50%) !important;
        margin-right: calc(-50vw + 50%) !important;
        overflow-x: hidden;
      }
      .plib-m h1,.plib-m h2,.plib-m h3 {
        font-family: 'DM Serif Display', Georgia, serif;
        color: #0c1f3f; line-height: 1.2; font-weight: 400;
      }
      .plib-m h4 {
        font-family: 'Inter', sans-serif;
        color: #0c1f3f; font-weight: 700; line-height: 1.3;
      }
      .plib-m p { margin-bottom: 0; }
      .plib-m a { color: #2b7cca; text-decoration: none; }
      .plib-m img { max-width: 100%; height: auto; }
      .plib-m .wrap { max-width: 1080px; margin: 0 auto; padding: 0 2rem; }
      .plib-m em { font-style: italic; color: #38b6ff; }

      /* Hero */
      .plib-m-hero {
        background: linear-gradient(135deg, #0c1f3f 0%, #1e3a6e 50%, #2b7cca 100%) !important;
        color: #fff !important; padding: 10rem 0 3.5rem !important;
        position: relative !important; overflow: hidden !important;
      }
      .plib-m-hero::before {
        content: ''; position: absolute; top: -30%; right: -15%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(56,182,255,0.1) 0%, transparent 65%);
        border-radius: 50%;
      }
      .plib-m-hero::after {
        content: ''; position: absolute; bottom: -40%; left: -10%;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(56,182,255,0.08) 0%, transparent 65%);
        border-radius: 50%;
      }
      .plib-m-hero .wrap { position: relative; z-index: 2; text-align: center; }
      .plib-m-hero .hero-tag {
        display: inline-block; background: rgba(56,182,255,0.15);
        border: 1px solid rgba(56,182,255,0.25); color: #38b6ff;
        font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.5px; padding: 0.3rem 0.9rem;
        border-radius: 100px; margin-bottom: 0.75rem;
      }
      .plib-m-hero h1 {
        font-size: clamp(1.8rem, 4vw, 2.6rem) !important;
        color: #fff !important; margin-bottom: 0.5rem !important;
      }
      .plib-m-hero .hero-sub {
        color: rgba(255,255,255,0.65); font-size: 1rem;
        line-height: 1.7; max-width: 620px; margin: 0 auto;
      }
      .plib-m-hero .hero-stats {
        display: flex; justify-content: center; gap: 2.5rem; margin-top: 2rem;
      }
      .plib-m-hero .hero-stat-num {
        font-family: 'DM Serif Display', serif;
        font-size: 2rem; color: #38b6ff; display: block; line-height: 1.1;
      }
      .plib-m-hero .hero-stat-label {
        font-size: 0.75rem; color: rgba(255,255,255,0.5);
        text-transform: uppercase; letter-spacing: 1px;
      }

      /* Disclaimer Banner */
      .plib-m .disclaimer-banner {
        background: #fffbeb; border: 1px solid #f0dfa0;
        border-radius: 16px; padding: 1.5rem 2rem; margin-bottom: 2rem;
        display: flex; align-items: flex-start; gap: 1rem;
      }
      .plib-m .disclaimer-banner.accepted {
        background: #eef8ee; border-color: #b8ddb8;
      }
      .plib-m .disclaimer-icon {
        width: 40px; height: 40px; border-radius: 10px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: #fef3c7; color: #b8942e;
      }
      .plib-m .disclaimer-banner.accepted .disclaimer-icon {
        background: #d1fae5; color: #059669;
      }
      .plib-m .disclaimer-body { flex: 1; }
      .plib-m .disclaimer-body h4 {
        font-size: 0.95rem; margin-bottom: 0.3rem;
      }
      .plib-m .disclaimer-body p {
        font-size: 0.85rem; color: #7a8699; line-height: 1.6; margin-bottom: 0.75rem;
      }
      .plib-m .disclaimer-body a { color: #2b7cca; font-weight: 600; }
      .plib-m .disclaimer-check {
        display: flex; align-items: center; gap: 0.6rem; cursor: pointer;
        font-size: 0.88rem; font-weight: 500; color: #3d4a5c;
      }
      .plib-m .disclaimer-check input[type="checkbox"] {
        width: 18px; height: 18px; accent-color: #2b7cca; cursor: pointer;
        margin: 0 !important;
      }
      .plib-m .disclaimer-accepted-msg {
        display: none; font-size: 0.85rem; color: #059669; font-weight: 600;
        align-items: center; gap: 0.4rem;
      }
      .plib-m .disclaimer-banner.accepted .disclaimer-accepted-msg { display: flex; }
      .plib-m .disclaimer-banner.accepted .disclaimer-check { display: none; }

      /* Download overlay for locked items */
      .plib-m .download-locked {
        pointer-events: none; opacity: 0.6;
      }
      .plib-m .download-unlocked {
        pointer-events: auto; opacity: 1;
        transition: opacity 0.3s ease;
      }

      /* Search Bar */
      .plib-m .search-bar {
        background: #fff; border-bottom: 1px solid #e8edf2;
        padding: 1.25rem 0; position: sticky; top: 0; z-index: 100;
        box-shadow: 0 2px 8px rgba(12,31,63,0.04);
      }
      .plib-m .search-bar .wrap { display: flex; align-items: center; gap: 1rem; }
      .plib-m .search-input-wrap { flex: 1; position: relative; }
      .plib-m .search-input-wrap svg {
        position: absolute; left: 1rem; top: 50%; transform: translateY(-50%);
        color: #7a8699; pointer-events: none;
      }
      .plib-m .search-input {
        width: 100%; padding: 0.75rem 1rem 0.75rem 2.75rem;
        border: 1.5px solid #e8edf2; border-radius: 12px;
        font-family: 'Inter', sans-serif; font-size: 0.9rem;
        color: #3d4a5c; background: #f8fafc;
        outline: none; transition: all 0.25s ease;
      }
      .plib-m .search-input:focus {
        border-color: #2b7cca; background: #fff;
        box-shadow: 0 0 0 3px rgba(43,124,202,0.1);
      }
      .plib-m .search-input::placeholder { color: #a0aab8; }
      .plib-m .search-count {
        font-size: 0.82rem; color: #7a8699; white-space: nowrap; font-weight: 500;
      }

      /* Sections */
      .plib-m .sec { padding: 4rem 0 !important; }
      .plib-m .sec-light { background: #fff !important; }
      .plib-m .sec-frost { background: #f5f7fa !important; }
      .plib-m .sec-cream { background: #faf8f4 !important; }
      .plib-m .sec-header { margin-bottom: 2rem; }
      .plib-m .sec-header h2 {
        font-size: clamp(1.4rem, 2.5vw, 1.85rem) !important;
        margin-bottom: 0.4rem !important;
      }
      .plib-m .sec-header p { color: #7a8699; font-size: 0.95rem; line-height: 1.6; }
      .plib-m .sec-label {
        display: inline-block; background: #eef5f8; color: #1e3a6e;
        font-family: 'Inter', sans-serif; font-size: 0.68rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 1.5px;
        padding: 0.3rem 0.9rem; border-radius: 100px; margin-bottom: 0.75rem;
      }

      /* Resource Layout (sidebar + grid) */
      .plib-m .res-layout {
        display: grid; grid-template-columns: 240px 1fr;
        gap: 2.5rem; align-items: start;
      }
      .plib-m .res-sidebar { position: sticky; top: 5rem; }
      .plib-m .res-sidebar-title {
        font-size: 0.68rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.5px; color: #7a8699; margin-bottom: 1rem;
        font-family: 'Inter', sans-serif;
      }
      .plib-m .res-nav {
        list-style: none; display: flex; flex-direction: column; gap: 0.25rem;
        padding: 0 !important; margin: 0 !important;
      }
      .plib-m .res-nav li { list-style: none !important; }
      .plib-m .res-nav li a {
        display: flex; align-items: center; justify-content: space-between;
        padding: 0.65rem 1rem; border-radius: 10px; font-size: 0.88rem;
        font-weight: 500; color: #3d4a5c !important;
        text-decoration: none !important; transition: all 0.2s ease;
        cursor: pointer;
      }
      .plib-m .res-nav li a:hover { background: #eef5f8; color: #1e3a6e !important; }
      .plib-m .res-nav li a.active { background: #0c1f3f; color: #fff !important; }
      .plib-m .res-nav li a .nav-count {
        font-size: 0.72rem; font-weight: 600; color: #7a8699;
        background: #f0f3f6; padding: 0.15rem 0.55rem; border-radius: 100px;
      }
      .plib-m .res-nav li a.active .nav-count {
        color: rgba(255,255,255,0.6); background: rgba(255,255,255,0.15);
      }

      /* Resource Cards */
      .plib-m .res-cards {
        display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;
      }
      .plib-m .res-card {
        background: #fff; border-radius: 16px; padding: 1.75rem;
        border: 1px solid #e8edf2; transition: all 0.3s ease;
        text-decoration: none !important; display: flex; flex-direction: column;
      }
      .plib-m .res-card:hover {
        box-shadow: 0 8px 28px rgba(12,31,63,0.08);
        border-color: rgba(43,124,202,0.25);
        transform: translateY(-2px);
      }
      .plib-m .res-card .res-type {
        font-size: 0.65rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.5px; margin-bottom: 0.5rem;
        display: inline-block; padding: 0.2rem 0.6rem; border-radius: 100px;
      }
      .plib-m .res-type-green { color: #3a9e8f; background: rgba(58,158,143,0.08); }
      .plib-m .res-type-blue { color: #2b7cca; background: rgba(43,124,202,0.08); }
      .plib-m .res-type-gold { color: #b8942e; background: rgba(184,148,46,0.08); }
      .plib-m .res-type-purple { color: #7c5cbf; background: rgba(124,92,191,0.08); }
      .plib-m .res-type-teal { color: #1a8a7a; background: rgba(26,138,122,0.08); }
      .plib-m .res-card h3 {
        font-size: 1rem !important; font-family: 'Inter', sans-serif !important;
        font-weight: 600 !important; color: #0c1f3f !important;
        margin-bottom: 0.35rem !important;
      }
      .plib-m .res-card p {
        color: #7a8699; font-size: 0.85rem; line-height: 1.6; margin-bottom: 0.75rem;
      }
      .plib-m .res-card .res-link {
        display: inline-flex; align-items: center; gap: 0.35rem;
        font-weight: 600; font-size: 0.82rem; color: #2b7cca !important;
        margin-top: auto; text-decoration: none !important;
      }
      .plib-m .res-card .res-link svg { transition: transform 0.3s; }
      .plib-m .res-card:hover .res-link svg { transform: translateX(3px); }

      /* e-Book Hero */
      .plib-m .ebook-hero {
        background: linear-gradient(135deg, #0c1f3f 0%, #1e3a6e 100%);
        border-radius: 20px; padding: 2.5rem; margin-bottom: 2rem;
        color: #fff; position: relative; overflow: hidden;
        display: flex; gap: 2.5rem; align-items: center;
      }
      .plib-m .ebook-hero::before {
        content: ''; position: absolute; top: -30%; right: -15%;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(56,182,255,0.12) 0%, transparent 70%);
        border-radius: 50%;
      }
      .plib-m .ebook-cover {
        width: 180px; flex-shrink: 0; position: relative; z-index: 1;
      }
      .plib-m .ebook-cover img {
        width: 100%; border-radius: 4px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.4);
        mix-blend-mode: multiply;
      }
      .plib-m .ebook-info { position: relative; z-index: 1; flex: 1; }
      .plib-m .ebook-info h2 {
        color: #fff !important; font-size: 1.5rem !important;
        margin-bottom: 0.35rem !important;
      }
      .plib-m .ebook-info .ebook-subtitle {
        color: rgba(255,255,255,0.7); font-size: 0.95rem;
        margin-bottom: 0.5rem;
      }
      .plib-m .ebook-info .ebook-editors {
        color: rgba(255,255,255,0.5); font-size: 0.82rem;
        margin-bottom: 0.75rem;
      }
      .plib-m .ebook-info .ebook-pub {
        display: inline-flex; align-items: center; gap: 0.4rem;
        font-size: 0.75rem; color: rgba(255,255,255,0.4);
        background: rgba(255,255,255,0.08); padding: 0.3rem 0.8rem;
        border-radius: 100px; margin-bottom: 1rem;
      }
      .plib-m .ebook-info .ebook-actions {
        display: flex; gap: 0.75rem; flex-wrap: wrap;
      }

      /* Chapter list */
      .plib-m .chapter-list {
        display: grid; grid-template-columns: 1fr; gap: 0.5rem;
      }
      .plib-m .chapter-item {
        display: flex; align-items: center; gap: 1rem;
        background: #fff; border-radius: 12px; padding: 1rem 1.25rem;
        border: 1px solid #e8edf2; transition: all 0.25s ease;
        text-decoration: none !important; color: inherit !important;
      }
      .plib-m .chapter-item:hover {
        border-color: rgba(43,124,202,0.3);
        box-shadow: 0 4px 16px rgba(12,31,63,0.06);
        transform: translateX(4px);
      }
      .plib-m .chapter-num {
        width: 36px; height: 36px; border-radius: 10px;
        background: linear-gradient(135deg, #eef5f8, #dceef8);
        color: #1e3a6e; font-family: 'Inter', sans-serif;
        font-size: 0.78rem; font-weight: 700;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
      }
      .plib-m .chapter-item .ch-info { flex: 1; min-width: 0; }
      .plib-m .chapter-item .ch-info h4 { font-size: 0.92rem; margin-bottom: 0; }
      .plib-m .chapter-item .ch-arrow {
        color: #2b7cca; flex-shrink: 0; opacity: 0; transition: opacity 0.25s;
      }
      .plib-m .chapter-item:hover .ch-arrow { opacity: 1; }

      /* Chapter toggle */
      .plib-m .chapter-toggle {
        display: flex; align-items: center; justify-content: center;
        gap: 0.5rem; padding: 0.75rem 1.5rem; margin-top: 1rem;
        border-radius: 100px; font-weight: 600; font-size: 0.85rem;
        color: #2b7cca; background: rgba(43,124,202,0.06);
        border: 1.5px solid rgba(43,124,202,0.15); cursor: pointer;
        transition: all 0.3s ease;
      }
      .plib-m .chapter-toggle:hover {
        background: rgba(43,124,202,0.12); border-color: #2b7cca;
      }
      .plib-m .chapter-toggle svg { transition: transform 0.3s; }
      .plib-m .chapter-toggle.expanded svg { transform: rotate(180deg); }
      .plib-m .chapters-hidden { display: none; }

      /* Buttons */
      .plib-m .btn {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.7rem 1.5rem; border-radius: 100px; font-weight: 600;
        font-size: 0.85rem; border: none; cursor: pointer;
        transition: all 0.3s ease; text-decoration: none !important;
      }
      .plib-m .btn-primary {
        background: #38b6ff !important; color: #fff !important;
        box-shadow: 0 4px 16px rgba(56,182,255,0.2);
      }
      .plib-m .btn-primary:hover {
        background: #2da5ee !important; color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(56,182,255,0.3);
      }
      .plib-m .btn-outline-light {
        background: rgba(255,255,255,0.1) !important;
        color: #fff !important;
        border: 1.5px solid rgba(255,255,255,0.3) !important;
      }
      .plib-m .btn-outline-light:hover {
        background: rgba(255,255,255,0.2) !important;
        color: #fff !important;
        border-color: rgba(255,255,255,0.5) !important;
      }

      /* CTA Banner */
      .plib-m .cta-banner {
        background: linear-gradient(135deg, #0c1f3f 0%, #1e3a6e 100%);
        border-radius: 24px; padding: 2.5rem 3rem;
        display: flex; align-items: center; justify-content: space-between;
        gap: 2rem; flex-wrap: wrap; position: relative; overflow: hidden;
      }
      .plib-m .cta-banner::before {
        content: ''; position: absolute; top: -40%; right: -15%;
        width: 350px; height: 350px;
        background: radial-gradient(circle, rgba(56,182,255,0.12) 0%, transparent 70%);
        border-radius: 50%;
      }
      .plib-m .cta-banner h2 {
        color: #fff !important; font-size: 1.35rem !important;
        margin-bottom: 0.25rem !important; position: relative; z-index: 1;
      }
      .plib-m .cta-banner p {
        color: rgba(255,255,255,0.6); font-size: 0.9rem; position: relative; z-index: 1;
      }
      .plib-m .cta-banner .btn { position: relative; z-index: 1; }

      /* Responsive */
      @media (max-width: 768px) {
        .plib-m .res-layout { grid-template-columns: 1fr; }
        .plib-m .res-sidebar { position: static; }
        .plib-m .res-nav { flex-direction: row; flex-wrap: wrap; gap: 0.5rem; }
        .plib-m .res-nav li a { padding: 0.5rem 0.85rem; font-size: 0.82rem; }
        .plib-m .res-cards { grid-template-columns: 1fr; }
        .plib-m-hero .hero-stats { flex-direction: column; gap: 1rem; }
        .plib-m .cta-banner { flex-direction: column; text-align: center; padding: 2rem 1.5rem; }
        .plib-m .sec { padding: 3rem 0 !important; }
        .plib-m .search-bar .wrap { flex-direction: column; }
        .plib-m .chapter-item { padding: 0.85rem 1rem; }
        .plib-m .ebook-hero { flex-direction: column; text-align: center; padding: 2rem; }
        .plib-m .ebook-cover { width: 140px; }
        .plib-m .ebook-info .ebook-actions { justify-content: center; }
        .plib-m .disclaimer-banner { flex-direction: column; }
      }
    </style>
    <?php
});

// Inject custom HTML into the page content
add_filter('the_content', function ($content) {
    if (get_the_ID() != 632) return $content;

    $html = <<<'HTML'
<div class="plib-m">

<!-- HERO -->
<section class="plib-m-hero">
  <div class="wrap">
    <span class="hero-tag">Member Resource Library</span>
    <h1>PAWSIC <em>Library</em></h1>
    <p class="hero-sub">Your central hub for clinical resources, downloadable tools, and the complete Chronic Wound Care e-Book. Browse, search, and access everything in one place.</p>
    <div class="hero-stats">
      <div><span class="hero-stat-num">35</span><span class="hero-stat-label">Resources</span></div>
      <div><span class="hero-stat-num">25</span><span class="hero-stat-label">e-Book Chapters</span></div>
    </div>
  </div>
</section>

<!-- SEARCH BAR -->
<div class="search-bar">
  <div class="wrap">
    <div class="search-input-wrap">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="text" class="search-input" id="plib-search" placeholder="Search resources by title or keyword...">
    </div>
    <span class="search-count" id="plib-count">Showing all resources</span>
  </div>
</div>

<!-- MAIN LIBRARY -->
<section class="sec sec-cream">
  <div class="wrap">

    <!-- DISCLAIMER BANNER -->
    <div class="disclaimer-banner" id="plib-disclaimer">
      <div class="disclaimer-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
      </div>
      <div class="disclaimer-body">
        <h4>Resource Disclaimer</h4>
        <p>All resources in this library are provided for educational and informational purposes only. By downloading, you agree to the <a href="https://pawsic.org/disclaimers/#resource-disclaimer" target="_blank">PAWSIC Resource Disclaimer</a>.</p>
        <label class="disclaimer-check">
          <input type="checkbox" id="plib-disclaimer-cb">
          I acknowledge and agree to the PAWSIC Resource Disclaimer
        </label>
        <div class="disclaimer-accepted-msg">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          Disclaimer acknowledged. Downloads are enabled.
        </div>
      </div>
    </div>

    <div class="res-layout">

      <!-- Sidebar -->
      <aside class="res-sidebar">
        <div class="res-sidebar-title">Categories</div>
        <ul class="res-nav" role="tablist">
          <li><a role="tab" class="active" data-filter="all">All Resources <span class="nav-count">35</span></a></li>
          <li><a role="tab" data-filter="resources">Resources &amp; Handouts <span class="nav-count">7</span></a></li>
          <li><a role="tab" data-filter="ebook">e-Book Chapters <span class="nav-count">28</span></a></li>
        </ul>
      </aside>

      <!-- Main Content -->
      <div class="res-main">

    <!-- STANDALONE RESOURCES -->
    <div class="res-section" data-category="resources" id="plib-resources">
      <div class="sec-header">
        <span class="sec-label">Resources &amp; Handouts</span>
        <h2>Clinical Resources <em>&amp; Tools</em></h2>
        <p>Publications, checklists, scales, and reference materials for wound care and skin health professionals.</p>
      </div>
      <div class="res-cards" id="plib-res-grid">

        <a href="https://memberships.pawsic.org/wp-content/uploads/2026/03/PAWSIC-WOUND-LITERACY-MARTIN-HAMPTON-compressed-1.pdf" target="_blank" class="res-card download-locked" data-title="Wound Literacy and Patient Education: Advancing Understanding to Improve Outcomes">
          <span class="res-type res-type-blue">Publication</span>
          <h3>Wound Literacy and Patient Education</h3>
          <p>Advancing understanding to improve outcomes. A comprehensive resource on patient education strategies for wound care literacy by Martin Hampton.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2026/01/Martin-WISE-scale-1.pdf" target="_blank" class="res-card download-locked" data-title="Martin-WISE Scale">
          <span class="res-type res-type-gold">Assessment Tool</span>
          <h3>Martin-WISE Scale</h3>
          <p>The Wound Identification for Skin failure Evaluation (WISE) scale, a clinical assessment tool for identifying and documenting skin failure.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2026/01/Beyond-the-Mattress_-Comprehensive-Therapeutic-Support-Surface-Strategies-for-PALTC.pdf" target="_blank" class="res-card download-locked" data-title="Beyond the Mattress: Comprehensive Therapeutic Support Surface Strategies for PALTC">
          <span class="res-type res-type-teal">Clinical Guide</span>
          <h3>Beyond the Mattress: Support Surface Strategies for PALTC</h3>
          <p>Comprehensive therapeutic support surface strategies for post-acute and long-term care settings, covering selection, implementation, and best practices.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2023/08/Wound-Provider-Group-Checklist-PAWSIC.pdf" target="_blank" class="res-card download-locked" data-title="Wound Provider Group (WPG) Checklist">
          <span class="res-type res-type-green">Checklist</span>
          <h3>Wound Provider Group (WPG) Checklist</h3>
          <p>A structured checklist for wound provider groups to ensure comprehensive, standardized wound care delivery across care teams.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2023/08/pawsic_white_paper_feb_2023_v5.pdf" target="_blank" class="res-card download-locked" data-title="Ongoing COVID-19 Impact on Skin Health and Wound Management in Post-Acute Care">
          <span class="res-type res-type-purple">White Paper</span>
          <h3>Ongoing COVID-19 Impact on Skin Health and Wound Management</h3>
          <p>PAWSIC white paper examining the continuing effects of COVID-19 on skin health and wound management in post-acute care settings.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/02/Webinar-Questions-3.pdf" target="_blank" class="res-card download-locked" data-title="Webinar Questions">
          <span class="res-type res-type-blue">Q&amp;A Resource</span>
          <h3>Webinar Questions</h3>
          <p>Compiled questions and answers from PAWSIC webinar sessions, providing additional clinical insights and expert responses.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/02/Handouts-for-PAWSIC-Webinar-2-06-24.pdf" target="_blank" class="res-card download-locked" data-title="Conceptual Framework of Skin Injuries Associated with Severe Life-Threatening Situations">
          <span class="res-type res-type-blue">Handout</span>
          <h3>Conceptual Framework of Skin Injuries Associated with Severe Life-Threatening Situations</h3>
          <p>Conceptual framework examining skin injuries that occur in association with severe, life-threatening medical situations. Originally developed as a PAWSIC webinar companion resource.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg></span>
        </a>

      </div>
    </div>

    <!-- E-BOOK SECTION -->
    <div class="res-section" data-category="ebook" id="plib-ebook" style="margin-top:3rem">
      <div class="sec-header">
        <span class="sec-label">e-Book</span>
      </div>

      <div class="ebook-hero">
        <div class="ebook-cover">
          <img src="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chronic-wound-care-book-cover-scaled.jpg" alt="Chronic Wound Care: The Essentials e-Book cover">
        </div>
        <div class="ebook-info">
          <h2><em>Chronic Wound Care:</em> The Essentials</h2>
          <p class="ebook-subtitle">A Clinical Source Book for Healthcare Professionals</p>
          <p class="ebook-editors">Edited by Diane L. Krasner, PhD, RN, FAAN &amp; Lis van Rijswijk, DNP, RN, CWCN</p>
          <span class="ebook-pub"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg> Originally published by HMP / Why Wound Care?</span>
          <div class="ebook-actions">
            <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/WWC-CWCE-e-Book-2018.pdf" target="_blank" class="btn btn-primary download-locked">Download Full e-Book <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg></a>
            <span style="color:rgba(255,255,255,0.4);font-size:0.82rem;display:flex;align-items:center">or browse individual chapters below</span>
          </div>
        </div>
      </div>

      <!-- First 10 chapters visible -->
      <div class="chapter-list" id="plib-chapters-visible">

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-1-The-Call-to-Wound-Prevention-and-Care.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 1: The Call to Wound Prevention and Care">
          <span class="chapter-num">01</span>
          <div class="ch-info"><h4>The Call to Wound Prevention and Care</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-2-International-Interprofessional-Wound-Caring.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 2: International Interprofessional Wound Caring">
          <span class="chapter-num">02</span>
          <div class="ch-info"><h4>International Interprofessional Wound Caring</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-3-The-Science-of-Wound-Healing.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 3: Science of Wound Healing">
          <span class="chapter-num">03</span>
          <div class="ch-info"><h4>Science of Wound Healing: Translation of Bench Science into Advances for Chronic Wound Care</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-4-Wound-Assessment-and-Documentation.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 4: Wound Assessment and Documentation">
          <span class="chapter-num">04</span>
          <div class="ch-info"><h4>Wound Assessment and Documentation</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-5-Cleansing-Wound-Irrigation-Wound-Disinfection.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 5: Wound Cleansing, Wound Irrigation, Wound Disinfection">
          <span class="chapter-num">05</span>
          <div class="ch-info"><h4>Wound Cleansing, Wound Irrigation, Wound Disinfection</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-6-Wound-Debridement.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 6: Wound Debridement">
          <span class="chapter-num">06</span>
          <div class="ch-info"><h4>Wound Debridement</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-7-Cofactors-in-Impaired-Wound-Healing.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 7: Cofactors in Impaired Wound Healing">
          <span class="chapter-num">07</span>
          <div class="ch-info"><h4>Cofactors in Impaired Wound Healing</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-8-Infections-in-Chronic-Wounds.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 8: Infections in Chronic Wounds">
          <span class="chapter-num">08</span>
          <div class="ch-info"><h4>Infections in Chronic Wounds</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-9-Pain.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 9: Pain in People with Chronic Wounds">
          <span class="chapter-num">09</span>
          <div class="ch-info"><h4>Pain in People with Chronic Wounds: Clinical Strategies for Decreasing Pain and Improving Quality of Life</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-10-Health-Related-Quality-of-Life-and-Chronic-Wounds-1.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 10: Health-Related Quality of Life and Chronic Wounds">
          <span class="chapter-num">10</span>
          <div class="ch-info"><h4>Health-Related Quality of Life and Chronic Wounds: Evidence and Implications for Practice</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

      </div>

      <!-- Remaining chapters (hidden by default) -->
      <div class="chapter-list chapters-hidden" id="plib-chapters-hidden">

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-11-Nutritional-Strategies.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 11: Nutritional Strategies for Wound and Pressure Ulcer Management">
          <span class="chapter-num">11</span>
          <div class="ch-info"><h4>Nutritional Strategies for Wound and Pressure Ulcer Management</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-12-The-Development-of-Wound-Management-Products.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 12: The Development of Wound Management Products">
          <span class="chapter-num">12</span>
          <div class="ch-info"><h4>The Development of Wound Management Products</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-13-Wound-Dressing-Product-Selection.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 13: Wound Dressing Product Selection">
          <span class="chapter-num">13</span>
          <div class="ch-info"><h4>Wound Dressing Product Selection: A Holistic, Interprofessional, Patient-Centered Approach</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-14-Wound-Device-Product-Selection.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 14: Interprofessional Perspectives on Individualized Wound Device Product Selection">
          <span class="chapter-num">14</span>
          <div class="ch-info"><h4>Interprofessional Perspectives on Individualized Wound Device Product Selection</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-15-Wound-Product-Selection-Challenges.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 15: Wound Product Selection Challenges">
          <span class="chapter-num">15</span>
          <div class="ch-info"><h4>Wound Product Selection Challenges: Developing Strategies for Your Practice Setting</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-16-Negative-Pressure-Wound-Therapy.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 16: Negative Pressure Wound Therapy">
          <span class="chapter-num">16</span>
          <div class="ch-info"><h4>Negative Pressure Wound Therapy</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-17-Biophysical-Technologies-in-Wound-Management.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 17: Biophysical Technologies in Wound Management">
          <span class="chapter-num">17</span>
          <div class="ch-info"><h4>Biophysical Technologies in Wound Management</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-18-Support-Surfaces.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 18: Support Surfaces: Tissue Integrity, Terms, Principles, and Choice">
          <span class="chapter-num">18</span>
          <div class="ch-info"><h4>Support Surfaces: Tissue Integrity, Terms, Principles, and Choice</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-19-Compression-Therapies.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 19: Compression Therapies">
          <span class="chapter-num">19</span>
          <div class="ch-info"><h4>Compression Therapies</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-20-Offloading-Foot-Wounds-in-People-with-Diabetes.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 20: Offloading Foot Wounds in People with Diabetes">
          <span class="chapter-num">20</span>
          <div class="ch-info"><h4>Offloading Foot Wounds in People with Diabetes</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-21-Surgical-Repair-in-Advanced-Wound-Caring.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 21: Surgical Repair in Advanced Wound Caring">
          <span class="chapter-num">21</span>
          <div class="ch-info"><h4>Surgical Repair in Advanced Wound Caring</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-22-The-Role-of-Oxygen-and-Hyperbaric-Medicine.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 22: The Role of Oxygen and Hyperbaric Medicine">
          <span class="chapter-num">22</span>
          <div class="ch-info"><h4>The Role of Oxygen and Hyperbaric Medicine</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-23-SCALE-Skin-Changes-At-Lifes-End.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 23: SCALE Skin Changes At Life's End">
          <span class="chapter-num">23</span>
          <div class="ch-info"><h4>SCALE Skin Changes At Life's End</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-24-Best-Practice-Guidelines-Algorithms-and-Standards.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 24: Best Practice Guidelines, Algorithms, and Standards">
          <span class="chapter-num">24</span>
          <div class="ch-info"><h4>Best Practice Guidelines, Algorithms, and Standards: Tools to Make the Right Thing Easier to Do</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Chapter-25-The-Outpatient-Wound-Clinic.pdf" target="_blank" class="chapter-item download-locked" data-title="Chapter 25: The Outpatient Wound Clinic">
          <span class="chapter-num">25</span>
          <div class="ch-info"><h4>The Outpatient Wound Clinic</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/conclusion.pdf" target="_blank" class="chapter-item download-locked" data-title="Conclusion">
          <span class="chapter-num" style="background:linear-gradient(135deg,#1e3a6e,#2b7cca);color:#fff">&#10003;</span>
          <div class="ch-info"><h4>Conclusion</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2024/03/Index.pdf" target="_blank" class="chapter-item download-locked" data-title="Index">
          <span class="chapter-num" style="background:linear-gradient(135deg,#eef5f8,#dceef8);color:#7a8699;font-size:0.7rem">IDX</span>
          <div class="ch-info"><h4>Index</h4></div>
          <svg class="ch-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17l9.2-9.2M7 7h9.2v9.2"/></svg>
        </a>

      </div>

      <div class="chapter-toggle" id="plib-chapter-toggle" style="text-align:center">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        <span>Show All 27 Items</span>
      </div>

    </div>

      </div><!-- /.res-main -->
    </div><!-- /.res-layout -->

    <!-- CTA -->
    <div style="margin-top:3rem">
      <div class="cta-banner">
        <div>
          <h2>Looking for <em>CE Courses</em>?</h2>
          <p>Explore PAWSIC's accredited continuing education programs for wound care and skin health professionals.</p>
        </div>
        <a href="https://memberships.pawsic.org/courses/person-centered-wound-care-post-acute/" class="btn btn-primary">Browse CE Courses <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>

  </div>
</section>

</div>

<script>
(function(){
  /* Fix top gap */
  function fixTopGap(){
    var hero = document.querySelector('.plib-m-hero');
    var wrapper = document.querySelector('.plib-m');
    if(!hero || !wrapper) return;
    var nav = document.querySelector('#main-header') || document.querySelector('.et-l--header') || document.querySelector('#top-header');
    if(nav){
      var navBottom = nav.getBoundingClientRect().bottom;
      var heroTop = hero.getBoundingClientRect().top;
      var gap = heroTop - navBottom;
      if(gap > 2) wrapper.style.marginTop = (-gap) + 'px';
    }
  }
  fixTopGap();
  window.addEventListener('load', fixTopGap);

  /* Disclaimer */
  var disclaimerBanner = document.getElementById('plib-disclaimer');
  var disclaimerCb = document.getElementById('plib-disclaimer-cb');
  var lockedItems = document.querySelectorAll('.plib-m .download-locked');
  var STORAGE_KEY = 'pawsic_library_disclaimer_accepted';

  function unlockDownloads(){
    lockedItems.forEach(function(el){
      el.classList.remove('download-locked');
      el.classList.add('download-unlocked');
    });
    disclaimerBanner.classList.add('accepted');
  }

  /* Check if already accepted */
  if(localStorage.getItem(STORAGE_KEY) === 'true'){
    unlockDownloads();
    disclaimerCb.checked = true;
  }

  disclaimerCb.addEventListener('change', function(){
    if(this.checked){
      localStorage.setItem(STORAGE_KEY, 'true');
      unlockDownloads();
    }
  });

  /* Prevent clicks on locked items */
  document.addEventListener('click', function(e){
    var card = e.target.closest('.download-locked');
    if(card){
      e.preventDefault();
      disclaimerBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
      disclaimerBanner.style.boxShadow = '0 0 0 3px rgba(184,148,46,0.3)';
      setTimeout(function(){ disclaimerBanner.style.boxShadow = ''; }, 2000);
    }
  });

  /* Category filter */
  var navLinks = document.querySelectorAll('.plib-m .res-nav a');
  var sections = document.querySelectorAll('.plib-m .res-section');
  var activeFilter = 'all';

  navLinks.forEach(function(link){
    link.addEventListener('click', function(e){
      e.preventDefault();
      navLinks.forEach(function(l){ l.classList.remove('active'); });
      this.classList.add('active');
      activeFilter = this.getAttribute('data-filter');
      sections.forEach(function(sec){
        if(activeFilter === 'all' || sec.getAttribute('data-category') === activeFilter){
          sec.style.display = '';
        } else {
          sec.style.display = 'none';
        }
      });
      /* Reset search when switching categories */
      searchInput.value = '';
      applySearch('');
    });
  });

  /* Search */
  var searchInput = document.getElementById('plib-search');
  var countEl = document.getElementById('plib-count');
  var allSearchable = document.querySelectorAll('.plib-m .res-card, .plib-m .chapter-item');
  var totalCount = allSearchable.length;

  function applySearch(q){
    var visible = 0;

    /* Expand hidden chapters when searching */
    var hiddenCh = document.getElementById('plib-chapters-hidden');
    var chToggle = document.getElementById('plib-chapter-toggle');
    if(q.length > 0){
      hiddenCh.classList.remove('chapters-hidden');
      chToggle.style.display = 'none';
    } else if(!chToggle.classList.contains('expanded')){
      hiddenCh.classList.add('chapters-hidden');
      chToggle.style.display = '';
    }

    /* Reset category to all when searching */
    if(q.length > 0 && activeFilter !== 'all'){
      navLinks.forEach(function(l){ l.classList.remove('active'); });
      navLinks[0].classList.add('active');
      activeFilter = 'all';
      sections.forEach(function(sec){ sec.style.display = ''; });
    }

    allSearchable.forEach(function(el){
      var title = (el.getAttribute('data-title') || '').toLowerCase();
      var text = (el.textContent || '').toLowerCase();
      var match = (q === '' || title.indexOf(q) !== -1 || text.indexOf(q) !== -1);
      el.style.display = match ? '' : 'none';
      if(match) visible++;
    });

    /* Show/hide section headers */
    var resSec = document.getElementById('plib-resources');
    var resCards = resSec.querySelectorAll('.res-card');
    var anyResVisible = false;
    resCards.forEach(function(c){ if(c.style.display !== 'none') anyResVisible = true; });
    resSec.style.display = anyResVisible ? '' : 'none';

    var ebookSec = document.getElementById('plib-ebook');
    var chapterItems = ebookSec.querySelectorAll('.chapter-item');
    var anyChapterVisible = false;
    chapterItems.forEach(function(c){ if(c.style.display !== 'none') anyChapterVisible = true; });
    var ebookHeader = ebookSec.querySelector('.ebook-hero');
    if(q.length > 0 && !anyChapterVisible){
      ebookHeader.style.display = 'none';
    } else {
      ebookHeader.style.display = '';
    }

    if(q === ''){
      countEl.textContent = 'Showing all resources';
      resSec.style.display = (activeFilter === 'all' || activeFilter === 'resources') ? '' : 'none';
    } else {
      countEl.textContent = 'Showing ' + visible + ' of ' + totalCount + ' resources';
    }
  }

  searchInput.addEventListener('input', function(){
    applySearch(this.value.toLowerCase().trim());
  });

  /* Chapter toggle */
  var chapterToggle = document.getElementById('plib-chapter-toggle');
  var hiddenChapters = document.getElementById('plib-chapters-hidden');
  chapterToggle.addEventListener('click', function(){
    var expanded = this.classList.toggle('expanded');
    if(expanded){
      hiddenChapters.classList.remove('chapters-hidden');
      this.querySelector('span').textContent = 'Show Less';
    } else {
      hiddenChapters.classList.add('chapters-hidden');
      this.querySelector('span').textContent = 'Show All 27 Items';
    }
  });

})();
</script>
HTML;

    return $html;
}, 999);
