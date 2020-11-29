<section class="product-slider">
  <div class="container">        
    <h3>Products and Processes <span><nobr>for Profit</nobr></span></h3>

    <?php if( have_rows('product_carousel_group', 'option') ): ?>
        <?php while( have_rows('product_carousel_group', 'option') ): the_row(); ?>
          <?php if( get_sub_field('subtitle') ): ?><p><?php the_sub_field('subtitle'); ?></p><?php endif; ?>
          <?php $images = get_sub_field('product_carousel');
          if( $images ): ?>
                <div class="product-carousel slides">
                    <?php foreach( $images as $image ): ?>
                        <div>
                            <img src="<?php echo esc_url($image['sizes']['product-carousel']); ?>" alt="Thumbnail of <?php echo esc_url($image['alt']); ?>" />
                            <div class="caption"><?php echo esc_html($image['caption']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
          <?php endif; ?>        
        <?php endwhile; ?>
    <?php endif; ?>

  </div>








</section>



