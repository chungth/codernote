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
			

		<div class="tag-list">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ' ', 'codernote' ) );

				printf('<i class="fa fa-tags fa-lg"></i> %1$s',
					$tag_list
				);
			?>
		</div><!-- .tag-list -->
		<div class="author-box">
		 	<div class="author-avatar author-avatar-single">
		 		<?php echo get_avatar( get_the_author_meta('email'), 96 ); ?>
		 	</div> 

		<div class="author-description">
			<h3 class="author-name">
				<?php the_author_posts_link(); ?> 
			</h3>
			<?php echo get_the_author_meta('description');?>
		</div>
		 <p class="pull-right">
		 	 <label>Follow <?php the_author();?>:</label>
			 <a href="<?php echo get_the_author_meta('url')?>" title="<?php the_author();?>'s homepage">
			 	<i class="fa fa-desktop"></i>
			 	<?php the_author();?>'s homepage
			 </a>
			 
		 </p>
		</div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() ) :
					comments_template();
				else:
					comments_template('/disqus_comments.php');
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
		</div> <!--end col content -->
		<div class="col-md-4">
		<?php get_sidebar(); ?>
		</div><!--end col sidebar-->

	</div> <!--end row-->
</div> <!--end container-->


<?php get_footer(); ?>