<?php
/**
 * PAWSIC Member Portal Homepage
 *
 * WPCode Snippet for memberships.pawsic.org
 * Page ID: 31 (Homepage)
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
    if (!is_page(31)) return;
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
      /* ===== Divi Nuclear Reset for page 31 ===== */
      .page-id-31 #page-container,
      .page-id-31 #et-main-area,
      .page-id-31 #main-content,
      .page-id-31 #main-content .container,
      .page-id-31 .et_pb_section,
      .page-id-31 .et_pb_row,
      .page-id-31 .et_pb_column,
      .page-id-31 .et_pb_module,
      .page-id-31 .et_pb_text_inner,
      .page-id-31 .et_pb_post_content,
      .page-id-31 .et_builder_inner_content,
      .page-id-31 .entry-content {
        all: unset !important;
        display: block !important;
        padding: 0 !important;
        margin: 0 !important;
        background: none !important;
        border: none !important;
        box-shadow: none !important;
        width: auto !important;
        max-width: none !important;
      }

      /* ===== Portal Page Styles ===== */
      .pawsic-portal-wrap {
        min-height: 100vh;
        background: linear-gradient(135deg, #0c1f3f 0%, #1E3A6E 55%, #1B5E9E 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1.5rem;
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow: hidden;
      }

      .pawsic-portal-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
      }

      .pawsic-portal-card {
        position: relative;
        z-index: 1;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        padding: 3rem 3.5rem;
        max-width: 520px;
        width: 100%;
        text-align: center;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
      }

      .pawsic-portal-logo {
        margin-bottom: 2rem;
      }

      .pawsic-portal-logo img {
        height: 56px;
        width: auto;
      }

      .pawsic-portal-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: rgba(56,182,255,0.12);
        border: 1px solid rgba(56,182,255,0.3);
        color: #38B6FF;
        padding: 0.35rem 1rem;
        border-radius: 2rem;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
      }

      .pawsic-portal-card h1 {
        font-family: 'DM Serif Display', serif;
        font-size: clamp(1.8rem, 4vw, 2.4rem);
        color: #fff;
        line-height: 1.2;
        margin-bottom: 0.75rem;
      }

      .pawsic-portal-card h1 em {
        font-style: italic;
        color: #38B6FF;
      }

      .pawsic-portal-card p {
        color: rgba(255,255,255,0.75);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
      }

      .pawsic-portal-login-btn {
        display: block;
        width: 100%;
        background: #38B6FF;
        color: #0c1f3f;
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        font-weight: 700;
        padding: 0.95rem 1.5rem;
        border-radius: 10px;
        text-decoration: none;
        margin-bottom: 1rem;
        transition: background 0.2s, transform 0.15s;
        letter-spacing: 0.01em;
      }

      .pawsic-portal-login-btn:hover {
        background: #1fa3f0;
        transform: translateY(-1px);
        color: #0c1f3f;
        text-decoration: none;
      }

      .pawsic-portal-divider {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 1.25rem 0;
      }

      .pawsic-portal-divider::before,
      .pawsic-portal-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: rgba(255,255,255,0.12);
      }

      .pawsic-portal-divider span {
        color: rgba(255,255,255,0.4);
        font-size: 0.78rem;
        font-weight: 500;
        white-space: nowrap;
      }

      .pawsic-portal-new {
        color: rgba(255,255,255,0.65);
        font-size: 0.9rem;
        line-height: 1.6;
      }

      .pawsic-portal-new a {
        color: #38B6FF;
        text-decoration: none;
        font-weight: 600;
      }

      .pawsic-portal-new a:hover {
        text-decoration: underline;
      }

      .pawsic-portal-footer {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.35);
        font-size: 0.75rem;
      }

      @media (max-width: 560px) {
        .pawsic-portal-card {
          padding: 2rem 1.5rem;
        }
      }
    </style>
    <?php
});

// Inject portal content
add_action('wp_footer', function () {
    if (!is_page(31)) return;
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var main = document.querySelector('#main-content') || document.querySelector('#et-main-area') || document.querySelector('main');
        if (!main) return;
        main.innerHTML = `
        <div class="pawsic-portal-wrap">
          <div class="pawsic-portal-card">
            <div class="pawsic-portal-logo">
              <img src="https://pawsic.org/images/pawsic-icon.svg" alt="PAWSIC">
              <div style="color:rgba(255,255,255,0.6);font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;margin-top:0.5rem;">Post-Acute Wound &amp; Skin Integrity Council</div>
            </div>
            <span class="pawsic-portal-eyebrow">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              Member Portal
            </span>
            <h1>Welcome to <em>PAWSIC</em></h1>
            <p>Access your courses, CE credits, library resources, and the wound care community.</p>
            <a href="https://memberships.pawsic.org/login/" class="pawsic-portal-login-btn">
              Log In to Your Account &rarr;
            </a>
            <div class="pawsic-portal-divider"><span>New to PAWSIC?</span></div>
            <p class="pawsic-portal-new">
              <a href="https://pawsic.org/membership/" target="_blank" rel="noopener">Learn about membership</a>
              &nbsp;&middot;&nbsp;
              <a href="https://memberships.pawsic.org/register/free/">Register for free</a>
              &nbsp;&middot;&nbsp;
              <a href="https://memberships.pawsic.org/register/premium/">Join Premium</a>
            </p>
            <div class="pawsic-portal-footer">
              Post-Acute Wound &amp; Skin Integrity Council &nbsp;&middot;&nbsp; <a href="https://pawsic.org" style="color:rgba(255,255,255,0.35);text-decoration:none;">pawsic.org</a>
            </div>
          </div>
        </div>
        `;
    });
    </script>
    <?php
});
