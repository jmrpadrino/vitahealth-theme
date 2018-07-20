<?php

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER CSS
-------------------------------------------------------------- */

require_once('includes/wp_enqueue_styles.php');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER JS
-------------------------------------------------------------- */

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue");
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        /*- JQUERY ON LOCAL  -*/
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '3.3.1', false);
        /*- JQUERY MIGRATE ON LOCAL  -*/
        wp_register_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js',  array('jquery'), '3.0.1', false);
    } else {
        /*- JQUERY ON WEB  -*/
        wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1', false);
        /*- JQUERY MIGRATE ON WEB  -*/
        wp_register_script( 'jquery-migrate', 'http://code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', true);
    }
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-migrate');
}

/* NOW ALL THE JS FILES */
require_once('includes/wp_enqueue_scripts.php');

/* --------------------------------------------------------------
    ADD CUSTOM WALKER BOOTSTRAP
-------------------------------------------------------------- */

// WALKER COMPLETO TOMADO DESDE EL NAVBAR COLLAPSE
require_once('includes/class-wp-bootstrap-navwalker.php');

// WALKER CUSTOM SI DEBO COLOCAR ICONOS AL LADO DEL MENU PRINCIPAL - SU ESTRUCTURA ESTA DENTRO DEL MISMO ARCHIVO
//require_once('includes/wp_walker_custom.php');

/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS FUNCTIONS
-------------------------------------------------------------- */

require_once('includes/wp_custom_functions.php');

/* --------------------------------------------------------------
    ADD REQUIRED WORDPRESS PLUGINS
-------------------------------------------------------------- */

require_once('includes/class-tgm-plugin-activation.php');
require_once('includes/class-required-plugins.php');


/* --------------------------------------------------------------
    ADD CUSTOM WOOCOMMERCE OVERRIDES
-------------------------------------------------------------- */

require_once('includes/wp_woocommerce_functions.php');

/* --------------------------------------------------------------
    ADD THEME SUPPORT
-------------------------------------------------------------- */

load_theme_textdomain( 'vitahealth', get_template_directory() . '/languages' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ));
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );
add_theme_support( 'custom-background',
                  array(
                      'default-image' => '',    // background image default
                      'default-color' => '',    // background color default (dont add the #)
                      'wp-head-callback' => '_custom_background_cb',
                      'admin-head-callback' => '',
                      'admin-preview-callback' => ''
                  )
                 );

/* --------------------------------------------------------------
    ADD CUSTOM EDITOR STYLE
-------------------------------------------------------------- */
function vitahealth_add_editor_styles() {
    add_editor_style( get_stylesheet_directory_uri() . '/css/editor-styles.css' );
}
add_action( 'admin_init', 'vitahealth_add_editor_styles' );

/* --------------------------------------------------------------
    ADD NAV MENUS LOCATIONS
-------------------------------------------------------------- */

register_nav_menus( array(
    'header_menu' => __( 'Menu Header - Principal', 'vitahealth' ),
    'footer_menu' => __( 'Menu Footer - Principal', 'vitahealth' ),
) );

/* --------------------------------------------------------------
    ADD DYNAMIC SIDEBAR SUPPORT
-------------------------------------------------------------- */

add_action( 'widgets_init', 'vitahealth_widgets_init' );
function vitahealth_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar Principal', 'vitahealth' ),
        'id' => 'main_sidebar',
        'description' => __( 'Estos widgets seran vistos en las entradas y páginas del sitio', 'vitahealth' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    //    register_sidebar( array(
    //        'name' => __( 'Shop Sidebar', 'vitahealth' ),
    //        'id' => 'shop_sidebar',
    //        'description' => __( 'Estos widgets seran vistos en Tienda y Categorias de Producto', 'vitahealth' ),
    //        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    //        'after_widget'  => '</li>',
    //        'before_title'  => '<h2 class="widgettitle">',
    //        'after_title'   => '</h2>',
    //    ) );
}

