<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Directory_Base {

	protected static $post_type           = '';
	protected static $directory_title     = '';
	protected static $directory_slug      = '';
	protected static $nonce_name          = '';
	protected static $nonce_action        = '';
	protected static $save_taxonomies     = array();
	protected static $register_taxonomies = array();
	protected static $save_keys = array();


	public static function register_taxonomy() {

		foreach ( static::$register_taxonomies as $slug => $label ) {

			$labels = array(
				'name'              => $label . 's',
				'singular_name'     => $label,
				'search_items'      => 'Search ' . $label . 's',
				'all_items'         => 'All ' . $label . 's',
				'parent_item'       => 'Parent ' . $label,
				'parent_item_colon' => 'Parent ' . $label . ':',
				'edit_item'         => 'Edit ' . $label,
				'update_item'       => 'Update ' . $label,
				'add_new_item'      => 'Add New ' . $label,
				'new_item_name'     => 'New ' . $label,
				'menu_name'         => $label,
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => $slug ),
			);

			register_taxonomy( $slug, static::$post_type, $args );

		}

	}


	public static function register_post_type() {

		$labels = array(
			'name'                  => static::$directory_title . 's',
			'singular_name'         => static::$directory_title,
			'menu_name'             => static::$directory_title . 's',
			'name_admin_bar'        => static::$directory_title,
			'add_new'               => 'Add New',
			'add_new_item'          => 'Add New ' . static::$directory_title,
			'new_item'              => 'New ' . static::$directory_title,
			'edit_item'             => 'Edit ' . static::$directory_title,
			'view_item'             => 'View ' . static::$directory_title,
			'all_items'             => static::$directory_title . 's',
			'search_items'          => 'Search ' . static::$directory_title . 's',
			'parent_item_colon'     => 'Parent ' . static::$directory_title . 's:',
			'not_found'             => 'No ' . static::$directory_title . ' found.',
			'not_found_in_trash'    => 'No ' . static::$directory_title . ' found in Trash.',
			'featured_image'        => static::$directory_title . ' Cover Image',
			'set_featured_image'    => 'Set cover image',
			'remove_featured_image' => 'Remove cover image',
			'use_featured_image'    => 'Use as cover image',
			'archives'              => static::$directory_title . ' archives',
			'insert_into_item'      => 'Insert into ' . static::$directory_title,
			'uploaded_to_this_item' => 'Uploaded to this ' . static::$directory_title,
			'filter_items_list'     => 'Filter ' . static::$directory_title . ' list',
			'items_list_navigation' => static::$directory_title . 's list navigation',
			'items_list'            => static::$directory_title . 's list',
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => 'directories',
			'query_var'          => true,
			'rewrite'            => array( 'slug' => static::$post_type ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		);

		register_post_type( static::$post_type, $args );

	}


	public static function save_taxonomy( $value, $post_id, $key ) {

		if ( ! empty( static::$save_taxonomies ) ) {

			foreach ( static::$save_taxonomies as $taxonomy ) {

				$terms = ( ! empty( $value[ $taxonomy ] ) ) ? $value[ $taxonomy ] : array();

				wp_set_object_terms( $post_id, $terms, $taxonomy );

			}
		}

		return $value;

	}

	public static function save( $post_id, $post, $update ) {

		if ( $update ) {

			Plugin::require_class( 'save' );

			$save = new Save( static::$save_keys, static::$nonce_action, static::$nonce_name );

			$save->save_post( $post_id, $post, $update );

		}

	}

}
