<?php
/**
 * The template to display list of publications using ACF
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">
		    
      <h2><?php echo the_field('tp_publication_author'); ?></h2>
      <p><?php the_field('tp_publication_title'); ?></p>
      <p><?php the_field('tp_publication_publisher'); ?></p>
      <p><?php the_field('tp_publication_citation'); ?></p>
      <p><?php the_field('tp_publication_doi'); ?></p>
			<?php // Altmetric badge
					$tp_pub_doi = sanitize_text_field( get_field( 'tp_publication_doi') );
					if (strlen($tp_pub_doi)>0):
					
					?>
					<script type='text/javascript' src='https://d1bxh8uas1mnw7.cloudfront.net/assets/embed.js'></script>
					<div data-badge-popover="right" data-badge-type="donut" data-doi="<?php echo $tp_pub_doi; ?>" data-condensed="true" data-hide-no-mentions="true" class="altmetric-embed"></div>
					<?php endif; ?>
      <p><?php the_field('tp_publication_year'); ?></p>
      
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( is_single() ) {
		

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */

	?>

</article><!-- .post -->
