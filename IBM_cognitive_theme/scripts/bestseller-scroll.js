/**
 * Map vertical mouse wheel to horizontal scroll inside .bestseller-page.
 */
(function (window) {
  'use strict';

  function canScrollHorizontally(panel) {
    return panel.scrollWidth > panel.clientWidth + 2;
  }

  function initBestsellerHorizontalScroll(forceReset) {
    document.querySelectorAll('.bestseller-page').forEach(function (panel) {
      if (panel.dataset.horizontalScroll === 'true' && !forceReset) {
        return;
      }

      panel.dataset.horizontalScroll = 'true';

      panel.addEventListener(
        'wheel',
        function (event) {
          if (!canScrollHorizontally(panel)) {
            return;
          }

          var delta =
            Math.abs(event.deltaX) > Math.abs(event.deltaY) ? event.deltaX : event.deltaY;

          if (!delta) {
            return;
          }

          var atStart = panel.scrollLeft <= 1;
          var atEnd =
            panel.scrollLeft + panel.clientWidth >= panel.scrollWidth - 2;
          var standalone = document.body.classList.contains('bestseller-horizontal-page');

          if (!standalone && ((delta > 0 && atEnd) || (delta < 0 && atStart))) {
            return;
          }

          if (standalone && delta > 0 && atEnd) {
            event.preventDefault();
            return;
          }

          if (standalone && delta < 0 && atStart) {
            event.preventDefault();
            return;
          }

          event.preventDefault();
          panel.scrollLeft += delta;
        },
        { passive: false }
      );
    });
  }

  function resetAndInit() {
    document.querySelectorAll('.bestseller-page').forEach(function (panel) {
      delete panel.dataset.horizontalScroll;
    });
    initBestsellerHorizontalScroll(true);
  }

  window.IbmCognitiveBestsellerScroll = {
    init: initBestsellerHorizontalScroll,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', resetAndInit);

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initBestsellerHorizontalScroll(false);
    });
  } else {
    initBestsellerHorizontalScroll(false);
  }
})(window);
