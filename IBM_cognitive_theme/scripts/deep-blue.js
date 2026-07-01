/**
 * Deep Blue section — Lottie chess + scroll mask for line1.svg.
 */
(function (window) {
  'use strict';

  var LINE_VISIBLE = {
    clipPath: 'inset(0% 0% 0% 0)',
    autoAlpha: 1,
  };

  var LINE_HIDDEN = {
    clipPath: 'inset(0% 100% 0% 0)',
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

    // Lazy/hidden images may never fire load — don't block the scroll mask forever.
    window.setTimeout(finish, 2500);
  }

  function initDeepBlueLottie(forceReset) {
    if (!window.lottie) {
      console.warn('[IBM Cognitive] Lottie not loaded.');
      return;
    }

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('.deep-blue__lottie[data-lottie]').forEach(function (container) {
      if (container.dataset.lottieInit === 'true' && !forceReset) {
        return;
      }

      if (container._ibmChessAnim) {
        container._ibmChessAnim.destroy();
        container._ibmChessAnim = null;
      }

      container.innerHTML = '';

      var animation = window.lottie.loadAnimation({
        container: container,
        renderer: 'svg',
        loop: !reducedMotion,
        autoplay: false,
        path: container.dataset.lottie,
      });

      container.dataset.lottieInit = 'true';
      container._ibmChessAnim = animation;

      if (reducedMotion) {
        animation.goToAndStop(0, true);
        return;
      }

      var section = container.closest('.deep-blue');

      if (!section || !window.IntersectionObserver) {
        animation.play();
        return;
      }

      var observer = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              animation.play();
            } else {
              animation.pause();
            }
          });
        },
        { threshold: 0.25 }
      );

      observer.observe(section);
      container._ibmChessObserver = observer;
    });
  }

  function initDeepBlueLineMask(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
      console.warn('[IBM Cognitive] GSAP or ScrollTrigger not loaded.');
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('.deep-blue').forEach(function (section) {
      if (section.dataset.lineMaskInit === 'true' && !forceReset) {
        return;
      }

      var line = section.querySelector('[data-scroll-mask]');

      if (!line) {
        console.warn('[IBM Cognitive] deep-blue line mask element not found.');
        return;
      }

      killSectionTriggers(section);
      section.dataset.lineMaskInit = 'true';

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
              end: 'top 25%',
              scrub: 0.6,
              invalidateOnRefresh: true,
            },
          })
        );

        window.ScrollTrigger.refresh(true);
      });
    });
  }

  function initDeepBlue(forceReset) {
    initDeepBlueLottie(forceReset);
    initDeepBlueLineMask(forceReset);
  }

  function resetAndInit() {
    document.querySelectorAll('.deep-blue__lottie[data-lottie]').forEach(function (container) {
      if (container._ibmChessObserver) {
        container._ibmChessObserver.disconnect();
        container._ibmChessObserver = null;
      }
      delete container.dataset.lottieInit;
    });

    document.querySelectorAll('.deep-blue').forEach(function (section) {
      delete section.dataset.lineMaskInit;
      section.classList.remove('is-line-ready');
    });

    initDeepBlue(true);
  }

  window.IbmCognitiveDeepBlue = {
    init: initDeepBlue,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);

  function boot() {
    if (!document.querySelector('.deep-blue')) {
      return;
    }

    initDeepBlue(false);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

  window.addEventListener('load', resetAndInit);
})(window);
