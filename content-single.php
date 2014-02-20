<?php
/**
 * @package codernote
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php codernote_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php get_template_part('/inc/share-post');?>
	<div class="entry-content">
		<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('full',array('class'=>'img-thumbnail aligncenter'));
			} 
		?>
		<?php the_content(); ?>

	</div><!-- .entry-content -->


</article><!-- #post-## -->
