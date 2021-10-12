<div class="cahnrswsuwp-c-directory__filter">
	<label for="service" class="cahnrswsuwp-c-directory__filter__label">By County</label>
	<select name="fs_county" class="cahnrswsuwp-c-directory__filter__select" id="fs_county">
		<option value="">Select...</option>
		<?php foreach ( $counties as $key => $county ) : ?>
		<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $county_selected ); ?>>
			<?php echo esc_html( $county ); ?>
		</option>
		<?php endforeach; ?>
	</select>
</div>