class Sticky {
  constructor(element, trigger) {
    this.element = document.querySelector(element);
    this.trigger = document.querySelector(trigger);
  }
  init() {
    this.scrollTop = 0;
    window.addEventListener('scroll', this.onScroll.bind(this));
    this.placeholder = this.element.parentNode.appendChild(document.createElement('div'));
    this.resizePlaceholder();
    window.addEventListener('resize', this.resizePlaceholder.bind(this));
  }
  resizePlaceholder() {
    const elementHeight = this.element.offsetHeight;
    this.placeholder.style.height = `${elementHeight}px`;
  }
  onScroll() {
    if (window.requestAnimationFrame) {
      requestAnimationFrame(this.hideElement.bind(this));
    } else {
      setTimeout(this.hideElement.bind(this), 250);
    }
  }
  hideElement() {
    const previousScrollTop = this.scrollTop;
    const trigger = this.trigger.getBoundingClientRect().bottom;
    const elementHeight = this.element.offsetHeight;

    // this.resizePlaceholder();

    if (window.pageYOffset) {
      this.scrollTop = window.pageYOffset;
    } else {
      this.scrollTop = document.body.scrollTop;
    }

    if (this.scrollTop > previousScrollTop && trigger - elementHeight <= 0) {
      this.element.style.transform = `translateY(-${elementHeight}px)`;
    } else {
      this.element.style.transform = '';
    }
  }
}

export default Sticky;
