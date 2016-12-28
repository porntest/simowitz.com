import $ from 'jquery';

const burgerBox = `<span class="hamburger-box">
                   <span class="hamburger-inner"></span>
                   </span>`;

export default class Hamburger {
  constructor(selector, settings) {
    this.element = $(selector);
    this.settings = settings;
  }
  onClick() {
    this.settings.onClick();
  }
  init() {
    this.element.append(burgerBox);
    this.element.click(this.onClick.bind(this));
    this.element.addClass('hamburger');
    this.element.addClass(`hamburger--${this.settings.animation}`);
  }
}
