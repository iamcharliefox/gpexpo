
<?php 
$images = get_sub_field('logos');
if( $images ): ?>

<div class="sidebar-item">
  <div class="title">
    <h5>Title Sponsors</h5>
  </div>
  <div class="inner">
    <ul>
      <li>

    <div id="slider" class="flexslider">
        <div class="adv-slider">
            <?php foreach( $images as $image ): ?>
                <div class="adv-slide">
                    <?php $link = get_field('image_link', $image['ID']); ?>
                    <?php if( $link): ?><a href="<?php echo $link; ?>" target="_blank"><?php endif; ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php if( $link): ?></a><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

      </li>
    </ul>
  </div>
</div>

<?php endif; ?>
