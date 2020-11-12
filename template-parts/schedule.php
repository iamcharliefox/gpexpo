<h2>Schedule</h2>


<?php
$timezone = get_field_object( 'time_zone' );
$timezone_value = $timezone['value'];
$timezone_label = $timezone['choices'][ $timezone_value ];
?>


<?php 
$intro = get_sub_field('schedule_intro');

if( $intro ): ?>

<?php echo $intro; ?>

<?php endif; ?>



<br/><br/>



<?php
$start_date = get_field("start_date");
$date_range = get_field("event_duration");
$end_date = get_field("end_date");




$schedule_session = dateRange( $start_date, $end_date);


foreach ($schedule_session as $event_date) {
    $time = current_time( 'timestamp' ); // Get current unix timestamp

    $args = array(
        'numberposts' => -1,
        'post_type' => 'schedule',
        'meta_key' => 'schedule_date',
        'meta_value' => $event_date,
        'meta_type' => 'DATETIME',
        'orderby' => 'schedule_time_start',
        'order' => 'ASC',


        

    );

    $the_query = new WP_Query($args);?>
    
    <?php if ($the_query->have_posts()): ?>

        <?php

        $date_nice = date("F j", strtotime($event_date)); ?>

        <h3><?php echo $date_nice; ?></h3>
        <div class="schedule-row head">
            <div class="schedule-time">Time <?php if (!empty($timezone)) { echo "(" . esc_html($timezone_label) . ")"; }?></div>
            <div class="schedule-details">Description</div>
        </div>
        <hr>



        <!-- title -->

            <?php while ($the_query->have_posts()): $the_query->the_post();?>
            <div class="schedule-row">
                <div class="schedule-time">
                    <?php if ( get_field( 'schedule_time_start' ) ): ?>
                    <?php the_field('schedule_time_start'); ?>
                    to
                    <?php the_field('schedule_time_end'); ?> <?php echo esc_attr($timezone_value); ?>
                    <?php else: ?>
                    -                    
                    <?php endif; ?>
                </div>             
                <div class="schedule-details">
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    <?php the_excerpt(); ?>
                    <br/>
                    <?php if ( get_field( 'schedule_sponsor' ) ): ?>
                    <span style="font-style:italic">Sponsored By: <?php the_field('schedule_sponsor'); ?></span>
                    <?php endif; ?>                    
                    
                </div>
            </div>
            <hr/>
            <?php endwhile;?>
            <br/>
    <?php endif;?>
    
  
    <?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>


<?php }; ?>


