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

  if (navToggle) {
    navToggle.addEventListener('click', function() {
      navToggle.classList.toggle('active');
      navLinks.classList.toggle('active');
      if (overlay) overlay.classList.toggle('active');
      document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
    });
  }

  if (overlay) {
    overlay.addEventListener('click', function() {
      navToggle.classList.remove('active');
      navLinks.classList.remove('active');
      overlay.classList.remove('active');
      document.body.style.overflow = '';
    });
  }

  // --- Mobile Dropdown Toggles ---
  document.querySelectorAll('.nav-links > li > a.has-dropdown').forEach(function(link) {
    link.addEventListener('click', function(e) {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        var dd = this.nextElementSibling;
        if (dd && dd.classList.contains('dropdown')) {
          dd.classList.toggle('show');
        }
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
    header.addEventListener('click', function() {
      var item = this.parentElement;
      var content = this.nextElementSibling;
      var isActive = item.classList.contains('active');

      // Close all others in same parent
      item.parentElement.querySelectorAll('.accordion-item').forEach(function(other) {
        other.classList.remove('active');
        var c = other.querySelector('.accordion-content');
        if (c) c.style.maxHeight = null;
      });

      if (!isActive) {
        item.classList.add('active');
        content.style.maxHeight = content.scrollHeight + 'px';
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
  document.querySelectorAll('.nav-links a').forEach(function(link) {
    var href = link.getAttribute('href');
    if (href && path.includes(href) && href !== '/') {
      link.classList.add('active');
    }
  });
  if (path === '/' || path === '/index.html') {
    var home = document.querySelector('.nav-links a[href="/"]');
    if (home) home.classList.add('active');
  }

  // --- Contact Form Loading State ---
  var contactForm = document.querySelector('.contact-form form');
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

    // Allow clicking the labels too
    if (toggleMonthly) {
      toggleMonthly.addEventListener('click', function() { showMonthly(); });
    }
    if (toggleYearly) {
      toggleYearly.addEventListener('click', function() { showYearly(); });
    }
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

});
