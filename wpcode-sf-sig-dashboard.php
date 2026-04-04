<?php
/**
 * PAWSIC SF SIG Member Dashboard
 *
 * WPCode Snippet for memberships.pawsic.org
 * Page ID: 27742991 (SF SIG Member Dashboard v2)
 *
 * HOW TO INSTALL:
 * 1. Go to WPCode > Add Snippet > Custom Snippet > PHP Snippet
 * 2. Paste this entire file's contents
 * 3. Set "Insert Method" to "Auto Insert"
 * 4. Set "Location" to "Run Everywhere"
 * 5. Activate the snippet
 */

// Inject styles into head
add_action('wp_head', function () {
    if (!is_page(27742991)) return;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
      /* ===== Divi Nuclear Reset for page 27742991 ===== */
      .page-id-27742991 #page-container,
      .page-id-27742991 #et-main-area,
      .page-id-27742991 #main-content,
      .page-id-27742991 #main-content .container,
      .page-id-27742991 .et_pb_section,
      .page-id-27742991 .et_pb_row,
      .page-id-27742991 .et_pb_column,
      .page-id-27742991 .et_pb_module,
      .page-id-27742991 .et_pb_text_inner,
      .page-id-27742991 .et_pb_post_content,
      .page-id-27742991 .et_builder_inner_content,
      .page-id-27742991 .entry-content,
      .page-id-27742991 .et_pb_gutters3 .et_pb_column,
      .page-id-27742991 .et_pb_with_border,
      .page-id-27742991 article,
      .page-id-27742991 .post-content {
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
        width: 100% !important;
        float: none !important;
        border: none !important;
      }

      /* Hide Divi page title + sidebar */
      .page-id-27742991 .et_pb_post_title,
      .page-id-27742991 .et_pb_post_title_0 {
        visibility: hidden; height: 0; overflow: hidden;
        margin: 0 !important; padding: 0 !important;
        line-height: 0 !important; font-size: 0 !important;
      }
      .page-id-27742991 h1.entry-title,
      .page-id-27742991 h1.main_title,
      .page-id-27742991 .page .entry-title {
        visibility: hidden; height: 0; overflow: hidden;
        margin: 0 !important; padding: 0 !important;
        line-height: 0 !important; font-size: 0 !important;
      }
      .page-id-27742991 #sidebar,
      .page-id-27742991 .widget-area,
      .page-id-27742991 .et_right_sidebar #sidebar,
      .page-id-27742991 .et_left_sidebar #sidebar {
        visibility: hidden; width: 0 !important; height: 0 !important;
        overflow: hidden; position: absolute;
      }
      .page-id-27742991 .et_right_sidebar #left-area,
      .page-id-27742991 .et_left_sidebar #left-area {
        width: 100% !important; float: none !important;
        padding: 0 !important; border: none !important;
      }
      .page-id-27742991 #left-area { border: none !important; }
      .page-id-27742991 .et_right_sidebar #left-area { border-right: none !important; }
      .page-id-27742991 .et_left_sidebar #left-area { border-left: none !important; }
      .page-id-27742991 .entry-content,
      .page-id-27742991 .et_pb_post_content { overflow: visible !important; }

      /* Hide any default content that's not ours */
      .page-id-27742991 .entry-content > *:not(.sfsig-m) {
        display: none !important;
      }

      /* ===== SF SIG Dashboard Styles ===== */
      .sfsig-m,
      .sfsig-m div,.sfsig-m section,.sfsig-m nav,.sfsig-m ul,.sfsig-m li,
      .sfsig-m a,.sfsig-m span,.sfsig-m p,.sfsig-m h1,.sfsig-m h2,.sfsig-m h3,
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
      .sfsig-m p { margin-bottom: 0; }
      .sfsig-m a { color: #2b7cca; text-decoration: none; }
      .sfsig-m img { max-width: 100%; height: auto; }
      .sfsig-m .wrap { max-width: 1080px; margin: 0 auto; padding: 0 2rem; }

      /* Hero */
      .sfsig-m-hero {
        background: linear-gradient(135deg, #0c1f3f 0%, #1e3a6e 50%, #2b7cca 100%) !important;
        color: #fff !important; padding: 4.5rem 0 4rem !important;
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
      .sfsig-m .webinar-list { display: flex; flex-direction: column; gap: 1rem; }
      .sfsig-m .webinar-item {
        display: flex; align-items: center; gap: 1.25rem;
        background: #fff; border-radius: 16px; padding: 1.25rem 1.5rem;
        border: 1px solid #e8edf2; transition: all 0.3s ease;
      }
      .sfsig-m .webinar-item:hover {
        border-color: rgba(43,124,202,0.3);
        box-shadow: 0 4px 20px rgba(12,31,63,0.06);
      }
      .sfsig-m .webinar-item .w-icon {
        width: 48px; height: 48px; border-radius: 12px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: linear-gradient(135deg, #0c1f3f, #1e3a6e); color: #38b6ff;
      }
      .sfsig-m .webinar-item .w-info { flex: 1; min-width: 0; }
      .sfsig-m .webinar-item .w-info h3 {
        font-size: 0.95rem !important; font-family: 'Inter', sans-serif !important;
        font-weight: 600 !important; color: #0c1f3f !important;
        margin-bottom: 0.15rem !important;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
      }
      .sfsig-m .webinar-item .w-info p { color: #7a8699; font-size: 0.82rem; }
      .sfsig-m .webinar-item .w-badges { display: flex; gap: 0.5rem; flex-shrink: 0; }
      .sfsig-m .w-badge {
        font-size: 0.65rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1px; padding: 0.25rem 0.65rem;
        border-radius: 100px; white-space: nowrap;
      }
      .sfsig-m .w-badge-green { color: #3a9e8f; background: rgba(58,158,143,0.1); }
      .sfsig-m .w-badge-blue { color: #2b7cca; background: rgba(43,124,202,0.1); }
      .sfsig-m .w-badge-gold { color: #b8942e; background: rgba(184,148,46,0.1); }

      /* Resource Layout */
      .sfsig-m .res-layout {
        display: grid; grid-template-columns: 240px 1fr;
        gap: 2.5rem; align-items: start;
      }
      .sfsig-m .res-sidebar { position: sticky; top: 2rem; }
      .sfsig-m .res-sidebar-title {
        font-size: 0.68rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 1.5px; color: #7a8699; margin-bottom: 1rem;
        font-family: 'Inter', sans-serif;
      }
      .sfsig-m .res-nav {
        list-style: none; display: flex; flex-direction: column; gap: 0.25rem;
      }
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
      .sfsig-m .forum-frame {
        width: 100%; min-height: 600px; border: none; display: block;
      }

      /* Buttons */
      .sfsig-m .btn {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.7rem 1.5rem; border-radius: 100px; font-weight: 600;
        font-size: 0.85rem; border: none; cursor: pointer;
        transition: all 0.3s ease; text-decoration: none !important;
      }
      .sfsig-m .btn-primary {
        background: #38b6ff; color: #fff !important;
        box-shadow: 0 4px 16px rgba(56,182,255,0.2);
      }
      .sfsig-m .btn-primary:hover {
        background: #2da5ee; color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(56,182,255,0.3);
      }
      .sfsig-m .btn-outline {
        background: transparent; color: #1e3a6e !important;
        border: 1.5px solid #dce3eb;
      }
      .sfsig-m .btn-outline:hover {
        background: #eef5f8; border-color: #1e3a6e;
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
        .sfsig-m .webinar-item .w-badges { justify-content: center; }
        .sfsig-m .cta-banner { flex-direction: column; text-align: center; padding: 2rem 1.5rem; }
        .sfsig-m .sec { padding: 3rem 0 !important; }
      }
    </style>
    <?php
});

// Inject custom HTML into the page content
add_filter('the_content', function ($content) {
    if (!is_page(27742991)) return $content;

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
      <h1>Skin Failure Special Interest Group</h1>
      <p class="hero-sub">Your membership includes access to exclusive webinar recordings, clinical resources, and the SF SIG peer community forum.</p>
    </div>
  </div>
</section>

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
        <a href="#webinars" class="card-link">View recordings <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>

      <div class="access-card">
        <span class="card-num">02</span>
        <div class="card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <h3>Clinical Resources</h3>
        <p>Assessment guides, clinical frameworks, and checklists developed by skin failure experts for post-acute care settings.</p>
        <a href="#resources" class="card-link">View resources <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      </div>

      <div class="access-card">
        <span class="card-num">03</span>
        <div class="card-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3>Community Forum</h3>
        <p>Connect with wound care professionals in a private peer-to-peer forum. Share clinical experiences, discuss cases, and collaborate.</p>
        <a href="#forum" class="card-link">Go to forum <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
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

      <div class="webinar-item">
        <div class="w-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
        <div class="w-info">
          <h3>Leading the Conversation on Skin Failure: Overview of Best Practices</h3>
          <p>November 2025: Evidence-based approaches to skin failure recognition and documentation</p>
        </div>
        <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
      </div>

      <div class="webinar-item">
        <div class="w-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
        <div class="w-info">
          <h3>Leading the Conversation on Skin Failure</h3>
          <p>September 2025: Advancing clinical recognition and differentiating from pressure injuries</p>
        </div>
        <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
      </div>

      <div class="webinar-item">
        <div class="w-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
        <div class="w-info">
          <h3>End-of-Life Skin &amp; Wound Changes Webinar Part 2</h3>
          <p>July 2024: Clinical guidance for managing skin changes at end of life</p>
        </div>
        <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
      </div>

      <div class="webinar-item">
        <div class="w-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
        <div class="w-info">
          <h3>End of Life Skin Wound Changes 2024</h3>
          <p>2024: Foundations of end-of-life skin and wound assessment</p>
        </div>
        <div class="w-badges"><span class="w-badge w-badge-green">On-Demand</span><span class="w-badge w-badge-blue">CE</span></div>
      </div>

    </div>
    <div style="margin-top:2rem;display:flex;gap:1rem;flex-wrap:wrap">
      <a href="https://pawsic.org/events" class="btn btn-primary">Register for Upcoming Events <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
    </div>
  </div>
</section>

<!-- RESOURCES -->
<section class="sec sec-frost" id="resources">
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
          <li><a href="#resources" class="active">
            <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>All Resources</span>
            <span class="nav-count">5</span>
          </a></li>
          <li><a href="#resources">
            <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Clinical Guides</span>
            <span class="nav-count">2</span>
          </a></li>
          <li><a href="#resources">
            <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>Position Statements</span>
            <span class="nav-count">1</span>
          </a></li>
          <li><a href="#resources">
            <span><svg style="display:inline;vertical-align:-3px;width:16px;height:16px;margin-right:6px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>References</span>
            <span class="nav-count">2</span>
          </a></li>
        </ul>
        <a href="https://memberships.pawsic.org/project/pawsic_library/" class="lib-link" target="_blank">View Full PAWSIC Library <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></a>
      </nav>

      <div class="res-cards">
        <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/PAWSIC-Skin-Failure-Clinical-Assessment-Guide-June-2025-1.pdf" class="res-card" target="_blank">
          <span class="res-type">SF SIG Resource</span>
          <h3>AADA-PAWSIC Skin Failure Revised Code Proposal</h3>
          <p>Revised code proposal for skin failure classification, developed in collaboration between AADA and PAWSIC. September 2025.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/PAWSIC-Skin-Failure-Clinical-Assessment-Guide-June-2025-1.pdf" class="res-card" target="_blank">
          <span class="res-type">Clinical Guide</span>
          <h3>PAWSIC Skin Failure Clinical Assessment Guide</h3>
          <p>Clinical assessment guide for identifying and documenting skin failure, supporting differentiation from pressure injuries. June 2025.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2025/11/PAWSIC-SF-SIG-Position-Statements-November-2025_compressed.pdf" class="res-card" target="_blank">
          <span class="res-type">Position Statement</span>
          <h3>PAWSIC SF SIG Position Statements</h3>
          <p>Official position statements and clinical recommendations developed by the PAWSIC Skin Failure Shared Interest Group. November 2025.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2026/01/PAWSIC-Skin-Failure-References-Jan-2026_1.pdf" class="res-card" target="_blank">
          <span class="res-type">Reference</span>
          <h3>PAWSIC Skin Failure References</h3>
          <p>Comprehensive reference list supporting skin failure research, clinical practice, and documentation standards. January 2026.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
        </a>

        <a href="https://memberships.pawsic.org/wp-content/uploads/2025/09/Skin-Failure-Commentary-John-La-Puma-August-2025.pdf" class="res-card" target="_blank">
          <span class="res-type">Commentary</span>
          <h3>Skin Failure Commentary: John La Puma</h3>
          <p>Expert commentary on skin failure by John La Puma, exploring clinical perspectives and implications for wound care practice. August 2025.</p>
          <span class="res-link">Download PDF <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg></span>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- COMMUNITY FORUM -->
<section class="sec sec-light" id="forum">
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
        <a href="https://memberships.pawsic.org/mp-circle/skin-failure-shared-interest-group/" class="btn btn-outline" target="_blank">Open in new tab</a>
      </div>
      <iframe src="https://memberships.pawsic.org/mp-circle/skin-failure-shared-interest-group/" class="forum-frame" title="SF SIG Community Forum" loading="lazy"></iframe>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="sec sec-cream">
  <div class="wrap">
    <div class="cta-banner">
      <div>
        <h2>Questions About Your Membership?</h2>
        <p>Manage your account, explore CE courses, or visit the main PAWSIC portal.</p>
      </div>
      <div style="display:flex;gap:0.75rem;flex-wrap:wrap">
        <a href="https://memberships.pawsic.org/account/" class="btn btn-primary">My Account</a>
        <a href="https://memberships.pawsic.org/courses/" class="btn btn-outline" style="color:#fff;border-color:rgba(255,255,255,0.3)">CE Courses</a>
      </div>
    </div>
  </div>
</section>

</div>
HTML;

    return $html;

}, 999);
