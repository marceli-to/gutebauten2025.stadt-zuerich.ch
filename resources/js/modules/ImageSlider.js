import { gsap } from "gsap";

export default class ImageSlider {
  constructor(container) {
    this.container = container;
    this.track = container.querySelector('[data-slider-track]');
    this.originalSlides = [...this.track.children];
    this.slides = [];
    this.actualIndex = 0;
    this.x = 0;
    this.speed = this.container.clientWidth * 0.04;
    this.isTransitioning = false;
    this.lastTime = null;
    this.isPaused = false;

    this.lastContainerWidth = this.container.clientWidth;
  }

  init() {
    this.cloneSlides();
    this.measureSlides();
    this.setup();
    this.setupResizeObserver();
    this.setupTouch();
    this.setupAccessibility();

    this.actualIndex = this.originalSlides.length;
    const targetSlide = this.slides[this.actualIndex];
    const offset = this.getSlideOffset(targetSlide);
    this.x = offset;
    gsap.set(this.track, { x: -Math.round(this.x) });

    requestAnimationFrame((t) => this.animate(t));
  }

  cloneSlides() {
    const fragment = document.createDocumentFragment();
    this.originalSlides.forEach(slide => {
      fragment.appendChild(slide.cloneNode(true));
    });
    this.track.prepend(fragment.cloneNode(true));
    this.track.append(fragment.cloneNode(true));
    this.slides = [...this.track.children];
  }

  measureSlides() {
    this.slideWidths = this.slides.map(slide => slide.getBoundingClientRect().width);
    this.totalWidth = this.slideWidths.reduce((sum, w) => sum + w, 0);
    this.sectionWidth = this.totalWidth / 3;
  }

  setupResizeObserver() {
    let resizeTimeout;
    
    const resizeObserver = new ResizeObserver(() => {
      clearTimeout(resizeTimeout);
      this.isPaused = true;
      
      // Hide container during resize
      gsap.to(this.container, { opacity: 0.1, duration: 0.2 });
      
      resizeTimeout = setTimeout(() => {
        this.rebuildSlider();
      }, 150);
    });

    resizeObserver.observe(this.container);
  }

  rebuildSlider() {
    // Store current state - find which original slide we're closest to
    const currentIndex = this.actualIndex - this.originalSlides.length;
    
    // Stop everything
    gsap.killTweensOf(this.track);
    this.isTransitioning = false;
    
    // Clear the track completely
    this.track.innerHTML = '';
    
    // Rebuild from original slides
    this.originalSlides.forEach(slide => {
      this.track.appendChild(slide);
    });
    
    // Reinitialize everything from scratch
    this.cloneSlides();
    this.measureSlides();
    
    // Position to the same relative slide in the middle section
    this.actualIndex = this.originalSlides.length + Math.max(0, Math.min(currentIndex, this.originalSlides.length - 1));
    const targetSlide = this.slides[this.actualIndex];
    
    if (targetSlide) {
      const offset = this.getSlideOffset(targetSlide) - (this.container.clientWidth - targetSlide.clientWidth) / 2;
      this.x = offset;
      gsap.set(this.track, { x: -Math.round(this.x) });
      this.updateHighlight();
    }
    
    // Update speed based on new container width
    this.speed = this.container.clientWidth * 0.04;
    this.lastContainerWidth = this.container.clientWidth;
    this.isPaused = false;
    
    // Show container again after rebuild is complete
    gsap.to(this.container, { opacity: 1, duration: 0.3 });
    
    // Debug output
    this.debugResize();
  }

  debugResize() {
    console.log('=== RESIZE REBUILD DEBUG ===');
    console.log('Container width:', this.container.clientWidth);
    console.log('Track width:', this.track.scrollWidth);
    console.log('Total calculated width:', this.totalWidth);
    console.log('Section width:', this.sectionWidth);
    console.log('Current x:', this.x);
    console.log('Actual index:', this.actualIndex);
    console.log('Slide widths:', this.slideWidths);
    console.log('Slides count:', this.slides.length);
  }

