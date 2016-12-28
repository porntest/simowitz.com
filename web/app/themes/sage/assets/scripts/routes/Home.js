import Flickity from 'flickity';

export default {
  init() {
    // JavaScript to be fired on the home page
    const slider = new Flickity('.slider', {
      cellSelector: '.slider__slide',
      wrapAround: true,
      prevNextButtons: false,
      //  autoPlay: 5000,
    });
    slider.resize();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
