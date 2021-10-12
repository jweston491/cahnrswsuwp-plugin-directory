<div class="<?php echo esc_attr( $args['base-class'] ); ?>__wrapper <?php echo esc_attr( $args['class'] ); ?>">
	<label>
		<?php // override when form is unchecked since forms doesn't send $_POST data for unchecked checkboxes ?>
		<input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="0">
		<input 
			type="checkbox"
			id="wsuwp_form_input_<?php echo esc_attr( $key ); ?>"
			class="<?php echo esc_attr( $args['base-class'] ); ?>"
			name="<?php echo esc_attr( $key ); ?>" 
			value="<?php echo esc_attr( $value ); ?>"
			<?php if ( strval( $value ) === $current_value ) : ?>checked="checked"<?php endif; ?>
			/>
			<?php echo esc_html( $label ); ?>
	</label>
</div>
