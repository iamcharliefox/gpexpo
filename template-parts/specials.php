<h2>Specials</h2>

<?php 
$intro = get_sub_field('specials_intro');

if( $intro ): ?>

<?php echo $intro; ?>

<?php endif; ?>


<?php

$show_code = get_field('show_code');
$show_code_name = esc_html( $show_code->name );


    $specials = new WP_Query(
        array(
            'post_type' => 'products',
            'showposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'code',
                    'terms'     => $show_code_name,
                    'field'     => 'slug'
                )
            )
        )
    );

?>


<div class="specials-container">
<?php while ($specials->have_posts()) : $specials->the_post(); ?>

      <div class="thumb" >
         <a href="<?php the_field('product_link'); ?>">
        <div class="inner" style="background-image:url('<?php the_post_thumbnail_url() ?>')"></div>
        </a>
      </div>
      <div>
        <h3><?php the_title(); ?></h3>
        <div class="company"><?php the_field('company_name'); ?></div>
        <?php the_content(); ?>
        <a href="<?php the_field('product_link'); ?>">Learn More &raquo;</a>
      </div> 

<?php endwhile; ?>
</div>

<?php
    // Reset things, for good measure
    $specials = null;
    wp_reset_postdata();

// end the loop

?>