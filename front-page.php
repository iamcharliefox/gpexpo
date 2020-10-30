<?php
  get_header();
?>

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


<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-slide-container">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <!-- do stuff inside of loop -->
    <?php include 'template-parts/hero-slide.php'; ?>
    <?php endwhile; wp_reset_query(); ?>
  </div>
</section>



<!-- FLEX BUILDER CONTENT -->
<?php if( have_rows('sections') ): ?>
    <?php while( have_rows('sections') ): the_row(); ?>
        <?php if( get_row_layout() == 'product_carousel_layout' ): ?>
           <?php include 'template-parts/product-slider.php'; ?>
        <?php elseif( get_row_layout() == 'upcoming_grid' ): ?>
            <?php include 'template-parts/upcoming-grid.php'; ?>
        <?php elseif( get_row_layout() == 'why_attend' ): ?>
            <?php include 'template-parts/why-attend.php'; ?>            
        <?php elseif( get_row_layout() == 'testimonials' ): ?>
            <?php include 'template-parts/testimonials-attendee.php'; ?>             
        <?php elseif( get_row_layout() == 'exhibit_with_us' ): ?>
            <?php include 'template-parts/exhibit-with-us.php'; ?>                          
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>













    




<?php
  get_footer();
?>