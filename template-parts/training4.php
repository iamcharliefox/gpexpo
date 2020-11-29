
<?php 
$show_code_slug = $show_code->slug;
?>


<?php 
$args = array(
    'post_type' => 'training',
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
$colors[] = get_field('training_date');

// Creates an array of all colors

endwhile;
$colors = array_unique($colors);
// Removes duplicates;




  

usort($colors, "compareByTimeStamp"); 
  


foreach ($colors as $event_date) {

$event_date_nice = date("Ymd", strtotime($event_date)); ?>

    <h3><?php echo $event_date; ?></h3>
        <div class="training-row head">
            <div class="training-time">Time <?php if (!empty($timezone)) { echo "(" . esc_html($timezone_label) . ")"; }?></div>
            <div class="training-classroom">Classroom</div>
            <div class="training-level">Level</div>
            <div class="training-details">Description</div>
        </div>
        <hr> 

    <?php 
    $scheduleargs = array(
    'numberposts' => -1,
    'post_type' => 'training',
    'meta_query' => array(
        'day_clause' => array(
        'key' => 'training_date',
        'value' => $event_date_nice,
        'compare' => 'EXISTS',
        'type' => 'DATE'
        ),
        'time_clause' => array(
        'key' => 'training_time_start',
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

            <div class="training-row">
                <div class="training-time">
                    <?php if ( get_field( 'training_time_start' ) ): ?>
                    <?php the_field('training_time_start'); ?>
                    to
                    <?php the_field('training_time_end'); ?>
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