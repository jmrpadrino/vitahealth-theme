function post_show(id) {
    "use strict";
    jQuery.ajax({
        url : vitahealthAjax.ajax_url,
        type : 'post',
        data : {
            id_post : id,
            action : 'vitahealthAjax_post'
        },
        beforeSend: function(){
            jQuery('.post-ajax-container').html('<div id="loader"><div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div></div>');
            jQuery('#post-' + id + ' .archive-item-container').addClass('activo');
        },
        success : function( response ) {
            jQuery('#loader').remove();
            jQuery('.posts-container-slider .iten').removeClass('activo');

            jQuery('.post-ajax-container').html(response);
        }
    });
}

function change_month(month) {
    "use strict";
    jQuery('.month-container li a').removeClass('active');
    jQuery('#month-' + month).addClass('active');
    jQuery('.posts-container-slider').owlCarousel('destroy');
    jQuery.ajax({
        url : vitahealthAjax.ajax_url,
        type : 'post',
        data : {
            month : month,
            action : 'vitahealthAjax_posts_fetcher'
        },
        beforeSend: function(){
            jQuery('.post-ajax-container').html('');
            jQuery('.posts-container-slider').html('');
            jQuery('.posts-container-slider').html('<div id="loader"><div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div></div>');
        },
        success : function( response ) {
            jQuery('#loader').remove();
            jQuery('.posts-container-slider').html(response);
            jQuery('.posts-container-slider').owlCarousel({
                items: 3,
                loop: false,
                margin: 0,
                center: false,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000
            });
        }
    });
}
