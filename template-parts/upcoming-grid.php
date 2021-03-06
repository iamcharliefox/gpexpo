    <?php
  $today = current_time('Y-m-d');
  $start_date = get_sub_field("start_date");
  $end_date = get_sub_field("end_date");


  $loop_upcoming = new WP_Query( array(
    'post_type' => 'Events',
    'posts_per_page' => 6,
    'meta_key' => 'start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => 'end_date',
              'value' => $today,
              'compare' => '>=',
              'type'      => 'DATE',
          )                   
        )
    )
  );
  ?>

<!-- UPCOMING GRID -->
<section class="upcoming grid">
  <div class="container">
    <h3>Upcoming <span>Events</span></h3>

    <!-- get subtitle from options page -->
    <?php if( have_rows('upcoming_grid_group', 'option') ): ?>
        <?php while( have_rows('upcoming_grid_group', 'option') ): the_row(); ?>
            <?php if( get_sub_field('subtitle') ): ?><p><?php the_sub_field('subtitle'); ?></p><?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>    


    <div class="upcoming-grid">
    <?php while ( $loop_upcoming->have_posts() ) : $loop_upcoming->the_post(); ?>
   
    <?php
    $start_date = DateTime::createFromFormat('F j, Y', get_field("start_date"));
    $end_date = DateTime::createFromFormat('F j, Y', get_field("end_date"));
    $status = get_field_object('event_status');
    $value = $status['value'];
    $label = $status['choices'][ $value ];
    $showformat = get_field_object('show_format');
    $showformatvalue = $showformat['value'];
    $showformatlabel = $showformat['choices'][ $showformatvalue ];
    ?>
  

      <div>
        <a href="<?php the_permalink(); ?>">
        <div class="thumbnail" style="background-image:url('<?php the_post_thumbnail_url() ?>')">
          <div class="thumbnail-inner">
            <?php if ($showformatvalue != "online") { ?>
              <div class="title"><?php the_title(); ?></div>
            <?php } else { ?>
            <div class="breakaway">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/breakaway-outline.svg' ?>" alt="" class="breakaway-logo">
              <div class="breakaway-title">
                <?php the_title(); ?>
              </div>
            </div>

            <?php }; ?>  
          </div>




          <?php if( !empty( $status ) ): ?>
          <div class="status <?php echo esc_html($label); ?>">
            <?php echo esc_html($label); ?>
          </div>            
          <?php endif; ?> 


      
        </div>
        </a>





        <div class="details">
          <div class="dates">
            <a href="<?php the_permalink(); ?>">
            <i class="far fa-calendar-check"></i>
            <?php
            $start_date = DateTime::createFromFormat('F j, Y', get_field("start_date"));
            $end_date = DateTime::createFromFormat('F j, Y', get_field("end_date"));
            if ($start_date != $end_date) { 
              echo $start_date->format( 'F' ) . " " . $start_date->format( 'j' ) . "-" . $end_date->format( 'j' ) . ", " . $start_date->format( 'Y' ); 
            } else { 
              echo $start_date->format( 'F' ) . " " . $start_date->format( 'j' ) . ", " . $start_date->format( 'Y' ); 
            }; ?>
            </a>
          </div>

          <?php if (get_field('venue')) { ?>
          <div class="venue">
            <a href="<?php the_permalink(); ?>"><i class="fas fa-map-marker-alt"></i> <?php the_field('venue'); ?></a>
          </div>
          <?php }; ?>

          <?php if ($showformatvalue == "online") { ?>
          <div class="format">
            <a href="<?php the_permalink(); ?>"><i class="fas fa-desktop"></i> <?php echo $showformatlabel; ?></a>
          </div>
          <?php }; ?>  

        </div>

        <div class="description"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>
      </div>
    <?php endwhile; wp_reset_query(); ?>
    </div>



    <a href="/events" class="button blue">View All Events</a>



    <!-- get COVID-19 updates from options page -->
    <?php if( have_rows('upcoming_grid_group', 'option') ): ?>
        <?php while( have_rows('upcoming_grid_group', 'option') ): the_row(); ?>
          <?php if( get_sub_field('covid-19_notice') ): ?>
            <div class="infobox">
              <div class="icon">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/exclamation-circle-solid.svg' ?>" alt="">
              </div>
              <div class="info">
                <div class="title">COVID-19 Updates</div>
                <?php the_sub_field('covid-19_notice'); ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>  


            



  </div>
</section>    
    
    
    
    
    
