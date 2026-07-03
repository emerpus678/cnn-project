// Dev loader for local static development.
const DevLoader = {
  getHtmlBase() {
    const path = window.location.pathname;
    const htmlMarker = '/html/';

    if (path.includes(htmlMarker)) {
      return window.location.origin + path.slice(0, path.indexOf(htmlMarker) + htmlMarker.length);
    }

    return new URL('./', window.location.href).href;
  },

  getThemeBase() {
    const path = window.location.pathname;
    const htmlMarker = '/html/';

    if (path.includes(htmlMarker)) {
      return window.location.origin + path.slice(0, path.indexOf(htmlMarker));
    }

    return new URL('../', window.location.href).href;
  },

  resolveAssetPaths(html) {
    const assetsRoot = new URL('assets/', this.getThemeBase()).pathname;

    return html.replace(/\.\.\/assets\//g, assetsRoot.endsWith('/') ? assetsRoot : `${assetsRoot}/`);
  },

  resolvePartialUrl(partial) {
    return new URL(partial, this.getHtmlBase()).href;
  },

  async load(partials, containerSelector, options) {
    options = options || {};
    const container = document.querySelector(containerSelector);

    if (!container) {
      throw new Error(`Container not found: ${containerSelector}`);
    }

    for (const partial of partials) {
      const response = await fetch(this.resolvePartialUrl(partial));

      if (!response.ok) {
        throw new Error(`Failed to load ${partial}: ${response.status}`);
      }

      container.insertAdjacentHTML('beforeend', this.resolveAssetPaths(await response.text()));
    }

    if (options.notify !== false) {
      document.dispatchEvent(new CustomEvent('dev:partials-loaded'));
    }
  },
};
