<!-- TESTIMONIALS -->
<?php if( get_field('testimonials_toggle') ): ?>
<section class="testimonials">
  <div class="container">
    <h3>What our <span>Attendees</span> have to say</h3>
    <p><?php the_sub_field('subtitle'); ?></p>    

    <?php
    $testimonial_loop = new WP_Query(
    array(
        'post_type' => 'Testimony',
        'showposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy'  => 'types',
                'terms'     =>'exhibitor',
                'field'     => 'slug'
            )
        )
      )
    );


    ?>


    <div class="testimonials-container">
      <?php while ( $testimonial_loop->have_posts() ) : $testimonial_loop->the_post(); ?>
      <div class="card">
        <div class="photo" style="background-image:url('<?php the_post_thumbnail_url() ?>')"></div>
        <div class="name"><?php the_title(); ?></div>
        <div class="company"><?php the_field('position'); ?> - <?php the_field('company_name'); ?></div>
        <div class="testimony"><?php the_content(); ?></div>
      </div>

      <?php endwhile; wp_reset_query(); ?>
    </div>







    
  </div>
</section>
<?php endif; ?>