<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package codernote
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

 <!-- Fixed navbar -->
    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </div>
        <div class="navbar-collapse collapse">
	        <?php wp_nav_menu( 
	        		array( 
	        			'theme_location' => 'primary', 
	        			//'container_class' => 'navbar-collapse collapse',
	        			//'container_id' => 'primary-menu-wrapper',
	        			'menu_class' =>'nav navbar-nav',
	        			'menu_id'=>'primary-menu',
	        			'walker' => new wp_bootstrap_navwalker(),

	        			) 
	        		); 
	        ?>
        
			<form action="<?php echo home_url('/');?>" method="get" class="navbar-form navbar-right" role="search">
	        <div class="form-group">
	          <input type="text" name="s" id="search" value="<?php the_search_query();?>"class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">
	        	<span class="glyphicon glyphicon-search"></span>
	        </button>
	      </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>


