
<?php 
$show_code_slug = $show_code->slug;
?>


<?php 
$args = array(
    'post_type' => 'schedule',
    'numberposts' => -1,
    
    'tax_query' => array(
        array (
            'taxonomy' => 'code',
            'field' => 'slug',
            'terms' => $show_code_slug,
        )
    ),
 ); 

$my_query = new WP_Query($args);


while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;
$colors[] = get_field('schedule_date');

// Creates an array of all colors

endwhile;
$colors = array_unique($colors);
// Removes duplicates;




  

usort($colors, "compareByTimeStamp"); 
  


foreach ($colors as $event_date) {

$event_date_nice = date("Ymd", strtotime($event_date)); ?>

    <h3><?php echo $event_date; ?></h3>
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
        'value' => $event_date_nice,
        'compare' => 'EXISTS',
        'type' => 'DATE'
        ),
        'time_clause' => array(
        'key' => 'schedule_time_start',
        'compare' => 'EXISTS',
        'type' => 'TIME'
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




<?php }



/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset.
*/
wp_reset_postdata();

?>