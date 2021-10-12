<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Directory_Forester extends Directory_Base {

	protected static $post_type           = 'consultant';
	protected static $directory_title     = 'Forestry Consultant';
	protected static $directory_slug      = 'forestry_consultants';
	protected static $nonce_name          = 'consultant_dir';
	protected static $nonce_action        = 'consultant_dir_save';
	protected static $save_taxonomies     = array( 'service', 'county' );
	protected static $register_taxonomies = array(
		'service' => 'Forestry Services',
		'county'  => 'Counties',
	);
	protected static $save_keys = array(
		'_address'               => array( 'type' => 'text' ),
		'_phone'                 => array( 'type' => 'text' ),
		'_state'                 => array( 'type' => 'text' ),
		'_fax'                   => array( 'type' => 'text' ),
		'_city'                  => array( 'type' => 'text' ),
		'_email'                 => array( 'type' => 'text' ),
		'_zip'                   => array( 'type' => 'text' ),
		'_website'               => array( 'type' => 'text' ),
		'_service_forestry'      => array( 'type' => 'text' ),
		'_service_silvicultural' => array( 'type' => 'text' ),
		'_other_services'        => array( 'type' => 'text' ),
		'_education'             => array( 'type' => 'text' ),
		'_liablility_insurance'  => array( 'type' => 'text' ),
		'_surety_bond'           => array( 'type' => 'text' ),
		'_pesticide_applicators' => array( 'type' => 'text' ),
		'_macf'                  => array( 'type' => 'text' ),
		'_saf'                   => array( 'type' => 'text' ),
		'_sfl'                   => array( 'type' => 'text' ),
		'_flc'                   => array( 'type' => 'text' ),
		'_tsp'                   => array( 'type' => 'text' ),
		'_tsp_number'            => array( 'type' => 'text' ),
		'_cwms'                  => array( 'type' => 'text' ),
		'_taxonomy'              => array( 'type' => 'taxonomy_array' ),
		'_affiliations'          => array( 'type' => 'text' ),
	);

	public function __construct() {

		self::$save_keys['_taxonomy']['sanitize_callback'] =  __CLASS__ . '::save_taxonomy';

	}

	public function init() {

		add_action( 'init', __CLASS__ . '::register_post_type' );

		add_action( 'init', __CLASS__ . '::register_taxonomy' );

		add_action( 'edit_form_after_title', __CLASS__ . '::the_editor' );

		add_action( 'cahnrswsuwp_directory_filters', __CLASS__ . '::shortcode_filters', 10, 1 );

		add_action( 'cahnrswsuwp_directory_results', __CLASS__ . '::shortcode_results', 10, 1 );

		add_action( 'save_post_' . self::$post_type, __CLASS__ . '::save', 10, 3 );

		add_filter( 'the_content', __CLASS__ . '::the_content' );

	}


	public static function shortcode_filters( $type ) {

		if ( 'consultant' == $type ) {

			Plugin::require_class( 'county' );
			Plugin::require_class( 'service' );

			$counties = County::get_terms();
			$services = Service::get_terms();

			$service_selected = ( ! empty( $_REQUEST['services'] ) ) ? sanitize_text_field( $_REQUEST['services'] ) : '';
			$county_selected  = ( ! empty( $_REQUEST['county'] ) ) ? sanitize_text_field( $_REQUEST['county'] ) : '';
			$type_selected    = ( ! empty( $_REQUEST['service_type'] ) ) ? sanitize_text_field( $_REQUEST['service_type'] ) : '';

			include Plugin::get_template_dir() . '/consultant-shortcode-filters.php';

		}

	}

	public static function shortcode_results( $type ) {

		if ( 'consultant' == $type ) {

			Plugin::require_class( 'consultant' );

			$results = array();

			$args = self::get_query_args();

			$query = new \WP_Query( $args );


			// The Loop
			if ( $query->have_posts() ) {

				while ( $query->have_posts() ) {
					$query->the_post();

					$results[] = new Consultant( $query->post );

				}
			}

			/* Restore original Post Data */
			wp_reset_postdata();

			include Plugin::get_template_dir() . '/shortcode-results.php';
		}

	}


	protected static function get_query_args() {

		$service_selected = ( ! empty( $_REQUEST['services'] ) ) ? sanitize_text_field( $_REQUEST['services'] ) : '';
		$county_selected  = ( ! empty( $_REQUEST['county'] ) ) ? sanitize_text_field( $_REQUEST['county'] ) : '';
		$type_selected    = ( ! empty( $_REQUEST['service_type'] ) ) ? sanitize_text_field( $_REQUEST['service_type'] ) : '';

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

		if ( ! empty( $service_selected ) || ! empty( $county_selected ) ) {

			$args['tax_query'] = array(
				'relation' => 'AND',
			);

			if ( ! empty( $service_selected ) ) {
				$args['tax_query'][] = array(
					'taxonomy' => 'service',
					'field'    => 'slug',
					'terms'    => array( $service_selected ),
				);
			}

			if ( ! empty( $county_selected ) ) {
				$args['tax_query'][] = array(
					'taxonomy' => 'county',
					'field'    => 'slug',
					'terms'    => array( $county_selected ),
				);
			}
		}

		if ( ! empty( $type_selected ) ) {

			if ( 'service-forestry' === $type_selected ) {

				$args['meta_key']   = '_service_forestry';
				$args['meta_value'] = '1';

			}

			if ( 'service-silvicultural' === $type_selected ) {

				$args['meta_key']   = '_service_silvicultural';
				$args['meta_value'] = '1';

			}
		}

		return $args;

	}


	public static function the_content( $content ) {

		remove_filter( 'the_content', __CLASS__ . '::the_content' );

		if ( is_singular( self::$post_type ) ) {

			global $post;

			Plugin::require_class( 'consultant' );
			Plugin::require_class( 'county' );
			Plugin::require_class( 'service' );

			$consultant = new Consultant( $post );

			$taxonomies = $consultant->get_option( '_taxonomy' );
			$services = array();
			$counties = array();

			if ( ! empty( $taxonomies['service'] ) ) {

				foreach ( $taxonomies['service'] as $service ) {
					$services[] = Service::get_term_label( $service );
				}

			}

			if ( ! empty( $taxonomies['county'] ) ) {

				foreach ( $taxonomies['county'] as $county ) {
					$counties[] = County::get_term_label( $county );
				}
			}

			ob_start();

			include Plugin::get_template_dir() . '/consultant-content.php';

			return ob_get_clean();

		}

		return $content;

	}


	public static function the_editor( $post ) {

		if ( self::$post_type === $post->post_type ) {

			Plugin::require_class( 'county' );
			Plugin::require_class( 'service' );
			Plugin::require_class( 'consultant' );
			Plugin::require_class( 'forms' );

			$consultant = new Consultant( $post );
			$services   = Service::get_terms();
			$counties   = County::get_terms();

			wp_nonce_field( self::$nonce_action, self::$nonce_name );

			include Plugin::get_template_dir() . '/consultant-editor.php';

		}

	}

}

(new Directory_Forester)->init();
