<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package codernote
 */
?>


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
		<div class="row">
			<?php dynamic_sidebar('sidebar-2');?>
		</div>
			<div class="site-info">
				<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'codernote' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'codernote' ), 'codernote', '<a href="http://tranhuychung.com/" rel="designer">Chung Tran</a>' ); ?>
			</div><!-- .site-info -->
			
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<!-- social connect --> 
<div id="cn-social-connect">
		<ul>
			<li>
				<a target="_new" title="@ facebook" href="#"><span class="fa fa-facebook fa-lg"></span></a>
			</li>
			<li>
				<a target="_new" title="@ Google+" href="#"><span class="fa fa-google-plus fa-lg"></span></a>
			</li>

			<li>
				<a target="_new" title="@ Twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a>
			</li>
			<li>
				<a target="_new" title="@ GitHub" href="#"><span class="fa fa-github fa-lg"></span></a>
			</li>
			<li>
				<a target="_new" title="@ linkedin" href="#"><span class="fa fa-linkedin fa-lg"></span></a>
			</li>
			<!--<li><a href="#" title="" target="_new"><span class="icon-bitbucket"></span></a></li>-->
		</ul>
</div>

</body>
</html>