<ul class="cahnrswsuwp-c-directory__items">
	<?php foreach ( $results as $result ) : ?>
	<li class="cahnrswsuwp-c-directory__item__wrapper">
		<h2 class="cahnrswsuwp-c-directory__item__title">
			<?php echo esc_html( $result->get( 'title' ) ); ?>
		</h2>
		<ul class="cahnrswsuwp-c-directory__item__content__wrapper">
			<li class="cahnrswsuwp-c-directory__item__location">
				<span class="wsu-icon wsu-i-location"></span><?php echo esc_html( $result->get_option( '_city' ) ); ?>, <?php echo esc_html( $result->get_option( '_state' ) ); ?>
			</li>
			<li class="cahnrswsuwp-c-directory__item__phone ">
				<span class="wsu-icon wsu-i-phone"></span><a href="tel:<?php echo esc_attr( $result->get_option( '_phone' ) ); ?>"><?php echo esc_html( $result->get_option( '_phone' ) ); ?></a>
			</li>
			<li class="cahnrswsuwp-c-directory__item__action">
				<a href="<?php echo esc_html( $result->get( 'link' ) ); ?>" class="cahnrswsuwp-c-directory__item__action__button">
					View Profile
				</a>
			</li>
		</ul>
	</li>
	<?php endforeach; ?>
</ul>