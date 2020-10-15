
<?php
  get_header();
?>

<div id="single">
<section class="hero" style="background-image:url(images/beach.jpeg)">

<div class="hero-inner">
  <div class="container">
          <div class="title"><h2><?php the_title() ?></h2></div>
        <div class="details"><i class="far fa-calendar"></i>&nbsp; August 12-14 &nbsp;&nbsp;&nbsp; <i class="fas fa-map-marker-alt"></i>&nbsp;Charlotte Convention Center</div>


</div>

</section>

<section class="content">
  <div class="container">
    <div class="intro">
      <img src="images/beach.jpeg" alt="">
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
          <?php

          // Check rows exists.
          if( have_rows('tabs') ):

              // Loop through rows.
              while( have_rows('tabs') ) : the_row();

                  // Load sub field value.
                  $tab_content = get_sub_field('tab_title_text');
                  // Do something.
                  echo "<div>" . $tab_content . "</div>";

              // End loop.
              endwhile;

          // No value.
          else :
              // Do something...
          endif;


          ?>
        </div>
    </div> 
 

    </div>
    <div class="sidebar">
      <div class="sidebar-item">
        <div class="title"><h5>Featured Advertisers</h5></div>
        <div class="inner">
          <ul>
            <li><img src="images/fa.png" alt=""></li>
            <li><img src="images/fa.png" alt=""></li>
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


