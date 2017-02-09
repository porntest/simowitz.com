class Sticky {
  constructor(element, trigger) {
    this.element = document.querySelector(element);
    this.trigger = trigger ? document.querySelector(trigger) : undefined;
  }
  init() {
    this.scrollTop = 0;
    this.trigger.style.position = 'relative';
    window.addEventListener('scroll', this.onScroll.bind(this));
    window.addEventListener('load', this.onLoad.bind(this));
    window.addEventListener('resize', this.onResize.bind(this));
  }
  resizeElementWidth() {
    this.element.style.width = this.trigger.offsetWidth + 'px';
  }
  onResize() {
    this.resizeElementWidth();
  }
  onLoad() {
    this.resizeElementWidth();
  }
  onScroll() {
    if (window.requestAnimationFrame) {
      requestAnimationFrame(this.makeSticky.bind(this));
    } else {
      setTimeout(this.makeSticky.bind(this), 250);
    }
  }
  makeSticky() {
    const trigger = this.trigger.getBoundingClientRect();

    if (window.pageYOffset) {
      this.scrollTop = window.pageYOffset;
    } else {
      this.scrollTop = document.body.scrollTop;
    }

    if (trigger.top <= 0 && trigger.bottom - window.innerHeight > 0) {
      this.element.style.position = 'fixed';
      this.element.style.top = '0px';
      this.element.style.bottom = '';
    }

    if (trigger.bottom - window.innerHeight <= 0) {
      this.element.style.position = 'absolute';
      this.element.style.top = '';
      this.element.style.bottom = window.innerHeight - this.element.offsetHeight + 'px';
    }

    if (trigger.top > 0) {
      this.element.style.position = '';
      this.element.style.top = '';
      this.element.style.bottom = '';
    }
  }
}

export default Sticky;
