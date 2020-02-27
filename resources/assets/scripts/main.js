// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import 'lightgallery/dist/js/lightgallery-all.min';
import 'lightslider/dist/js/lightslider.min';
import 'magnific-popup/dist/jquery.magnific-popup';
import 'devbridge-autocomplete/dist/jquery.autocomplete.min';
import 'slick-carousel/slick/slick';
import 'aos/dist/aos';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
