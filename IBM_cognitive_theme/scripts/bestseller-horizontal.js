(function () {
  'use strict';

  var globalBound = false;
  var ticking = false;
  var resizeObserver = null;
  var mq = window.matchMedia('(max-width: 820px)');

  function updateWrapper(wrapper) {
    var sticky = wrapper.querySelector('.hs-sticky');
    var track = wrapper.querySelector('.hs-track');

    if (!sticky || !track) {
      return;
    }

    var panels = track.querySelectorAll('.hs-panel');
    var panelCount = panels.length;
    var dots = wrapper.querySelectorAll('.hs-progress span');

    if (panelCount === 0) {
      return;
    }

    if (mq.matches) {
      track.style.transform = 'none';
      return;
    }

    var scrollableDistance = wrapper.offsetHeight - sticky.offsetHeight;

    if (scrollableDistance <= 0) {
      track.style.transform = 'none';
      return;
    }

    var rect = wrapper.getBoundingClientRect();
    var progress = Math.min(Math.max(-rect.top / scrollableDistance, 0), 1);
    var panelWidth = sticky.clientWidth;
    var maxTranslate = (panelCount - 1) * panelWidth;

    track.style.transform = 'translate3d(-' + (progress * maxTranslate) + 'px, 0, 0)';

    if (dots.length) {
      var activeIndex = Math.round(progress * (panelCount - 1));
      dots.forEach(function (dot, i) {
        dot.classList.toggle('is-active', i === activeIndex);
      });
    }
  }

  function updateAll() {
    document.querySelectorAll('.hs-wrapper').forEach(updateWrapper);
  }

  function onScrollOrResize() {
    if (ticking) {
      return;
    }

    ticking = true;
    window.requestAnimationFrame(function () {
      updateAll();
      ticking = false;
    });
  }

  function observeWrappers() {
    if (typeof ResizeObserver === 'undefined') {
      return;
    }

    if (!resizeObserver) {
      resizeObserver = new ResizeObserver(onScrollOrResize);
      resizeObserver.observe(document.documentElement);
    }

    document.querySelectorAll('.hs-wrapper').forEach(function (wrapper) {
      resizeObserver.observe(wrapper);
    });
  }

  function bindGlobal() {
    if (globalBound) {
      observeWrappers();
      return;
    }

    globalBound = true;
    window.addEventListener('scroll', onScrollOrResize, { passive: true });
    window.addEventListener('resize', onScrollOrResize);
    window.addEventListener('load', onScrollOrResize);
    mq.addEventListener('change', onScrollOrResize);
    observeWrappers();
  }

  function initHorizontalScroll(wrapper) {
    var sticky = wrapper.querySelector('.hs-sticky');
    var track = wrapper.querySelector('.hs-track');

    if (!sticky || !track || track.querySelectorAll('.hs-panel').length === 0) {
      return;
    }

    bindGlobal();
    updateWrapper(wrapper);
  }

  function initAll() {
    var wrappers = document.querySelectorAll('.hs-wrapper');

    if (!wrappers.length) {
      return;
    }

    wrappers.forEach(initHorizontalScroll);
    onScrollOrResize();
  }

  window.IbmCognitiveBestsellerHorizontal = {
    init: initAll,
    initWrapper: initHorizontalScroll,
    refresh: initAll,
  };

  document.addEventListener('DOMContentLoaded', initAll);
  document.addEventListener('dev:partials-loaded', function () {
    window.requestAnimationFrame(function () {
      window.requestAnimationFrame(initAll);
    });
  });
})();
