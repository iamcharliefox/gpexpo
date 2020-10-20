<?php 
$images = get_sub_field('logos');

if( $images ): ?>
      <div class="tab-section">
            <h3>Presenting Sponsors</h3>
            <div class="sponsor-grid-large">
            
            <?php foreach( $images as $image ): ?>
            <?php $link = get_field('image_link', $image['ID']); ?>
                  <div>
                        <?php if( $link): ?><a href="<?php echo $link; ?>" target="_blank"><?php endif; ?>
                        <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php if( $link): ?></a><?php endif; ?>


                  </div>
            <?php endforeach; ?>
            </div>
      </div>

<?php endif; ?>
