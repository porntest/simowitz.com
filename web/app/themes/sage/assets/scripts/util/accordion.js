class Fold {
  constructor(element) {
    this.element = element;
    this.header = this.element.firstElementChild;
    this.panel = this.element.lastElementChild;
    this.state = {
      open: false,
    };
  }
  get open() {
    return this.state.open;
  }
  set open(value) {
    this.state.open = value;
    if (this.state.open) {
      this.expand();
    } else {
      this.collapse();
    }
  }
  init() {
    this.element.classList.add('accordion__fold');
    this.panel.classList.add('accordion__panel');
    this.header.classList.add('accordion__header');
    // this.header.addEventListener('click', () => { this.open = !this.state.open; });
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
    this.folds = [];
    this.state = {
    };
  }
  init() {
    this.createFolds();
    this.element.addEventListener('click', this.onClick.bind(this));
  }
  onClick(e) {
    this.folds.filter((fold) => {
      if (fold.header === e.target) {
        fold.open = !fold.open;//eslint-disable-line
        return fold;
      }
      fold.open = false;//eslint-disable-line
      return false;
    });
  }
  createFolds() {
    for (let i = 0; i < this.element.children.length; i += 1) {
      const fold = new Fold(this.element.children[i]);
      fold.init();
      this.folds.push(fold);
    }
  }
}


export default Accordion;
