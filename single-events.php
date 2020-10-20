
<?php
  get_header();
?>

<div id="single">
<section class="hero" style="background-image:url('<?php the_post_thumbnail_url() ?>')">

  <div class="hero-inner">
    <div class="container">
      <div class="title"><h2><?php the_title() ?></h2></div>
      <div class="details">
        <i class="far fa-calendar"></i>&nbsp; August 12-14 &nbsp;&nbsp;&nbsp; 
          <!-- location -->
          <?php  
          $venue = get_field('venue');
          $map = get_field('google_maps_link');
          if( !empty( $venue ) ): ?> 
            <i class="fas fa-map-marker-alt"></i>&nbsp;
            <a href="<?php echo esc_url( $map ); ?>" target="blank"><?php the_field('venue'); ?></a>
          <?php endif; ?>         
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container">
    <div class="intro">
      <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large', array( 'class' => 'article-hero' ) ); } ?>
      <article>

        <!-- post editor content -->
        <?php



          if( have_posts() ){
            while( have_posts() ){
              the_post();
              the_content();
            }
          }
        ?>    

        <!-- share widget -->
        <div class="share">
          Share This Event
        </div>
        
      </article>

    </div>
    <div class="tabs">

    <div id="tab">       
      <!-- loop through tabs and display in tab row    -->
      <ul class="resp-tabs-list">
        <?php
          // Check rows exists.
          if( have_rows('tabs') ):

              // Loop through rows.
              while( have_rows('tabs') ) : the_row();

                  // Load sub field value.
                  $tab_title = get_sub_field('tab_title_text');
                  // Do something.
                  echo "<li>" . $tab_title . "</li>";

              // End loop.
              endwhile;

          // No value.
          else :
              // Do something...
          endif;
        ?>
        </ul> 

        <!-- loop through tab content and display within corresponding tab content area -->
        <div class="resp-tabs-container">                                                        

          <?php if( have_rows('tabs') ): ?>
          
              <?php while ( have_rows('tabs') ) : the_row(); ?>
                    
                    <div>

                    <?php while(has_sub_field("tab_content")):
                    
                      if(get_row_layout() == "wysiwyg_layout"):
                      
                        $wysiwyg = get_sub_field('wysiwyg');
                        include ('template-parts/wysiwyg.php');
                      
                      elseif(get_row_layout() == "title_sponsors_layout"):
                        include ('template-parts/title-sponsors.php');

                      elseif(get_row_layout() == "presenting_sponsors_layout"):
                        include ('template-parts/presenting-sponsors.php');         

                      elseif(get_row_layout() == "training"):
                        include ('template-parts/training.php');                                         
                      
                      endif;
                    
                    endwhile; ?>

                    
                          
                    </div>
          
              <?php endwhile; ?>
          
          <?php endif; ?>	

        </div>
    </div> 
 

    </div>
    <div class="sidebar">

      <!-- featured advertisers -->
      <?php 
      $repeater = get_field( 'advertiser_banner' );
      if( !empty( $repeater ) ): ?>
      <div class="sidebar-item">
        <div class="title"><h5>Featured Advertisers</h5></div>
        <div class="inner">
          <ul>
            <?php 
            $banner_count = get_field( 'banner_count' );
            $count = count($repeater);

            if( $count < $banner_count ){
              $final_count = $count;
            } else {
              $final_count = $banner_count;
            }

            // Get a random rows. Change the second parameter in array_rand() to how many rows you want.
            $random_rows = array_rand( $repeater, $final_count );
            // Loop through the random rows if more than one is returned
            if( is_array( $random_rows ) ){
                foreach( $random_rows as $random_row ){ ?>
                    <li>
                    <?php if( $repeater[$random_row]['advertiser_link']): ?><a href="<?php echo $repeater[$random_row]['advertiser_link']; ?>" target="_blank"><?php endif; ?>
                    <img src="<?php echo esc_url($repeater[$random_row]['advertiser_image']); ?>"  />
                    <?php if( $repeater[$random_row]['advertiser_link']): ?></a><?php endif; ?>
                    </li>
                <?php }
            } 
            ?>
          </ul>
        </div>        
      </div>
      <?php endif; ?>

      <div class="sidebar-item">
        <div class="title"><h5>Event Details</h5></div>
        <div class="inner">

          <!-- event status -->
          <?php
          $status = get_field_object('event_status');
          $value = $status['value'];
          $label = $status['choices'][ $value ];
          ?>
          <?php if( !empty( $status ) ): ?>
          <div class="item">
            <div class="icon">
              <i class="fas fa-check"></i>
            </div>
            <div class="details">
              <div class="label">Status</div>
              <div class="desc"><?php echo esc_html($label); ?></div>
            </div>
          </div>
          <?php endif; ?>          

          <!-- schedule -->
          <div class="item">
            <div class="icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="details">
              <div class="label">Schedule</div>
              <div class="desc">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, minus. </div>
            </div>
          </div>   

          <!-- venue -->
          <?php 
          $venue = get_field('venue');
          if( !empty( $venue ) ): ?>          
          <div class="item">
            <div class="icon">
              <i class="fas fa-building"></i>
            </div>
            <div class="details">
              <div class="label">Venue</div>
              <div class="desc"><?php echo $venue; ?></div>
            </div>
          </div> 
          <?php endif; ?>  

          <!-- location -->
          <?php 
          $address = get_field('address'); 
          $map = get_field('google_maps_link');
          if( !empty( $address ) ): ?> 
          <div class="item">
            <div class="icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="details">
              <div class="label">Address</div>
              <div class="desc"><a href="<?php echo esc_url( $map ); ?>" target="blank"><?php the_field('address'); ?></a></div>
            </div>
          </div>   
          <?php endif; ?>            
          

          <!-- phone number -->
          <?php 
          $phone = get_field('phone', 'option');
          if( !empty( $phone ) ): ?>
                    <div class="item">
                      <div class="icon">
                        <i class="fas fa-phone"></i>
                      </div>
                      <div class="details">
                        <div class="label">Phone</div>
                        <div class="desc"><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></div>
                      </div>
                    </div> 
          <?php endif; ?>          
  
          <!-- fax number -->
          <?php 
          $fax = get_field('fax', 'option');
          if( !empty( $fax ) ): ?>
                    <div class="item">
                      <div class="icon">
                        <i class="fas fa-fax"></i>
                      </div>
                      <div class="details">
                        <div class="label">Fax</div>
                        <div class="desc"><?php echo $fax; ?></div>
                      </div>
                    </div> 
          <?php endif; ?>  

          <!-- fax number -->
          <?php 
          $email = get_field('email', 'option');
          if( !empty( $email ) ): ?>
                    <div class="item">
                      <div class="icon">
                        <i class="fas fa-at"></i>
                      </div>
                      <div class="details">
                        <div class="label">Email</div>
                        <div class="desc"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
                      </div>
                    </div> 
          <?php endif; ?>  



          <div class="button-group">
            <a href="#" class="button blue">REGISTER HERE</a>
            <a href="#" class="button blue">ADD TO CALENDAR</a>
          </div>                                                   
        </div>        
      </div>      
    </div>

    <!-- <div class="ads">ads - Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nobis non labore exercitationem eligendi voluptates minima, sapiente eius, tempore molestias, ea adipisci voluptas! Deleniti atque, commodi natus iure rerum incidunt.</div> -->
  </div>
</section>
</div>




<?php
  get_footer();
?>


