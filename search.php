<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package codernote
 */

get_header(); ?>


<div class="container">
	<div class="row">
		<div class="col-md-8" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'codernote' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php codernote_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

</div> <!--end col content -->
		<div class="col-md-4">
		<?php get_sidebar(); ?>
		<!--end col sidebar-->
	</div> <!--end row-->
</div> <!--end container-->
<?php get_footer(); ?>
