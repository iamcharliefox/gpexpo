
<?php
$today = current_time('Y-m-d');
$start_date = get_field("start_date");
$end_date = get_field("end_date");

$loop = new WP_Query( array(
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

<div class="hero-slide" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/topo.svg' ?>')">

  <div class="hero-slide-inner">
    <img src="<?php echo get_template_directory_uri() . '/assets/images/nbm-gpx.svg' ?>" alt="">
  </div>
</div>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div class="hero-slide">
  <div class="hero-background" style="background-image:url('<?php the_post_thumbnail_url() ?>')">

  </div>
  <div class="hero-slide-inner">
    
      <?php if (get_field('show_format') == 'Online') { ?>
        <div class="format">
          Online Event
        </div>
      <?php }; ?>
    

    <div class="title"><h2><?php the_title(); ?></h2></div>

    <div class="details">

      <!-- venue -->
      <div class="venue">
        <?php if (!empty(get_field('venue'))) { 
        the_field('venue');
        }; ?>
      </div>

      <!-- dates -->
      <div class="dates">
        <?php
        $start_date = DateTime::createFromFormat('F j, Y', get_field("start_date"));
        $end_date = DateTime::createFromFormat('F j, Y', get_field("end_date"));
        if ($start_date != $end_date) { 
          echo $start_date->format( 'F' ) . " " . ordinal($start_date->format( 'j' )) . " - " . ordinal($end_date->format( 'j' )) . ", " . $start_date->format( 'Y' ); 
        } else { 
          echo $start_date->format( 'F' ) . " " . ordinal($start_date->format( 'j' )) . ", " . $start_date->format( 'Y' ); 
        }; ?>
      </div>

    </div>
    <div class="button-group">
      <a href="<?php the_permalink(); ?>" class="button">Details</a>
      <?php
      if( get_field('registration_link') ) { ?>
      <a href="<?php the_field('registration_link'); ?>" class="button">Register Now</a>
      <?php } ?>            
    </div>
  </div>
</div>  
<?php endwhile; wp_reset_query(); ?>  