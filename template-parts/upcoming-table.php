  <?php
  $today = current_time('Y-m-d');
  $start_date = get_sub_field("start_date");
  $end_date = get_sub_field("end_date");
  $notice_toggle = get_sub_field('notice_toggle');

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
    <h2 clas="headline">Upcoming Events</h2>
    <hr/>
    <?php the_sub_field('subtitle'); ?>


    <div class="upcoming-table">
    <?php while ( $loop_upcoming->have_posts() ) : $loop_upcoming->the_post(); ?>
   
    <?php
    $start_date = DateTime::createFromFormat('F j, Y', get_field("start_date"));
    $end_date = DateTime::createFromFormat('F j, Y', get_field("end_date"));
    $status = get_field_object('event_status');
    $value = $status['value'];
    $label = $status['choices'][ $value ];
    ?>

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
            echo $start_date->format( 'F' ) . " " . ordinal($start_date->format( 'j' )) . " - " . ordinal($end_date->format( 'j' )) . ", " . $start_date->format( 'Y' ); 
          } else { 
            echo $start_date->format( 'F' ) . " " . ordinal($start_date->format( 'j' )) . ", " . $start_date->format( 'Y' ); 
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




    <?php if ($notice_toggle == 1): ?>
    <div class="infobox">
      <div class="icon">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/exclamation-circle-solid.svg' ?>" alt="">
      </div>
      <div class="info">
        <div class="title"><?php the_sub_field('notice_title'); ?></div>
        <?php the_sub_field('notice_message'); ?>
      </div>
    </div>
    <?php endif ?>
  </div>
</section>    
    
    
    
    
    
