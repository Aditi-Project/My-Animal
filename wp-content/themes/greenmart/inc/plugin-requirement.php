<?php 
/***** Active Plugin ********/
require_once( get_template_directory() . '/inc/plugins/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'greenmart_register_required_plugins' );
function greenmart_register_required_plugins() {
  $plugins[] =(array(
    'name'                       => 'WooCommerce',
      'slug'                     => 'woocommerce',
      'required'                 => true,
  ));

  $plugins[] =(array(
    'name'                       => 'MC4WP: Mailchimp for WordPress',
      'slug'                     => 'mailchimp-for-wp',
      'required'                 =>  true
  ));

  $plugins[] =(array(
    'name'                       => 'Contact Form 7',
      'slug'                     => 'contact-form-7',
      'required'                 => true,
  ));

  $plugins[] =(array(
    'name'                     => 'WPBakery Page Builder',
    'slug'                     => 'js_composer',
    'required'                 => true,
    'source'         		       => esc_url( 'plugins.thembay.com/js_composer.zip' ),
  ));

  $plugins[] =(array(
    'name'                     => 'Tbay Framework',
    'slug'                     => 'tbay-framework',
    'required'                 => true ,
    'source'         		   => esc_url( 'plugins.thembay.com/tbay-framework.zip' ),
  ));

  $plugins[] =(array(
    'name'                     => 'Redux Framework',
    'slug'                     => 'redux-framework',
    'required'                 => true ,
  ));

  $plugins[] =(array(
    'name'                     => 'Elementor Website Builder',
    'slug'                     => 'elementor',
    'required'                 => true ,
  ));

  $plugins[] =(array(
    'name'                     => 'Variation Swatches for WooCommerce',
      'slug'                     => 'woo-variation-swatches',
      'required'                 =>  true,
      'source'         		   => esc_url( 'downloads.wordpress.org/plugin/woo-variation-swatches.zip' ),
  ));	

  $plugins[] =(array(
    'name'                     => 'YITH WooCommerce Quick View',
      'slug'                     => 'yith-woocommerce-quick-view',
      'required'                 =>  false
  ));	

  $plugins[] =(array(
    'name'                     => 'YITH WooCommerce Frequently Bought Together',
      'slug'                     => 'yith-woocommerce-frequently-bought-together',
      'required'                 =>  false
  ));
  
  $plugins[] =(array(
    'name'                     => 'YITH WooCommerce Wishlist',
      'slug'                     => 'yith-woocommerce-wishlist',
      'required'                 =>  false
  ));

  if( greenmart_tbay_get_theme() !== 'fresh-el' ) {
    $plugins[] =(array(
      'name'                     => 'YITH Woocommerce Compare',
          'slug'                     => 'yith-woocommerce-compare',
          'required'                 => false
    ));
  } else {
    $plugins[] =(array(
      'name'                     => 'Photo Reviews for WooCommerce',
          'slug'                     => 'woo-photo-reviews',
          'required'                 => false
    ));
  }

  $plugins[] =(array(
    'name'                     => 'Slider Revolution',
    'slug'                     => 'revslider',
    'required'                 => true ,
    'source'         		   => esc_url( 'plugins.thembay.com/revslider.zip' ),
  ));

  $config = array();

  tgmpa( $plugins, $config );
}