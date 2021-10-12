<div class="<?php echo esc_attr( $args['base-class'] ); ?>__wrapper">
	<label>
		<input 
			type="radio"
			id="wsuwp_form_input_<?php echo esc_attr( $key ); ?>"
			class="<?php echo esc_attr( $args['base-class'] ); ?>"
			name="<?php echo esc_attr( $key ); ?>" 
			value="<?php echo esc_attr( $value ); ?>"
			<?php if ( $value == $current_value ) : ?>checked="checked"<?php endif; ?>
			/>
			<?php echo esc_html( $label ); ?>
	</label>
</div>
