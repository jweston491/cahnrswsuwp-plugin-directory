<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Service {

	protected static $terms = array(
		'slash-disposal'                  => 'Brush/slash disposal',
		'gis'                             => 'GIS mapping services',
		'forest-management-advice'        => 'Forest management advice',
		'forest-management-plan-writing'  => 'Forest management plan writing',
		'inventory'                       => 'Forest inventory/appraisal/timber cruising',
		'practices-permitting'            => 'Forest practices permitting',
		'security-consulting'             => 'Forestland security consulting',
		'invasive-species-control'        => 'Invasive species identification and control',
		'non-timber-products'             => 'Non-timber forest products',
		'pre-commercial-thinning'         => 'Pre-commercial thinning',
		'prescribed-burning'              => 'Prescribed burning',
		'property-surveying'              => 'Property surveying',
		'reforestation'                   => 'Reforestation/tree planting',
		'riparian-management-alternative' => 'Riparian management/alternative plan applications',
		'road-maintenance'                => 'Road maintenance/engineering',
		'site-preparation-chemical'       => 'Site preparation – chemical',
		'site-preparation-mechanical'     => 'Site preparation – mechanical',
		'timber-sale'                     => 'Timber sale management/marketing',
		'trail-construction'              => 'Trail/Boardwalk construction',
		'vegetation-control-chemical'     => 'Vegetation control/release – chemical',
		'vegetation-control-mechanical'   => 'Vegetation control/release – mechanical',
		'wildlife-enhancement'            => 'Wildlife enhancement',
		'wildlife-damage'                 => 'Wildlife damage control',
		'fuels-reduction'                 => 'Fuels reduction',
	);

	public static function get_terms() {

		return self::$terms;

	}

	
	public static function get_term_label( $term ) {

		if ( array_key_exists( $term, self::$terms ) ) {
			return self::$terms[ $term ];

		}

		return '';

	}
}
