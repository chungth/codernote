<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package codernote
 */

if ( ! function_exists( 'codernote_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function codernote_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
	
		<div class="nav-links"> 
				<?php
	
					$big = 999999999; // need an unlikely integer
					
					$paginate = paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '/page/%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $GLOBALS['wp_query']->max_num_pages,
						'type' => 'array',
						
					) );
					?>
					<ul class="pagination pull-right">
					  <?php
					  $cur_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
					  if($cur_page == 1) $cur_page--; // if cur_page is first page, no previous link in array
					  foreach ( $paginate as $key => $page ) {
						$class = ($cur_page == $key) ? 'class="active"':'';
					    echo '<li '.$class.'>' . $page . '</li>';
					  }
					  ?>
					</ul>
		
			 
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'codernote_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function codernote_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'codernote' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'codernote' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'codernote' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'codernote_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function codernote_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
/*	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}*/

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	/* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', 'codernote' ) );

	printf( __( '<span class="posted-on"><i class="fa fa-clock-o"></i> %1$s</span><span class="byline"> <i class="fa fa-user"></i> %2$s</span><span class="incat"><i class="fa fa-th-list"></i> %3$s</span>', 'codernote' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		),
		$category_list
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function codernote_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so codernote_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so codernote_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in codernote_categorized_blog.
 */
function codernote_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'codernote_category_transient_flusher' );
add_action( 'save_post',     'codernote_category_transient_flusher' );
