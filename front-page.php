<?php
  get_header();
?>




<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-slide-container">

    <!-- do stuff inside of loop -->
    <?php include 'template-parts/hero-slide.php'; ?>

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