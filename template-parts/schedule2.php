<?php
$start_date = get_field("start_date");
$end_date = get_field("end_date");
$schedule_session = dateRange( $start_date, $end_date);

foreach ($schedule_session as $event_date) {

    $event_date_nice = date("F j, Y", strtotime($event_date));
    echo $event_date_nice;
    echo "<hr>";

    $newargs = array(
        'post_type' => 'schedule',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_key' => 'schedule_date',
        'meta_value' => $event_date,
        'orderby' => 'event_start',
        'order' => 'ASC',
        'meta_type'      => 'DATETIME',
        );


    $schedule_query = new WP_Query($newargs); ?>

    <?php if ($schedule_query->have_posts()): ?>
    <?php while ($schedule_query->have_posts()): $schedule_query->the_post();?>
        <?php
                echo "<div>";
                the_field('event_start');
                echo " ";
                the_title();
                echo "</div>";
        ?>
    <?php endwhile;?>
<?php endif;?>
<br/><br/>


<?php };

?>



