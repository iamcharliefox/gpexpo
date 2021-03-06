<h2>Training</h2>

<?php 
$intro = get_sub_field('training_intro');

if( $intro ): ?>

<?php echo $intro; ?>

<?php endif; ?>



<br/><br/>




<?php
$event_dates = get_field('event_dates');

foreach ($event_dates as $event_date) {



    

    $args = array(
        'numberposts' => -1,
        'post_type' => 'training',
        'meta_key' => 'training_date',
        'meta_value' => $event_date,
        'meta_type' => 'DATETIME',
        'orderby' => 'training_time',
        'order' => 'ASC'
    );

    $the_query = new WP_Query($args);?>
    
    <?php if ($the_query->have_posts()): ?>

        <?php

        $date_nice = date("F j", strtotime($event_date)); ?>

        <h3><?php echo $date_nice; ?></h3>
        <div class="training-row head">
            <div class="training-time">Time (Eastern)</div>
            <div class="training-classroom">Classroom</div>
            <div class="training-level">Level</div>
            <div class="training-details">Description</div>
        </div>
        <hr>



        <!-- title -->

            <?php while ($the_query->have_posts()): $the_query->the_post();?>
            <div class="training-row">
                <div class="training-time">
                    <?php the_field('training_time'); ?>
                    to
                    <?php
                    $endTime = strtotime("+" . get_field('training_duration') . "minutes", strtotime(get_field('training_time')));
                    echo date('g:i a', $endTime);
                    ?>
                </div>
                <div class="training-classroom">
                    <?php if ( get_field( 'training_classroom' ) ): ?>
                    <?php the_field('training_classroom'); ?>
                    <?php else: ?>
                    -
                    <?php endif; ?>
                </div>
                <div class="training-level">
                    <?php if ( get_field( 'training_level' ) ): ?>
                    <?php the_field('training_level'); ?>
                    <?php else: ?>
                    -
                    <?php endif; ?>
                </div>                
                <div class="training-details">
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    <?php the_excerpt(); ?>
                    <br/>
                    <?php if ( get_field( 'training_sponsor' ) ): ?>
                    <span style="font-style:italic">Sponsored By: <?php the_field('training_sponsor'); ?></span>
                    <?php endif; ?>                    
                    
                </div>
            </div>
            <hr/>
            <?php endwhile;?>

    <?php endif;?>
  
    <?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>


<?php }; ?>


