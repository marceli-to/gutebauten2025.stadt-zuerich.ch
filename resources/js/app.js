import './bootstrap';
import './modules/touch';

import ImageSlider from './modules/ImageSlider';
document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('[data-slider]');
  if (container) {
    const slider = new ImageSlider(container);
    slider.init();
  }
});
