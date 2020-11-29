<h2>Travel</h2>

<?php 
$intro = get_sub_field('travel_intro');

if( $intro ): ?>

<?php echo $intro; ?>

<?php endif; ?>


<?php

$show_code = get_field('show_code');
$show_code_name = esc_html( $show_code->name );


    $travel = new WP_Query(
        array(
            'post_type' => 'travel',
            'showposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'code',
                    'terms'     => $show_code_name,
                    'field'     => 'slug'
                )
            ),
            'orderby' => 'location_type',
            'meta_key' => 'location_type',
            'order' => 'ASC'
        )
    );

?>

<h3><?php echo $category->name; ?></h3>

<div class="travel-container">
<?php while ($travel->have_posts()) : $travel->the_post(); ?>
      <div class="thumb">
        <div class="inner" style="background-image:url('<?php the_post_thumbnail_url() ?>')"></div>
      </div>
      <div>
        <?php if (get_field('location_type') == "Convention Center") { ?>
        <div class="convention"><?php the_field('location_type'); ?></div>
        <?php } else { ?>
        <div class="hotel"><?php the_field('location_type'); ?></div>
        <?php }; ?>
        
        

        <h3><?php the_title(); ?></h3>

        <?php if (get_field('halls')) { ?>
           <div class="halls">HALLS: <?php the_field('halls'); ?></div>
        <?php }; ?>        

        <div class="address"><?php the_field('address'); ?></div>



        <div class="website"><a href="<?php the_field('link'); ?>" target="_blank">Website</a></div>

        <?php if (get_field('location_type') == "Convention Center") { ?>
           | <div class="parking"><a href="<?php the_field('parking_link'); ?>" target="_blank">Parking</a></div>
        <?php }; ?>

        <?php if (get_field('location_type') == "Hotel") { ?>
            | <div class="reservations"><a href="<?php the_field('reservations_link'); ?>" target="_blank">Online Reservations</a></div>
            <?php if( get_field('phone_number') ): ?><div class="phone">Phone: <?php the_field('phone_number'); ?></div><?php endif; ?>
           <?php if( get_field('discount_deadline') ): ?><div class="discount">Discount Deadline: <?php the_field('discount_deadline'); ?></div><?php endif; ?>
           <?php if( get_field('group_rate') ): ?><div class="group">Group Rate: $<?php the_field('group_rate'); ?></div><?php endif; ?>
        <?php }; ?>

        <?php if( get_field('other_info') ): ?><div class="other"><?php the_field('other_info'); ?></div><?php endif; ?>

      </div> 
<?php endwhile; ?>
</div>


<?php
    // Reset things, for good measure
    $travel = null;
    wp_reset_postdata();

// end the loop

?>