<div class="cahnrswsuwp-c-directory__filter">
	<label for="county" class="cahnrswsuwp-c-directory__filter__label">By County</label>
	<select name="county" class="cahnrswsuwp-c-directory__filter__select" id="county">
		<option value="">Select...</option>
		<?php foreach ( $counties as $key => $county ) : ?>
		<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $county_selected ); ?>>
			<?php echo esc_html( $county ); ?>
		</option>
		<?php endforeach; ?>
	</select>
</div>
<div class="cahnrswsuwp-c-directory__filter">
	<label for="dir_service" class="cahnrswsuwp-c-directory__filter__label">By Service</label>
	<select name="services" class="cahnrswsuwp-c-directory__filter__select" id="dir_service" >
		<option value="">Select...</option>
		<?php foreach ( $services as $key => $service ) : ?>
		<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $service_selected ); ?>>
			<?php echo esc_html( $service ); ?>
		</option>
		<?php endforeach; ?>
	</select>
</div>
<div class="cahnrswsuwp-c-directory__filter">
	<label for="dir_service_type" class="cahnrswsuwp-c-directory__filter__label">By Service Type</label>
	<select name="service_type" class="cahnrswsuwp-c-directory__filter__select" id="dir_service_type">
		<option value="">Select...</option>
		<option value="service-forestry" <?php selected( 'service-forestry', $type_selected ); ?>>
			Forestry Consultant
		</option>
		<option value="service-silvicultural" <?php selected( 'service-silvicultural', $type_selected ); ?>>
			Silvicultural Contractor
		</option>
	</select>
</div>