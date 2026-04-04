/* ============================================
   PAWSIC.org — Main JavaScript
   Mobile nav, dropdowns, accordions, scroll reveal
   ============================================ */

document.addEventListener('DOMContentLoaded', function() {

  // --- Mark JS as loaded (enables scroll-reveal animations) ---
  document.documentElement.classList.add('js-loaded');

  // --- Mobile Navigation Toggle ---
  const navToggle = document.querySelector('.nav-toggle');
  const navLinks = document.querySelector('.nav-links');
  const overlay = document.querySelector('.mobile-overlay');

  function closeNav() {
    navToggle.classList.remove('active');
    navLinks.classList.remove('active');
    if (overlay) overlay.classList.remove('active');
    navToggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  if (navToggle) {
    navToggle.addEventListener('click', function() {
      navToggle.classList.toggle('active');
      navLinks.classList.toggle('active');
      if (overlay) overlay.classList.toggle('active');
      var isOpen = navLinks.classList.contains('active');
      navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });
  }

  if (overlay) {
    overlay.addEventListener('click', closeNav);
  }

  // Close mobile nav on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && navLinks && navLinks.classList.contains('active')) {
      closeNav();
      navToggle.focus();
    }
  });

  // --- Desktop Dropdown Hover: update aria-expanded ---
  document.querySelectorAll('.nav-links > li.has-dropdown, .nav-links > li:has(a.has-dropdown)').forEach(function(li) {
    var link = li.querySelector('a.has-dropdown');
    if (!link) return;
    li.addEventListener('mouseenter', function() {
      link.setAttribute('aria-expanded', 'true');
    });
    li.addEventListener('mouseleave', function() {
      link.setAttribute('aria-expanded', 'false');
    });
    link.addEventListener('focus', function() {
      link.setAttribute('aria-expanded', 'true');
    });
    li.addEventListener('focusout', function(e) {
      if (!li.contains(e.relatedTarget)) {
        link.setAttribute('aria-expanded', 'false');
      }
    });
  });

  // --- Mobile Dropdown Toggles ---
  document.querySelectorAll('.nav-links > li > a.has-dropdown').forEach(function(link) {
    link.setAttribute('aria-expanded', 'false');
    link.setAttribute('aria-haspopup', 'true');

    function toggleDropdown(e) {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        var dd = link.nextElementSibling;
        if (dd && dd.classList.contains('dropdown')) {
          var isOpen = dd.classList.toggle('show');
          link.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
          var arrow = link.querySelector('.dropdown-arrow');
          if (arrow) {
            arrow.style.transform = isOpen ? 'rotate(180deg)' : '';
          }
        }
      }
    }

    link.addEventListener('click', toggleDropdown);
    link.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        toggleDropdown(e);
      }
    });
  });

  // --- Announcement Banner Dismiss ---
  var bannerClose = document.querySelector('.banner-close');
  var banner = document.querySelector('.announcement-banner');
  if (bannerClose && banner) {
    if (sessionStorage.getItem('bannerDismissed')) {
      banner.classList.add('dismissed');
    }
    bannerClose.addEventListener('click', function() {
      banner.classList.add('dismissed');
      sessionStorage.setItem('bannerDismissed', 'true');
    });
  }

  // --- Accordion ---
  document.querySelectorAll('.accordion-header').forEach(function(header) {
    // Make accordion headers keyboard-accessible
    if (!header.getAttribute('tabindex')) header.setAttribute('tabindex', '0');
    if (!header.getAttribute('role')) header.setAttribute('role', 'button');
    var content = header.nextElementSibling;
    if (content) {
      var contentId = content.id || ('accordion-panel-' + Math.random().toString(36).substr(2, 6));
      content.id = contentId;
      content.setAttribute('role', 'region');
      header.setAttribute('aria-controls', contentId);
    }
    header.setAttribute('aria-expanded', header.parentElement.classList.contains('active') ? 'true' : 'false');

    function toggleAccordion() {
      var item = header.parentElement;
      var panel = header.nextElementSibling;
      var isActive = item.classList.contains('active');

      // Close all others in same parent
      item.parentElement.querySelectorAll('.accordion-item').forEach(function(other) {
        other.classList.remove('active');
        var c = other.querySelector('.accordion-content');
        if (c) c.style.maxHeight = null;
        var h = other.querySelector('.accordion-header');
        if (h) h.setAttribute('aria-expanded', 'false');
      });

      if (!isActive) {
        item.classList.add('active');
        panel.style.maxHeight = panel.scrollHeight + 'px';
        header.setAttribute('aria-expanded', 'true');
      }
    }

    header.addEventListener('click', toggleAccordion);
    header.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        toggleAccordion();
      }
    });
  });

  // --- Scroll Reveal (Intersection Observer) ---
  var revealElements = document.querySelectorAll('.reveal');
  if (revealElements.length > 0 && 'IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.15,
      rootMargin: '0px 0px -40px 0px'
    });

    revealElements.forEach(function(el) {
      revealObserver.observe(el);
    });
  } else {
    // Fallback: just show everything
    revealElements.forEach(function(el) {
      el.classList.add('visible');
    });
  }

  // --- Smooth Scroll for Anchor Links ---
  document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
    anchor.addEventListener('click', function(e) {
      var targetId = this.getAttribute('href');
      if (targetId === '#') return;
      var target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // --- Active Nav Highlight ---
  var path = window.location.pathname;
  // Normalize: strip trailing slash for comparison, except bare root
  var normalizedPath = path.length > 1 ? path.replace(/\/$/, '') : path;
  document.querySelectorAll('.nav-links a').forEach(function(link) {
    var href = link.getAttribute('href');
    if (!href || href === '/' || href === '#') return;
    // Normalize href the same way
    var normalizedHref = href.replace(/\/$/, '');
    // Exact match OR path ends with the href segment (handles subpath matches)
    if (normalizedPath === normalizedHref || normalizedPath.endsWith(normalizedHref)) {
      link.classList.add('active');
      link.setAttribute('aria-current', 'page');
    }
  });
  // Home: only mark active on true root or /index.html
  if (path === '/' || path === '/index.html') {
    var home = document.querySelector('.nav-links a[href="/"]');
    if (home) {
      home.classList.add('active');
      home.setAttribute('aria-current', 'page');
    }
  }

  // --- Contact Form Loading State ---
  // Supports both legacy .contact-form and v2 .v2-contact-form class
  var contactForm = document.querySelector('.v2-contact-form, .contact-form form');
  if (contactForm) {
    contactForm.addEventListener('submit', function() {
      var btn = this.querySelector('button[type="submit"]');
      if (btn) { btn.textContent = 'Sending...'; btn.disabled = true; }
    });
  }

  // --- Pricing Toggle (Monthly / Yearly) ---
  var pricingToggle = document.getElementById('pricingToggle');
  var toggleMonthly = document.getElementById('toggleMonthly');
  var toggleYearly = document.getElementById('toggleYearly');
  var priceYearly = document.querySelector('.price-yearly');
  var priceMonthly = document.querySelector('.price-monthly');

  if (pricingToggle && priceYearly && priceMonthly) {
    // CTA and microcopy elements (may or may not exist)
    var ctaYearly = document.querySelector('.premium-cta-yearly');
    var ctaMonthly = document.querySelector('.premium-cta-monthly');
    var microYearly = document.querySelector('.premium-micro-yearly');
    var microMonthly = document.querySelector('.premium-micro-monthly');

    // Default state: yearly (toggle knob on right)
    function showYearly() {
      pricingToggle.classList.remove('monthly');
      pricingToggle.setAttribute('aria-pressed', 'false');
      pricingToggle.setAttribute('aria-label', 'Switch to monthly pricing');
      priceYearly.style.display = '';
      priceMonthly.style.display = 'none';
      if (ctaYearly) ctaYearly.style.display = '';
      if (ctaMonthly) ctaMonthly.style.display = 'none';
      if (microYearly) microYearly.style.display = '';
      if (microMonthly) microMonthly.style.display = 'none';
      if (toggleYearly) toggleYearly.classList.add('toggle-active');
      if (toggleMonthly) toggleMonthly.classList.remove('toggle-active');
    }

    function showMonthly() {
      pricingToggle.classList.add('monthly');
      pricingToggle.setAttribute('aria-pressed', 'true');
      pricingToggle.setAttribute('aria-label', 'Switch to yearly pricing');
      priceYearly.style.display = 'none';
      priceMonthly.style.display = '';
      if (ctaYearly) ctaYearly.style.display = 'none';
      if (ctaMonthly) ctaMonthly.style.display = '';
      if (microYearly) microYearly.style.display = 'none';
      if (microMonthly) microMonthly.style.display = '';
      if (toggleMonthly) toggleMonthly.classList.add('toggle-active');
      if (toggleYearly) toggleYearly.classList.remove('toggle-active');
    }

    pricingToggle.addEventListener('click', function() {
      if (this.classList.contains('monthly')) {
        showYearly();
      } else {
        showMonthly();
      }
    });

    // Keyboard accessibility: Enter or Space toggles pricing
    pricingToggle.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        if (this.classList.contains('monthly')) {
          showYearly();
        } else {
          showMonthly();
        }
      }
    });

    // Note: label click handlers removed -- the toggle button is the sole control for accessibility
  }

  // --- Webinar Category Filter (events-v2.html) ---
  const wfBtns = document.querySelectorAll('.v2-wf-btn');
  const webinarCards = document.querySelectorAll('.v2-webinar-card');

  if (wfBtns.length && webinarCards.length) {
    wfBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        wfBtns.forEach(function(b) { b.classList.remove('active'); });
        btn.classList.add('active');

        var filter = btn.getAttribute('data-filter');

        webinarCards.forEach(function(card) {
          var cats = card.getAttribute('data-categories') || '';
          if (filter === 'all' || cats.indexOf(filter) !== -1) {
            card.classList.remove('hidden');
          } else {
            card.classList.add('hidden');
          }
        });
      });
    });
  }

  // --- Video Snippet Slider ---
  var sliderInner = document.querySelector('.v2-video-slider-inner');
  if (sliderInner) {
    // Duplicate all cards for seamless infinite scroll
    var cards = sliderInner.innerHTML;
    sliderInner.innerHTML = cards + cards;
  }

  // --- Vimeo Video Facade (click-to-load) ---
  var facades = document.querySelectorAll('.video-facade');
  facades.forEach(function(facade) {
    function loadVideo() {
      var id = facade.getAttribute('data-vimeo-id');
      var iframe = document.createElement('iframe');
      iframe.src = 'https://player.vimeo.com/video/' + id + '?badge=0&autopause=0&autoplay=1&player_id=0&app_id=58479';
      iframe.setAttribute('frameborder', '0');
      iframe.setAttribute('allow', 'autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share');
      iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
      iframe.setAttribute('title', facade.getAttribute('data-vimeo-title') || '');
      iframe.style.cssText = 'position:absolute;top:0;left:0;width:100%;height:100%;border-radius:inherit;';
      facade.innerHTML = '';
      facade.style.cursor = 'default';
      facade.appendChild(iframe);
      facade.removeAttribute('role');
      facade.removeAttribute('tabindex');
    }
    facade.addEventListener('click', loadVideo);
    facade.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); loadVideo(); }
    });
  });

});