  setup() {
    this.container.querySelector('#nextBtn').addEventListener('click', () => this.next());
    this.container.querySelector('#prevBtn').addEventListener('click', () => this.prev());

    this.container.setAttribute('tabindex', 0);
    this.container.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') this.next();
      if (e.key === 'ArrowLeft') this.prev();
    });
  }

  setupTouch() {
    let startX = 0;

    this.container.addEventListener('touchstart', e => {
      startX = e.touches[0].clientX;
    });

    this.container.addEventListener('touchend', e => {
      const endX = e.changedTouches[0].clientX;
      const dx = endX - startX;

      if (Math.abs(dx) > 50) {
        dx > 0 ? this.prev() : this.next();
      }
    });
  }

  setupAccessibility() {
    this.track.setAttribute('aria-live', 'polite');
    this.slides.forEach((slide, index) => {
      slide.setAttribute('role', 'group');
      slide.setAttribute('aria-label', `Slide ${index + 1}`);
    });
  }

  next() {
    if (this.isTransitioning) return;
    const centered = this.getCurrentCenteredSlideIndex();
    if (centered !== -1) {
      this.actualIndex = centered + 1;
      this.goToActualSlide(this.actualIndex, true, true);
    }
  }

  prev() {
    if (this.isTransitioning) return;
    const centered = this.getCurrentCenteredSlideIndex();
    if (centered !== -1) {
      this.actualIndex = centered - 1;
      this.goToActualSlide(this.actualIndex, true, true);
    }
  }

  goToActualSlide(slideIndex, animate = true, center = false) {
    const targetSlide = this.slides[slideIndex];
    if (!targetSlide) return;

    let offset = this.getSlideOffset(targetSlide);
    if (center) {
      offset -= (this.container.clientWidth - targetSlide.clientWidth) / 2;
    }

    if (animate) {
      this.isTransitioning = true;
      const proxy = { val: this.x };
      gsap.to(proxy, {
        val: offset,
        duration: 1,
        ease: 'power1.inOut',
        roundProps: 'val',
        onUpdate: () => {
          this.x = proxy.val;
          gsap.set(this.track, { x: -Math.round(this.x) });
          this.updateHighlight();
        },
        onComplete: () => {
          this.checkAndReposition();
          this.isTransitioning = false;
          this.updateHighlight();
        }
      });
    } else {
      this.x = offset;
      gsap.set(this.track, { x: -Math.round(this.x) });
      this.updateHighlight();
    }
  }

  checkAndReposition() {
    const count = this.originalSlides.length;
    if (this.actualIndex >= count * 2) {
      this.actualIndex -= count;
      this.repositionToSlide(this.actualIndex);
    } else if (this.actualIndex < count) {
      this.actualIndex += count;
      this.repositionToSlide(this.actualIndex);
    }
  }

  repositionToSlide(index) {
    const target = this.slides[index];
    const offset = this.getSlideOffset(target) - (this.container.clientWidth - target.clientWidth) / 2;
    this.x = offset;
    gsap.set(this.track, { x: -Math.round(this.x) });
    this.updateHighlight();
  }

  updateHighlight() {
    const containerRect = this.container.getBoundingClientRect();
    let activeSlide = null;

    this.slides.forEach(slide => {
      const rect = slide.getBoundingClientRect();
      const visibleWidth = Math.max(0, Math.min(rect.right, containerRect.right) - Math.max(rect.left, containerRect.left));
      const visibilityRatio = visibleWidth / rect.width;

      if (visibilityRatio >= 0.8 && !activeSlide) {
        activeSlide = slide;
      }
    });

    this.slides.forEach(slide => slide.classList.remove('highlight'));
    if (activeSlide) activeSlide.classList.add('highlight');
  }

  getCurrentCenteredSlideIndex() {
    const containerRect = this.container.getBoundingClientRect();

    for (let i = 0; i < this.slides.length; i++) {
      const rect = this.slides[i].getBoundingClientRect();
      const visibleWidth = Math.max(0, Math.min(rect.right, containerRect.right) - Math.max(rect.left, containerRect.left));
      const visibilityRatio = visibleWidth / rect.width;

      if (visibilityRatio >= 0.8) {
        return i;
      }
    }

    return -1;
  }

  animate(timestamp) {
    if (!this.lastTime) this.lastTime = timestamp;
    const delta = timestamp - this.lastTime;
    this.lastTime = timestamp;

    if (!this.isTransitioning && !this.isPaused) {
      this.x += (this.speed * delta / 1000);
      if (this.x >= this.sectionWidth * 2) this.x -= this.sectionWidth;
      if (this.x < 0) this.x += this.sectionWidth;
    }

    gsap.set(this.track, { x: -Math.round(this.x) });
    this.updateHighlight();

    requestAnimationFrame((t) => this.animate(t));
  }

  getSlideOffset(slide) {
    const trackRect = this.track.getBoundingClientRect();
    const slideRect = slide.getBoundingClientRect();
    return slideRect.left - trackRect.left + this.track.scrollLeft;
  }

  logState() {
    console.log({
      actualIndex: this.actualIndex,
      x: this.x,
      centeredIndex: this.getCurrentCenteredSlideIndex(),
    });
  }
}