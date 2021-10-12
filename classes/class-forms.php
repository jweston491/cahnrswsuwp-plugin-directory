<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Forms {


	public static function get_forms_dir() {

		return Plugin::get_plugin_dir() . '/template-parts/forms';

	}


	public static function header( $label, $tag = 'h2' ) {

		include self::get_forms_dir() . '/header.php';

	}


	public static function text_field( $key, $value, $label = '', $placeholder = '', $args = array() ) {

		$default_args = array(
			'base-class' => 'wsuwp-f-text-field',
			'class' => '',
		);

		$args = array_merge( $default_args, $args );

		include self::get_forms_dir() . '/text-field.php';

	}

	public static function checkbox( $key, $value, $current_value, $label, $args = array() ) {

		$default_args = array(
			'base-class' => 'wsuwp-f-checkbox',
			'class' => '',
		);

		$args = array_merge( $default_args, $args );

		include self::get_forms_dir() . '/checkbox.php';

	}

	public static function radio( $key, $value, $current_value, $label, $args = array() ) {

		$default_args = array(
			'base-class' => 'wsuwp-f-radio',
			'class' => '',
		);

		$args = array_merge( $default_args, $args );

		include self::get_forms_dir() . '/radio.php';

	}

	public static function editor( $key, $content, $label = '', $settings = array(), $args = array() ) {

		$default_args = array(
			'base-class' => 'wsuwp-f-editor',
			'class' => '',
		);

		include self::get_forms_dir() . '/editor.php';

	}

}
