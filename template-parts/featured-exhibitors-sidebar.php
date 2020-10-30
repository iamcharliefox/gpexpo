<?php 
$images = get_sub_field('logos');

if( $images ):
shuffle($images); // randomizes the image array
$max = 1; // set the max here;
$count = 0; // current count
?>

<div class="sidebar-item">
  <div class="title">
    <h5>Featured Exhibitor</h5>
  </div>
  <div class="inner">
    <ul>
      <li>
        
        

    <?php 
    foreach( $images as $image ):
    $count++; // increment count
    // if count is greater than limt, stop showing images
    if ($count > $max) {
    break;
    }
    ?>

    <?php $link = get_field('image_link', $image['ID']); ?>
    <div>
    <?php if( $link): ?><a href="<?php echo $link; ?>" target="_blank"><?php endif; ?>
    <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php if( $link): ?></a><?php endif; ?>
    </div>
    <?php endforeach; ?>


      </li>
    </ul>
  </div>
</div>

<?php endif; ?>
