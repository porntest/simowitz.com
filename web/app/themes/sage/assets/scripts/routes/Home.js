import Flickity from 'flickity';

let heroSlider;
let awardSlider;

export default {

  init() {
    // JavaScript to be fired on the home page
    // const slider = new Flickity('.slider', {
      // cellSelector: '.slider__slide',
      // wrapAround: true,
      // prevNextButtons: false,
      // //  autoPlay: 5000,
    // });
    // slider.resize();
    heroSlider = new Flickity('.slider', {
      cellSelector: '.slider__slide',
      wrapAround: true,
      prevNextButtons: false,
      autoPlay: 6000,
    });
    awardSlider = new Flickity('.awards', {
      cellSelector: '.award',
      wrapAround: true,
      prevNextButtons: false,
      autoPlay: 3000,
      friction: 0.5,
      pageDots: false,
      watchCSS: true,
    });
    // navbar.resizePlaceholder();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    jQuery(window).on('load', () => {
      heroSlider.resize();
      awardSlider.resize();
    });
  },
};
