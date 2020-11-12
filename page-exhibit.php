<?php
  get_header();
?>

<?php

if ( has_post_thumbnail( $page_id ) ) :
	$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( 19 ), 'optional-size' );
	$image = $image_array[0];
else :
	$image = get_template_directory_uri() . '/images/default-background.jpg';
endif;

?>

<section class="exhibit-hero" style="background-image:url('<?php echo $image; ?>')">
	<div class="overlay">
		<img src="<?php echo get_template_directory_uri() . '/assets/images/exhibit-hero-ph.png' ?>" alt="">
	</div>
</section>

<section class="exhibit-intro">
	<div class="container">
		<h3><span>Exhibit</span> with us</h3>
		
		<?php
		if( have_posts() ){
		  while( have_posts() ){ ?>
			<?php the_post(); ?>
			<?php the_content(); ?>
		  <?php }
		}
		?> 		
		
	</div>
</section>

<section class="exhibit-video">
	<div class="container">
<div class="embed-container">
	<?php the_field('video'); ?>
</div>
<style>
	.embed-container { 
		position: relative; 
		padding-bottom: 56.25%;
		overflow: hidden;
		max-width: 100%;
		height: auto;
	} 

	.embed-container iframe,
	.embed-container object,
	.embed-container embed { 
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
</style>
	</div>
</section>



<section class="exhibit-upcoming">
	  <div class="container">
		<h3>Upcoming <span>Events</span></h3>
		
	
	
	
		<?php

$today = current_time('Y-m-d');
  $start_date = get_sub_field("start_date");
  $end_date = get_sub_field("end_date");

		$upcoming_loop = new WP_Query( array(
    'post_type' => 'Events',
    'posts_per_page' => '-1',
    'meta_key' => 'start_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
          array(
              'key' => 'end_date',
              'value' => $today,
              'compare' => '>=',
              'type'      => 'DATE',
          )                   
        )
		  )
		);
		?>
	
		<div>
			<table cellspacing="0" cellpadding="0">
				<tr>
					<th>Date(s)</th>
					<th>Event</th>

				</tr>
			<?php while ( $upcoming_loop->have_posts() ) : $upcoming_loop->the_post(); ?>
		    	<tr>
					<td class="date">
						<?php 
						$Date = get_field("start_date");
						$date_range = get_field("event_duration");
						$newDate = date('j', strtotime($Date. " + {$date_range} days"));
						?>								
						<?php the_field('start_date'); ?> - <?php echo $newDate; ?>	, 2021	
					</td>					
					<td class="event"><?php the_title(); ?></td>


				</tr>
			<?php endwhile; wp_reset_query(); ?>
				</table>
		</div>
	  </div>
	</section>



<section class="exhibitor-tabs">
	<div class="container">
		
<div class="tabs">

	<div id="tab">       
	  <!-- loop through tabs and display in tab row    -->
	  <ul class="resp-tabs-list">
		<?php
		  // Check rows exists.
		  if( have_rows('exhibitor_tabs') ):

			  // Loop through rows.
			  while( have_rows('exhibitor_tabs') ) : the_row();

				  // Load sub field value.
				  $tab_title = get_sub_field('tab_title_text');
				  // Do something.
				  echo "<li>" . $tab_title . "</li>";

			  // End loop.
			  endwhile;

		  // No value.
		  else :
			  // Do something...
		  endif;
		?>
		</ul> 

		<!-- loop through tab content and display within corresponding tab content area -->
		<div class="resp-tabs-container">                                                        

		  <?php if( have_rows('exhibitor_tabs') ): ?>
		  
			  <?php while ( have_rows('exhibitor_tabs') ) : the_row(); ?>
					
					<div>

					<?php while(has_sub_field("tab_content")):
					
					  if(get_row_layout() == "wysiwyg_layout"):
					  
						$wysiwyg = get_sub_field('wysiwyg');
						include ('template-parts/wysiwyg.php');
					  
					  elseif(get_row_layout() == "files_cas"):
						include ('template-parts/cas-list.php');

					  elseif(get_row_layout() == "files_list"):
						include ('template-parts/files-list.php');                                                     
					  
					  endif;
					
					endwhile; ?>

					
						  
					</div>
		  
			  <?php endwhile; ?>
		  
		  <?php endif; ?>	

		</div>
	</div> 
 

	</div>		
		
		
	</div>
	
</section>





<section class="testimonials">
  <div class="container">
	<h3>What our <span>Exhibitors</span> have to say</h3>

	<?php
	$testimonial_loop = new WP_Query( 
    array(
        'post_type' => 'Testimony',
        'showposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy'  => 'types',
                'terms'     =>'exhibitor',
                'field'     => 'slug'
            )
        )
      )
	);
	?>


	<div class="testimonials-container">
	  <?php while ( $testimonial_loop->have_posts() ) : $testimonial_loop->the_post(); ?>
	  <div class="card">
		<div class="photo" style="background-image:url('<?php the_post_thumbnail_url() ?>')"></div>
		<div class="name"><?php the_title(); ?></div>
		<div class="company">Position - Company Name</div>
		<div class="testimony"><?php the_content(); ?></div>
	  </div>

	  <?php endwhile; wp_reset_query(); ?>
	</div>
  </div>
</section>



	




<?php
  get_footer();
?>