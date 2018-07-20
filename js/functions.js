jQuery(document).ready(function ($) {
    jQuery('.nav-link').parent('li').removeClass('active');
    jQuery('.product-slider-container').owlCarousel({
        items: 1,
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        animateIn: 'fadeInRight',
        animateOut: 'zoomOutLeft'
    });
    jQuery('.posts-container-slider').owlCarousel({
        items: 3,
        startPosition: 1,
        loop: false,
        margin: 0,
        center: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000
    });
});
wow = new WOW(
    {
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       true,       // default
        live:         true        // default
    }
);
wow.init();

