<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Directory_Sawmill extends Directory_Base {

	protected static $post_type           = 'sawmill';
	protected static $directory_title     = 'Sawmill';
	protected static $directory_slug      = 'sawmill';
	protected static $nonce_name          = 'sawmill_dir';
	protected static $nonce_action        = 'sawmill_dir_save';
	protected static $save_taxonomies     = array( 'county' );
	protected static $register_taxonomies = array(
		'county'  => 'Counties',
	);
	protected static $save_keys = array(
		'_address'               => array( 'type' => 'text' ),
		'_physical_address'      => array( 'type' => 'text' ),
		'_phone'                 => array( 'type' => 'text' ),
		'_state'                 => array( 'type' => 'text' ),
		'_fax'                   => array( 'type' => 'text' ),
		'_city'                  => array( 'type' => 'text' ),
		'_email'                 => array( 'type' => 'text' ),
		'_zip'                   => array( 'type' => 'text' ),
		'_website'               => array( 'type' => 'text' ),
		'_general_description'   => array( 'type' => 'html' ),
		'_mobile_service'        => array( 'type' => 'text' ),
		'_capacity'              => array( 'type' => 'text' ),
		'_other_services'        => array( 'type' => 'text' ),
		'_products'              => array( 'type' => 'text' ),
		'_billing'               => array( 'type' => 'text' ),
		'_taxonomy'              => array( 'type' => 'taxonomy_array' ),
	);

	public function __construct() {

		self::$save_keys['_taxonomy']['sanitize_callback'] =  __CLASS__ . '::save_taxonomy';

	}

	public function init() {

		add_action( 'init', __CLASS__ . '::register_post_type' );

		add_action( 'init', __CLASS__ . '::register_taxonomy' );

		add_action( 'edit_form_after_title', __CLASS__ . '::the_editor' );

		add_action( 'save_post_' . self::$post_type, __CLASS__ . '::save', 10, 3 );

		add_action( 'cahnrswsuwp_directory_filters', __CLASS__ . '::shortcode_filters', 10, 1 );

		add_action( 'cahnrswsuwp_directory_results', __CLASS__ . '::shortcode_results', 10, 1 );

		add_filter( 'the_content', __CLASS__ . '::the_content' );

	}


	public static function shortcode_filters( $type ) {

		if ( 'sawmill' == $type ) {

			Plugin::require_class( 'county' );

			$counties = County::get_terms();
			$county_selected  = ( ! empty( $_REQUEST['fs_county'] ) ) ? sanitize_text_field( $_REQUEST['fs_county'] ) : '';

			include Plugin::get_template_dir() . '/sawmill-shortcode-filters.php';

		}

	}


	public static function the_editor( $post ) {

		if ( self::$post_type === $post->post_type ) {

			Plugin::require_class( 'county' );
			Plugin::require_class( 'sawmill' );
			Plugin::require_class( 'forms' );

			$sawmill = new Sawmill( $post );
			$counties   = County::get_terms();

			wp_nonce_field( self::$nonce_action, self::$nonce_name );

			include Plugin::get_template_dir() . '/sawmill-editor.php';

		}

	}


	public static function shortcode_results( $type ) {

		if ( self::$post_type === $type ) {

			Plugin::require_class( 'sawmill' );

			$results = array();

			$args = self::get_query_args();

			$query = new \WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {

				while ( $query->have_posts() ) {
					$query->the_post();

					$results[] = new Sawmill( $query->post );

				}
			}

			/* Restore original Post Data */
			wp_reset_postdata();

			include Plugin::get_template_dir() . '/shortcode-results.php';
		}

	}

	protected static function get_query_args() {

		$county_selected  = ( ! empty( $_REQUEST['fs_county'] ) ) ? sanitize_text_field( $_REQUEST['fs_county'] ) : '';

		$dir_search  = ( ! empty( $_REQUEST['dir_search'] ) ) ? sanitize_text_field( $_REQUEST['dir_search'] ) : '';

		$args = array(
			'post_type'      => self::$post_type,
			'posts_per_page' => '-1',
			'post_status'    => 'publish',
			'orderby'        => 'title',
			'order'          => 'ASC',
		);

		if ( ! empty( $dir_search ) ) {
			$args['s'] = $dir_search;
		}

		if ( ! empty( $county_selected ) ) {

			$args['tax_query'] = array(
				'relation' => 'AND',
			);

			if ( ! empty( $county_selected ) ) {
				$args['tax_query'][] = array(
					'taxonomy' => 'county',
					'field'    => 'slug',
					'terms'    => array( $county_selected ),
				);
			}
		}

		return $args;

	}

	public static function the_content( $content ) {

		remove_filter( 'the_content', __CLASS__ . '::the_content' );

		if ( is_singular( self::$post_type ) ) {

			global $post;

			Plugin::require_class( 'sawmill' );
			Plugin::require_class( 'county' );

			$sawmill = new Sawmill( $post );

			$taxonomies = $sawmill->get_option( '_taxonomy' );
			$counties = array();

			if ( ! empty( $taxonomies['county'] ) ) {

				foreach ( $taxonomies['county'] as $county ) {
					$counties[] = County::get_term_label( $county );
				}
			}

			ob_start();

			include Plugin::get_template_dir() . '/sawmill-content.php';

			return ob_get_clean();

		}

		return $content;

	}

}


(new Directory_Sawmill)->init();
