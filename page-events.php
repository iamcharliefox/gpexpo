<?php
  get_header();
?>

<section class="hero" style="min-height:105px;">

</section>

<section class="upcoming">
  <div class="container">
    <h3>All <span>Events</span></h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Donec sed odio dui.</p>

    <?php
  $today = current_time('Y-m-d');

  $loop = new WP_Query( array(
    'post_type' => 'Events',
    'posts_per_page' => 6,
    'meta_key' => 'start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => 'start_date',
              'value' => $today,
              'compare' => '>=',
              'type'      => 'DATE',
          )                   
        )
    )
    ); 


    ?>

    <div class="upcoming-grid">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <div>
        <a href="<?php the_permalink(); ?>">
        <div class="thumbnail" style="background-image:url('<?php the_post_thumbnail_url() ?>')">
        <?php
if( get_field('registration_open') ) { ?>
          <div class="status">
            <i class="fas fa-check" style="color:#4AD800"></i> Registration Open
          </div>  
<?php } ?>
      
        </div>
        </a>
        <div class="title"><?php the_title(); ?></div>
        <?php
                $Date = get_field("start_date");
$date_range = get_field("event_duration");
$newDate = date('F j', strtotime($Date. " + {$date_range} days"));
        ?>
        <div class="details"><?php the_field('start_date'); ?> - <?php echo $newDate ?></div>
        <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel qui ea dicta blanditiis nulla eius ipsum iure laborum facere, maiores quisquam quidem alias?</div>
      </div>
    <?php endwhile; wp_reset_query(); ?>
    </div>


    <div class="infobox">
      <div class="icon">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/exclamation-circle-solid.svg' ?>" alt="">
      </div>
      <div class="info">
        <div class="title">COVID-19 Updates</div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum maxime voluptatem corrupti quam, dicta quisquam officia illo cum mollitia, iste inventore eum expedita saepe porro, culpa totam sequi provident autem? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor et corporis ea! Ullam, eos hic obcaecati quisquam consequuntur, sapiente quasi officia maiores veritatis ipsa perspiciatis, aliquam in ut facere magni.
      </div>
      
    </div>
  </div>
</section>

<section class="upcoming">
  <div class="container">
    <h3>Archived <span>Events</span></h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Donec sed odio dui.</p>

    <?php
  $today = current_time('Y-m-d');

  $archive = new WP_Query( array(
    'post_type' => 'Events',
    'posts_per_page' => -1,
    'meta_key' => 'start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => 'start_date',
              'value' => $today,
              'compare' => '<',
              'type'      => 'DATE',
          )                   
        )
    )
    ); 


    ?>

    <div class="upcoming-grid">
    <?php while ( $archive->have_posts() ) : $archive->the_post(); ?>
      <div>
        <a href="<?php the_permalink(); ?>">
        <div class="thumbnail" style="background-image:url('<?php the_post_thumbnail_url() ?>')">
        <?php
if( get_field('registration_open') ) { ?>
          <div class="status">
            <i class="fas fa-check" style="color:#4AD800"></i> Registration Open
          </div>  
<?php } ?>
      
        </div>
        </a>
        <div class="title"><?php the_title(); ?></div>
        <?php
                $Date = get_field("start_date");
$date_range = get_field("event_duration");
$newDate = date('F j', strtotime($Date. " + {$date_range} days"));
        ?>
        <div class="details"><?php the_field('start_date'); ?> - <?php echo $newDate ?></div>
        <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel qui ea dicta blanditiis nulla eius ipsum iure laborum facere, maiores quisquam quidem alias?</div>
      </div>
    <?php endwhile; wp_reset_query(); ?>
    </div>


  </div>
</section>






<section class="builder" id="builder" style="background-image:url('<?php the_post_thumbnail_url() ?>')"> 
  <div class="builder-inner">
    <div class="container">
      <h3>Why Attend <span>The Graphics Pro Expo</span>?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Donec sed odio dui.</p>

      <div class="icon-list-grid">
        <div class="list-item">
          <div class="title">Lorem, ipsum dolor.</div>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus, expedita explicabo. Quos tenetur sit eos! At voluptatibus veritatis consequatur perferendis perspiciatis deserunt ut cum recusandae illo impedit, eum aut incidunt!</p>
        </div>
        <div class="list-item">
          <div class="title">Lorem, ipsum dolor.</div>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus, expedita explicabo. Quos tenetur sit eos! At voluptatibus veritatis consequatur perferendis perspiciatis deserunt ut cum recusandae illo impedit, eum aut incidunt!</p>
        </div>
        <div class="list-item">
          <div class="title">Lorem, ipsum dolor.</div>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus, expedita explicabo. Quos tenetur sit eos! At voluptatibus veritatis consequatur perferendis perspiciatis deserunt ut cum recusandae illo impedit, eum aut incidunt!</p>
        </div>
        <div class="list-item">
          <div class="title">Lorem, ipsum dolor.</div>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus, expedita explicabo. Quos tenetur sit eos! At voluptatibus veritatis consequatur perferendis perspiciatis deserunt ut cum recusandae illo impedit, eum aut incidunt!</p>
        </div>                  
      </div>
    </div>
  </div>
</section>

<section class="testimonials">
  <div class="container">
    <h3>What our <span>Attendees</span> have to say</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Donec sed odio dui.</p>    

    <?php
    $testimonial_loop = new WP_Query( array(
      'post_type' => 'Testimony',
      'posts_per_page' => -1,
      )
    );
    ?>


    <div class="testimonials-container">
      <?php while ( $testimonial_loop->have_posts() ) : $testimonial_loop->the_post(); ?>
      <div class="card">
        <div class="photo" style="background-image:url('<?php the_post_thumbnail_url() ?>')"></div>
        <div class="name"><?php the_title(); ?></div>
        <div class="company">Position - Company Name</div>
        <div class="testimony"><?php the_content(); ?></div>
      </div>

      <?php endwhile; wp_reset_query(); ?>
    </div>
  </div>
</section>

<section class="exhibit-with-us">
  <div class="container">
    <h3><span>Exhibit</span> with us</h3>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec sed odio dui. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec ullamcorper nulla non metus auctor fringilla.</p>    
    <a href="#" class="button blue">Learn More</a>
  </div>
</section>


    




<?php
  get_footer();
?>