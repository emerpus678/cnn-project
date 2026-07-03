/**
 * Running numbers — count up on scroll into view (.ibm-numbers).
 */
(function (window) {
  'use strict';

  var SECTION_SELECTOR = '.ibm-numbers';

  function getSuffix(el) {
    return el.getAttribute('data-counter-suffix') || '';
  }

  function getPrefix(el) {
    return el.getAttribute('data-counter-prefix') || '';
  }

  function formatValue(el, value) {
    return getPrefix(el) + Math.round(value) + getSuffix(el);
  }

  function killSectionAnimations(section) {
    if (section._ibmCounterTweens) {
      section._ibmCounterTweens.forEach(function (tween) {
        tween.kill();
      });
      section._ibmCounterTweens = [];
    }

    if (section._ibmCounterTrigger) {
      section._ibmCounterTrigger.kill();
      section._ibmCounterTrigger = null;
    }

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

  function playCounters(section, counters) {
    if (section.dataset.countersPlayed === 'true') {
      return;
    }

    section.dataset.countersPlayed = 'true';
    section._ibmCounterTweens = section._ibmCounterTweens || [];

    counters.forEach(function (el) {
      var target = parseInt(el.getAttribute('data-counter-target'), 10) || 0;
      var counter = { value: 0 };

      el.textContent = formatValue(el, 0);

      var tween = window.gsap.to(counter, {
        value: target,
        duration: 2,
        ease: 'power2.out',
        onUpdate: function () {
          el.textContent = formatValue(el, counter.value);
        },
      });

      section._ibmCounterTweens.push(tween);
    });
  }

  function isSectionInView(section) {
    var rect = section.getBoundingClientRect();
    var threshold = window.innerHeight * 0.8;

    return rect.top < threshold && rect.bottom > 0;
  }

  function initCounters(forceReset) {
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') {
      console.warn('[IBM Cognitive] GSAP or ScrollTrigger not loaded.');
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll(SECTION_SELECTOR).forEach(function (section) {
      if (section.dataset.countersInit === 'true' && !forceReset) {
        return;
      }

      var counters = section.querySelectorAll('[data-counter]');

      if (!counters.length) {
        return;
      }

      killSectionAnimations(section);
      delete section.dataset.countersPlayed;
      section.dataset.countersInit = 'true';

      if (reducedMotion) {
        counters.forEach(function (el) {
          var target = parseInt(el.getAttribute('data-counter-target'), 10) || 0;
          el.textContent = formatValue(el, target);
        });
        return;
      }

      counters.forEach(function (el) {
        el.textContent = formatValue(el, 0);
      });

      section._ibmCounterTrigger = window.ScrollTrigger.create({
        trigger: section,
        start: 'top 80%',
        once: true,
        invalidateOnRefresh: true,
        onEnter: function () {
          playCounters(section, counters);
        },
      });

      window.ScrollTrigger.refresh(true);

      if (isSectionInView(section)) {
        playCounters(section, counters);
      }
    });
  }

  function resetAndInit() {
    document.querySelectorAll(SECTION_SELECTOR).forEach(function (section) {
      killSectionAnimations(section);
      delete section.dataset.countersInit;
      delete section.dataset.countersPlayed;
    });

    initCounters(true);
  }

  window.IbmCognitiveCounters = {
    init: initCounters,
    resetAndInit: resetAndInit,
  };

  document.addEventListener('dev:partials-loaded', function () {
    window.requestAnimationFrame(function () {
      window.requestAnimationFrame(resetAndInit);
    });
  });

  function boot() {
    if (document.querySelector(SECTION_SELECTOR)) {
      initCounters(false);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

  window.addEventListener('load', resetAndInit);
})(window);
