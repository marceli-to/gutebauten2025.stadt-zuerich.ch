import { gsap } from "gsap";

export default class ImageSlider {
  constructor(container) {
    this.container = container;
    this.track = container.querySelector('#track');
    this.originalSlides = [...this.track.children];
    this.slides = [];
    this.actualIndex = 0;
    this.x = 0;
    this.speed = this.container.clientWidth * 0.02;
    this.isTransitioning = false;
    this.lastTime = null;
  }

  init() {
    this.cloneSlides();
    this.measureSlides();
    this.setup();
    this.setupResizeHandler();

    this.actualIndex = this.originalSlides.length;
    const targetSlide = this.slides[this.actualIndex];
    const offset = targetSlide.offsetLeft;
    this.x = offset;
    gsap.set(this.track, { x: -this.x });

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

  setupResizeHandler() {
    let resizeTimeout;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        this.measureSlides();
        this.repositionToSlide(this.actualIndex);
      }, 200);
    });
  }

  setup() {
    this.container.querySelector('#nextBtn').addEventListener('click', () => this.next());
    this.container.querySelector('#prevBtn').addEventListener('click', () => this.prev());
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

    let offset = targetSlide.offsetLeft;
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
        onUpdate: () => {
          this.x = proxy.val;
          gsap.set(this.track, { x: -this.x });
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
      gsap.set(this.track, { x: -this.x });
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
    const offset = target.offsetLeft - (this.container.clientWidth - target.clientWidth) / 2;
    this.x = offset;
    gsap.set(this.track, { x: -this.x });
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

    if (!this.isTransitioning) {
      this.x += (this.speed * delta / 1000);
      if (this.x >= this.sectionWidth * 2) this.x -= this.sectionWidth;
      if (this.x < 0) this.x += this.sectionWidth;
    }

    gsap.set(this.track, { x: -this.x });
    this.updateHighlight();

    requestAnimationFrame((t) => this.animate(t));
  }
}
