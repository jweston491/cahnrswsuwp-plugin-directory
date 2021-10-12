<?php namespace CAHNRSWSUWP\Plugin\Directory;

class Entry {

	public function is_na( $value ) {

		if ( ! empty( $value ) ) {

			return $value;

		} else {

			return 'N/A';

		}

	}

	public function is_yes( $value ) {

		if ( ! empty( $value ) ) {

			return 'Yes';

		} else {

			return 'No';

		}

	}

}
