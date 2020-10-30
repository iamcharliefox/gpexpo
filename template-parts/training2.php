<h2>Training</h2>


<?php
$timezone = get_field_object( 'time_zone' );
$timezone_value = $timezone['value'];
$timezone_label = $timezone['choices'][ $timezone_value ];
?>


<?php 
$intro = get_sub_field('training_intro');

if( $intro ): ?>

<?php echo $intro; ?>

<?php endif; ?>



<br/><br/>



<?php
$start_date = get_field("start_date");
$date_range = get_field("event_duration");
$end_date = date('F j', strtotime($start_date. " + {$date_range} days"));

function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {

	$dates = array();
	$current = strtotime( $first );
	$last = strtotime( $last );

	while( $current <= $last ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}
	return $dates;
}


$training_session = dateRange( $start_date, $end_date);


foreach ($training_session as $event_date) {
    

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
            <div class="training-time">Time <?php if (!empty($timezone)) { echo "(" . esc_html($timezone_label) . ")"; }?></div>
            <div class="training-classroom">Classroom</div>
            <div class="training-level">Level</div>
            <div class="training-details">Description</div>
        </div>
        <hr>



        <!-- title -->

            <?php while ($the_query->have_posts()): $the_query->the_post();?>
            <div class="training-row">
                <div class="training-time">
                    <?php if ( get_field( 'training_time_start' ) ): ?>
                    <?php the_field('training_time_start'); ?>
                    to
                    <?php the_field('training_time_end'); ?> <?php echo esc_attr($timezone_value); ?>
                    <?php else: ?>
                    -                    
                    <?php endif; ?>
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
            <br/>
    <?php endif;?>
    
  
    <?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>


<?php }; ?>


