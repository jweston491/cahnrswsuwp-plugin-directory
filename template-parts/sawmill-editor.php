<?php namespace CAHNRSWSUWP\Plugin\Directory;

?>

<?php Forms::header( 'Contact Information' ); ?>

<?php Forms::text_field( '_address', $sawmill->get_option( '_address' ), '', 'Address Line 1' ); ?>
<?php Forms::text_field( '_physical_address', $sawmill->get_option( '_physical_address' ), '', 'Physical Address' ); ?>
<?php Forms::text_field( '_phone', $sawmill->get_option( '_phone' ), '', 'Phone #' ); ?>
<?php Forms::text_field( '_state', $sawmill->get_option( '_state' ), '', 'State' ); ?>
<?php Forms::text_field( '_fax', $sawmill->get_option( '_fax' ), '', 'Fax #' ); ?>
<?php Forms::text_field( '_city', $sawmill->get_option( '_city' ), '', 'City' ); ?>
<?php Forms::text_field( '_email', $sawmill->get_option( '_email' ), '', 'Email' ); ?>
<?php Forms::text_field( '_zip', $sawmill->get_option( '_zip' ), '', 'Zip Code' ); ?>
<?php Forms::text_field( '_website', $sawmill->get_option( '_website' ), '', 'Website' ); ?>

<?php Forms::header( 'Services' ); ?>
<?php Forms::checkbox( '_mobile_service', 1, $sawmill->get_option( '_mobile_service' ), 'Mobile Services' ); ?>
<?php Forms::text_field( '_capacity', $sawmill->get_option( '_capacity' ), 'Mill Capacity' ); ?>
<?php Forms::text_field( '_other_services', $sawmill->get_option( '_other_services' ), 'Other Services Provided' ); ?>
<?php Forms::text_field( '_products', $sawmill->get_option( '_products' ), 'Specialized Products Sold' ); ?>
<?php Forms::text_field( '_billing', $sawmill->get_option( '_billing' ), 'Billing Options' ); ?>

<?php Forms::header( 'Counties Served' ); ?>
<?php foreach ( $counties as $key => $label ) : ?>
	<?php
	$current_value = ( $sawmill->has_taxonomy_term( 'county', $key ) ) ? $key : '';
	Forms::checkbox( '_taxonomy[county][]', $key, $current_value, $label, array( 'class' => 'wsuwp-f-pad-less' ) );
	?>
<?php endforeach; ?>

<?php Forms::header( 'General Description' ); ?>
<?php //Forms::editor( '_general_description', $sawmill->get_option( '_general_description' ) ); ?>

