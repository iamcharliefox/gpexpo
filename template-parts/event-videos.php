<?php

$show_code = get_field('show_code');
$show_code_name = esc_html( $show_code->name );


    $videos = new WP_Query(
        array(
            'post_type' => 'video',
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


<?php if ($videos->have_posts()): ?>

            <div class="sidebar-item">
              <div class="title">
                <h5>Videos</h5>
              </div>
              <div class="inner">

<div class="videos-container">

<?php while ($videos->have_posts()) : $videos->the_post(); ?>
    <div class="video">
        <div class="embed-container">

            <?php

            // get iframe HTML
            $iframe = get_field('video_url');
            // use preg_match to find iframe src
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];

            // add extra params to iframe src
            $params = array(
                'controls'    => 1,
                'hd'        => 1,
                'autohide'    => 1
            );

            $new_src = add_query_arg($params, $src);

            $iframe = str_replace($src, $new_src, $iframe);

            // add extra attributes to iframe html
            $attributes = 'frameborder="0" class="lazyload"';
            // use preg_replace to change iframe src to data-src
            $iframe = preg_replace('~<iframe[^>]*\K(?=src)~i','data-',$iframe);
            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

            // echo $iframe
            echo $iframe;

            ?>


        </div>


     <div class="caption">
         <?php the_field('video_caption'); ?>
     </div>
    </div>


<?php endwhile; ?>
</div>

              </div>
            </div> 

<?php endif;?>

<?php
    // Reset things, for good measure
    $videos = null;
    wp_reset_postdata();

// end the loop

?>