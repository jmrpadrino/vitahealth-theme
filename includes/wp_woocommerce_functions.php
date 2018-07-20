<?php
/* WOOCOMMERCE CUSTOM COMMANDS */

/* WOOCOMMERCE - DECLARE THEME SUPPORT - BEGIN */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
/* WOOCOMMERCE - DECLARE THEME SUPPORT - END */

/* WOOCOMMERCE - CUSTOM WRAPPER - BEGIN */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<div id="main" class="container-fluid p-0"><div class="row no-gutters"><div class="woocustom-main-container col-12">';
}

function my_theme_wrapper_end() {
    echo '</div></div></div>';
}
/* WOOCOMMERCE - CUSTOM WRAPPER - END */

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3; // 3 products per row
    }
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_custom_related_product', 'woocommerce_output_related_products', 10);


// removes Order Notes Title - Additional Information
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

//remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

function remove_order_notes( $fields ) {
    unset($fields['order']['order_comments']);
    return $fields;
}

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10);

function custom_loop_product_thumbnail($post) { /* grab the url for the full size featured image */
        $images = rwmb_meta( 'rw_product_single_img', array( 'size' => 'full' ), $post->ID ); foreach ( $images as $image ) { $image_product = $image['full_url']; }
  
        /* link thumbnail to full size image for use with lightbox*/
        echo '<a href="'.get_permalink($post->ID).'">'; 
        echo '<img src="'.esc_url($image_product).'" class="img-product-custom img-fluid"/>';
        echo '</a>';
}