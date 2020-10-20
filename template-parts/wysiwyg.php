<?php

$wysiwyg = get_sub_field('wysiwyg');
if( $wysiwyg ) { ?>

  <div class="tab-section wysiwyg-content">
    <?php the_sub_field('wysiwyg'); ?>
  </div>

<?php }

 