<!-- do stuff inside loop -->
<div class="hero-slide" style="background-image:url('<?php the_post_thumbnail_url() ?>')">
  <div class="hero-slide-inner">
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
  