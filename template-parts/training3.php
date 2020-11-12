<h2>Training</h2>
<?php 
$intro = get_sub_field('training_intro');

if( $intro ): ?>

<?php echo $intro; ?>


<?php endif; ?>
<br/><br/>

<?php
$start_date = get_field("start_date");
$end_date = get_field("end_date");
$training_session = dateRange( $start_date, $end_date);
$show_code = get_field('show_code');
$show_code_ID = $show_code->term_id;
$timezone = get_field_object( 'time_zone' );
$timezone_value = $timezone['value'];
$timezone_label = $timezone['choices'][ $timezone_value ];



foreach ($training_session as $event_date) {

    $event_date_nice = date("F j, Y", strtotime($event_date)); ?>

    <h3><?php echo $event_date_nice; ?></h3>
        <div class="training-row head">
            <div class="training-time">Time <?php if (!empty($timezone)) { echo "(" . esc_html($timezone_label) . ")"; }?></div>
            <div class="training-classroom">Classroom</div>
            <div class="training-level">Level</div>
            <div class="training-details">Description</div>
        </div>
        <hr>    

    <?php
    $trainingargs = array(
    'numberposts' => -1,
    'post_type' => 'training',
    'meta_query' => array(
        'day_clause' => array(
        'key' => 'training_date',
        'value' => $event_date,
        'compare' => 'EXISTS',
        'type' => 'DATE'
        ),
        'time_clause' => array(
        'key' => 'training_time_start',
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



    $training_query = new WP_Query($trainingargs); ?>

    <?php if ($training_query->have_posts()): ?>


    <?php while ($training_query->have_posts()): $training_query->the_post();?>


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


<?php };

?>

<?php
    // Reset things, for good measure
    wp_reset_postdata();

// end the loop

?>