<?php namespace CAHNRSWSUWP\Plugin\Directory;

class County {

	protected static $terms = array(
		'clallam'      => 'Clallam',
		'clark'        => 'Clark',
		'cowlitz'      => 'Cowlitz',
		'grays-harbor' => 'Grays Harbor',
		'island'       => 'Island',
		'jefferson'   => 'Jefferson',
		'king'         => 'King',
		'kitsap'       => 'Kitsap',
		'lewis'    	   => 'Lewis',
		'mason'        => 'Mason',
		'pacific'      => 'Pacific',
		'pierce'       => 'Pierce',
		'san-juan'     => 'San Juan',
		'skagit'       => 'Skagit',
		'skamania'     => 'Skamania',
		'snohomish'    => 'Snohomish',
		'thurston'     => 'Thurston',
		'wahkiakum'    => 'Wahkiakum',
		'whatcom'      => 'Whatcom',
		'adams'        => 'Adams',
		'asotin'       => 'Asotin',
		'benton'       => 'Benton',
		'chelan'       => 'Chelan',
		'columbia'     => 'Columbia',
		'douglas'      => 'Douglas',
		'ferry'       => 'Ferry',
		'franklin'     => 'Franklin',
		'garfield'     => 'Garfield',
		'grant'        => 'Grant',
		'kittitas'     => 'Kittitas',
		'klickitat'    => 'Klickitat',
		'lincoln'      => 'Lincoln',
		'okanogan'     => 'Okanogan',
		'pend-oreille' => 'Pend Oreille',
		'spokane'      => 'Spokane',
		'stevens'      => 'Stevens',
		'walla-walla'  => 'Walla Walla',
		'whitman'      => 'Whitman',
		'yakima'       => 'Yakima',
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
