// import external dependencies
import 'jquery';
import 'jquery.mmenu';
import 'jquery.mmenu/dist/wrappers/wordpress/jquery.mmenu.wordpress.min';
import 'jquery.mmenu/dist/addons/navbars/jquery.mmenu.navbars.min';
import 'jquery.mmenu/dist/addons/offcanvas/jquery.mmenu.offcanvas.min';
import 'jquery.mmenu/dist/addons/fixedelements/jquery.mmenu.fixedelements.min';
import Flickity from 'flickity';
import svgInjector from 'svg-injector';
// import 'headroom.js';
// import 'headroom.js/dist/jQuery.headroom';

// import local dependencies
import Router from './util/router';
import common from './routes/Common';
// import home from './routes/Home';
import aboutUs from './routes/About';
import Hamburger from './components/Hamburger';
import Sticky from './util/header';

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
const routes = {
  // All pages
  common,
  // Home page
  // home,
  // About us page, note the change from about-us to aboutUs.
  aboutUs,
};

// let heroSlider;
// let awardSlider;
let navbar;

// Load Events
jQuery(window).on('load', () => {
  // heroSlider.resize();
  // awardSlider.resize();
  const heroSlider = new Flickity('.slider', {
    cellSelector: '.slider__slide',
    wrapAround: true,
    prevNextButtons: false,
  });
  heroSlider.resize();
  const awardSlider = new Flickity('.awards', {
    cellSelector: '.award',
    wrapAround: true,
    prevNextButtons: false,
    autoPlay: 3000,
    friction: 0.5,
    pageDots: false,
    watchCSS: true,
  });
  awardSlider.resize();
  navbar.resizePlaceholder();
});
jQuery(document).ready(() => {
  svgInjector(document.querySelectorAll('.inject-svg'));
  new Router(routes).loadEvents();
  navbar = new Sticky('.nav-primary', '.slider');
  navbar.init();
  jQuery('.sidebar').mmenu({
    // offCanvas: {
      // position: 'left',
      // zposition: 'front',
    // },
    // navbars: [
      // {
        // position: 'top',
        // content: jQuery('.sidebar__header'),
        // height: 4,
      // },
    // ],
  }, {
    clone: true,
  });
  const menuAPI = jQuery('.sidebar').data('mmenu');
  new Hamburger('.nav-button', {
    animation: 'squeeze',
    onClick: menuAPI.open,
  }).init();
  menuAPI.bind('opened', () => {
    setTimeout(() => $('.nav-button').addClass('is-active'), 50);
  });
  menuAPI.bind('closed', () => {
    setTimeout(() => $('.nav-button').removeClass('is-active'), 50);
  });
  // jQuery('.nav-primary').headroom();
});
