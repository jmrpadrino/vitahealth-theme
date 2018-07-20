<?php if ( !is_front_page() or !is_home() ){ ?>
<footer class="container-fluid p-0 the-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <img src="<?php echo get_template_directory_uri(); ?>/images/about-line.png" alt="" class="img-fluid img-footer-bar" />
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

                        <div><i class="fa fa-facebook"></i> VitaHealthLa</div>
                        <div><i class="fa fa-instagram"></i> VitaHealthLatinoamerica</div>
                    </div>
                    <div class="footer-icons col-2">
                        <!--
<?php $args = array('post_type' => 'product', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'date'); ?>
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
<?php } ?>
<?php wp_footer() ?>
<?php if (is_singular('product')){ ?>
<script>
    var checkExist = setInterval(function() {
        if ($('.woocommerce-message').length) {
            $('.woocommerce-message').insertBefore( "form" );
            clearInterval(checkExist);
        }
    }, 10); // check every 100ms
</script>
<?php } ?>
</body>
</html>
