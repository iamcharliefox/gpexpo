<h2>Schedule</h2>


<!-- https://www.advancedcustomfields.com/resources/how-to-sorting-a-repeater-field/ -->

<?php
$timezone = get_field_object( 'time_zone' );
$timezone_value = $timezone['value'];
$timezone_label = $timezone['choices'][ $timezone_value ];
?>

<?php 
$schedule = get_sub_field('schedule');

if( $schedule ): ?>



<?php 
$rows = get_sub_field('schedule');
if( $rows ) {

    foreach( $rows as $row ) {
        echo '<div>';
        $title = $row['title'];
        $date = $row['schedule_date'];
        $start = $row['schedule_start_time'];
        $end = $row['schedule_end_time'];
        $description = $row['description'];
        
        
        echo $title . "<br/>";
        echo $date . "<br/>";
        echo $start . "<br/>";
        echo $end . "<br/>";
        echo $description . "<br/>";
        echo '</div><br/><br/>';
    }    
}

?>

<?php endif; ?>