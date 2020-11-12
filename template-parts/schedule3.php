<h2>Schedule</h2>
<?php 
$intro = get_sub_field('schedule_intro');

if( $intro ): ?>

<?php echo $intro; ?>


<?php endif; ?>

<?php
$start_date = get_field("start_date");
$end_date = get_field("end_date");
$schedule_session = dateRange( $start_date, $end_date);
$show_code = get_field('show_code');
$show_code_ID = $show_code->term_id;
$timezone = get_field_object( 'time_zone' );
$timezone_value = $timezone['value'];
$timezone_label = $timezone['choices'][ $timezone_value ];



foreach ($schedule_session as $event_date) {

    $event_date_nice = date("F j, Y", strtotime($event_date)); ?>

    <h3><?php echo $event_date_nice; ?></h3>
        <div class="schedule-row head">
            <div class="schedile-time">Time <?php if (!empty($timezone)) { echo "(" . esc_html($timezone_label) . ")"; }?></div>
            <div class="schedule-details">Description</div>
        </div>
        <hr> 

    <?php 
    $scheduleargs = array(
    'numberposts' => -1,
    'post_type' => 'schedule',
    'meta_query' => array(
        'day_clause' => array(
        'key' => 'schedule_date',
        'value' => $event_date,
        'compare' => 'EXISTS',
        'type' => 'DATE'
        ),
        'time_clause' => array(
        'key' => 'schedule_time_start',
        'compare' => 'EXISTS',
        'type' => 'TIME'
        ),
        'code_clause' => array(
        'key' => 'show_code',
        'value' => $show_code_ID,
        'compare' => 'EXISTS',
        )
    ),
    'orderby' => array(
        'day_clause' => 'ASC',
        'time_clause' => 'ASC',
        'title' => 'ASC'
    )
    );



    $schedule_query = new WP_Query($scheduleargs); ?>

    <?php if ($schedule_query->have_posts()): ?>
    <?php while ($schedule_query->have_posts()): $schedule_query->the_post();?>

            <div class="schedule-row">
                <div class="schedule-time">
                    <?php if ( get_field( 'schedule_time_start' ) ): ?>
                    <?php the_field('schedule_time_start'); ?>
                    to
                    <?php the_field('schedule_time_end'); ?>
                    <?php else: ?>
                    -                    
                    <?php endif; ?>
                </div>
             
                <div class="schedule-details">
                    <strong><?php the_title();?></strong>
                    <?php the_excerpt(); ?>
                    <?php if ( get_field( 'schedule_sponsor' ) ): ?>
                    <span style="font-style:italic">Sponsored By: <?php the_field('schedule_sponsor'); ?></span>
                    <?php endif; ?>                    
                    
                </div>
            </div>
            <hr/>

    <?php endwhile;?>
    <?php else: ?>
    no scheduled events found
<?php endif;?>
<br/><br/>


<?php };

?>

<?php
    // Reset things, for good measure
    wp_reset_postdata();

// end the loop

?>