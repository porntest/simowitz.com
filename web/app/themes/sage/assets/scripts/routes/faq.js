import Accordion from '../util/accordion';

export default {
  init() {
    window.addEventListener('load', () => {
      new Accordion('.accordion').init();
    });
  },
};
