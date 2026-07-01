/**
 * Loads HTML partials into a container for local static development.
 * Requires a local server (e.g. python -m http.server) — file:// blocks fetch().
 */
const DevLoader = {
  async load(partials, containerSelector) {
    const container = document.querySelector(containerSelector);

    if (!container) {
      throw new Error(`Container not found: ${containerSelector}`);
    }

    for (const partial of partials) {
      const response = await fetch(partial);

      if (!response.ok) {
        throw new Error(`Failed to load ${partial}: ${response.status}`);
      }

      container.insertAdjacentHTML('beforeend', await response.text());
    }

    document.dispatchEvent(new CustomEvent('dev:partials-loaded'));
  },
};
