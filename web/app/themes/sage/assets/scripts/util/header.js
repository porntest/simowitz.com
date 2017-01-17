class Sticky {
  constructor(element, trigger) {
    this.element = document.querySelector(element);
    this.trigger = trigger ? document.querySelector(trigger) : undefined;
  }
  init() {
    this.scrollTop = 0;
    this.placeholder = this.element.parentNode.appendChild(document.createElement('div'));
    window.addEventListener('scroll', this.onScroll.bind(this));
    window.addEventListener('resize', this.resizePlaceholder.bind(this));
    window.addEventListener('load', this.onLoad.bind(this));
  }
  resizePlaceholder() {
    const elementHeight = this.element.offsetHeight;
    this.placeholder.style.height = `${elementHeight}px`;
  }
  onLoad() {
    this.resizePlaceholder();
    this.transitionDuration = this.getTransitionMS();
  }
  onScroll() {
    if (window.requestAnimationFrame) {
      requestAnimationFrame(this.hideElement.bind(this));
    } else {
      setTimeout(this.hideElement.bind(this), 250);
    }
  }
  getTransitionMS() {
    const transitionDuration = window.getComputedStyle(this.element).transitionDuration.split(',')[0];
    const transitionUnits = transitionDuration.match(/s|ms/g)[0];
    if (transitionUnits === 's') {
      return transitionDuration.replace(/s/g, '') * 1000;
    }
    return transitionDuration.replace(/ms/g, '');
  }
  hideElement() {
    const previousScrollTop = this.scrollTop;
    const trigger = this.trigger ? this.trigger.getBoundingClientRect().bottom : 0;
    const elementHeight = this.element.offsetHeight;

    if (window.pageYOffset) {
      this.scrollTop = window.pageYOffset;
    } else {
      this.scrollTop = document.body.scrollTop;
    }

    if (this.scrollTop > previousScrollTop && trigger - elementHeight <= 0) {
      // Hide Element
      this.element.classList.add('header--hidden');
      this.element.style.transform = `translateY(-${elementHeight}px)`;
      // setTimeout(() => {
        // // this.element.style.boxShadow = 'none';
      // }, this.transitionDuration);
    } else {
      // Show Element
      this.element.classList.remove('header--hidden');
      this.element.style.transform = '';
      // this.element.style.boxShadow = '';
    }
  }
}

export default Sticky;
