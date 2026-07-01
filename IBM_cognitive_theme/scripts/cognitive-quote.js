/**
 * Cognitive quote — scroll mask for line2.svg (reveals bottom to top).
 */
(function (window) {
  'use strict';

  var LINE_VISIBLE = {
    clipPath: 'inset(0% 0% 0% 0)',
    autoAlpha: 1,
  };

  var LINE_HIDDEN = {
    clipPath: 'inset(0% 0% 100% 0)',
    autoAlpha: 0,
  };

  function killSectionTriggers(section) {
    if (!window.ScrollTrigger) {
      return;
    }

    window.ScrollTrigger.getAll().forEach(function (trigger) {
      var el = trigger.trigger;

      if (el === section || (el && section.contains(el))) {
        trigger.kill();
      }
    });
  }

  function whenImageReady(img, callback) {
    var done = false;

    function finish() {
      if (done) {
        return;
      }

      done = true;
      callback();
    }

    if (img.complete) {
      finish();
      return;
    }

    img.addEventListener('load', finish, { once: true });
    img.addEventListener('error', finish, { once: true });
    window.setTimeout(finish, 2500);
  }

  function initCognitiveQuoteLineMask(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
      console.warn('[IBM Cognitive] GSAP or ScrollTrigger not loaded.');
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('.cognitive-quote').forEach(function (section) {
      if (section.dataset.lineMaskInit === 'true' && !forceReset) {
        return;
      }

      var line = section.querySelector('[data-scroll-mask]');

      if (!line) {
        return;
      }

      killSectionTriggers(section);
      section.dataset.lineMaskInit = 'true';
      section.classList.remove('is-line-ready');

      if (reducedMotion) {
        section.classList.add('is-line-ready');
        window.gsap.set(line, LINE_VISIBLE);
        return;
      }

      window.gsap.set(line, LINE_HIDDEN);

      whenImageReady(line, function () {
        section.classList.add('is-line-ready');

        window.gsap.fromTo(
          line,
          LINE_HIDDEN,
          Object.assign({}, LINE_VISIBLE, {
            ease: 'none',
            scrollTrigger: {
              trigger: line,
              start: 'top 90%',
              end: 'bottom 25%',
              scrub: 0.6,
              invalidateOnRefresh: true,
            },
          })
        );

        window.ScrollTrigger.refresh(true);
      });
    });
  }

  function resetAndInit() {
    document.querySelectorAll('.cognitive-quote').forEach(function (section) {
      delete section.dataset.lineMaskInit;
      section.classList.remove('is-line-ready');
    });

    initCognitiveQuoteLineMask(true);
  }

  window.IbmCognitiveCognitiveQuote = {
    init: initCognitiveQuoteLineMask,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);

  function boot() {
    if (document.querySelector('.cognitive-quote')) {
      initCognitiveQuoteLineMask(false);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

  window.addEventListener('load', resetAndInit);
})(window);
