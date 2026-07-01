/**
 * Seven success factors — node positioning + Lottie icons.
 */
(function (window) {
  'use strict';

  var SVG_W = 812;
  var SVG_H = 582;
  var RING_RATIO = 164 / SVG_W;

  function positionNodes() {
    var diagram = document.querySelector('.ce-diagram');
    if (!diagram) {
      return;
    }

    var containerW = diagram.offsetWidth;
    var ringPx = Math.round(containerW * RING_RATIO);
    var captionW = Math.round(ringPx * 1.1);

    document.querySelectorAll('.ce-node').forEach(function (node) {
      var cx = parseFloat(node.dataset.cx);
      var cy = parseFloat(node.dataset.cy);

      node.style.left = (cx / SVG_W * 100) + '%';
      node.style.top = (cy / SVG_H * 100) + '%';

      var ring = node.querySelector('.ce-icon-ring');
      if (ring) {
        ring.style.setProperty('--ring-size', ringPx + 'px');
      }

      var caption = node.querySelector('.ce-caption');
      if (caption) {
        caption.style.width = captionW + 'px';
      }
    });
  }

  function initLotties(forceReset) {
    if (!window.lottie) {
      console.warn('[IBM Cognitive] Lottie not loaded.');
      return;
    }

    document.querySelectorAll('.ce-lottie[data-lottie]').forEach(function (container) {
      if (container.dataset.lottieInit === 'true' && !forceReset) {
        return;
      }

      if (container._ibmLottieAnim) {
        container._ibmLottieAnim.destroy();
        container._ibmLottieAnim = null;
      }

      container.innerHTML = '';

      var anim = window.lottie.loadAnimation({
        container: container,
        renderer: 'svg',
        loop: false,
        autoplay: true,
        path: container.dataset.lottie,
      });

      container.dataset.lottieInit = 'true';
      container._ibmLottieAnim = anim;

      var ring = container.closest('.ce-icon-ring');
      if (ring) {
        ring.addEventListener('mouseenter', function () {
          anim.stop();
          anim.play();
        });
      }
    });
  }

  function initSevenFactors(forceReset) {
    positionNodes();
    initLotties(forceReset);
  }

  function resetAndInit() {
    document.querySelectorAll('.ce-lottie[data-lottie]').forEach(function (container) {
      if (container._ibmLottieAnim) {
        container._ibmLottieAnim.destroy();
        container._ibmLottieAnim = null;
      }
      delete container.dataset.lottieInit;
    });
    initSevenFactors(true);
  }

  window.IbmCognitiveSevenFactors = {
    init: initSevenFactors,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);
  window.addEventListener('resize', positionNodes);

  function boot() {
    if (document.querySelector('.ce-section')) {
      initSevenFactors(false);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})(window);
