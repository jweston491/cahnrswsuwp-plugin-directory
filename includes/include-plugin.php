<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Plugin {

	protected static $version = '0.0.6';

	public function __construct() {

	}

	public function init() {

		require_once __DIR__ . '/include-directory.php';
		require_once __DIR__ . '/include-shortcode.php';
		require_once __DIR__ . '/include-scripts.php';

	}

	public static function get_version() {

		return self::$version;

	}

	public static function get_plugin_url() {

		return plugin_dir_url( dirname( __FILE__ ) );

	}

	public static function get_plugin_dir() {

		return plugin_dir_path( dirname( __FILE__ ) );

	}

	public static function get_template_dir() {

		return self::get_plugin_dir() . 'template-parts';
	}

	public static function require_class( $class_slug ) {

		require_once self::get_plugin_dir() . 'classes/class-' . $class_slug . '.php';

	}

}

(new Plugin)->init();
