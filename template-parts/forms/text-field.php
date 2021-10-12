<div class="<?php echo esc_attr( $args['base-class'] ); ?>__wrapper">
	<?php if ( ! empty( $label ) ) : ?>
	<label for="wsuwp_form_input_<?php echo esc_attr( $key ); ?>">
		<?php echo esc_html( $label ); ?></label>
	<?php endif; ?>
	<input 
		type="text"
		id="wsuwp_form_input_<?php echo esc_attr( $key ); ?>"
		class="<?php echo esc_attr( $args['base-class'] ); ?>"
		name="<?php echo esc_attr( $key ); ?>" 
		value="<?php echo esc_attr( $value ); ?>" 
		placeholder="<?php echo esc_attr( $placeholder ); ?>" />
</div>