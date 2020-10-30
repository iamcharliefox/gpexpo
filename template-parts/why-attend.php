<?php $subtitle = get_sub_field('subtitle'); ?>


<section class="why-attend" id="why-attend" style="background-image:url('<?php the_post_thumbnail_url() ?>')"> 
  <div class="why-attend-inner">
    <div class="container">
      <h3>Why Attend <span>THE GRAPHICS PRO EXPO</span>?</h3>
     <p><?php echo $subtitle; ?></p>

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