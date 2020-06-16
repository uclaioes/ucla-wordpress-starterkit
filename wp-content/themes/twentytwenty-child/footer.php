<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div class="section-inner">
				<small><a href="http://www.ucla.edu/accessibility">Accessiblity</a> | <a href="http://www.ucla.edu/terms-of-use/">Terms of Use</a></small>
					<div class="footer-credits">
					
						<small class="footer-copyright">
							&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://www.php.net/date */
								_x( 'Y', 'copyright date format', 'twentytwenty' )
							);
							?>
							<a href="https://www.universityofcalifornia.edu/">Regents of the University of California</a>
							
							
						</small><!-- .footer-copyright -->

					
					</div><!-- .footer-credits -->

					<a class="to-the-top" href="#site-header">
						<span class="to-the-top-long">
							<?php
							/* translators: %s: HTML character for up arrow. */
							printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-long -->
						<span class="to-the-top-short">
							<?php
							/* translators: %s: HTML character for up arrow. */
							printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-short -->
					</a><!-- .to-the-top -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

			<script>performance.mark('WP Footer Start');</script>
		<?php wp_footer(); ?>
		<script>performance.mark('WP Footer End');</script>	

	<script>
		performance.mark('BODY End');
		performance.measure('BODY Time', 'BODY Start', 'BODY End');
	</script>
	
	<script>

	(function() {

		// Only progress if the browser supports User Timings
		if (window.performance) {

			// Store URL params for debugging later
			var params = (new URL(document.location)).searchParams;

			// Loop through all performance entries we’ve captured
			perfEntries = performance.getEntries();
			for (i = 0; i < perfEntries.length; i++) {

				// Only act on mark or measure timings
				if (perfEntries[i].entryType == 'mark' || perfEntries[i].entryType == 'measure') {

					// For marks we need the startTime; for measures we need the duration
					var timingType = perfEntries[i].entryType == 'mark' ? perfEntries[i].startTime : perfEntries[i].duration;

					// Send the data off to Google Analytics and store in our ‘Custom Timings’ category
					ga('send', 'timing', 'Custom Timings', perfEntries[i].name, timingType);

					// Log the marks and measures if we have ?debug=true on the URL
					if (params.get('debug')) {
						console.log(perfEntries[i].name + ': ' + timingType);
					}

				}

			}

		}

	}());

	</script>
	</body>
</html>
