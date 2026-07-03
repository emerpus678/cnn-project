/**
 * Shared scroll-line-mask animation for cognitive-quote, foster-quote, ice-footer.
 */
(function (window) {
  'use strict';

  var LINE_SECTION_SELECTOR = '.cognitive-quote, .foster-quote, .ice-footer';

  var LINE_HIDDEN = {
    clipPath: 'inset(0% 0% 100% 0)',
    autoAlpha: 0,
  };

  /* Footer: top 50% always visible, only bottom 50% animates on scroll */
  var FOOTER_LINE_HIDDEN = {
    clipPath: 'inset(0% 0% 50% 0)',
  };

  var FOOTER_LINE_VISIBLE = {
    clipPath: 'inset(0% 0% 0% 0)',
  };

  var LINE_VISIBLE = {
    clipPath: 'inset(0% 0% 0% 0)',
    autoAlpha: 1,
  };

  function getMaskTarget(section) {
    return section.querySelector('[data-scroll-mask]');
  }

  function getMaskImage(maskEl) {
    if (!maskEl) {
      return null;
    }

    return maskEl.tagName === 'IMG' ? maskEl : maskEl.querySelector('img');
  }

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

    if (!img) {
      finish();
      return;
    }

    if (img.complete) {
      finish();
      return;
    }

    img.addEventListener('load', finish, { once: true });
    img.addEventListener('error', finish, { once: true });
    window.setTimeout(finish, 2500);
  }

  function initLineMask(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
      console.warn('[IBM Cognitive] GSAP or ScrollTrigger not loaded.');
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll(LINE_SECTION_SELECTOR).forEach(function (section) {
      if (section.dataset.lineMaskInit === 'true' && !forceReset) {
        return;
      }

      var maskEl = getMaskTarget(section);

      if (!maskEl) {
        return;
      }

      var img = getMaskImage(maskEl);
      var isFooter = section.classList.contains('ice-footer');
      var hiddenState = isFooter ? FOOTER_LINE_HIDDEN : LINE_HIDDEN;
      var visibleState = isFooter ? FOOTER_LINE_VISIBLE : LINE_VISIBLE;

      killSectionTriggers(section);
      window.gsap.killTweensOf(maskEl);
      section.dataset.lineMaskInit = 'true';
      section.classList.remove('is-line-ready');

      if (reducedMotion) {
        section.classList.add('is-line-ready');
        window.gsap.set(maskEl, visibleState);
        return;
      }

      window.gsap.set(maskEl, hiddenState);

      whenImageReady(img, function () {
        section.classList.add('is-line-ready');

        var scrollTriggerConfig = isFooter
          ? {
              trigger: maskEl,
              start: 'top 72%',
              end: 'top 10%',
              scrub: 0.6,
              invalidateOnRefresh: true,
            }
          : {
              trigger: maskEl,
              start: 'top 70%',
              end: 'bottom 25%',
              scrub: 0.6,
              invalidateOnRefresh: true,
            };

        window.gsap.fromTo(
          maskEl,
          hiddenState,
          Object.assign({}, visibleState, {
            ease: 'none',
            scrollTrigger: scrollTriggerConfig,
          })
        );
      });
    });

    window.requestAnimationFrame(function () {
      window.requestAnimationFrame(function () {
        if (window.ScrollTrigger) {
          window.ScrollTrigger.refresh(true);
        }
      });
    });
  }

  function resetAndInit() {
    document.querySelectorAll(LINE_SECTION_SELECTOR).forEach(function (section) {
      delete section.dataset.lineMaskInit;
      section.classList.remove('is-line-ready');
    });

    initLineMask(true);
  }

  window.IbmCognitiveLineMask = {
    init: initLineMask,
    resetAndInit: resetAndInit,
  };

  window.IbmCognitiveCognitiveQuote = window.IbmCognitiveLineMask;

  document.addEventListener('dev:partials-loaded', function () {
    window.requestAnimationFrame(function () {
      window.requestAnimationFrame(resetAndInit);
    });
  });

  function boot() {
    if (document.querySelectorAll(LINE_SECTION_SELECTOR).length) {
      initLineMask(false);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

  window.addEventListener('load', resetAndInit);
})(window);
