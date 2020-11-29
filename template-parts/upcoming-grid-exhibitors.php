    <?php
  $today = current_time('Y-m-d');
  $start_date = get_sub_field("start_date");
  $end_date = get_sub_field("end_date");
  $grid_items = get_sub_field('grid_items');
  $notice_toggle = get_sub_field('notice_toggle');

  $loop_upcoming = new WP_Query( array(
    'post_type' => 'Events',
    'posts_per_page' => '6',
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
<section class="upcoming">
  <div class="container">
    <h3>Upcoming <span>Events</span></h3>
    <?php the_sub_field('subtitle'); ?>


    <div class="upcoming-grid exhibitors">
    <?php while ( $loop_upcoming->have_posts() ) : $loop_upcoming->the_post(); ?>
   
    <?php
    $start_date = DateTime::createFromFormat('F j, Y', get_field("start_date"));
    $end_date = DateTime::createFromFormat('F j, Y', get_field("end_date"));
    $status = get_field_object('event_status');
    $value = $status['value'];
    $label = $status['choices'][ $value ];
    ?>
  

      <div>
        
        <div class="thumbnail" style="background-image:url('<?php the_post_thumbnail_url() ?>')">
          <div class="thumbnail-inner">
            <?php if (get_field('show_format') != "Online") { ?>
              <div class="title"><?php the_title(); ?></div>
            <?php } else { ?>
            <div class="breakaway">
              <img src="<?php echo get_template_directory_uri() . '/assets/images/breakaway.svg' ?>" alt="" class="breakaway-logo">
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

          <?php if (get_field('show_format') == "Online") { ?>
          <div class="format">
            <i class="fas fa-desktop"></i> <?php the_field('show_format'); ?>
          </div>
          <?php }; ?>  

        </div>

        <div class="description"><?php the_excerpt(); ?></div>
      </div>
    <?php endwhile; wp_reset_query(); ?>
    </div>


  </div>
</section>    
    
    
    
    
    
