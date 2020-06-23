<?php
/**
 * Custome template for displaying a person
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php 
			$image = get_field( 'ucla-p-photo' );
		
			if( $image ):
				// Image variables.
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
				$caption = $image['caption'];
			
		 ?>
		 	<figure>
		 		<a href="<?php echo esc_url( get_permalink() ); ?>"><img class="u-photo" src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" /></a>

		 <?php 
    	if( $caption ): ?>
        <figcaption><?php echo esc_html($caption); ?></figcaption>
		<?php endif; 
		
			if( $image ): ?>
				</figure>
			<?php endif; ?>
		<?php endif; ?>

			<h1 class="p-name"><?php echo esc_html( get_field('ucla-p-given-name')." ".get_field('ucla-p-family-name') ); ?></h1>
		
			<?php if( get_field('ucla-p-job-title') ): ?>
				<p class="p-job-title"><?php echo esc_html( get_field( 'ucla-p-job-title' ) ); ?></p>
			<?php endif; ?>
				
			<?php if( get_field('ucla-p-org') ): ?>
				<p class="p-org"><?php echo esc_html( get_field( 'ucla-p-org' ) ); ?></p>
			<?php endif; ?>
			
			<?php if( get_field('ucla-p-tel') ): ?><p class="tel"><?php echo esc_html( get_field( 'ucla-p-tel' ) ); ?></p><?php endif; ?>
			<?php if( get_field('ucla-p-email') ): ?><p class="email"><a href="mailto:<?php echo esc_attr( get_field( 'ucla-p-email' ) ); ?>" class="email contact"><?php echo esc_html( get_field( 'ucla-p-email' ) ); ?></a></p><?php endif; ?>
			

			

				<?php if( get_field('ucla-p-summary') ): ?>
				<p class="p-summary"><?php echo esc_html( get_field( 'ucla-p-summary' ) ); ?></p>
				<?php endif; ?>



		</figcaption>
	
</div> <!-- close person block -->



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

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	?>

</article><!-- .post -->
