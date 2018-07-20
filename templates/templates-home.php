<?php
/**
* Template Name: Template para Inicio
*
* @package Vita Health
* @subpackage vitahealth-mk01-theme
* @since Mk. 1.0
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<main class="container-fluid p-0" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row no-gutters">

        <div id="fullpage" class="col-12">
            <div class="section page-section page-odd first-screen col-12" role="article" itemscope itemtype="http://schema.org/BlogPosting" data-anchor="inicio">
                <div class="container">
                    <div class="row">
                        <div class="hero-section col-12 col-xl-5 col-lg-5 ml-md-auto">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/about-slogan.png" alt="<?php _e('slogan', 'vitahealth'); ?>" class="img-fluid wow fadeIn delay-2" />
                        </div>
                    </div>
                </div>
            </div>
            <!--div class="section page-section page-even page-about col-12" role="article" itemscope itemtype="http://schema.org/BlogPosting" data-anchor="nosotros">
<div class="container">
<div class="row">
<div class="about-section col-12 col-md-12 col-lg-4 col-xl-4 wow1 fadeIn delay-1">
<h2>Nuestra Empresa</h2>
<p>Somos una empresa empeñada en la elaboración de bebidas y suplementos, <strong>100% naturales</strong>, destinados a potenciar y mejorar la calidad de vida de nuestros clientes.</p>
</div>
<div class="about-section col-12 col-md-12 col-lg-4 col-xl-4 wow1 fadeIn delay-2">
<h2>Misión</h2>
<p>Contribuir con el bienestar de nuestros clientes, a través de la fabricación de productos de alta calidad, naturales y orgánicos, que permitan elevar su calidad de vida.</p>
<p>Los procesos y gestión de VitaHealth se traducen en rentabilidad socialmente responsable, para todos sus stakeholders.</p>
</div>
<div class="about-section col-12 col-md-12 col-lg-4 col-xl-4 wow1 fadeIn delay-3">
<h2>Visión</h2>
<p>Ser una empresa líder en Latinoamérica en la producción de bebidas e insumos naturales que ayuden a mejorar la calidad de vida de las personas.</p>
</div>
</div>
</div>
</div-->
            <div class="section page-section page-even page-about col-12" role="article" itemscope itemtype="http://schema.org/BlogPosting" data-anchor="nosotros">
                <div class="container">
                    <div class="row">
                        <div class="about-section col-12 col-md-12 col-lg-6 col-xl-6 offset-lg-3 offset-xl-3 wow1 fadeIn delay-1">
                            <h2>El mundo actual<br />no se detiene</h2>
                            <p>Todos los d&iacute;as innovaciones, inventos y descubrimientos se abren camino gracias a la ciencia y tecnolog&iacute;a.</p>
                            <p>En Vitahealth estamos a la par de estos importantes avances y gracias a la biotecnolog&iacute;a y a la diversidad de nuestro pa&iacute;s, hemos logrado desarrollar productos con la m&aacute;xima calidad y cuyo principal objetivo y beneficio es proporcionar bienestar, belleza y salud.</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php $args = array('post_type' => 'product', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'date'); ?>
            <?php query_posts($args); ?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); global $post; ?>

            <?php $images = rwmb_meta( 'rw_product_bg', array( 'size' => 'full' ) ); foreach ( $images as $image ) { $image_bg = $image['full_url']; } ?>
            <div class="section page-section odd page-product page-product-<?php echo $i; ?> col-12" data-anchor="<?= $post->post_name; ?>">
                <div class="container-fluid">
                    <div class="row">
                        <div class="product-container col-12 p-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="product-pic-container wow1 fadeIn delay-2">
                                        <a href="<?php the_permalink(); ?>" title="Add to cart">
                                            <?php $images = rwmb_meta( 'rw_product_single_img', array( 'size' => 'full' ) ); foreach ( $images as $image ) { $image_product = $image['full_url']; } ?>
                                            <img src="<?php echo $image_product; ?>" alt="<?php the_title(); ?>" class="img-fluid img-product-home" />
                                        </a>
                                    </div>
                                    <div class="product-section product-title col-12 col-md-12 col-lg-6 col-xl-6" style="background: url(<?php echo $image_bg; ?>); ">
                                        <h2><?php echo get_post_meta(get_the_ID(), 'rw_product_slogan', true); ?></h2>
                                    </div>
                                    <div class="product-section product-slider col-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="product-slider-container owl-carousel owl-theme">
                                            <?php $group_values = rwmb_meta( 'rw_slider_group' ); ?>
                                            <?php if ( ! empty( $group_values ) ) { ?>
                                            <?php foreach ( $group_values as $group_value ) { ?>
                                            <?php $images = isset( $group_value['rw_product_slider'] ) ? $group_value['rw_product_slider'] : ''; ?>
                                            <?php $title = isset( $group_value['rw_product_slider_title'] ) ? $group_value['rw_product_slider_title'] : ''; ?>
                                            <?php $desc = isset( $group_value['rw_product_slider_desc'] ) ? $group_value['rw_product_slider_desc'] : ''; ?>
                                            <?php foreach ( $images as $image_id ) { $image = RWMB_Image_Field::file_info( $image_id, array( 'size' => 'full' ) ); echo '<div class="item item-slider"><div style="background: url('. $image['url'] . ');"><h2 class="slide-title">'. $title . '<p>'. $desc . '</p></h2></div></div>'; }
                                                                                            }
                                                                                  } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section page-section even page-product page-product-second page-product-<?php echo $i; ?> col-12" data-anchor="<?= strtolower( str_replace(' ', '', get_the_title() ) ) ?>-info">
                <div class="container-fluid">
                    <div class="row">
                        <div class="product-container col-12 p-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="product-pic-container">
                                        <a href="<?php the_permalink(); ?>" title="Add to cart">
                                            <?php $images = rwmb_meta( 'rw_product_single_img', array( 'size' => 'full' ) ); foreach ( $images as $image ) { $image_product = $image['full_url']; } ?>
                                            <img src="<?php echo $image_product; ?>" alt="<?php the_title(); ?>" class="img-fluid img-product-home" />
                                        </a>
                                    </div>
                                    <div class="product-section product-detail product-detail-<?php echo $i; ?> col-12 col-md-12 col-lg-6 col-xl-6" style="background-color: <?php echo get_post_meta(get_the_ID(), 'rw_color_bg', true); ?>; color: <?php echo get_post_meta(get_the_ID(), 'rw_color_text', true); ?>; ">
                                        <?php $images = rwmb_meta( 'rw_product_icon', array( 'size' => 'full' ) ); foreach ( $images as $image ) { $image_icon = $image['full_url']; } ?>
                                        <img src="<?php echo $image_icon; ?>" alt="<?php the_title(); ?>" class="img-fluid img-product-icon" />
                                        <style>.product-detail-<?php echo $i; ?> p { border-bottom: 1px solid <?php echo get_post_meta(get_the_ID(), 'rw_color_text', true); ?> !important; }</style>
                                        <?php the_content(); ?>
                                        <div class="product-detail-hidden">
                                            <?php $content_extra = apply_filters('the_content', get_post_meta(get_the_ID(), 'rw_product_content', true)); ?>
                                            <?php echo $content_extra; ?>
                                        </div>
                                    </div>
                                    <div class="product-section product-second-detail col-12 col-md-12 col-lg-6 col-xl-6" style="background-color: <?php echo get_post_meta(get_the_ID(), 'rw_color_text', true); ?>; color: <?php echo get_post_meta(get_the_ID(), 'rw_color_bg', true); ?>; ">
                                        <?php $content_extra = apply_filters('the_content', get_post_meta(get_the_ID(), 'rw_product_content', true)); ?>
                                        <?php echo $content_extra; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <div class="section page-section page-even page-contacto" data-anchor="contacto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="contact-container col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
                            <div class="row">
                                <div class="contact-text col-12 col-md-2 col-lg-2 col-xl-2">
                                    <p>Renu&eacute;vate<br/>desde adentro</p>
                                </div>
                                <div class="contact-shortcode-container col-12 col-md-4 col-lg-4 col-xl-4">
                                    <?php echo do_shortcode('[contact-form-7 id="4" title="Contacto - Requerimiento"]'); ?>
                                </div>
                                <div class="contact-content col-12 col-md-6 col-lg-6 col-xl-6 align-self-end">
                                    <p><strong>Dirección:</strong> De los Arupos E3-167 y Av. Eloy Alfaro</p>
                                    <p>Quito, Ecuador.</p>
                                    <p><strong>Teléfono:</strong> (593) 2 2 479 544</p>
                                    <p><strong>Pedidos:</strong> jefaturaventas@vitahealth.la</p>
                                    <hr>
                                    <div class=""><i class="fa fa-facebook"></i> VitahealthLa</div>
                                    <div class=""><i class="fa fa-instagram"></i> VitahealthLatinoamerica</div>
                                </div>
                                <div class="w-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid footer-internal">
                    <div class="row">
                        <footer class="p-0 the-footer footer-inner" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
                            <div class="row no-gutters">
                                <div class="footer-container col-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="footer-info col-10">
                                                <div class="row align-items-center">
                                                    <div class="col-xs-12 col-sm-3 col-md-2">
                                                        <img class="vita-footer-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-navbar.png" alt="<?php echo get_bloginfo('name');?>" class="img-fluid" width="120" />
                                                    </div>
                                                    <div class="col-xs-12 col-sm-9 col-md-10">
                                                        <h5>&copy; <?php _e('Todos los derechos reservados. VitaHealth S.A.', 'vitahealth'); ?></h5>
                                                    </div>
                                                </div>

                                                <div class="socia-text"><i class="fa fa-facebook"></i> VitaHealthLa</div>
                                                <div class="socia-text"><i class="fa fa-instagram"></i> VitaHealthLatinoamerica</div>
                                            </div>
                                            <div class="footer-icons col-2">
                                                <!--
<?php $meta_query = WC()->query->get_meta_query(); ?>
<?php $meta_query[] = array('key'   => '_featured', 'value' => 'yes' ); ?>
<?php $args = array('post_type' => 'product', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'date', 'meta_query'  =>  $meta_query ); ?>
<?php query_posts($args); ?>
<?php if (have_posts()) : ?>
<?php $i = 1; ?>
<?php while (have_posts()) : the_post(); ?>
<?php $images = rwmb_meta( 'rw_product_icon', array( 'size' => 'full' ) ); foreach ( $images as $image ) { $image_icon = $image['full_url']; } ?>
<img src="<?php echo $image_icon; ?>" alt="<?php the_title(); ?>" class="img-fluid img-product-icon" />
<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>
-->
                                                <img class="pull-right" src="<?= get_template_directory_uri() ?>/images/IconosFooter.png" alt="Vitahealth">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-copy col-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="footer-menu col">
                                                <a href="http://euforia.la" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/euforia-logo.png" alt="euforia" class="img-fluid" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
        "use strict";
        var vWidth = jQuery('body').outerWidth();
        if (vWidth >= 992) {
            jQuery('#fullpage').fullpage({
                animateAnchor: true,
                anchors: ['inicio','nosotros',<?php $args = array('post_type' => 'product', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'date'); query_posts($args);
                          while (have_posts()) : the_post(); global $post;
                          echo "'". $post->post_name ."',";
                          echo "'". $post->post_name ."-info',";
                          endwhile;
                          ?>'contacto'],

                //Scrolling
                css3: false,
                scrollingSpeed: 600,
                autoScrolling: true,
                scrollBar: true,
                interlockedSlides: false,
                dragAndMove: true,
                touchSensitivity: 15,
                normalScrollElementTouchThreshold: 5,
                scrollOverflow: true,


                //Accessibility
                keyboardScrolling: true,
                animateAnchor: true,

                //events
                onLeave: function (index, nextIndex, direction) {
                    jQuery('.product-section').removeClass('active');
                },
                afterLoad: function (anchorLink, index) {
                    if (anchorLink !== 'inicio' && anchorLink !== 'nosotros' && anchorLink !== 'contacto'){
                        console.log(anchorLink);
                        jQuery('.product-section').addClass('active');
                    }else{
                        jQuery('.product-section').removeClass('active');
                    }

                    jQuery('.nav-link').parent('li').removeClass('active');
                    if(jQuery('.product-section').hasClass('active')){
                        jQuery('a[title="Productos"]').parent('li').addClass('active');
                    }else{
                        jQuery('a[title="Productos"]').parent('li').removeClass('active');
                    }
                    jQuery('a[href="http://vh.choclomedia.com/#'+anchorLink+'"]').parent('li').addClass('active');

                },
                afterRender: function () {
                },
                afterResize: function () {},
                afterResponsive: function (isResponsive) {},
            });
            //        jQuery("body").niceScroll();
        } else {

        }
    })
</script>
