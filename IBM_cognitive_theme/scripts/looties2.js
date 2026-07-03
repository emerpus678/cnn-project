/**
 * Seven success factors — inline SVG diagram + Lottie icons (looties2).
 */
(function (window) {
  'use strict';

  var FILES = {
    darwin: 'IBM_Icon_Darwin_V1.json',
    data: 'IBM_Icon_Data_V1.json',
    architect: 'IBM_Icon_Architect_V1.json',
    ai: 'IBM_Icon_AI_V1.json',
    agile: 'IBM_Icon_Agile_V1.json',
    talent: 'IBM_Icon_Talent_V1.json',
    exptech: 'ExponentialTech.json',
  };

  // Matches looties.css — diagram is desktop-only above 640px.
  var mqDesktop = window.matchMedia('(min-width: 641px)');

  function getLottieBase() {
    var section = document.querySelector('.ce-section[data-lottie-base]');

    if (section) {
      return section.getAttribute('data-lottie-base');
    }

    var script = document.querySelector('script[src*="looties2.js"]');

    if (script && script.src) {
      return new URL('../assets/animations/Animation/', script.src).href;
    }

    return new URL('../assets/animations/Animation/', window.location.href).href;
  }

  function loadLottie(containerId, path) {
    var container = document.getElementById(containerId);

    if (!container || container.dataset.lottieInit === 'true' || !window.lottie) {
      return null;
    }

    container.dataset.lottieInit = 'true';

    var anim = window.lottie.loadAnimation({
      container: container,
      renderer: 'svg',
      loop: false,
      autoplay: true,
      path: path,
    });

    container._lottieAnim = anim;

    var ring = container.closest('.ce-icon-ring');

    if (ring && !ring.dataset.lottieHoverBound) {
      ring.dataset.lottieHoverBound = 'true';
      ring.addEventListener('mouseenter', function () {
        var lottieEl = ring.querySelector('.ce-lottie');

        if (lottieEl && lottieEl._lottieAnim) {
          lottieEl._lottieAnim.stop();
          lottieEl._lottieAnim.play();
        }
      });
    }

    return anim;
  }

  function clearLotties() {
    document.querySelectorAll('.ce-lottie').forEach(function (container) {
      if (container._lottieAnim) {
        container._lottieAnim.destroy();
        container._lottieAnim = null;
      }

      delete container.dataset.lottieInit;
      container.innerHTML = '';
    });
  }

  function initLooties2() {
    if (!window.lottie || !document.querySelector('.ce-diagram-svg')) {
      return;
    }

    clearLotties();

    if (!mqDesktop.matches) {
      return;
    }

    var lottieBase = getLottieBase();

    Object.keys(FILES).forEach(function (key) {
      loadLottie('lottie-' + key, lottieBase + FILES[key]);
    });
  }

  function resetAndInit() {
    initLooties2();
  }

  window.IbmCognitiveLooties2 = {
    init: initLooties2,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);
  mqDesktop.addEventListener('change', resetAndInit);

  function boot() {
    if (document.querySelector('.ce-diagram-svg')) {
      initLooties2();
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})(window);
