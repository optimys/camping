<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>	
<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/responsive.css"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php echo getScriptInHeader(); ?>
</head>
<body <?php body_class();?>>
<div id="wrapper">
      <div id="header">
      	<a href="<?php bloginfo('url'); ?>"><img class="image_r2d1"src="<?php header_image(); ?>" width="91" height="88" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<span class="image_r2d2"><img src="/wp-content/uploads/2015/07/1202.png" /></span>
			<span class="image_r2d3"><img src="/wp-content/uploads/2015/07/1203.png" /></span>
			<span class="image_r2d4"><?php echo showinHeader() ?></span>
			<span class="image_r2d5"><a class="colorbox_image" href="<?php echo get_site_url();?>/wp-content/uploads/2015/07/1255.png"><img src="/wp-content/uploads/2015/07/1212.png" /></a></span>
			<span class="image_r2d6"><a class="colorbox_image" href="<?php echo get_site_url();?>/wp-content/uploads/2015/07/1254.png"><img src="/wp-content/uploads/2015/07/5198.png" /></a></span>
            <div class="header-bot">
                  <?php wp_nav_menu(  array('theme_location' => 'social' , 'menu_class' => 'social',  'container' => false)); ?>
            </div>            
            	<div class="sidebar hide-large">
					<a href="#" id="pull">
						<?php _e('Menu','language');?>
					</a>
            <?php wp_nav_menu(  array('theme_location' => 'sidebar-nav' , 'menu_class' => 'sidebar-nav rounds',  'container' => false)); ?>
            </div>
      </div>