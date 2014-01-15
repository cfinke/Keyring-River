<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Keyring River
 */
?>
	</ul> <!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
	jQuery( function( $ ) {
		if ( $( window ).width() > 600 ) {
			stroll.bind( '#content' );
		}
	} );
</script>

</body>
</html>