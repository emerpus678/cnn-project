/**
 * Hero parallax overlay reveal: 80% visible, right 20% draws in on scroll.
 */
(function (window) {
  'use strict';

  var VISIBLE = { clipPath: 'inset(0% 0% 0% 0)' };
  var HIDDEN = { clipPath: 'inset(0% 100% 0% 0)' };

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
    if (img.complete) {
      callback();
      return;
    }

    var done = false;

    function finish() {
      if (!done) {
        done = true;
        callback();
      }
    }

    img.addEventListener('load', finish, { once: true });
    img.addEventListener('error', finish, { once: true });
    window.setTimeout(finish, 2500);
  }

  function initHeroParallaxAnimations(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
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
        return;
      }

      killSectionTriggers(section);
      section.dataset.parallaxInit = 'true';

      if (reducedMotion) {
        window.gsap.set(masks, VISIBLE);
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
          timeline.fromTo(mask, HIDDEN, Object.assign({}, VISIBLE, { ease: 'none', duration: 1 }), 0);
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
    });
    initHeroParallaxAnimations(true);
  }

  window.IbmCognitiveHeroParallax = {
    init: initHeroParallaxAnimations,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initHeroParallaxAnimations(false);
    });
  } else {
    initHeroParallaxAnimations(false);
  }

  window.addEventListener('load', resetAndInit);
})(window);
