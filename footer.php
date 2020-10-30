


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
		<div class="bug" style="position:fixed;right:10px; bottom:10px;z-index:10;">
      <a href="<?php the_permalink(); ?>">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/event-in-progress.svg' ?>" alt="">
      </a>
		</div>
	<?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>





<section class="footer">
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