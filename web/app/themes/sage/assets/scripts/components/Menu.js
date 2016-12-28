import $ from 'jquery';

export default class Menu {
  constructor(selector, hamburger) {
    this.element = $(selector);
    this.hamburger = hamburger;
  }
  onClick() {
    this.element.toggleClass('is-active');
  }
  init() {
    this.hamburger.init();
  }
}
