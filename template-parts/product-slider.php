<section class="product-slider">
  <div class="container">        
    <h3>Featured <span>Products</span></h3>
    <?php the_sub_field('subtitle'); ?>
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
  </div>
</section>



