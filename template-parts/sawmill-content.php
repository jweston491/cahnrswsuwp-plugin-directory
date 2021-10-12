<div class="cahnrswsuwp-c-dir__profile-sawmill">
	<div class="cahnrswsuwp-c-dir__profile-sawmill__contact__wrapper">
		<h2 class="cahnrswsuwp-c-dir__profile-sawmill__section-title">Contact Information</h2>
		<ul class="cahnrswsuwp-c-dir__profile-sawmill__contact__details">
			<li class="cahnrswsuwp-c-dir__profile-sawmill__contact__address">
			<?php echo esc_html( $sawmill->get_option( '_address' )); ?>
			</li>
			<?php if ( ! empty( $sawmill->get_option( '_city' ) ) ) : ?><li class="cahnrswsuwp-c-dir__profile-sawmill__contact__state">
				<?php echo esc_html( $sawmill->get_option( '_city' ) ); ?>, <?php echo esc_html( $sawmill->get_option( '_state' ) ); ?>, <?php echo esc_html( $sawmill->get_option( '_zip' ) ); ?>
			</li><?php endif; ?>
			<?php if ( ! empty( $sawmill->get_option( '_phone' ) ) ) : ?><li class="cahnrswsuwp-c-dir__profile-sawmill__contact__phone">
			<span class="cahnrswsuwp-c-dir__profile_label">Phone</span>: <?php echo esc_html( $sawmill->get_option( '_phone' ) ); ?>
			</li><?php endif; ?>
			<?php if ( ! empty( $sawmill->get_option( '_fax' ) ) ) : ?><li class="cahnrswsuwp-c-dir__profile-sawmill__contact__fax">
			<span class="cahnrswsuwp-c-dir__profile_label">Fax:</span> <?php echo esc_html( $sawmill->get_option( '_fax' ) ); ?>
			</li><?php endif; ?>
			<?php if ( ! empty( $sawmill->get_option( '_email' ) ) ) : ?>
			<li class="cahnrswsuwp-c-dir__profile-sawmill__contact__email">
			<span class="cahnrswsuwp-c-dir__profile_label">Email:</span> <?php echo esc_html( $sawmill->get_option( '_email' ) ); ?>
			</li><?php endif; ?>
			<?php if ( ! empty( $sawmill->get_option( '_website' ) ) ) : ?><li class="cahnrswsuwp-c-dir__profile-sawmill__contact__website">
			<a href="<?php echo esc_url( $sawmill->get_option( '_website' ) ); ?>"><?php echo esc_html( $sawmill->get_option( '_website' ) ); ?></a>
			</li><?php endif; ?>
		</ul>
	</div>
	<div class="cahnrswsuwp-c-dir__profile-sawmill__remarks__wrapper">
		<h2 class="cahnrswsuwp-c-dir__profile-sawmill__section-title">General Description</h2>
		<p>
		<?php echo wp_kses_post( $content ); ?>
		</p>
	</div>
	<div class="cahnrswsuwp-c-dir__profile-sawmill__services__wrapper">
		<h2 class="cahnrswsuwp-c-dir__profile-sawmill__section-title">Services</h2>
		<ul>
			<li><span class="cahnrswsuwp-c-dir__profile_label">Mobile services:</span> <?php echo esc_html( $sawmill->is_yes( $sawmill->get_option( '_mobile_service' ) ) ); ?></li>
			<?php if ( ! empty( $sawmill->get_option( '_capacity' ) ) ) : ?><li>
				<span class="cahnrswsuwp-c-dir__profile_label">Mill Capacity:</span> <?php echo esc_html( $sawmill->get_option( '_capacity' ) ); ?>
			</li><?php endif; ?>
			<?php if ( ! empty( $sawmill->get_option( '_other_services' ) ) ) : ?><li>
				<span class="cahnrswsuwp-c-dir__profile_label">Other Services provided:</span> <?php echo esc_html( $sawmill->get_option( '_other_services' ) ); ?>
			</li><?php endif; ?>
			<?php if ( ! empty( $sawmill->get_option( '_products' ) ) ) : ?><li>
				<span class="cahnrswsuwp-c-dir__profile_label">Specialized products:</span> <?php echo esc_html( $sawmill->get_option( '_products' ) ); ?>
			</li><?php endif; ?>
			<?php if ( ! empty( $sawmill->get_option( '_billing' ) ) ) : ?><li>
				<span class="cahnrswsuwp-c-dir__profile_label">Billing Options:</span> <?php echo esc_html( $sawmill->get_option( '_billing' ) ); ?>
			</li><?php endif; ?>
		</ul>
	</div>
	<div class="cahnrswsuwp-c-dir__profile-sawmill__county__wrapper">
		<h2 class="cahnrswsuwp-c-dir__profile-sawmill__section-title">Counties Served</h2>
		<ul class="cahnrswsuwp-c-dir__profile-sawmill__county__details">
			<?php foreach ( $counties as $county ) : ?>
				<?php if ( strlen( $county ) > 0 ) : ?>
					<li class="cahnrswsuwp-c-dir__profile-sawmill__county">
						<?php echo esc_html( $county ); ?>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
