  <?php
  $today = current_time('Y-m-d');
  $start_date = get_sub_field("start_date");
  $end_date = get_sub_field("end_date");


  $loop_upcoming = new WP_Query( array(
    'post_type' => 'Events',
    'posts_per_page' => '-1',
    'meta_key' => 'start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => 'end_date',
              'value' => $today,
              'compare' => '<',
              'type'      => 'DATE',
          )                   
        )
    )
  );
  ?>

<!-- UPCOMING GRID -->
<section class="upcoming">
  <div class="container">


    

    <div class="upcoming-table">
    <hr>

    <?php if ( $loop_upcoming->have_posts() ): while ( $loop_upcoming->have_posts() ): ?>
   <?php $loop_upcoming->the_post(); ?>
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

      <div class="event-row <?php echo $showformatvalue; ?>">
        <div class="thumb">
            <a href="<?php the_permalink(); ?>">
              <div class="thumb-inner" style="background-image:url('<?php the_post_thumbnail_url() ?>')">
                <div class="status <?php echo esc_html($label); ?>">
                  <?php echo esc_html($label); ?>
                </div> 
              </div>
            </a>
        </div>
        <div class="event-details">
          <div class="title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </div>
          <div class="details">
            <div class="dates">
            <i class="far fa-calendar-check"></i>
            <?php
            $start_date = DateTime::createFromFormat('F j, Y', get_field("start_date"));
            $end_date = DateTime::createFromFormat('F j, Y', get_field("end_date"));
            if ($start_date != $end_date) { 
              echo $start_date->format( 'F' ) . " " . $start_date->format( 'j' ) . "-" . $end_date->format( 'j' ) . ", " . $start_date->format( 'Y' ); 
            } else { 
              echo $start_date->format( 'F' ) . " " . $start_date->format( 'j' ) . ", " . $start_date->format( 'Y' ); 
            }; ?>
            </div>

            <?php if (get_field('venue')) { ?>
            <div class="venue">
              <i class="fas fa-map-marker-alt"></i> <?php the_field('venue'); ?>
            </div>
            <?php }; ?>

            <?php if ($showformatvalue == "online") { ?>
            <div class="format">
              <i class="fas fa-desktop"></i> <?php echo $showformatlabel; ?>
            </div>
            <?php }; ?>  

          </div>        
          <div class="description"><?php the_excerpt(); ?></div>
        </div>      
      </div>

  
     <?php endwhile; ?>
    <?php else : ?>
            <div class="errorbox">


                There are currently no archived events.
                <a href="<?php echo site_url(); ?>/events">View upcoming events</a>

            </div>
        <!-- Display "Posts not found" message here -->
    <?php endif; ?>

    </div>




  </div>
</section>    
    
    
    
    
    
