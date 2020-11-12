<?php $subtitle = get_sub_field('subtitle'); ?>


<section class="why-attend" id="why-attend" style="background-image:url('<?php the_post_thumbnail_url() ?>')"> 
  <div class="why-attend-inner">
    <div class="container">
      
              <?php 
          if(function_exists('the_custom_logo')){
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full' );
          }
        ?>
        
         <img src="<?php echo $logo[0] ?>" width="500" height="auto" alt="<?php echo get_bloginfo('name');?>">
         <h3>You Gotta Be There!</h3>
     <p><?php echo $subtitle; ?></p>
<?php if( get_sub_field('video') ): ?>
      <div class="video-container">
        <div class="embed-container">
          
            <?php the_sub_field('video'); ?>
            <style>
              .embed-container { 
                position: relative; 
                padding-bottom: 56.25%;
                overflow: hidden;
                max-width: 100%;
                height: auto;
              } 

              .embed-container iframe,
              .embed-container object,
              .embed-container embed { 
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
              }
            </style>  
  
        </div>
      </div>

          <?php else: ?>
          <div class="featured-image">
            <?php the_post_thumbnail('large'); ?>
          </div>
          <?php endif; ?>    

      <div class="icon-list-grid">

        <?php 
        $rows = get_sub_field('reasons');
        if( $rows ) {

            foreach( $rows as $row ) { 
                $title = $row['title'];
                $description = $row['description'];
                ?>
                <div class="list-item">
                  <div class="title"><?php echo $title; ?></div>
                  <p><?php echo $description; ?></p>
                </div>

            <?php } 

        };

        ?>
                 
      </div>
    </div>
  </div>
</section>