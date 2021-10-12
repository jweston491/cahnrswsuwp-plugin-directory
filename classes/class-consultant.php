<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Consultant extends Entry {

	protected $options = array();
	protected $title;
	protected $link;
	protected $default_options = array(
		'_address'               => '',
		'_phone'                 => '',
		'_state'                 => '',
		'_fax'                   => '',
		'_city'                  => '',
		'_email'                 => '',
		'_zip'                   => '',
		'_website'               => '',
		'_service_forestry'      => '',
		'_service_silvicultural' => '',
		'_other_services'        => '',
		'_education'             => '',
		'_liablility_insurance'  => '',
		'_surety_bond'           => '',
		'_pesticide_applicators' => '',
		'_macf'                  => '',
		'_saf'                   => '',
		'_sfl'                   => '',
		'_flc'                   => '',
		'_tsp'                   => '',
		'_tsp_number'            => '',
		'_cwms'                  => '',
		'_taxonomy'              => '',
		'_affiliations'          => '',
	);


	public function __construct( $post = false ) {

		$this->set_consultant( $post );

	}

	public function get( $property ) {

		switch ( $property ) {
			case 'title':
				return $this->title;
			case 'link':
				return $this->link;
			default:
				return '';
		}

	}


	public function get_option( $option, $default = '' ) {

		if ( array_key_exists( $option, $this->options ) ) {

			return $this->options[ $option ];

		}

		return $default;

	}

	public function has_taxonomy_term( $taxonomy, $term ) {

		if ( array_key_exists( $taxonomy, $this->options['_taxonomy'] ) ) {

			if ( in_array( $term, $this->options['_taxonomy'][ $taxonomy ], true ) ) {

				return true;
			}

			return false;

		} else {

			return false;

		}

	}





	public function set_consultant( $post = false ) {

		if ( ! empty( $post ) ) {

			$this->title = $post->post_title;
			$this->link  = get_the_permalink( $post );

			$post_id = $post->ID;

			foreach ( $this->default_options as $key => $option ) {

				$this->options[ $key ] = get_post_meta( $post_id, $key, true );

			} // End foreach

			if ( ! is_array( $this->options['_taxonomy'] ) || empty( $this->options['_taxonomy'] ) ) {

				$this->options['_taxonomy'] = array();

				$taxonomies = array( 'service', 'county' );

				foreach ( $taxonomies as $taxonomy ) {

					$terms = get_the_terms( $post, $taxonomy );

					foreach ( $terms as $term ) {

						$this->options['_taxonomy'][ $taxonomy ][] = $term->slug;

					}
				}

			}
		} // End if

	}
}
