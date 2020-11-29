<?php
  get_header();
?>


<div class="gpx-hero" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/topo-new.svg' ?>')">
    <div class="hero-inner">
        <div class="container">
            <div class="title <?php the_field('show_format')?>">
                <h2><?php the_title(); ?></h2>
                <?php if( get_field('page_subtitle') ): ?>
                <h4><?php the_field('page_subtitle'); ?></h4>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<?php if( have_rows('sections') ): ?>
    <?php while( have_rows('sections') ): the_row(); ?>
        <?php if( get_row_layout() == 'product_carousel_layout' ): ?>
           <?php include 'template-parts/product-slider.php'; ?>
        <?php elseif( get_row_layout() == 'upcoming_grid' ): ?>
            <?php include 'template-parts/upcoming-switcher.php'; ?>
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