/* --------------------------------------------------------------
    CUSTOM ADMIN LOGIN
-------------------------------------------------------------- */

function custom_login_logo() {
    $version_remove = NULL;
    wp_register_style('wp-custom-login', get_template_directory_uri() . '/css/custom-wordpress-admin-style.css', false, $version_remove, 'all');
    wp_enqueue_style('wp-custom-login');

}
add_action('login_head', 'custom_login_logo');

if (! function_exists('dashboard_footer') ){
    function dashboard_footer() {
        echo '<span id="footer-thankyou">';
        _e ('Gracias por crear con ', 'vitahealth' );
        echo '<a href="http://wordpress.org/" target="_blank">WordPress.</a> - ';
        _e ('Tema desarrollado por ', 'vitahealth' );
        echo '<a href="http://robertochoa.com.ve/?utm_source=footer_admin&utm_medium=link&utm_content=vitahealth" target="_blank">Robert Ochoa</a></span>';
    }
}
add_filter('admin_footer_text', 'dashboard_footer');

/* --------------------------------------------------------------
    ADD CUSTOM METABOX
-------------------------------------------------------------- */

require_once('includes/wp_custom_metabox.php');

/* --------------------------------------------------------------
    ADD CUSTOM POST TYPE
-------------------------------------------------------------- */

//require_once('includes/wp_custom_post_type.php');

/* --------------------------------------------------------------
    ADD CUSTOM THEME CONTROLS
-------------------------------------------------------------- */

//require_once('includes/wp_custom_theme_control.php');

/* --------------------------------------------------------------
    ADD AJAX HELPER
-------------------------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'ajax_vitahealth_enqueue_scripts' );
function ajax_vitahealth_enqueue_scripts() {
    wp_enqueue_script( 'vitahealthAjax', get_template_directory_uri() . '/js/ajax-scripts.js', array('jquery'), '1.0', true );

    wp_localize_script( 'vitahealthAjax', 'vitahealthAjax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}

add_action('wp_ajax_nopriv_vitahealthAjax_post','vitahealthAjax_post');
add_action('wp_ajax_vitahealthAjax_post','vitahealthAjax_post');

function vitahealthAjax_post() {
    $id_post = $_POST['id_post'];
    $post = get_post($id_post);
?>
<h1><?php echo $post->post_title; ?></h1>
<?php $output =  apply_filters( 'the_content', $post->post_content ); ?>
<?php echo $output; ?>
<?php
    wp_die();
}

add_action('wp_ajax_nopriv_vitahealthAjax_posts_fetcher','vitahealthAjax_posts_fetcher');
add_action('wp_ajax_vitahealthAjax_posts_fetcher','vitahealthAjax_posts_fetcher');

function vitahealthAjax_posts_fetcher() {
    $month = $_POST['month'];
    $now = new \DateTime('now');
    $year = $now->format('Y');
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'post',
        'date_query' => array(
            array(
                'year'  => get_the_date('Y', $year),
                'month' => get_the_date('m', $month)
            ),
        ),
    );

    $posts = get_posts( $args );
    if (!empty($posts)) {
        foreach ($posts as $post) {
?>
<article id="post-<?php echo $post->ID; ?>" class="item archive-item" role="article">
    <div class="archive-item-container" style="background: url(<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>);">
        <a onclick="post_show(<?php echo $post->ID; ?>)" title="<?php echo $post->post_title; ?>">
            <h2 rel="bookmark"><?php echo $post->post_title; ?></h2>
        </a>
    </div>
</article>
<?php
                                  }
    }
    wp_die();
}




/* --------------------------------------------------------------
    ADD CUSTOM IMAGE SIZE
-------------------------------------------------------------- */
if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 9999, 400, true);
}
if ( function_exists('add_image_size') ) {
    add_image_size('avatar', 100, 100, true);
    add_image_size('blog_img', 276, 217, true);
    add_image_size('single_img', 636, 297, true );
}
