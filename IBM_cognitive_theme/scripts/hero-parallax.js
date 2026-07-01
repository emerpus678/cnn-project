/**
 * Scroll-activated mask reveal for hero parallax wave.svg + lines.svg.
 * Targets [data-scroll-mask] elements inside .hero-parallax sections.
 */
(function (window) {
  'use strict';

  var VISIBLE = {
    clipPath: 'inset(0% 0% 0% 0)',
    autoAlpha: 1,
  };

  var HIDDEN = {
    clipPath: 'inset(0% 0% 100% 0)',
    autoAlpha: 0,
  };

  function killSectionTriggers(section) {
    if (!window.ScrollTrigger) {
      return;
    }

    window.ScrollTrigger.getAll().forEach(function (trigger) {
      if (trigger.trigger === section) {
        trigger.kill();
      }
    });
  }

  function whenImagesReady(section, callback) {
    var images = section.querySelectorAll('img');
    var pending = images.length;

    if (!pending) {
      callback();
      return;
    }

    function done() {
      pending -= 1;
      if (pending <= 0) {
        callback();
      }
    }

    images.forEach(function (img) {
      if (img.complete) {
        done();
      } else {
        img.addEventListener('load', done, { once: true });
        img.addEventListener('error', done, { once: true });
      }
    });
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

      if (reducedMotion) {
        section.classList.add('is-ready');
        window.gsap.set(masks, VISIBLE);
        return;
      }

      window.gsap.set(masks, HIDDEN);

      whenImagesReady(section, function () {
        section.classList.add('is-ready');

        var timeline = window.gsap.timeline({
          scrollTrigger: {
            trigger: section,
            start: 'top 85%',
            end: 'bottom 15%',
            scrub: 0.6,
            invalidateOnRefresh: true,
          },
        });

        masks.forEach(function (mask, index) {
          var revealAt = index * 0.1;
          var hideAt = 0.72 + index * 0.04;

          timeline
            .to(mask, Object.assign({}, VISIBLE, { duration: 0.3, ease: 'power2.out' }), revealAt)
            .to(mask, Object.assign({}, HIDDEN, { duration: 0.25, ease: 'power2.in' }), hideAt);
        });

        window.ScrollTrigger.refresh(true);
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
