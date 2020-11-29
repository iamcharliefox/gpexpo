<!-- FLEX BUILDER CONTENT -->
<?php if( have_rows('sections') ): ?>
    <?php while( have_rows('sections') ): the_row(); ?>
        <?php if( get_row_layout() == 'product_carousel_layout' ): ?>
           <?php include 'product-slider.php'; ?>
        <?php elseif( get_row_layout() == 'upcoming_grid' ): ?>
            <?php include 'upcoming-switcher.php'; ?>
        <?php elseif( get_row_layout() == 'why_attend' ): ?>
            <?php include 'why-attend.php'; ?>            
        <?php elseif( get_row_layout() == 'testimonials' ): ?>
            <?php include 'testimonials-attendee.php'; ?>             
        <?php elseif( get_row_layout() == 'exhibit_with_us' ): ?>
            <?php include 'exhibit-with-us.php'; ?>      
        <?php elseif( get_row_layout() == 'archived_events' ): ?>
            <?php include 'archive-table.php'; ?>                    
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>