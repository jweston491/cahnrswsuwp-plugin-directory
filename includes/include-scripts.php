<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Scripts {

	public function init() {

		add_action( 'wp_enqueue_scripts', __CLASS__ . '::add_scripts' );

		add_action( 'admin_enqueue_scripts', __CLASS__ . '::add_scripts' );

	}

	public static function add_scripts() {

		wp_enqueue_style(
			'cahnrs-directory',
			Plugin::get_plugin_url() . 'assets/dist/directory.css',
			array(),
			Plugin::get_version()
		);

		wp_enqueue_style(
			'wsu-icons',
			'https://cdn.web.wsu.edu/designsystem/1.x/wsu-icons/dist/wsu-icons.bundle.css',
			array(),
			Plugin::get_version()
		);
	}
}

(new Scripts)->init();
