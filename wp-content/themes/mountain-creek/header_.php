<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8"/>
<title><?php wp_title();?></title>	
<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<!--<div id="id-vidgeta-primary" class="moi-saidbar">
  вызываем функцию отображения сайт бара
<?php dynamic_sidebar( 'primary' ); ?>
</div>-->
<div id="wrapper">
      <div id="header">
	   <div class="image_title_1">
	   <div class="image_title_1_main"><img src="/wp-content/uploads/2015/07/1202.png" /></div>
	   </div>
	   
	   <div class="image_title_2"><a href="/about-us"><img src="/wp-content/uploads/2015/07/logo1.png" /></a></div>
            
            <div class="header-bot">
                  <?php wp_nav_menu(  array('theme_location' => 'social' , 'menu_class' => 'social',  'container' => false)); ?>
            </div>            
            	<div class="sidebar hide-large">
					<a href="#" id="pull">
						<?php _e('Menu','mountaincreek');?>
					</a>
            <?php wp_nav_menu(  array('theme_location' => 'sidebar-nav' , 'menu_class' => 'sidebar-nav rounds',  'container' => false)); ?>
            </div>
      </div>