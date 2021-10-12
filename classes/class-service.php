<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Service {

	protected static $terms = array(
		'slash-disposal'                  => 'Brush/slash disposal',
		'inventory'                       => 'Forest inventory/appraisal/timber cruising',
		'forest-management-advice'        => 'Forest management advice',
		'forest-management-plan-writing'  => 'Forest management plan writing',
		'practices-permitting'            => 'Forest practices permitting',
		'security-consulting'             => 'Forestland security consulting',
		'fuels-reduction'                 => 'Fuels reduction',
		'gis'                             => 'GIS mapping services',
		'hazard-tree-assessment'          => 'Hazard tree assessment',
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
		'wildlife-damage'                 => 'Wildlife damage control',
		'wildlife-enhancement'            => 'Wildlife enhancement',
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
