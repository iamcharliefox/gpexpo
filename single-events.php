
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
        
        <?php 
        $address = get_field('address');
        if( $address ): 
            $address_url = $address['url'];
            $address_title = $address['title'];
            $address_target = $address['target'] ? $address['target'] : '_self';
            ?>
            <i class="fas fa-map-marker-alt"></i>&nbsp;
            <a href="<?php echo esc_url( $address_url ); ?>" target="<?php echo esc_attr( $address_target ); ?>"><?php echo esc_html( $address_title ); ?></a>
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

                      elseif(get_row_layout() == "test_layout"):
                        $test_content = get_sub_field('test_text');
                        echo $test_content;
                      
                      endif;
                    
                    endwhile; ?>

                    
                          
                    </div>
          
              <?php endwhile; ?>
          
          <?php endif; ?>	

        </div>
    </div> 
 

    </div>
    <div class="sidebar">
      <div class="sidebar-item">
        <div class="title"><h5>Featured Advertisers</h5></div>
        <div class="inner">
          <ul>
            <?php
              // Check rows exists.
              if( have_rows('advertiser_banner') ):

                  // Loop through rows.
                  while( have_rows('advertiser_banner') ) : the_row();

                      // Load sub field value.
                      $adv_url = get_sub_field('advertiser_link');
                      $adv_image = get_sub_field('advertiser_image');
                      // Do something.
                      echo "<li><a href=\"" . $adv_url . "\" target=\"_blank\"><img src=\"" . $adv_image . "\"></a></li>";

                  // End loop.
                  endwhile;

              // No value.
              else :
                  // Do something...
              endif;
            ?>
          </ul>
        </div>        
      </div>

      <div class="sidebar-item">
        <div class="title"><h5>Event Details</h5></div>
        <div class="inner">
          <div class="item">
            <div class="icon">
              <img src="images/icon-ph.png" alt="">
            </div>
            <div class="details">
              <div class="label">Status</div>
              <div class="desc">Lorem ipsum dolor sit amet</div>
            </div>
          </div>
          <div class="item">
            <div class="icon">
              <img src="images/icon-ph.png" alt="">
            </div>
            <div class="details">
              <div class="label">Schedule</div>
              <div class="desc">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, minus. </div>
            </div>
          </div>   
          <div class="item">
            <div class="icon">
              <img src="images/icon-ph.png" alt="">
            </div>
            <div class="details">
              <div class="label">Venue</div>
              <div class="desc">Lorem ipsum dolor sit amet</div>
            </div>
          </div>  
          <div class="item">
            <div class="icon">
              <img src="images/icon-ph.png" alt="">
            </div>
            <div class="details">
              <div class="label">Location</div>
              <div class="desc">Lorem ipsum dolor sit amet</div>
            </div>
          </div>     
          <div class="item">
            <div class="icon">
              <img src="images/icon-ph.png" alt="">
            </div>
            <div class="details">
              <div class="label">Phone</div>
              <div class="desc">Lorem ipsum dolor sit amet</div>
            </div>
          </div> 
          <div class="item">
            <div class="icon">
              <img src="images/icon-ph.png" alt="">
            </div>
            <div class="details">
              <div class="label">Fax</div>
              <div class="desc">Lorem ipsum dolor sit amet</div>
            </div>
          </div> 
          <div class="item">
            <div class="icon">
              <img src="images/icon-ph.png" alt="">
            </div>
            <div class="details">
              <div class="label">Email</div>
              <div class="desc">Lorem ipsum dolor sit amet</div>
            </div>
          </div>   
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


