<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <?php
    wp_head();
  ?>

</head>
<body <?php body_class(); ?>>

<div class="gpx-nav">
  <div class="container">
    <div class="nav-inner">
      <div class="logo">
        <?php 
          if(function_exists('the_custom_logo')){
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full' );
          }
        ?>
        
         <a href="<?php if (is_tree(19)) { echo site_url() . "/exhibit"; } else echo site_url(); ?>"><img src="<?php echo $logo[0] ?>" width="225" height="auto" alt="<?php echo get_bloginfo('name');?>"></a>
      </div>
      <div class="links">

        <!-- top navigation START -->
        <div class="desktop-links">
                  <?php
        if (is_tree(19)) {
          wp_nav_menu(
            array(
              'menu' => 'exhibit',
              'container' => '',
              'theme_location' => 'exhibit',
              'items_wrap' => '<ul>%3$s</ul>'
            )
          );
        } else {
          wp_nav_menu(
            array(
              'menu' => 'primary',
              'container' => '',
              'theme_location' => 'primary',
              'items_wrap' => '<ul>%3$s</ul>'
            )
          );
        }
        
        ?>         
        </div> 

        <div class="mobile-links">
          <i class="fas fa-bars"></i>
        </div> 
 
        
        <!-- top navigation END -->


      </div>
    </div>
  </div>  
</div>