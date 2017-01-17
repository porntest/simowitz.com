import 'jquery';
import 'jquery.mmenu';
import 'jquery.mmenu/dist/wrappers/wordpress/jquery.mmenu.wordpress.min';
import 'jquery.mmenu/dist/addons/navbars/jquery.mmenu.navbars.min';
import 'jquery.mmenu/dist/addons/offcanvas/jquery.mmenu.offcanvas.min';
import 'jquery.mmenu/dist/addons/fixedelements/jquery.mmenu.fixedelements.min';
import svgInjector from 'svg-injector';
import Hamburger from '../components/Hamburger';
import Sticky from '../util/header';

export default {
  init() {
    // JavaScript to be fired on all pages
    const mobileMenu = jQuery('.nav-primary');
    svgInjector(document.querySelectorAll('.inject-svg'));
    new Sticky('nav.header', '.slider').init();
    mobileMenu.mmenu({}, {
      clone: true,
    });
    const menuAPI = jQuery('.nav-primary').data('mmenu');
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
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    // jQuery(window).on('load', () => {
      // navbar.resizePlaceholder();
    // });
  },
};
