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

    var ring = container.closest('.ce-icon-ring');

    if (ring) {
      ring.addEventListener('mouseenter', function () {
        anim.stop();
        anim.play();
      });
    }

    return anim;
  }

  function initLooties2() {
    if (!window.lottie || !document.querySelector('.ce-diagram-svg')) {
      return;
    }

    var lottieBase = getLottieBase();

    Object.keys(FILES).forEach(function (key) {
      var path = lottieBase + FILES[key];

      loadLottie('lottie-' + key, path);
      loadLottie('lottie-' + key + '-m', path);
    });
  }

  function resetAndInit() {
    document.querySelectorAll('.ce-lottie').forEach(function (container) {
      delete container.dataset.lottieInit;
      container.innerHTML = '';
    });
    initLooties2();
  }

  window.IbmCognitiveLooties2 = {
    init: initLooties2,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);

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
