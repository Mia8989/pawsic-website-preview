<?php
/**
 * PAWSIC Thank You Page - Custom Design
 *
 * WPCode Snippet for memberships.pawsic.org
 * Page ID: 325 (Thank You page)
 *
 * HOW TO INSTALL:
 * 1. Go to WPCode > Add Snippet > Custom Snippet > PHP Snippet
 * 2. Paste this entire file's contents
 * 3. Set "Insert Method" to "Auto Insert"
 * 4. Set "Location" to "Run Everywhere"
 * 5. Activate the snippet
 */

// Only run on the thank-you page
add_action('wp_head', function () {
    if (!is_page(325)) return;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
      /* ===== PAWSIC Thank You Page ===== */

      /* Nuclear reset: force every possible Divi/WP wrapper to full width */
      .page-id-325 #page-container,
      .page-id-325 #et-main-area,
      .page-id-325 #main-content,
      .page-id-325 #main-content .container,
      .page-id-325 .et_pb_section,
      .page-id-325 .et_pb_row,
      .page-id-325 .et_pb_column,
      .page-id-325 .et_pb_module,
      .page-id-325 .et_pb_text_inner,
      .page-id-325 .et_pb_post_content,
      .page-id-325 .et_builder_inner_content,
      .page-id-325 .entry-content,
      .page-id-325 .et_pb_gutters3 .et_pb_column,
      .page-id-325 .et_pb_with_border,
      .page-id-325 article,
      .page-id-325 .post-content {
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
        width: 100% !important;
        float: none !important;
        border: none !important;
      }

      /* Hide any default Divi content that's not ours */
      .page-id-325 #main-content .container::before,
      .page-id-325 .entry-content > *:not(.pawsic-ty-wrap) {
        display: none !important;
      }

      /* Our wrapper breaks out of any remaining constraints */
      .page-id-325 .pawsic-ty-wrap {
        display: block !important;
        width: 100vw !important;
        max-width: 100vw !important;
        margin-left: calc(-50vw + 50%) !important;
        position: relative !important;
        overflow-x: hidden !important;
      }

      /* ===== Header Section ===== */
      .pawsic-ty-header {
        background: linear-gradient(160deg, #081428 0%, #0c1f3f 50%, #1e3a6e 100%);
        color: #fff;
        padding: 4.5rem 1.5rem 3.5rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      }
      .pawsic-ty-header::before {
        content: '';
        position: absolute;
        top: -50%; right: -15%;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(56,182,255,0.12) 0%, transparent 70%);
        border-radius: 50%;
      }
      .pawsic-ty-header::after {
        content: '';
        position: absolute;
        bottom: -40%; left: -10%;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(58,158,143,0.08) 0%, transparent 70%);
        border-radius: 50%;
      }
      .pawsic-ty-header-inner {
        position: relative;
        z-index: 2;
        max-width: 700px;
        margin: 0 auto;
      }

      .pawsic-ty-check {
        width: 64px; height: 64px;
        background: rgba(56,182,255,0.15);
        border: 2px solid rgba(56,182,255,0.3);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
      }
      .pawsic-ty-check svg {
        width: 30px; height: 30px;
        stroke: #38B6FF; stroke-width: 2.5; fill: none;
      }

      .pawsic-ty-header h1 {
        font-family: 'DM Serif Display', Georgia, serif !important;
        color: #fff !important;
        font-size: clamp(2rem, 4.5vw, 3rem) !important;
        font-weight: 400 !important;
        line-height: 1.15 !important;
        margin: 0 0 0.75rem !important;
        padding: 0 !important;
      }
      .pawsic-ty-header h1 em {
        font-style: italic;
        color: #38B6FF;
      }
      .pawsic-ty-header .pawsic-ty-subtitle {
        color: rgba(255,255,255,0.7);
        font-size: 1.1rem;
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.7;
      }

      /* ===== Content Section ===== */
      .pawsic-ty-body {
        padding: 4rem 1.5rem 5rem;
        background: #FAF8F4;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      }
      .pawsic-ty-body-inner {
        max-width: 880px;
        margin: 0 auto;
      }

      .pawsic-ty-section-title {
        text-align: center;
        margin-bottom: 2.5rem;
      }
      .pawsic-ty-section-title h2 {
        font-family: 'DM Serif Display', Georgia, serif !important;
        font-size: clamp(1.5rem, 3vw, 2rem) !important;
        color: #0c1f3f !important;
        font-weight: 400 !important;
        line-height: 1.15 !important;
        margin: 0 0 0.5rem !important;
        padding: 0 !important;
      }
      .pawsic-ty-section-title p {
        color: #7a8699;
        font-size: 1rem;
        margin: 0;
      }

      /* Navigation tip bar */
      .pawsic-ty-nav-tip {
        background: #fff;
        border: 1px solid #e8edf2;
        border-radius: 12px;
        padding: 1.25rem 1.75rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 3rem;
        font-size: 0.92rem;
        color: #3d4a5c;
        line-height: 1.65;
      }
      .pawsic-ty-nav-tip svg {
        flex-shrink: 0;
        width: 20px; height: 20px;
        stroke: #2b7cca; stroke-width: 2; fill: none;
        margin-top: 2px;
      }
      .pawsic-ty-nav-tip strong {
        color: #0c1f3f;
      }

      /* Step cards */
      .pawsic-ty-steps {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 3rem;
      }
      .pawsic-ty-card {
        background: #fff;
        border-radius: 16px;
        padding: 2rem 1.5rem;
        text-align: center;
        border: 1px solid #e8edf2;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .pawsic-ty-card:hover {
        border-color: #2b7cca;
        box-shadow: 0 4px 20px rgba(12,31,63,0.08);
        transform: translateY(-2px);
      }
      .pawsic-ty-card-icon {
        width: 52px; height: 52px;
        background: #eef5f8;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
      }
      .pawsic-ty-card-icon svg {
        width: 24px; height: 24px;
        stroke: #2b7cca; stroke-width: 2; fill: none;
      }
      .pawsic-ty-card h3 {
        font-family: 'Inter', sans-serif !important;
        font-size: 1.05rem !important;
        font-weight: 600 !important;
        color: #0c1f3f !important;
        margin: 0 0 0.5rem !important;
        padding: 0 !important;
      }
      .pawsic-ty-card p {
        font-size: 0.9rem;
        color: #7a8699;
        line-height: 1.6;
        margin: 0 0 1rem;
      }
      .pawsic-ty-card a {
        font-size: 0.88rem;
        font-weight: 600;
        color: #2b7cca !important;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        transition: color 0.3s ease, gap 0.3s ease;
      }
      .pawsic-ty-card a:hover {
        color: #1e3a6e !important;
        gap: 0.55rem;
      }

      /* CTA banner */
      .pawsic-ty-cta {
        text-align: center;
        padding: 2.5rem 2rem;
        background: linear-gradient(160deg, #0c1f3f 0%, #1e3a6e 100%);
        border-radius: 20px;
        color: #fff;
        position: relative;
        overflow: hidden;
      }
      .pawsic-ty-cta::before {
        content: '';
        position: absolute;
        top: -30%; right: -10%;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(56,182,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
      }
      .pawsic-ty-cta h2 {
        font-family: 'DM Serif Display', Georgia, serif !important;
        color: #fff !important;
        font-size: clamp(1.35rem, 2.5vw, 1.75rem) !important;
        font-weight: 400 !important;
        margin: 0 0 0.5rem !important;
        padding: 0 !important;
        position: relative;
        z-index: 1;
      }
      .pawsic-ty-cta p {
        color: rgba(255,255,255,0.7);
        margin: 0 0 1.5rem;
        font-size: 0.95rem;
        position: relative;
        z-index: 1;
      }
      .pawsic-ty-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #38B6FF;
        color: #fff !important;
        padding: 1rem 2.5rem;
        border-radius: 100px;
        font-weight: 600;
        font-size: 1.05rem;
        text-decoration: none !important;
        border: none;
        cursor: pointer;
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(56,182,255,0.25);
        position: relative;
        z-index: 1;
      }
      .pawsic-ty-btn:hover {
        background: #2da5ee;
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(56,182,255,0.35);
      }
      .pawsic-ty-btn span {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }
      .pawsic-ty-btn:hover span {
        transform: translateX(4px);
      }

      /* Responsive */
      @media (max-width: 768px) {
        .pawsic-ty-header { padding: 3rem 1.5rem 2.5rem; }
        .pawsic-ty-check { width: 52px; height: 52px; margin-bottom: 1.25rem; }
        .pawsic-ty-check svg { width: 24px; height: 24px; }
        .pawsic-ty-steps { grid-template-columns: 1fr; gap: 1rem; }
        .pawsic-ty-nav-tip { flex-direction: column; gap: 0.5rem; padding: 1rem 1.25rem; }
        .pawsic-ty-body { padding: 3rem 1.5rem 3.5rem; }
        .pawsic-ty-cta { padding: 2rem 1.5rem; border-radius: 16px; }
      }
    </style>
    <?php
});

// Inject custom HTML into the page content
add_filter('the_content', function ($content) {
    if (!is_page(325)) return $content;

    $first_name = '';
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $first_name = esc_html($user->first_name);
    }

    $greeting = $first_name ? "Thank You, <em>{$first_name}</em>!" : "Thank You!";

    $html = <<<HTML
<div class="pawsic-ty-wrap">

  <!-- Header -->
  <div class="pawsic-ty-header">
    <div class="pawsic-ty-header-inner">
      <div class="pawsic-ty-check">
        <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <h1>{$greeting}</h1>
      <p class="pawsic-ty-subtitle">Welcome to the PAWSIC community. Whether you're a clinician, caregiver, patient, family member, student, or industry partner, you now have access to wound care education, resources, and a community dedicated to improving skin health and wound care for everyone.</p>
    </div>
  </div>

  <!-- Body -->
  <div class="pawsic-ty-body">
    <div class="pawsic-ty-body-inner">

      <!-- Navigation tip -->
      <div class="pawsic-ty-nav-tip">
        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
        <div>
          <strong>Finding your way around:</strong> You can access your account anytime by clicking the <strong>PAWSIC logo</strong> in the top left corner, or the <strong>account link</strong> in the top right corner of any page. Your dashboard, courses, and membership details are all there.
        </div>
      </div>

      <div class="pawsic-ty-section-title">
        <h2>Where to Start</h2>
        <p>Here are a few ways to make the most of your PAWSIC membership.</p>
      </div>

      <div class="pawsic-ty-steps">
        <div class="pawsic-ty-card">
          <div class="pawsic-ty-card-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          </div>
          <h3>Browse Educational Resources</h3>
          <p>Explore wound care courses, webinar recordings, and the resource library. Free members get access to foundational content; premium members unlock all CE/CME courses.</p>
          <a href="/account/">View Resources <span aria-hidden="true">&rarr;</span></a>
        </div>

        <div class="pawsic-ty-card">
          <div class="pawsic-ty-card-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3>Join the Community</h3>
          <p>Connect with clinicians, caregivers, patients, and families in our forums and Shared Interest Groups. Everyone's perspective matters here.</p>
          <a href="https://pawsic.org/community/">Visit Forums <span aria-hidden="true">&rarr;</span></a>
        </div>

        <div class="pawsic-ty-card">
          <div class="pawsic-ty-card-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </div>
          <h3>Patient &amp; Caregiver Resources</h3>
          <p>If you're a patient or caregiver, find educational materials designed to help you understand wound care, ask the right questions, and advocate for better outcomes.</p>
          <a href="https://pawsic.org/patients/">Learn More <span aria-hidden="true">&rarr;</span></a>
        </div>

        <div class="pawsic-ty-card">
          <div class="pawsic-ty-card-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <h3>Check Your Email</h3>
          <p>We've sent a welcome email with your membership details, helpful links, and tips for getting started. Keep an eye out for our newsletter too.</p>
          <a href="/account/">My Account <span aria-hidden="true">&rarr;</span></a>
        </div>
      </div>

      <div class="pawsic-ty-cta">
        <h2>You're Part of the PAWSIC Community Now</h2>
        <p>Your account is ready. Explore your dashboard, discover resources, and join the conversation.</p>
        <a href="/account/" class="pawsic-ty-btn">Go to My Account <span aria-hidden="true">&rarr;</span></a>
      </div>

    </div>
  </div>

</div>
HTML;

    return $html; // Replace MemberPress content entirely

}, 999); // High priority to run after MemberPress
