


<?php 
$today = current_time('Y-m-d');
// args
$args = array(
	'numberposts'	=> 1,
	'post_type'		=> 'events',
	'meta_value'	=> 'happening now',
      'meta_query' => array(
          array(
              'key' => 'start_date',
              'value' => $today,
              'compare' => '>=',
              'type'      => 'DATE',
          )                   
        )
);


// query
$the_query = new WP_Query( $args );

?>
<?php if( $the_query->have_posts() ): ?>

	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="bug">
      <div class="bug-icon"><i class="far fa-clock"></i></div>
      <div class="bug-info"><a href="<?php the_permalink(); ?>">Event in Progress<span>Click here to join</span></a></div>
      <div class="bug-close">&times;</div>
		</div>
	<?php endwhile; ?>

  <?php else: ?>


		<div class="bug">
      <div class="bug-icon"><i class="fas fa-bullhorn"></i></div>
      <div class="bug-info"><a href="/exhibit">Exhibit with us<span>Learn more</span></a></div>
      <div class="bug-close">&times;</div>
		</div>


<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>





<div class="gpx-footer cf">
<div class="footer-top"></div>
<div class="footer-nav">
  <div class="container">

    <!-- footer navigation START -->
    <?php
      wp_nav_menu(
        array(
          'menu' => 'footer',
          'container' => '',
          'theme_location' => 'footer',
          'items_wrap' => '<ul>%3$s</ul>'
        )
      )
    ?>
    <!-- footer navigation END -->    
  </div>


</div>
</section>

<?php
  wp_footer();
?>



</body>
</html>