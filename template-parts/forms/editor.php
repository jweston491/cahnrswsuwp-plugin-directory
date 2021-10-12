<div class="<?php echo esc_attr( $args['base-class'] ); ?>__wrapper">
	<?php if ( ! empty( $label ) ) : ?>
	<label for="wsuwp_form_input_<?php echo esc_attr( $key ); ?>">
		<?php echo esc_html( $label ); ?></label>
	<?php endif; ?>
	<?php wp_editor( $content, $key, $settings ); ?>
</div>
