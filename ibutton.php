<?php
/*
Plugin Name: iButton
Plugin URI:  http://demo.solayman.net/ibutton/
Description: Colorful inverted shortcode button for WordPress.
Version:     1.0
Author:      Solayman haider
Author URI:  https://solayman.net
Text Domain: ibutton
 */

// Hook in all the important things
function ibutton_stylesheet() {
   // Get plugin stylesheet
		wp_enqueue_style( 'ibutton-stylesheet', plugin_dir_url( __FILE__ ) . 'assets/buttons.css', array(), '0.1', 'all' );

}
add_action( 'wp_enqueue_scripts', 'ibutton_stylesheet' );

 // Add Shortcode
function ibutton_register_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
      'url' => '#',
			'text' => 'Button',
			'color' => 'default-color',
      'size' => 'default-size',
      'uppercase' => 'no',
      'italic' => 'no',
      'target' => '',
		), $atts )
	);
  ob_start();
	?>
  <a href="<?php echo $url ?>" class="inbutton <?php echo $color ?> <?php echo $size ?> uppercase-<?php echo $uppercase ?> italic-<?php echo $italic ?>" target="<?php echo $target ?>"><?php echo $text ?></a>
  <?php
	return ob_get_clean();
}

add_shortcode( 'ibutton', 'ibutton_register_shortcode' );

?>
