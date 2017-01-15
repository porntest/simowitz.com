class Fold {
  constructor(element) {
    this.element = element;
    this.header = this.element.firstElementChild;
    this.panel = this.element.lastElementChild;
    this.state = {
      open: false,
    };
  }
  init() {
    this.element.classList.add('accordion__fold');
    this.panel.classList.add('accordion__panel');
    this.header.classList.add('accordion__header');
    this.header.addEventListener('click', this.onClick.bind(this));
  }
  onClick() {
    if (this.state.open) {
      this.collapse();
    } else {
      this.expand();
    }
    this.state.open = !this.state.open;
  }
  collapse() {
    this.element.classList.remove('accordion__fold--expanded');
    this.panel.classList.remove('accordion__panel--expanded');
  }
  expand() {
    this.element.classList.add('accordion__fold--expanded');
    this.panel.classList.add('accordion__panel--expanded');
  }
}

class Accordion {
  constructor(element) {
    this.element = document.querySelector(element);
    this.folds = this.element.children;
  }
  init() {
    for (let i = 0; i < this.folds.length; i += 1) {
      new Fold(this.folds[i]).init();
    }
  }
}

export default Accordion;
