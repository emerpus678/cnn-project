/**
 * Scroll-activated mask reveal for hero parallax wave.svg + lines.svg.
 * 80% stays visible; the right 20% draws in on scroll.
 */
(function (window) {
  'use strict';

  var FULL_VISIBLE = {
    clipPath: 'inset(0% 0% 0% 0)',
  };

  var HIDDEN = {
    clipPath: 'inset(0% 100% 0% 0)',
  };

  var STATIC_SPLIT_PERCENT = 80;

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

  function updateMaskSplit(section) {
    section.style.setProperty('--hero-mask-split-wave', String(STATIC_SPLIT_PERCENT));
    section.style.setProperty('--hero-mask-split-lines', String(STATIC_SPLIT_PERCENT));
  }

  function initHeroParallaxAnimations(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
      console.warn('[IBM Cognitive] GSAP or ScrollTrigger not loaded.');
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('.hero-parallax').forEach(function (section) {
      if (section.dataset.parallaxInit === 'true' && !forceReset) {
        return;
      }

      var masks = section.querySelectorAll('[data-scroll-mask]');

      if (!masks.length) {
        console.warn('[IBM Cognitive] No [data-scroll-mask] elements found.');
        return;
      }

      killSectionTriggers(section);
      section.dataset.parallaxInit = 'true';
      section.classList.add('is-ready');
      updateMaskSplit(section);

      if (reducedMotion) {
        window.gsap.set(masks, FULL_VISIBLE);
        return;
      }

      window.gsap.set(masks, HIDDEN);

      var pending = masks.length;
      var initialized = false;

      function setupAnimations() {
        if (initialized) {
          return;
        }

        initialized = true;
        updateMaskSplit(section);

        var timeline = window.gsap.timeline({
          scrollTrigger: {
            trigger: section,
            start: 'top top',
            end: 'bottom top',
            scrub: 0.6,
            invalidateOnRefresh: true,
          },
        });

        masks.forEach(function (mask) {
          timeline.fromTo(
            mask,
            HIDDEN,
            Object.assign({}, FULL_VISIBLE, { ease: 'none', duration: 1 }),
            0
          );
        });

        window.ScrollTrigger.refresh(true);
      }

      function onAssetReady() {
        pending -= 1;

        if (pending <= 0) {
          setupAnimations();
        }
      }

      masks.forEach(function (mask) {
        var img = mask.querySelector('img');

        if (img) {
          whenImageReady(img, onAssetReady);
        } else {
          onAssetReady();
        }
      });
    });
  }

  function resetAndInit() {
    document.querySelectorAll('.hero-parallax').forEach(function (section) {
      delete section.dataset.parallaxInit;
      section.classList.remove('is-ready');
    });
    initHeroParallaxAnimations(true);
  }

  window.IbmCognitiveHeroParallax = {
    init: initHeroParallaxAnimations,
    resetAndInit: resetAndInit,
    updateMaskSplit: updateMaskSplit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);

  function boot() {
    if (document.querySelector('.hero-parallax')) {
      initHeroParallaxAnimations(false);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

  window.addEventListener('load', resetAndInit);
})(window);
