<?php namespace CAHNRSWSUWP\Plugin\Directory;

?>

<?php Forms::header( 'Contact Information' ); ?>

<?php Forms::text_field( '_address', $consultant->get_option( '_address' ), '', 'Address Line 1' ); ?>
<?php Forms::text_field( '_phone', $consultant->get_option( '_phone' ), '', 'Phone #' ); ?>
<?php Forms::text_field( '_state', $consultant->get_option( '_state' ), '', 'State' ); ?>
<?php Forms::text_field( '_fax', $consultant->get_option( '_fax' ), '', 'Fax #' ); ?>
<?php Forms::text_field( '_city', $consultant->get_option( '_city' ), '', 'City' ); ?>
<?php Forms::text_field( '_email', $consultant->get_option( '_email' ), '', 'Email' ); ?>
<?php Forms::text_field( '_zip', $consultant->get_option( '_zip' ), '', 'Zip Code' ); ?>
<?php Forms::text_field( '_website', $consultant->get_option( '_website' ), '', 'Website' ); ?>

<?php Forms::header( 'Service Type' ); ?>

<?php Forms::checkbox( '_service_forestry', 1, $consultant->get_option( '_service_forestry' ), 'Forestry Consultant' ); ?>
<?php Forms::checkbox( '_service_silvicultural', 1, $consultant->get_option( '_service_silvicultural' ), 'Silvicultural Contractor' ); ?>

<?php Forms::header( 'Services Provided' ); ?>

<?php foreach ( $services as $key => $label ) : ?>
	<?php 
	$current_value = ( $consultant->has_taxonomy_term( 'service', $key ) ) ? $key : '';
	Forms::checkbox( '_taxonomy[service][]', $key, $current_value, $label );
	?>
<?php endforeach; ?>

<?php Forms::text_field( '_other_services', $consultant->get_option( '_other_services' ), 'Other Services Provided' ); ?>

<?php Forms::header( 'Counties Served' ); ?>

<?php foreach ( $counties as $key => $label ) : ?>
	<?php
	$current_value = ( $consultant->has_taxonomy_term( 'county', $key ) ) ? $key : '';
	Forms::checkbox( '_taxonomy[county][]', $key, $current_value, $label );
	?>
<?php endforeach; ?>

<?php Forms::header( 'Optional Information' ); ?>

<?php Forms::text_field(
	'_education',
	$consultant->get_option( '_education' ),
	'Experience/Education of Key Personnel'
); ?>

<?php Forms::text_field(
	'_liablility_insurance',
	$consultant->get_option( '_liablility_insurance' ),
	'Liability Insurance'
); ?>

<?php Forms::text_field(
	'_surety_bond',
	$consultant->get_option( '_surety_bond' ),
	'Surety Bond'
); ?>

<?php Forms::text_field(
	'_pesticide_applicators',
	$consultant->get_option( '_pesticide_applicators' ),
	'Licensed Pesticide Applicators'
); ?>

<?php Forms::checkbox( '_cwms', 1, $consultant->get_option( '_cwms' ), 'Certified Wildfire Mitigation Specialist(s) (CWMS) on staff' ); ?>
<?php Forms::checkbox( '_tsp', 1, $consultant->get_option( '_tsp' ), 'NRCS Technical Service Provider (TSP)' ); ?>
<?php Forms::text_field( '_tsp_number', $consultant->get_option( '_tsp_number' ), 'TSP ID Number' ); ?>

<?php Forms::text_field(
	'_affiliations',
	$consultant->get_option( '_affiliations' ),
	'Professional Affiliations'
); ?>

<?php Forms::header( 'For Consulting Foresters' ); ?>
<?php Forms::checkbox( '_sfl', 1, $consultant->get_option( '_sfl' ), 'Registered Washington State Farm Labor Contractor' ); ?>
<?php Forms::text_field( '_flc', $consultant->get_option( '_flc' ), 'FLC license number' ); ?>

<?php Forms::header( 'Business Description and Remarks:' ); ?>
