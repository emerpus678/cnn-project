/**
 * Tech focus — parallax background + scroll mask for running line SVGs.
 */
(function (window) {
  'use strict';

  var LINE_VISIBLE = {
    clipPath: 'inset(0% 0% 0% 0)',
    autoAlpha: 1,
  };

  var LINE_HIDDEN = {
    clipPath: 'inset(100% 0% 0% 0)',
    autoAlpha: 0,
  };

  function killSectionTriggers(section, extraTrigger) {
    if (!window.ScrollTrigger) {
      return;
    }

    window.ScrollTrigger.getAll().forEach(function (trigger) {
      if (trigger.trigger === section || (extraTrigger && trigger.trigger === extraTrigger)) {
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

  function initTechFocus(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
      console.warn('[IBM Cognitive] GSAP or ScrollTrigger not loaded.');
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('.tech-focus').forEach(function (section) {
      if (section.dataset.techFocusInit === 'true' && !forceReset) {
        return;
      }

      var media = section.querySelector('[data-parallax]');
      var bg = section.querySelector('.tech-focus__bg');
      var lines = section.querySelectorAll('[data-scroll-mask]');
      var story = section.closest('.ibm-story');
      var trigger = story || section;

      killSectionTriggers(section, story);
      section.dataset.techFocusInit = 'true';
      section.classList.remove('is-line-ready');

      if (media && bg && !reducedMotion) {
        var amount = parseFloat(media.dataset.parallax || '0.12', 10);

        window.gsap.to(bg, {
          yPercent: amount * 100,
          ease: 'none',
          scrollTrigger: {
            trigger: section,
            start: 'top bottom',
            end: 'bottom top',
            scrub: true,
            invalidateOnRefresh: true,
          },
        });
      }

      if (!lines.length) {
        return;
      }

      if (reducedMotion) {
        section.classList.add('is-line-ready');
        window.gsap.set(lines, LINE_VISIBLE);
        return;
      }

      window.gsap.set(lines, LINE_HIDDEN);

      whenImagesReady(section, function () {
        section.classList.add('is-line-ready');

        var lineEnd = story ? story.querySelector('.data-teaser') || story : section;

        var timeline = window.gsap.timeline({
          scrollTrigger: {
            trigger: section,
            start: 'top 85%',
            endTrigger: lineEnd,
            end: 'bottom 60%',
            scrub: 0.6,
            invalidateOnRefresh: true,
          },
        });

        lines.forEach(function (line) {
          timeline.to(
            line,
            Object.assign({}, LINE_VISIBLE, { duration: 0.45, ease: 'power2.out' }),
            0
          );
        });

        window.ScrollTrigger.refresh(true);
      });
    });
  }

  function resetAndInit() {
    document.querySelectorAll('.tech-focus').forEach(function (section) {
      delete section.dataset.techFocusInit;
      section.classList.remove('is-line-ready');
    });
    initTechFocus(true);
  }

  window.IbmCognitiveTechFocus = {
    init: initTechFocus,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);

  function boot() {
    if (document.querySelector('.tech-focus')) {
      initTechFocus(false);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

  window.addEventListener('load', resetAndInit);
})(window);
