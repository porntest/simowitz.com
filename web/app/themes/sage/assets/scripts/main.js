// import external dependencies
import 'jquery';

// import local dependencies
import Router from './util/router';
import common from './routes/Common';
import home from './routes/Home';
import aboutUs from './routes/About';
import faq from './routes/FAQ';

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
const routes = {
  // All pages
  common,
  // Home page
  home,
  // About us page, note the change from about-us to aboutUs.
  aboutUs,
  // FAQ page
  faq,
};

// Load Events
jQuery(document).ready(() => {
  new Router(routes).loadEvents();
});
