<?php
/**
 * The Template for displaying all single posts.
 *
 * @package codernote
 */

get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-md-8" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
			<?php get_template_part('/inc/share-post');?>

			<?php codernote_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
		</div> <!--end col content -->
		<div class="col-md-4">
		<?php get_sidebar(); ?>
		<!--end col sidebar-->
	</div> <!--end row-->
</div> <!--end container-->


<?php get_footer(); ?>