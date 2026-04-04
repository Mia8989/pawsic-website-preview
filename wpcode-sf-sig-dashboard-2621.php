<?php
/**
 * PAWSIC SF SIG Member Dashboard v2
 *
 * WPCode Snippet for memberships.pawsic.org
 * Page ID: 2621 (SF SIG Member Dashboard)
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
 * Protect this page for: Premium Annual, Premium Monthly, and SF SIG memberships.
 *
 * NOTE: Post 2621 is a WordPress Project (custom post type), not a Page.
 * We use get_the_ID() instead of is_page(), and add a body class filter
 * so the .page-id-2621 CSS selectors work on any post type.
 */

// Add body class so .page-id-2621 works on custom post types
add_filter('body_class', function ($classes) {
    if (get_the_ID() == 2621) {
        $classes[] = 'page-id-2621';
    }
    return $classes;
});

// Inject styles into head
add_action('wp_head', function () {
    if (get_the_ID() != 2621) return;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
      /* ===== Divi Nuclear Reset for page 2621 ===== */
      .page-id-2621 #page-container,
      .page-id-2621 #et-main-area,
      .page-id-2621 #main-content,
      .page-id-2621 #main-content .container,
      .page-id-2621 .et_pb_section,
      .page-id-2621 .et_pb_row,
      .page-id-2621 .et_pb_column,
      .page-id-2621 .et_pb_module,
      .page-id-2621 .et_pb_text_inner,
      .page-id-2621 .et_pb_post_content,
      .page-id-2621 .et_builder_inner_content,
      .page-id-2621 .entry-content,
      .page-id-2621 .et_pb_gutters3 .et_pb_column,
      .page-id-2621 .et_pb_with_border,
      .page-id-2621 article,
      .page-id-2621 .post-content {
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
        width: 100% !important;
        float: none !important;
        border: none !important;
      }

      /* Hide Divi page title + sidebar + top spacing */
      .page-id-2621 .et_pb_post_title,
      .page-id-2621 .et_pb_post_title_0,
      .page-id-2621 h1.entry-title,
      .page-id-2621 h1.main_title,
      .page-id-2621 .page .entry-title,
      .page-id-2621 .et_post_meta_wrapper {
        display: none !important;
        visibility: hidden !important;
        height: 0 !important;
        overflow: hidden !important;
        margin: 0 !important;
        padding: 0 !important;
        line-height: 0 !important;
        font-size: 0 !important;
        min-height: 0 !important;
      }
      .page-id-2621 #sidebar,
      .page-id-2621 .widget-area,
      .page-id-2621 .et_right_sidebar #sidebar,
      .page-id-2621 .et_left_sidebar #sidebar {
        display: none !important;
      }
      .page-id-2621 .et_right_sidebar #left-area,
      .page-id-2621 .et_left_sidebar #left-area,
      .page-id-2621 #left-area {
        width: 100% !important;
        float: none !important;
        padding: 0 !important;
        border: none !important;
        margin-top: 0 !important;
        padding-top: 0 !important;
      }
      .page-id-2621 .entry-content,
      .page-id-2621 .et_pb_post_content {
        overflow: visible !important;
        padding-top: 0 !important;
        margin-top: 0 !important;
      }
      /* Nuclear removal of ALL top spacing from Divi wrappers */
      .page-id-2621 #et-main-area,
      .page-id-2621 #main-content,
      .page-id-2621 #main-content .container,
      .page-id-2621 .et_pb_section,
      .page-id-2621 .et_pb_section:first-child,
      .page-id-2621 .et_pb_row,
      .page-id-2621 .et_pb_row:first-child,
      .page-id-2621 .et_pb_column,
      .page-id-2621 .et_pb_column:first-child,
      .page-id-2621 .et_pb_module,
      .page-id-2621 .et_pb_module:first-child,
      .page-id-2621 article.page,
      .page-id-2621 article.post,
      .page-id-2621 .et_pb_extra_column_main,
      .page-id-2621 .et_pb_post,
      .page-id-2621 .et-l,
      .page-id-2621 .et-l--post,
      .page-id-2621 .et-l--body,
      .page-id-2621 .et-l--main,
      .page-id-2621 #et-boc,
      .page-id-2621 #content-area,
      .page-id-2621 .et_builder_inner_content,
      .page-id-2621 .et_pb_text_inner,
      .page-id-2621 .et_pb_section_0,
      .page-id-2621 .et_pb_row_0,
      .page-id-2621 .et_pb_column_0,
      .page-id-2621 .et_pb_module_0 {
        padding-top: 0 !important;
        margin-top: 0 !important;
        min-height: 0 !important;
      }

      /* Catch-all: force content flush against the nav */
      .page-id-2621 .sfsig-m {
        margin-top: -50px !important;
        position: relative;
        z-index: 1;
      }

      /* Hide any default content that's not ours */
      .page-id-2621 .entry-content > *:not(.sfsig-m) {
        display: none !important;
      }

      /* ===== SF SIG Dashboard Styles ===== */
      .sfsig-m,
      .sfsig-m div,.sfsig-m section,.sfsig-m nav,.sfsig-m ul,.sfsig-m li,
      .sfsig-m a,.sfsig-m span,.sfsig-m p,.sfsig-m h1,.sfsig-m h2,.sfsig-m h3,.sfsig-m h4,
      .sfsig-m img,.sfsig-m iframe,.sfsig-m svg { box-sizing: border-box; }

      .sfsig-m {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: #3d4a5c; line-height: 1.65; -webkit-font-smoothing: antialiased;
        width: 100vw !important; max-width: 100vw !important;
        margin-left: calc(-50vw + 50%) !important;
        margin-right: calc(-50vw + 50%) !important;
        overflow-x: hidden;
      }
      .sfsig-m h1,.sfsig-m h2,.sfsig-m h3 {
        font-family: 'DM Serif Display', Georgia, serif;
        color: #0c1f3f; line-height: 1.2; font-weight: 400;
      }
      .sfsig-m h4 {
        font-family: 'Inter', sans-serif;
        color: #0c1f3f; font-weight: 700; line-height: 1.3;
      }
      .sfsig-m p { margin-bottom: 0; }
      .sfsig-m a { color: #2b7cca; text-decoration: none; }
      .sfsig-m img { max-width: 100%; height: auto; }
      .sfsig-m .wrap { max-width: 1080px; margin: 0 auto; padding: 0 2rem; }
      .sfsig-m em { font-style: italic; color: #38b6ff; }

      /* Hero */
      .sfsig-m-hero {
        background: linear-gradient(135deg, #0c1f3f 0%, #1e3a6e 50%, #2b7cca 100%) !important;
        color: #fff !important; padding: 10rem 0 3.5rem !important;
        position: relative !important; overflow: hidden !important;
      }
      .sfsig-m-hero::before {
        content: ''; position: absolute; top: -30%; right: -15%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(56,182,255,0.1) 0%, transparent 65%);
        border-radius: 50%;
      }
      .sfsig-m-hero .wrap {
        position: relative; z-index: 2;
        display: flex; align-items: center; gap: 2rem;
      }
      .sfsig-m-hero .hero-badge {
        flex-shrink: 0; width: 72px; height: 72px;
        border-radius: 18px; overflow: hidden;
        box-shadow: 0 8px 32px rgba(0,0,0,0.3);
      }
      .sfsig-m-hero .hero-badge img {
        width: 100%; height: 100%; object-fit: cover; border-radius: 18px;
      }
      .sfsig-m-hero h1 {
        font-size: clamp(1.6rem, 3.5vw, 2.4rem) !important;
        color: #fff !important; margin-bottom: 0.35rem !important;
      }
      .sfsig-m-hero .hero-sub {
        color: rgba(255,255,255,0.6); font-size: 0.95rem;
        line-height: 1.6; max-width: 600px;
      }
      .sfsig-m-hero .hero-tag {
        display: inline-block; background: rgba(56,182,255,0.15);
        border: 1px solid rgba(56,182,255,0.25); color: #38b6ff;
        font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.5px; padding: 0.3rem 0.9rem;
        border-radius: 100px; margin-bottom: 0.75rem;
      }

      /* ===== Tab Navigation ===== */
      .sfsig-m-tabs {
        background: #fff !important;
        border-bottom: 1px solid #e8edf2;
        position: sticky; top: 0; z-index: 100;
        box-shadow: 0 2px 8px rgba(12,31,63,0.04);
      }
      .sfsig-m-tabs .wrap {
        display: flex; gap: 0; overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
      }
      .sfsig-m-tabs .wrap::-webkit-scrollbar { display: none; }
      .sfsig-m-tab {
        flex-shrink: 0; padding: 1.1rem 1.5rem;
        font-family: 'Inter', sans-serif; font-size: 0.9rem;
        font-weight: 500; color: #7a8699 !important;
        text-decoration: none !important;
        border-bottom: 3px solid transparent;
        cursor: pointer; transition: all 0.25s ease;
        white-space: nowrap; background: none; border-top: none;
        border-left: none; border-right: none;
      }
      .sfsig-m-tab:hover {
        color: #1e3a6e !important;
        background: #f8fafc;
      }
      .sfsig-m-tab.active {
        color: #0c1f3f !important;
        font-weight: 600;
        border-bottom-color: #2b7cca;
      }

      /* Tab Panels */
      .sfsig-m-panel { display: none; }
      .sfsig-m-panel.active { display: block; }

      /* Sections */
      .sfsig-m .sec { padding: 4rem 0 !important; }
      .sfsig-m .sec-light { background: #fff !important; }
      .sfsig-m .sec-frost { background: #f5f7fa !important; }
      .sfsig-m .sec-cream { background: #faf8f4 !important; }
      .sfsig-m .sec-header { margin-bottom: 2.5rem; }
      .sfsig-m .sec-header h2 {
        font-size: clamp(1.4rem, 2.5vw, 1.85rem) !important;
        margin-bottom: 0.4rem !important;
      }
      .sfsig-m .sec-header p { color: #7a8699; font-size: 0.95rem; line-height: 1.6; }
      .sfsig-m .sec-label {
        display: inline-block; background: #eef5f8; color: #1e3a6e;
        font-family: 'Inter', sans-serif; font-size: 0.68rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 1.5px;
        padding: 0.3rem 0.9rem; border-radius: 100px; margin-bottom: 0.75rem;
      }

      /* Access Cards */
      .sfsig-m .access-grid {
        display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;
      }
      .sfsig-m .access-card {
        background: #fff !important; border-radius: 20px;
        padding: 2.25rem 2rem !important; border: 1px solid #e8edf2;
        transition: all 0.35s ease; position: relative; overflow: hidden;
      }
      .sfsig-m .access-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 48px rgba(12,31,63,0.1);
        border-color: rgba(43,124,202,0.25);
      }
      .sfsig-m .access-card .card-num {
        position: absolute; top: 1.5rem; right: 1.75rem;
        font-size: 3rem; font-weight: 800;
        color: rgba(43,124,202,0.06); line-height: 1;
        font-family: 'Inter', sans-serif;
      }
      .sfsig-m .access-card .card-icon {
        width: 44px; height: 44px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 1.25rem;
        background: linear-gradient(135deg, #1e3a6e, #2b7cca); color: #fff;
      }
      .sfsig-m .access-card h3 {
        font-size: 1.15rem !important; font-family: 'Inter', sans-serif !important;
        font-weight: 700 !important; color: #0c1f3f !important;
        margin-bottom: 0.4rem !important;
      }
      .sfsig-m .access-card p {
        color: #7a8699; font-size: 0.88rem; line-height: 1.6; margin-bottom: 1.25rem;
      }
      .sfsig-m .access-card .card-link {
        display: inline-flex; align-items: center; gap: 0.4rem;
        font-weight: 600; font-size: 0.85rem; color: #2b7cca !important;
        text-decoration: none !important;
      }
      .sfsig-m .access-card .card-link:hover { color: #1e3a6e !important; }
      .sfsig-m .access-card .card-link svg { transition: transform 0.3s; }
      .sfsig-m .access-card:hover .card-link svg { transform: translateX(3px); }

      /* Webinar List */
      .sfsig-m .webinar-list { display: flex; flex-direction: column; gap: 1.25rem; }
      .sfsig-m .webinar-item {
        display: flex; align-items: center; gap: 1.25rem;
        background: #fff; border-radius: 16px; padding: 0;
        border: 1px solid #e8edf2; transition: all 0.3s ease;
        text-decoration: none !important; color: inherit !important;
        overflow: hidden;
      }
      .sfsig-m .webinar-item:hover {
        border-color: rgba(43,124,202,0.3);
        box-shadow: 0 4px 20px rgba(12,31,63,0.06);
        transform: translateY(-2px);
      }
      .sfsig-m .webinar-item .w-thumb {
        width: 200px; height: 112px; flex-shrink: 0;
        overflow: hidden; position: relative;
      }
      .sfsig-m .webinar-item .w-thumb img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.4s ease;
      }
      .sfsig-m .webinar-item:hover .w-thumb img { transform: scale(1.05); }
      .sfsig-m .webinar-item .w-play {
        position: absolute; top: 50%; left: 50%;
        transform: translate(-50%,-50%);
        width: 36px; height: 36px; border-radius: 50%;
        background: rgba(12,31,63,0.7); color: #fff;
        display: flex; align-items: center; justify-content: center;
        opacity: 0; transition: opacity 0.3s;
      }
      .sfsig-m .webinar-item:hover .w-play { opacity: 1; }
      .sfsig-m .webinar-item .w-info { flex: 1; min-width: 0; padding: 1rem 0; }
      .sfsig-m .webinar-item .w-info h3 {
        font-size: 0.95rem !important; font-family: 'Inter', sans-serif !important;
        font-weight: 600 !important; color: #0c1f3f !important;
        margin-bottom: 0.15rem !important;
      }
      .sfsig-m .webinar-item .w-info p { color: #7a8699; font-size: 0.82rem; }
      .sfsig-m .webinar-item .w-badges { display: flex; gap: 0.5rem; flex-shrink: 0; padding-right: 1.5rem; }
      .sfsig-m .w-badge {
        font-size: 0.65rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1px; padding: 0.25rem 0.65rem;
        border-radius: 100px; white-space: nowrap;
      }
      .sfsig-m .w-badge-green { color: #3a9e8f; background: rgba(58,158,143,0.1); }
      .sfsig-m .w-badge-blue { color: #2b7cca; background: rgba(43,124,202,0.1); }

      /* Resource Layout */
      .sfsig-m .res-layout {
        display: grid; grid-template-columns: 240px 1fr;
        gap: 2.5rem; align-items: start;
      }
      .sfsig-m .res-sidebar { position: sticky; top: 5rem; }
      .sfsig-m .res-sidebar-title {
        font-size: 0.68rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.5px; color: #7a8699; margin-bottom: 1rem;
        font-family: 'Inter', sans-serif;
      }
      .sfsig-m .res-nav {
        list-style: none; display: flex; flex-direction: column; gap: 0.25rem;
        padding: 0 !important; margin: 0 !important;
      }
      .sfsig-m .res-nav li { list-style: none !important; }
      .sfsig-m .res-nav li a {
        display: flex; align-items: center; justify-content: space-between;
        padding: 0.65rem 1rem; border-radius: 10px; font-size: 0.88rem;
        font-weight: 500; color: #3d4a5c !important;
        text-decoration: none !important; transition: all 0.2s ease;
      }
      .sfsig-m .res-nav li a:hover { background: #eef5f8; color: #1e3a6e !important; }
      .sfsig-m .res-nav li a.active { background: #0c1f3f; color: #fff !important; }
      .sfsig-m .res-nav li a .nav-count {
        font-size: 0.72rem; font-weight: 600; color: #7a8699;
        background: #f0f3f6; padding: 0.15rem 0.55rem; border-radius: 100px;
      }
      .sfsig-m .res-nav li a.active .nav-count {
        color: rgba(255,255,255,0.6); background: rgba(255,255,255,0.15);
      }
      .sfsig-m .res-cards {
        display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;
      }
      .sfsig-m .res-card {
        background: #fff; border-radius: 16px; padding: 1.75rem;
        border: 1px solid #e8edf2; transition: all 0.3s ease;
        text-decoration: none !important; display: flex; flex-direction: column;
      }
      .sfsig-m .res-card:hover {
        box-shadow: 0 8px 28px rgba(12,31,63,0.08);
        border-color: rgba(43,124,202,0.25);
      }
      .sfsig-m .res-card .res-type {
        font-size: 0.65rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.5px; color: #3a9e8f; margin-bottom: 0.5rem;
        display: inline-block; background: rgba(58,158,143,0.08);
        padding: 0.2rem 0.6rem; border-radius: 100px;
      }
      .sfsig-m .res-card .res-type-blue {
        color: #2b7cca; background: rgba(43,124,202,0.08);
      }
      .sfsig-m .res-card .res-type-gold {
        color: #b8942e; background: rgba(184,148,46,0.08);
      }
      .sfsig-m .res-card .res-type-purple {
        color: #7c5cbf; background: rgba(124,92,191,0.08);
      }
      .sfsig-m .res-card .res-type-green {
        color: #2e8b57; background: rgba(46,139,87,0.08);
      }
      .sfsig-m .res-card h3 {
        font-size: 1rem !important; font-family: 'Inter', sans-serif !important;
        font-weight: 600 !important; color: #0c1f3f !important;
        margin-bottom: 0.35rem !important;
      }
      .sfsig-m .res-card p {
        color: #7a8699; font-size: 0.85rem; line-height: 1.6; margin-bottom: 0.75rem;
      }
      .sfsig-m .res-card .res-link {
        display: inline-flex; align-items: center; gap: 0.35rem;
        font-weight: 600; font-size: 0.82rem; color: #2b7cca !important;
        margin-top: auto;
      }
      .sfsig-m .res-card .res-link svg { transition: transform 0.3s; }
      .sfsig-m .res-card:hover .res-link svg { transform: translateX(3px); }
      .sfsig-m .lib-link {
        display: inline-flex; align-items: center; gap: 0.5rem;
        margin-top: 1.5rem; font-weight: 600; font-size: 0.9rem;
        color: #2b7cca !important; text-decoration: none !important;
      }
      .sfsig-m .lib-link:hover { color: #1e3a6e !important; }

      /* Forum */
      .sfsig-m .forum-box {
        background: #fff; border-radius: 20px; border: 1px solid #e8edf2;
        overflow: hidden; box-shadow: 0 4px 20px rgba(12,31,63,0.06);
      }
      .sfsig-m .forum-bar {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.25rem 1.75rem; border-bottom: 1px solid #e8edf2;
        flex-wrap: wrap; gap: 0.75rem;
      }
      .sfsig-m .forum-bar h3 {
        font-size: 1rem !important; font-family: 'Inter', sans-serif !important;
        font-weight: 600 !important; color: #0c1f3f !important;
        margin-bottom: 0 !important;
      }
      .sfsig-m .forum-bar p { color: #7a8699; font-size: 0.85rem; margin-bottom: 0; }
      .sfsig-m .forum-open-btn {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.6rem 1.25rem; border-radius: 100px;
        font-weight: 600; font-size: 0.85rem;
        background: rgba(43,124,202,0.08) !important;
        color: #2b7cca !important; border: 1.5px solid rgba(43,124,202,0.2);
        text-decoration: none !important; transition: all 0.3s ease;
      }
      .sfsig-m .forum-open-btn:hover {
        background: rgba(43,124,202,0.15) !important;
        border-color: #2b7cca;
        transform: translateY(-1px);
      }
      .sfsig-m .forum-open-btn svg { flex-shrink: 0; }
      .sfsig-m .forum-preview-note {
        background: #eef5f8; padding: 0.75rem 1.75rem;
        font-size: 0.82rem; color: #1e3a6e;
        display: flex; align-items: center; gap: 0.5rem;
        border-bottom: 1px solid #e8edf2;
      }
      .sfsig-m .forum-preview-note svg { flex-shrink: 0; color: #2b7cca; }
      .sfsig-m .forum-frame {
        width: 100%; min-height: 600px; border: none; display: block;
      }

      /* About / Mission Section */
      .sfsig-m .about-split {
        display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;
        align-items: start; margin-bottom: 3rem;
      }
      .sfsig-m .about-split:last-child { margin-bottom: 0; }
      .sfsig-m .about-content h2 {
        margin-bottom: 1rem !important;
      }
      .sfsig-m .about-content p {
        color: #3d4a5c; font-size: 0.95rem; line-height: 1.75;
        margin-bottom: 1rem;
      }
      .sfsig-m .about-highlight {
        background: linear-gradient(135deg, #0c1f3f 0%, #1e3a6e 100%);
        border-radius: 20px; padding: 2.5rem;
        color: #fff; position: relative; overflow: hidden;
      }
      .sfsig-m .about-highlight::before {
        content: ''; position: absolute; top: -30%; right: -20%;
        width: 250px; height: 250px;
        background: radial-gradient(circle, rgba(56,182,255,0.15) 0%, transparent 70%);
        border-radius: 50%;
      }
      .sfsig-m .about-highlight h3 {
        color: #fff !important; font-size: 1.2rem !important;
        margin-bottom: 1rem !important; position: relative; z-index: 1;
      }
      .sfsig-m .about-highlight p {
        color: rgba(255,255,255,0.7) !important; font-size: 0.9rem;
        line-height: 1.7; position: relative; z-index: 1;
      }
      .sfsig-m .about-highlight .highlight-stat {
        display: flex; gap: 2rem; margin-top: 1.5rem;
        position: relative; z-index: 1;
      }
      .sfsig-m .about-highlight .stat-item {
        text-align: center;
      }
      .sfsig-m .about-highlight .stat-num {
        font-family: 'DM Serif Display', serif; font-size: 2rem;
        color: #38b6ff; display: block; line-height: 1.1;
      }
      .sfsig-m .about-highlight .stat-label {
        font-size: 0.75rem; color: rgba(255,255,255,0.5);
        text-transform: uppercase; letter-spacing: 1px;
      }

      /* Values Grid */
      .sfsig-m .values-grid {
        display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;
      }
      .sfsig-m .value-card {
        background: #fff; border-radius: 16px; padding: 2rem;
        border: 1px solid #e8edf2; text-align: center;
        transition: all 0.3s ease;
      }
      .sfsig-m .value-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 28px rgba(12,31,63,0.08);
        border-color: rgba(43,124,202,0.2);
      }
      .sfsig-m .value-card .val-icon {
        width: 52px; height: 52px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #eef5f8, #dceef8); color: #1e3a6e;
      }
      .sfsig-m .value-card h4 {
        font-size: 1rem; margin-bottom: 0.4rem;
      }
      .sfsig-m .value-card p {
        color: #7a8699; font-size: 0.85rem; line-height: 1.6;
      }

      /* Chair Cards */
      .sfsig-m .chairs-grid {
        display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;
      }
      .sfsig-m .chair-card {
        background: #fff; border-radius: 20px; padding: 2rem;
        border: 1px solid #e8edf2; display: flex; gap: 1.5rem;
        align-items: flex-start; transition: all 0.3s ease;
      }
      .sfsig-m .chair-card:hover {
        box-shadow: 0 8px 28px rgba(12,31,63,0.08);
        border-color: rgba(43,124,202,0.2);
      }
      .sfsig-m .chair-avatar {
        width: 72px; height: 72px; border-radius: 50%; flex-shrink: 0;
        object-fit: cover; object-position: center top;
        border: 2px solid #EBF4FF; background: #f0f4f8;
      }
      .sfsig-m .chair-info h4 {
        font-size: 1.05rem; margin-bottom: 0.15rem;
      }
      .sfsig-m .chair-info .chair-creds {
        font-size: 0.8rem; font-weight: 600; color: #2b7cca;
        margin-bottom: 0.25rem; display: block;
      }
      .sfsig-m .chair-info .chair-role {
        display: inline-block; background: #EBF4FF; color: #1B5E9E;
        font-size: 0.68rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.06em; padding: 0.2rem 0.65rem;
        border-radius: 1rem; margin-bottom: 0.5rem;
      }
      .sfsig-m .chair-info .chair-role-liaison {
        background: #dce8f7; color: #1A5494;
      }
      .sfsig-m .chair-info p {
        font-size: 0.85rem; color: #7a8699; line-height: 1.6;
      }

      /* Buttons */
      .sfsig-m .btn {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.7rem 1.5rem; border-radius: 100px; font-weight: 600;
        font-size: 0.85rem; border: none; cursor: pointer;
        transition: all 0.3s ease; text-decoration: none !important;
      }
      .sfsig-m .btn-primary {
        background: #38b6ff !important; color: #fff !important;
        box-shadow: 0 4px 16px rgba(56,182,255,0.2);
      }
      .sfsig-m .btn-primary:hover {
        background: #2da5ee !important; color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(56,182,255,0.3);
      }
      .sfsig-m .btn-outline {
        background: transparent !important; color: #1e3a6e !important;
        border: 1.5px solid #dce3eb !important;
      }
      .sfsig-m .btn-outline:hover {
        background: #eef5f8 !important; border-color: #1e3a6e !important;
      }
      .sfsig-m .btn-outline-light {
        background: rgba(255,255,255,0.1) !important;
        color: #fff !important;
        border: 1.5px solid rgba(255,255,255,0.3) !important;
      }
      .sfsig-m .btn-outline-light:hover {
        background: rgba(255,255,255,0.2) !important;
        color: #fff !important;
        border-color: rgba(255,255,255,0.5) !important;
      }

      /* CTA Banner */
      .sfsig-m .cta-banner {
        background: linear-gradient(135deg, #0c1f3f 0%, #1e3a6e 100%);
        border-radius: 24px; padding: 2.5rem 3rem;
        display: flex; align-items: center; justify-content: space-between;
        gap: 2rem; flex-wrap: wrap; position: relative; overflow: hidden;
      }
      .sfsig-m .cta-banner::before {
        content: ''; position: absolute; top: -40%; right: -15%;
        width: 350px; height: 350px;
        background: radial-gradient(circle, rgba(56,182,255,0.12) 0%, transparent 70%);
        border-radius: 50%;
      }
      .sfsig-m .cta-banner h2 {
        color: #fff !important; font-size: 1.35rem !important;
        margin-bottom: 0.25rem !important; position: relative; z-index: 1;
      }
      .sfsig-m .cta-banner p {
        color: rgba(255,255,255,0.6); font-size: 0.9rem;
        position: relative; z-index: 1;
      }
      .sfsig-m .cta-banner .btn { position: relative; z-index: 1; }

      /* Responsive */
      @media (max-width: 768px) {
        .sfsig-m .access-grid { grid-template-columns: 1fr; }
        .sfsig-m .res-layout { grid-template-columns: 1fr; }
        .sfsig-m .res-sidebar { position: static; }
        .sfsig-m .res-nav { flex-direction: row; flex-wrap: wrap; gap: 0.5rem; }
        .sfsig-m .res-nav li a { padding: 0.5rem 0.85rem; font-size: 0.82rem; }
        .sfsig-m .res-cards { grid-template-columns: 1fr; }
        .sfsig-m-hero .wrap { flex-direction: column; text-align: center; }
        .sfsig-m .webinar-item { flex-direction: column; text-align: center; }
        .sfsig-m .webinar-item .w-thumb { width: 100%; height: 180px; }
        .sfsig-m .webinar-item .w-info { padding: 0.75rem 1.25rem; }
        .sfsig-m .webinar-item .w-badges { justify-content: center; padding: 0 1.25rem 1rem; }
        .sfsig-m .cta-banner { flex-direction: column; text-align: center; padding: 2rem 1.5rem; }
        .sfsig-m .sec { padding: 3rem 0 !important; }
        .sfsig-m .about-split { grid-template-columns: 1fr; gap: 1.5rem; }
        .sfsig-m .values-grid { grid-template-columns: 1fr; }
        .sfsig-m .chairs-grid { grid-template-columns: 1fr; }
        .sfsig-m .chair-card { flex-direction: column; align-items: center; text-align: center; }
        .sfsig-m-tab { padding: 0.9rem 1rem; font-size: 0.82rem; }
      }
    </style>
    <?php
});

// Inject custom HTML into the page content
add_filter('the_content', function ($content) {
    if (get_the_ID() != 2621) return $content;

    $html = <<<'HTML'
<div class="sfsig-m">

<!-- HERO -->
<section class="sfsig-m-hero">
  <div class="wrap">
    <div class="hero-badge">
      <img src="https://memberships.pawsic.org/wp-content/uploads/2025/09/SF-SIG-Logo-updated-1.png" alt="SF SIG Logo">
    </div>
    <div>
      <span class="hero-tag">SF SIG Member Access</span>
      <h1>Skin Failure Shared Interest Group</h1>
      <p class="hero-sub">Your membership includes access to exclusive webinar recordings, clinical resources, and the SF SIG peer community forum.</p>
    </div>
  </div>
</section>

<!-- TAB NAVIGATION -->
<nav class="sfsig-m-tabs" role="tablist" aria-label="SF SIG sections">
  <div class="wrap">
    <button class="sfsig-m-tab active" role="tab" aria-selected="true" aria-controls="panel-overview" data-tab="overview">Overview</button>
    <button class="sfsig-m-tab" role="tab" aria-selected="false" aria-controls="panel-resources" data-tab="resources">Resources</button>
    <button class="sfsig-m-tab" role="tab" aria-selected="false" aria-controls="panel-community" data-tab="community">Community</button>
    <button class="sfsig-m-tab" role="tab" aria-selected="false" aria-controls="panel-about" data-tab="about">About SF SIG</button>
  </div>
</nav>

<!-- ===================== OVERVIEW TAB ===================== -->
<div class="sfsig-m-panel active" id="panel-overview" role="tabpanel">

  <!-- WHAT YOU GET -->
  <section class="sec sec-frost">
    <div class="wrap">
      <div class="sec-header">
        <span class="sec-label">Your Membership</span>
        <h2>What You Have Access To</h2>
        <p>As an SF SIG member, these are the resources included with your membership.</p>
      </div>
      <div class="access-grid">

        <div class="access-card">
          <span class="card-num">01</span>
          <div class="card-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
          </div>
          <h3>Webinar Recordings</h3>
          <p>On-demand access to expert-led webinars on skin failure recognition, assessment, and end-of-life skin changes. CE credits available.</p>
          <a href="#" class="card-link" onclick="document.querySelector('[data-tab=overview]').scrollIntoView();document.querySelectorAll('.sfsig-m-panel')[0].querySelector('#webinars').scrollIntoView({behavior:'smooth'});return false;">View recordings <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        </div>

        <div class="access-card">
          <span class="card-num">02</span>
          <div class="card-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <h3>Clinical Resources</h3>
          <p>Assessment guides, clinical frameworks, and checklists developed by skin failure experts for post-acute care settings.</p>
          <a href="#" class="card-link" onclick="document.querySelector('[data-tab=resources]').click();return false;">View resources <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        </div>

        <div class="access-card">
          <span class="card-num">03</span>
          <div class="card-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          </div>
          <h3>Community Forum</h3>
          <p>Connect with wound care and skin health professionals in a private peer-to-peer forum. Share clinical experiences, discuss cases, and collaborate.</p>
          <a href="#" class="card-link" onclick="document.querySelector('[data-tab=community]').click();return false;">Go to forum <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        </div>

      </div>
    </div>
  </section>

  <!-- WEBINARS -->
  <section class="sec sec-light" id="webinars">
    <div class="wrap">
      <div class="sec-header">
        <span class="sec-label">Webinars</span>
        <h2>Your Webinar Recordings</h2>
        <p>Watch on-demand. CE credits are available for select webinars.</p>
      </div>
      <div class="webinar-list">

        <a href="https://memberships.pawsic.org/leading-the-conversation-on-skin-failure-overview-of-best-practices/" class="webinar-item">
          <div class="w-thumb">
            <img src="https://pawsic.org/images/webinars/Leading-the-Conversation-on-Skin-Failure-Overview-of-Best-Practices-300x167.webp" alt="Leading the Conversation on Skin Failure: Overview of Best Practices">
            <div class="w-play"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
          </div>
          <div class="w-info">
            <h3>Leading the Conversation on Skin Failure: Overview of Best Practices</h3>
            <p>November 2025: Evidence-based approaches to skin failure recognition and documentation</p>
          </div>
          <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
        </a>

        <a href="https://memberships.pawsic.org/leading-the-conversation-on-skin-failure" class="webinar-item">
          <div class="w-thumb">
            <img src="https://pawsic.org/images/webinars/Leading-the-Conversation-on-Skin-Failure-The-SF-SIG-of-PAWSIC-Inaugural-Call-to-Action-300x167.webp" alt="Leading the Conversation on Skin Failure">
            <div class="w-play"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
          </div>
          <div class="w-info">
            <h3>Leading the Conversation on Skin Failure</h3>
            <p>September 2025: Advancing clinical recognition and differentiating from pressure injuries</p>
          </div>
          <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
        </a>

        <a href="https://memberships.pawsic.org/end-of-life-skin-wound-changes-webinar-part-2/" class="webinar-item">
          <div class="w-thumb">
            <img src="https://pawsic.org/images/webinars/End-of-Life-Skin-and-Wound-Changes-Webinar-Part-2.jpg" alt="End-of-Life Skin and Wound Changes Webinar Part 2">
            <div class="w-play"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
          </div>
          <div class="w-info">
            <h3>End-of-Life Skin &amp; Wound Changes Webinar Part 2</h3>
            <p>July 2024: Clinical guidance for managing skin changes at end of life</p>
          </div>
          <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
        </a>

        <a href="https://memberships.pawsic.org/webinar-attendees-only/" class="webinar-item">
          <div class="w-thumb">
            <img src="https://pawsic.org/images/webinars/End-of-Life-Skin-Wound-Changes-2024-1024x576.png" alt="PAWSIC Webinar on End-of-Life Skin and Wound Changes">
            <div class="w-play"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
          </div>
          <div class="w-info">
            <h3>PAWSIC Webinar on End-of-Life Skin &amp; Wound Changes: SCALE, KTUs and Skin Failure</h3>
            <p>2024: Foundations of end-of-life skin and wound assessment</p>
          </div>
          <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
        </a>

      </div>
      <div style="margin-top:2rem;display:flex;gap:1rem;flex-wrap:wrap">
        <a href="https://pawsic.org/events" class="btn btn-primary">Register for Upcoming Events <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>
    </div>
  </section>

</div><!-- end panel-overview -->

<!-- ===================== RESOURCES TAB ===================== -->
<div class="sfsig-m-panel" id="panel-resources" role="tabpanel">

  <section class="sec sec-frost">
    <div class="wrap">
      <div class="sec-header">
        <span class="sec-label">Resources</span>
        <h2>Clinical Resources</h2>
        <p>Tools and frameworks developed by skin failure experts for your practice.</p>
      </div>
      <div class="res-layout">

        <nav class="res-sidebar">
          <div class="res-sidebar-title">Categories</div>
          <ul class="res-nav">
            <li><a href="#" class="active" data-filter="all">
              <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>All Resources</span>
              <span class="nav-count">18</span>
            </a></li>
            <li><a href="#" data-filter="skin-failure">
              <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>Skin Failure</span>
              <span class="nav-count">12</span>
            </a></li>
            <li><a href="#" data-filter="clinical-guide">
              <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Clinical Guides</span>
              <span class="nav-count">2</span>
            </a></li>
            <li><a href="#" data-filter="position-statement">
              <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Position Statements</span>
              <span class="nav-count">1</span>
            </a></li>
            <li><a href="#" data-filter="reference">
              <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>References</span>
              <span class="nav-count">2</span>
            </a></li>
            <li><a href="#" data-filter="commentary">
              <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>Commentary</span>
              <span class="nav-count">1</span>
            </a></li>
          </ul>
          <a href="https://memberships.pawsic.org/project/pawsic_library/" class="lib-link" target="_blank">View Full PAWSIC Library <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></a>
        </nav>

        <div class="res-cards">
          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/AADA_PAWSIC_SKIN_FAILURE_REVISED_CODE_PROPOSAL_Presented_September.pdf" class="res-card" data-category="clinical-guide" target="_blank">
            <span class="res-type">SF SIG Resource</span>
            <h3>AADA-PAWSIC Skin Failure Revised Code Proposal</h3>
            <p>Revised code proposal for skin failure classification, developed in collaboration between AADA and PAWSIC. September 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/PAWSIC-Skin-Failure-Clinical-Assessment-Guide-June-2025-1.pdf" class="res-card" data-category="clinical-guide" target="_blank">
            <span class="res-type res-type-blue">Clinical Guide</span>
            <h3>PAWSIC Skin Failure Clinical Assessment Guide</h3>
            <p>Clinical assessment guide for identifying and documenting skin failure, supporting differentiation from pressure injuries. June 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/11/PAWSIC-SF-SIG-Position-Statements-November-2025_compressed.pdf" class="res-card" data-category="position-statement" target="_blank">
            <span class="res-type res-type-gold">Position Statement</span>
            <h3>PAWSIC SF SIG Position Statements</h3>
            <p>Official position statements and clinical recommendations developed by the PAWSIC Skin Failure Shared Interest Group. November 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2026/01/PAWSIC-Skin-Failure-References-Jan-2026_1.pdf" class="res-card" data-category="reference" target="_blank">
            <span class="res-type res-type-purple">Reference</span>
            <h3>PAWSIC Skin Failure References</h3>
            <p>Comprehensive reference list supporting skin failure research, clinical practice, and documentation standards. January 2026.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/Skin-Failure-Commentary-John-La-Puma-August-2025.pdf" class="res-card" data-category="commentary" target="_blank">
            <span class="res-type">Commentary</span>
            <h3>Skin Failure Commentary: John La Puma</h3>
            <p>Expert commentary on skin failure by John La Puma, exploring clinical perspectives and implications for wound care practice. August 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2024/02/Webinar-Questions-3.pdf" class="res-card" data-category="reference" target="_blank">
            <span class="res-type res-type-blue">Q&amp;A Resource</span>
            <h3>Webinar Questions</h3>
            <p>Compiled questions and answers from PAWSIC webinar sessions, providing additional clinical insights and expert responses.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <!-- ===== Skin Failure Materials ===== -->

          <a href="https://memberships.pawsic.org/wp-content/uploads/2026/01/PAWSIC-Skin-Failure-References-Jan-2026_1.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-blue">Reference List</span>
            <h3>PAWSIC Skin Failure References Jan 2026</h3>
            <p>Comprehensive reference list supporting skin failure research and clinical practice standards. January 2026.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/11/PAWSIC-SF-SIG-Position-Statements-November-2025_compressed.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-purple">Position Statement</span>
            <h3>PAWSIC SF SIG Position Statements, November 2025</h3>
            <p>Official position statements from the PAWSIC Skin Failure Shared Interest Group. November 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/10/Pyoderma-for-Post-Acute-Care_compressed-.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-green">Clinical Guide</span>
            <h3>Pyoderma for Post Acute Care</h3>
            <p>Clinical guide on pyoderma gangrenosum recognition and management in the post-acute care setting.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/AADA_PAWSIC_SKIN_FAILURE_REVISED_CODE_PROPOSAL_Presented_September.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-gold">Code Proposal</span>
            <h3>AADA/PAWSIC Skin Failure Revised Code Proposal, September 2025</h3>
            <p>Revised code proposal for skin failure classification, developed in collaboration between AADA and PAWSIC. September 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/PAWSIC-Skin-Failure-Clinical-Assessment-Guide-June-2025-1.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-green">Assessment Guide</span>
            <h3>PAWSIC Skin Failure Clinical Assessment Guide, June 2025</h3>
            <p>Clinical assessment guide for identifying and documenting skin failure, supporting differentiation from pressure injuries. June 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/Skin-Failure-Commentary-John-La-Puma-August-2025.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-purple">Commentary</span>
            <h3>Skin Failure Commentary, John La Puma, August 2025</h3>
            <p>Expert commentary on skin failure by John La Puma, exploring clinical perspectives and implications for wound care practice. August 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/PAWSIC-SKIN-FAILURE-REFERENCES-AUGUST-2025.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-blue">Reference List</span>
            <h3>PAWSIC Skin Failure References, August 2025</h3>
            <p>Reference list supporting skin failure research and clinical documentation standards. August 2025.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2024/09/PAWSIC-SKIN-FAILURE-Q-and-A-Number-1-September-2024-1.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-blue">Q&amp;A Document</span>
            <h3>PAWSIC Skin Failure Q&amp;A #1, September 2024</h3>
            <p>Frequently asked questions and answers on skin failure for clinical practitioners. September 2024.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2024/07/PAWSIC-EOL-SWC-Conceptual-Framework-July-2024.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-gold">Framework</span>
            <h3>PAWSIC EOL SWC Conceptual Framework, July 2024</h3>
            <p>Conceptual framework for end-of-life skin and wound changes, providing a structured clinical approach. July 2024.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2024/06/PAWSIC-EOL-SWC-Conceptual-Framework-June-2024.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-gold">Framework</span>
            <h3>PAWSIC EOL SWC Conceptual Framework, June 2024</h3>
            <p>Earlier version of the conceptual framework for end-of-life skin and wound changes. June 2024.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2024/02/SCALE-Final-Consensus-Statement-2009.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-purple">Consensus Statement</span>
            <h3>SCALE Skin Changes at Life's End, 2009</h3>
            <p>Final consensus statement on Skin Changes At Life's End (SCALE), a foundational document in skin failure research. 2009.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>

          <a href="https://memberships.pawsic.org/wp-content/uploads/2024/02/Handouts-for-PAWSIC-Webinar-2-06-24.pdf" class="res-card" data-category="skin-failure" target="_blank">
            <span class="res-type res-type-blue">Handout</span>
            <h3>Conceptual Framework of Skin Injuries Associated with Severe Life-Threatening Situations</h3>
            <p>Handout materials exploring the conceptual framework for skin injuries in severe life-threatening clinical situations.</p>
            <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
          </a>
        </div>

      </div>
    </div>
  </section>

</div><!-- end panel-resources -->

<!-- ===================== COMMUNITY TAB ===================== -->
<div class="sfsig-m-panel" id="panel-community" role="tabpanel">

  <section class="sec sec-light">
    <div class="wrap">
      <div class="sec-header">
        <span class="sec-label">Community</span>
        <h2>SF SIG Community Forum</h2>
        <p>Your private peer community for clinical discussions, case consultations, and collaboration.</p>
      </div>
      <div class="forum-box">
        <div class="forum-bar">
          <div>
            <h3>Skin Failure Shared Interest Group</h3>
            <p>Peer discussions, case consultations, and clinical updates</p>
          </div>
          <a href="https://memberships.pawsic.org/mp-circle/skin-failure-shared-interest-group/" class="forum-open-btn" target="_blank">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            Open in New Tab
          </a>
        </div>
        <div class="forum-preview-note">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
          This is a preview of the forum. For the full experience, including posting and replying, click <strong>"Open in New Tab"</strong> above.
        </div>
        <iframe src="https://memberships.pawsic.org/mp-circle/skin-failure-shared-interest-group/" class="forum-frame" title="SF SIG Community Forum" loading="lazy"></iframe>
      </div>
    </div>
  </section>

</div><!-- end panel-community -->

<!-- ===================== ABOUT SF SIG TAB ===================== -->
<div class="sfsig-m-panel" id="panel-about" role="tabpanel">

  <!-- Mission & Vision -->
  <section class="sec sec-frost">
    <div class="wrap">
      <div class="sec-header">
        <span class="sec-label">Our Purpose</span>
        <h2>About the <em>Skin Failure Shared Interest Group</em></h2>
        <p>The SF SIG is a focused community within PAWSIC dedicated to advancing the recognition, assessment, and clinical understanding of skin failure.</p>
      </div>

      <div class="about-split">
        <div class="about-content">
          <span class="sec-label">Mission</span>
          <h2>Our <em>Mission</em></h2>
          <p>The Skin Failure Shared Interest Group exists to advance the clinical recognition and understanding of skin failure as a distinct condition, separate from pressure injuries. We bring together wound care and skin health professionals, researchers, and industry partners to develop evidence-based frameworks, clinical assessment tools, and educational resources that support accurate identification and compassionate care for patients experiencing skin failure.</p>
          <p>Through collaborative research, shared clinical expertise, and peer-to-peer learning, the SF SIG works to ensure that every patient experiencing skin failure receives accurate diagnosis and appropriate care.</p>
        </div>
        <div class="about-highlight">
          <h3>Why Skin Failure Matters</h3>
          <p>Skin failure is often misidentified as a pressure injury, leading to inaccurate documentation, inappropriate treatment plans, and unnecessary regulatory consequences. The SF SIG is working to change this by establishing clear clinical criteria and building a body of evidence that supports skin failure as its own diagnosis.</p>
          <div class="highlight-stat">
            <div class="stat-item">
              <span class="stat-num">4+</span>
              <span class="stat-label">Webinars</span>
            </div>
            <div class="stat-item">
              <span class="stat-num">5</span>
              <span class="stat-label">Publications</span>
            </div>
            <div class="stat-item">
              <span class="stat-num">1</span>
              <span class="stat-label">Code Proposal</span>
            </div>
          </div>
        </div>
      </div>

      <div class="about-split">
        <div class="about-highlight">
          <h3>Our Vision for the Future</h3>
          <p>We envision a healthcare landscape where skin failure is universally recognized, properly coded, and managed with the same clinical rigor as any other medical condition. A future where clinicians are equipped with the tools, knowledge, and peer support to confidently identify and document skin failure, improving outcomes and reducing misattribution.</p>
        </div>
        <div class="about-content">
          <span class="sec-label">Vision</span>
          <h2>Where We're <em>Heading</em></h2>
          <p>The SF SIG is actively working toward establishing skin failure as a recognized medical diagnosis with its own ICD code. Our revised code proposal, developed in collaboration with AADA, represents a significant step toward this goal.</p>
          <p>We continue to grow our evidence base through collaborative research, position statements, and clinical commentary from leading wound care and skin health experts. Every webinar, resource, and forum discussion brings us closer to transforming how the healthcare system understands and responds to skin failure.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- Values -->
  <section class="sec sec-light">
    <div class="wrap">
      <div class="sec-header">
        <span class="sec-label">Our Values</span>
        <h2>What <em>Guides</em> Us</h2>
      </div>
      <div class="values-grid">
        <div class="value-card">
          <div class="val-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <h4>Evidence-Based Practice</h4>
          <p>Every recommendation, resource, and position statement is grounded in peer-reviewed research and clinical evidence.</p>
        </div>
        <div class="value-card">
          <div class="val-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h4>Interprofessional Collaboration</h4>
          <p>We believe the best outcomes come from bringing together diverse perspectives across disciplines, roles, and care settings.</p>
        </div>
        <div class="value-card">
          <div class="val-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </div>
          <h4>Patient-Centered Care</h4>
          <p>At the heart of our work is the patient. Accurate skin failure recognition leads to better care, better documentation, and better outcomes.</p>
        </div>
        <div class="value-card">
          <div class="val-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h4>Clinical Advocacy</h4>
          <p>We advocate for proper recognition of skin failure through code proposals, position statements, and education that empowers clinicians.</p>
        </div>
        <div class="value-card">
          <div class="val-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          </div>
          <h4>Education &amp; Knowledge Sharing</h4>
          <p>Through webinars, clinical resources, and peer forums, we make the latest skin failure research accessible to the entire care team.</p>
        </div>
        <div class="value-card">
          <div class="val-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          </div>
          <h4>Inclusive Community</h4>
          <p>The SF SIG welcomes clinicians, researchers, students, industry partners, caregivers, patients, and families who share a commitment to advancing skin failure care.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SIG Leadership -->
  <section class="sec sec-frost">
    <div class="wrap">
      <div class="sec-header">
        <span class="sec-label">Leadership</span>
        <h2>SF SIG <em>Chairs</em></h2>
        <p>The Skin Failure SIG is led by nationally recognized wound care clinicians, researchers, and legal nurse consultants with decades of specialized expertise.</p>
      </div>
      <div class="chairs-grid">

        <div class="chair-card">
          <img src="https://pawsic.org/images/sig-chairs/heidi-cross.jpg" alt="Heidi H. Cross" class="chair-avatar" loading="lazy">
          <div class="chair-info">
            <h4>Heidi H. Cross</h4>
            <span class="chair-creds">MSN, RN, FNP-BC, CWON, CDP</span>
            <span class="chair-role">Co-Chair</span>
            <p>Board-certified Wound and Ostomy nurse and Family Nurse Practitioner consulting for long-term care facilities and at Strong Memorial Hospital in Rochester. A legal nurse consultant and published author in the Journal of Wound Ostomy and Continence Nursing, the American Journal of Nursing, and the American Nurse Journal.</p>
          </div>
        </div>

        <div class="chair-card">
          <img src="https://pawsic.org/images/sig-chairs/cynthia-sylvia.jpeg" alt="Cynthia Sylvia" class="chair-avatar" loading="lazy">
          <div class="chair-info">
            <h4>Cynthia Sylvia</h4>
            <span class="chair-creds">D NURS, MSc, MA, RN, CWCN</span>
            <span class="chair-role">Co-Chair</span>
            <p>Legal nurse consultant with over four decades of expertise as a board-certified Wound Ostomy Continence Nurse. Holds a Doctorate in Nursing and a Master of Science in Wound Healing and Tissue Repair from Cardiff University, where she is an Honorary Lecturer. Her contributions span global consensus development on SCALE, academic publishing, and interprofessional education.</p>
          </div>
        </div>

        <div class="chair-card">
          <img src="https://pawsic.org/images/sig-chairs/pamela-scarborough.jpg" alt="Pamela Scarborough" class="chair-avatar" loading="lazy">
          <div class="chair-info">
            <h4>Pamela Scarborough</h4>
            <span class="chair-creds">PT, DPT, CWS, FAAWC</span>
            <span class="chair-role">Co-Chair</span>
            <p>Physical therapist specializing in wound management with her Certified Wound Specialist (CWS) designation for over 24 years. Her career spans Orthopedics, Sports Medicine, Cardiac Rehabilitation, Geriatric physical therapy, and Wound Management. She has supported healthcare professionals across disciplines in acquiring their Board Certifications as wound specialists.</p>
          </div>
        </div>

        <div class="chair-card">
          <img src="https://pawsic.org/images/sig-chairs/diane-krasner.jpeg" alt="Diane L. Krasner" class="chair-avatar" loading="lazy">
          <div class="chair-info">
            <h4>Diane L. Krasner</h4>
            <span class="chair-creds">PhD, RN, FAAN, FAAWC, MAPWCA</span>
            <span class="chair-role chair-role-liaison">Board Liaison</span>
            <p>Board-certified wound care nurse with over thirty-five years of experience. Interim Past President of PAWSIC, Fellow of the American Academy of Nursing, Fellow of the Association for the Advancement of Wound Care, and Master of the American Professional Wound Care Association. Widely published wound and skin care consultant, educator, and expert witness.</p>
          </div>
        </div>

      </div>
      <p style="text-align:center;margin-top:2rem;color:#7a8699;font-size:0.88rem;">Interested in contributing to the SF SIG? <a href="mailto:info@pawsic.org" style="font-weight:600;">Contact us</a> to learn about volunteer and committee opportunities.</p>
    </div>
  </section>

</div><!-- end panel-about -->

<!-- CTA (always visible) -->
<section class="sec sec-cream">
  <div class="wrap">
    <div class="cta-banner">
      <div>
        <h2>Questions About Your Membership?</h2>
        <p>Manage your account, explore CE courses, or visit the main PAWSIC portal.</p>
      </div>
      <div style="display:flex;gap:0.75rem;flex-wrap:wrap">
        <a href="https://memberships.pawsic.org/account/" class="btn btn-primary">My Account</a>
        <a href="https://memberships.pawsic.org/courses/person-centered-wound-care-post-acute/" class="btn btn-outline-light">CE Courses</a>
      </div>
    </div>
  </div>
</section>

</div>

<!-- Tab Navigation + Resource Filtering Script -->
<script>
(function(){
  /* Tab switching */
  var tabs = document.querySelectorAll('.sfsig-m-tab');
  var panels = document.querySelectorAll('.sfsig-m-panel');
  tabs.forEach(function(tab){
    tab.addEventListener('click', function(){
      tabs.forEach(function(t){ t.classList.remove('active'); t.setAttribute('aria-selected','false'); });
      panels.forEach(function(p){ p.classList.remove('active'); });
      tab.classList.add('active');
      tab.setAttribute('aria-selected','true');
      var target = document.getElementById('panel-' + tab.getAttribute('data-tab'));
      if(target) target.classList.add('active');
      window.scrollTo({top: document.querySelector('.sfsig-m-tabs').offsetTop, behavior:'smooth'});
    });
  });

  /* Resource category filtering */
  var filterLinks = document.querySelectorAll('.res-nav a[data-filter]');
  var resCards = document.querySelectorAll('.res-card[data-category]');
  filterLinks.forEach(function(link){
    link.addEventListener('click', function(e){
      e.preventDefault();
      var filter = this.getAttribute('data-filter');
      filterLinks.forEach(function(l){ l.classList.remove('active'); });
      this.classList.add('active');
      resCards.forEach(function(card){
        if(filter === 'all' || card.getAttribute('data-category') === filter){
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  /* Fix top spacing: measure gap between nav and hero, then compensate */
  function fixTopGap(){
    var hero = document.querySelector('.sfsig-m-hero');
    var wrapper = document.querySelector('.sfsig-m');
    if(!hero || !wrapper) return;
    var nav = document.querySelector('#main-header') || document.querySelector('.et-l--header') || document.querySelector('#top-header');
    if(nav){
      var navBottom = nav.getBoundingClientRect().bottom;
      var heroTop = hero.getBoundingClientRect().top;
      var gap = heroTop - navBottom;
      if(gap > 2){
        wrapper.style.marginTop = (-gap) + 'px';
      }
    }
  }
  fixTopGap();
  window.addEventListener('load', fixTopGap);
})();
</script>
HTML;

    return $html;

}, 999);
