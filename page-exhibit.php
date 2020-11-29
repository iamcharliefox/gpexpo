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

<div class="gpx-hero exhibitor">
  <div class="hero-slide-container-exhibitor">

<div class="hero-slidex" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/topo-new.svg' ?>')">

  <div class="hero-slide-inner">
    <img src="<?php echo get_template_directory_uri() . '/assets/images/nbm-gpx.svg' ?>" alt="" style="max-width:80%">
  </div>
</div>

  </div>
</div>

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


<?php include 'template-parts/upcoming-grid-exhibitors.php'; ?>




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
		
		<?php include 'template-parts/testimonials-exhibitor.php'; ?>   
	</div>
	
</section>






	




<?php
  get_footer();
?>