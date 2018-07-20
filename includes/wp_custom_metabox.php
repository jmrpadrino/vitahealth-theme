<?php
function vitahealth_metabox( $meta_boxes ) {
    $prefix = 'rw_';

    $meta_boxes[] = array(
        'id' => 'product_data',
        'title' => esc_html__( 'Información Extra', 'vitahealth' ),
        'post_types' => array( 'product' ),
        'context' => 'normal',
        'priority' => 'high',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'product_single_img',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Imagen Silueta del Producto', 'vitahealth' ),
                'desc' => esc_html__( 'Inserte imagen Silueta representativa del producto', 'vitahealth' ),
                'max_file_uploads' => '1',
                'max_status' => true,
            ),
            array(
                'id' => $prefix . 'product_icon',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Ícono del Producto', 'vitahealth' ),
                'desc' => esc_html__( 'Inserte ícono representativo del producto', 'vitahealth' ),
                'max_file_uploads' => '1',
                'max_status' => true,
            ),
            array(
                'type' => 'divider',
            ),
			array(
                'id' => $prefix . 'product_sticker',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Sticker para Producto', 'vitahealth' ),
                'desc' => esc_html__( 'Inserte sticker que ira en el single', 'vitahealth' ),
                'max_file_uploads' => '1',
                'max_status' => true,
            ),
            array(
                'type' => 'divider',
            ),
            array(
                'name'          => 'Fondo para área de info',
                'id'            => $prefix . 'color_bg',
                'type'          => 'color',
                'alpha_channel' => false
            ),
            array(
                'name'          => 'Fondo para texto de info',
                'id'            => $prefix . 'color_text',
                'type'          => 'color',
                'alpha_channel' => false
            ),
            array(
                'type' => 'divider',
            ),
            array(
                'id' => $prefix . 'product_bg',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Fondo de Pantalla', 'vitahealth' ),
                'max_file_uploads' => '1',
                'max_status' => true,
            ),
            array(
                'type' => 'divider',
            ),
            array(
                // Field name: usually not used

                'type' => 'custom_html',
                // HTML content
                'std'  => '<div class="alert alert-warning"><h1>Slider del Producto</h1></div>',

                // PHP function to show custom HTML
                // 'callback' => 'display_warning',
            ),
            array(
                'type' => 'divider',
            ),
            array(
                'id'     => $prefix . 'slider_group',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'id' => $prefix . 'product_slider',
                        'type' => 'image_advanced',
                        'name' => esc_html__( 'Imagen del Slide', 'vitahealth' ),
                        'clone' => false,
                        'max_file_uploads' => '1',
                        'max_status' => true,
                    ),
                    array(
                        'id' => $prefix . 'product_slider_title',
                        'type' => 'text',
                        'name' => esc_html__( 'Texto Principal del slide', 'vitahealth' ),
                        'desc' => esc_html__( 'Esta frase irá justo a la derecha del producto', 'vitahealth' ),
                        'placeholder' => esc_html__( 'Texto Principal del slide', 'vitahealth' ),
                        'size' => 90,
                    ),
                    array(
                        'id' => $prefix . 'product_slider_desc',
                        'type' => 'text',
                        'name' => esc_html__( 'Texto descriptivo del Slide', 'vitahealth' ),
                        'desc' => esc_html__( 'Esta frase irá justo a la desrecha del producto', 'vitahealth' ),
                        'placeholder' => esc_html__( 'Texto descriptivo del Slide', 'vitahealth' ),
                        'size' => 100,
                    ),
                ),
            ),
            array(
                'type' => 'divider',
            ),
            array(
                'id' => $prefix . 'product_slogan',
                'type' => 'text',
                'name' => esc_html__( 'Slogan del Producto', 'vitahealth' ),
                'desc' => esc_html__( 'Esta frase irá justo a la izquierda del producto', 'vitahealth' ),
                'placeholder' => esc_html__( 'Slogan del Producto', 'vitahealth' ),
                'size' => 90,
            ),
            array(
                'id' => $prefix . 'product_content',
                'name' => esc_html__( 'Contenido del Producto', 'vitahealth' ),
                'type' => 'wysiwyg',
                'desc' => esc_html__( 'Este contenido estará la a derecha del producto', 'vitahealth' ),
            ),
			array(
                'id' => $prefix . 'product_pack_image',
                'name' => esc_html__( 'Imagen del Pack', 'vitahealth' ),
                'type' => 'image_advanced',
                'desc' => esc_html__( 'Este contenido estará como imagen destacada en la tienda', 'vitahealth' ),
				'max_file_uploads' => '1',
                'max_status' => true,
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'vitahealth_metabox' );
