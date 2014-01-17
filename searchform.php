<?php
/**
 * The template for displaying search forms in Keyring River
 *
 * @package Keyring River
 */
?>
<li class="search">
	<div class="icons"><span class="logo"><a href="/">&#xe094;</a></span></div>
	<div class="content">
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label>
				<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'keyring-river' ); ?></span>
				<input type="search" class="search-field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
			</label>
			<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'keyring-river' ); ?>">
		</form>
	</div>
</li>
