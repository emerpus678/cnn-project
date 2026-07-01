/**
 * Map vertical mouse wheel to horizontal scroll inside .bestseller-page.
 */
(function (window) {
  'use strict';

  function initBestsellerHorizontalScroll() {
    document.querySelectorAll('.bestseller-page').forEach(function (panel) {
      if (panel.dataset.horizontalScroll === 'true') {
        return;
      }

      panel.dataset.horizontalScroll = 'true';

      panel.addEventListener(
        'wheel',
        function (event) {
          if (panel.scrollWidth <= panel.clientWidth) {
            return;
          }

          if (Math.abs(event.deltaY) <= Math.abs(event.deltaX)) {
            return;
          }

          var atStart = panel.scrollLeft <= 0;
          var atEnd = panel.scrollLeft + panel.clientWidth >= panel.scrollWidth - 1;

          if ((event.deltaY < 0 && atStart) || (event.deltaY > 0 && atEnd)) {
            return;
          }

          event.preventDefault();
          panel.scrollLeft += event.deltaY;
        },
        { passive: false }
      );
    });
  }

  window.IbmCognitiveBestsellerScroll = {
    init: initBestsellerHorizontalScroll,
  };

  document.addEventListener('dev:partials-loaded', initBestsellerHorizontalScroll);

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initBestsellerHorizontalScroll);
  } else {
    initBestsellerHorizontalScroll();
  }
})(window);
