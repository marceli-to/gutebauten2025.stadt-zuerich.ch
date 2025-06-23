document.addEventListener('DOMContentLoaded', function() {
  function isTouchDevice() {
    return 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
  }

  const html = document.documentElement;
  if (isTouchDevice()) {
    html.classList.add('is-touch');
  } else {
    html.classList.add('no-touch');
  }
});
