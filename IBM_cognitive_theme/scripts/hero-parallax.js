/**
 * Scroll-activated mask reveal for hero parallax wave.svg + lines.svg.
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
    window.ScrollTrigger.getAll().forEach(function (trigger) {
      if (trigger.trigger === section) {
        trigger.kill();
      }
    });
  }

  function initHeroParallaxAnimations(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
      console.warn('IBM Cognitive: GSAP or ScrollTrigger not loaded.');
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('.hero-parallax').forEach(function (section) {
      if (section.dataset.parallaxInit === 'true' && !forceReset) {
        return;
      }

      var waveMask = section.querySelector('.hero-parallax__mask--wave');
      var linesMask = section.querySelector('.hero-parallax__mask--lines');

      if (!waveMask || !linesMask) {
        console.warn('IBM Cognitive: wave/lines mask elements not found.');
        return;
      }

      killSectionTriggers(section);
      section.dataset.parallaxInit = 'true';
      section.classList.add('is-ready');

      if (reducedMotion) {
        window.gsap.set([waveMask, linesMask], VISIBLE);
        return;
      }

      window.gsap.set([waveMask, linesMask], HIDDEN);

      /* One timeline scrubbed across full section scroll */
      window.gsap
        .timeline({
          scrollTrigger: {
            trigger: section,
            start: 'top bottom',
            end: 'bottom top',
            scrub: 0.5,
            invalidateOnRefresh: true,
          },
        })
        /* Reveal wave + lines (first 35% of scroll through section) */
        .to(waveMask, Object.assign({}, VISIBLE, { duration: 0.3, ease: 'power2.out' }), 0)
        .to(linesMask, Object.assign({}, VISIBLE, { duration: 0.3, ease: 'power2.out' }), 0.12)
        /* Hold visible (middle) */
        /* Mask out (last 25% of scroll through section) */
        .to(waveMask, Object.assign({}, HIDDEN, { duration: 0.25, ease: 'power2.in' }), 0.75)
        .to(linesMask, Object.assign({}, HIDDEN, { duration: 0.25, ease: 'power2.in' }), 0.8);
    });

    window.requestAnimationFrame(function () {
      window.ScrollTrigger.refresh();
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
  } else if (document.querySelector('.hero-parallax')) {
    initHeroParallaxAnimations(false);
  }
})(window);
