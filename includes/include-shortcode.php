<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Shortcode {

	protected static $shortcode    = 'cahnrs_directory';
	protected static $default_atts = array(
		'type' => '',
	);


	public function init() {

		add_shortcode( self::$shortcode, __CLASS__ . '::the_shortcode' );

	}


	public static function the_shortcode( $atts ) {

		$atts = shortcode_atts( self::$default_atts, $atts, self::$shortcode );
		$type = ( ! empty( $atts['type'] ) ) ? $atts['type'] : '';

		ob_start();

		include Plugin::get_template_dir() . '/shortcode-directory.php';

		return ob_get_clean();

	}

}

(new Shortcode)->init();
