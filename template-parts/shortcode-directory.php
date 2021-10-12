<div class="cahnrswsuwp-c-directory">
	<form class="cahnrswsuwp-c-directory__form">
		<div class="cahnrswsuwp-c-directory__controls">
			<div class="cahnrswsuwp-c-directory__search">
				<input name="dir_search" class="cahnrswsuwp-c-directory__search__field" type="text" value="" aria-label="Search Text">
				<button class="cahnrswsuwp-c-directory__search__button" type="submit" aria-label="Search Submit">Search</button>
			</div>
			<div class="cahnrswsuwp-c-directory__filters">
				<?php do_action( 'cahnrswsuwp_directory_filters', $type ); ?>
				<button class="cahnrswsuwp-c-directory__filter__button" type="submit">Apply Filters</button>
			</div>
		</div>
		<div class="cahnrswsuwp-c-directory__items__wrapper">
			<?php do_action( 'cahnrswsuwp_directory_results', $type ); ?>
		</div>
	</form>
</div>
