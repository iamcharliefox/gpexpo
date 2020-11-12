  <div class="tab-section wysiwyg-content">




<?php the_sub_field('files_intro'); ?>


<?php 
$rows = get_sub_field('files');
if( $rows ) {
    echo '<div class="files-container">';
    foreach( $rows as $row ) {
        $file = $row['file']; ?>





<?php

if( $file ):  

    // Extract variables.
    $url = $file['url'];
    $title = $file['title'];
    ?>
    <div class="file">
    <a href="<?php echo esc_attr($url); ?>" title="<?php echo esc_attr($title); ?>" target="_blank">
        <i class="far fa-file-pdf"></i>
       <div><?php echo esc_html($title); ?></div>
    </a>
    </div>


<?php endif; ?>


    <?php }
    echo '</div>';
};

?>

</div>