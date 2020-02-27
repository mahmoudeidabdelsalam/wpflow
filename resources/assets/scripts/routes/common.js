import AOS from 'aos/dist/aos';

export default {
  init() {

    // JavaScript to be fired on all pages
    AOS.init();

    // Inline popups
    $('.inline-popups').magnificPopup({
      delegate: 'a',
      removalDelay: 500, //delay removal by X to allow out-animation
      callbacks: {
        beforeOpen: function () {
          this.st.mainClass = this.st.el.attr('data-effect');
        },
      },
      midClick: 'true',
    });
    
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
