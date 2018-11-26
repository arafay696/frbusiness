<?php
/***** Active Plugin ********/
require_once( get_template_directory().'/lib/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'revo_register_required_plugins' );
function revo_register_required_plugins() {
    $plugins = array(
		array(
            'name'               => esc_html__( 'WooCommerce', 'revo' ), 
            'slug'               => 'woocommerce', 
            'required'           => true, 
			'version'			 => '3.5.1'
        ),

         array(
            'name'               => esc_html__( 'Revslider', 'revo' ), 
            'slug'               => 'revslider', 
            'source'             => esc_url( get_template_directory_uri() . '/lib/plugins/revslider.zip' ), 
            'required'           => true, 
            'version'            => '5.4.8'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Core', 'revo' ),
            'slug'      		 => 'sw_core',
			'source'         	 => esc_url( get_template_directory_uri() . '/lib/plugins/sw_core.zip' ), 
            'required'  		 => true,   
			'version'			 => '1.6.2'
		),
		
		array(
            'name'     			 => esc_html__( 'SW WooCommerce', 'revo' ),
            'slug'      		 => 'sw_woocommerce',
			'source'         	 => esc_url( get_template_directory_uri() . '/lib/plugins/sw_woocommerce.zip' ), 
            'required'  		 => true,
			'version'			 => '1.6.2'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Ajax Woocommerce Search', 'revo' ),
            'slug'      		 => 'sw_ajax_woocommerce_search',
			'source'         	 => esc_url( get_template_directory_uri() . '/lib/plugins/sw_ajax_woocommerce_search.zip' ), 
            'required'  		 => true,
			'version'			 => '1.1.6'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Wooswatches', 'revo' ),
            'slug'      		 => 'sw_wooswatches',
			'source'         	 => esc_url( get_template_directory_uri() . '/lib/plugins/sw_wooswatches.zip' ), 
            'required'  		 => true,
			'version'			 => '1.0.6'
        ),
				
		array(
            'name'               => esc_html__( 'One Click Install', 'revo' ), 
            'slug'               => 'one-click-demo-import', 
            'source'             => esc_url( get_template_directory_uri() . '/lib/plugins/one-click-demo-import.zip' ), 
            'required'           => true, 
        ),
		array(
            'name'               => esc_html__( 'Visual Composer', 'revo' ), 
            'slug'               => 'js_composer', 
            'source'             => esc_url( get_template_directory_uri() . '/lib/plugins/js_composer.zip' ), 
            'required'           => true, 
            'version'            => '5.5.5'
        ),	
		array(
            'name'      		 => esc_html__( 'MailChimp for WordPress Lite', 'revo' ),
            'slug'     			 => 'mailchimp-for-wp',
            'required' 			 => false,
        ),
		array(
            'name'      		 => esc_html__( 'Contact Form 7', 'revo' ),
            'slug'     			 => 'contact-form-7',
            'required' 			 => false,
        ),
		array(
            'name'      		 => esc_html__( 'YITH Woocommerce Compare', 'revo' ),
            'slug'      		 => 'yith-woocommerce-compare',
            'required'			 => false
        ),
		 array(
            'name'     			 => esc_html__( 'YITH Woocommerce Wishlist', 'revo' ),
            'slug'      		 => 'yith-woocommerce-wishlist',
            'required' 			 => false
        ), 
		array(
            'name'     			 => esc_html__( 'WordPress Seo', 'revo' ),
            'slug'      		 => 'wordpress-seo',
            'required'  		 => false,
        ),

    );		
    $config = array();

    tgmpa( $plugins, $config );

}
add_action( 'vc_before_init', 'revo_vcSetAsTheme' );
function revo_vcSetAsTheme() {
    vc_set_as_theme();
}