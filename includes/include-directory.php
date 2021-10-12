<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Directory {

	public function __construct() {

		Plugin::require_class( 'directory-base' );
		Plugin::require_class( 'entry' );


	}

	public function init() {

		require_once __DIR__ . '/include-directory-forester.php';
		require_once __DIR__ . '/include-directory-sawmill.php';

		add_action( 'admin_menu', __CLASS__ . '::add_directory_admin_page', 8 );

	}


	public static function add_directory_admin_page() {

		add_menu_page(
			'Directories',
			'Directories',
			'manage_options',
			'directories',
			__CLASS__ . '::directory_admin_page'
		);

	}


	public static function directory_admin_page() {

		echo '';

	}

}

(new Directory)->init();
