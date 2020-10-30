<?php get_header(); ?>

<!-- HERO START -->
<section class="hero" style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
    <div class="hero-inner">
        <div class="container">
            <div class="title">
                <h2><?php the_title(); ?></h2>
            </div>
            <div class="details">
                <!-- events dates -->
                <i class="far fa-calendar"></i>
                <?php
                $start_date = get_field("start_date");
                $date_range = get_field("event_duration");
                $end_date = date('F j', strtotime($start_date . " + {$date_range} days"));
                echo $start_date . " - " . $end_date;
                ?>
								
                <!-- event location -->
                <?php
                $venue = get_field('venue');
                $map = get_field('google_maps_link');
                if (!empty($venue)): ?>
	                &nbsp;&nbsp;<i class="fas fa-map-marker-alt"></i>
	                <a href="<?php echo esc_url($map); ?>" target="blank"><?php the_field('venue'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- HERO END -->


<!-- MAIN CONTENT START -->
<section class="content">
    <div class="container">
			
				<!-- INTRO START -->
        <div class="intro">
          <?php if (has_post_thumbnail()) { the_post_thumbnail('large', ['class' => 'article-hero']); } ?>
          <article>
            <!-- post editor content -->
            <?php if (have_posts()) {
		        while (have_posts()) {
		            the_post();
		            the_content();
			        }
				    } ?>
          </article>
        </div>
				<!-- INTRO END -->
				
				<!-- TABS START -->
        <div class="tabs">
          <div id="tab">
						
            <!-- GENERATE TABS -->
            <ul class="resp-tabs-list">
              <?php
					    if (have_rows('tabs')):
					      while (have_rows('tabs')):
					        the_row();
					        $tab_title = get_sub_field('tab_title_text');
					        echo "<li>" . $tab_title . "</li>";
					      endwhile;
							endif; ?>
            </ul>

	          <!-- TAB CONTENT -->
	          <div class="resp-tabs-container">
              <?php if (have_rows('tabs')): ?>
                <?php while (have_rows('tabs')):
						      the_row(); ?>
                  <div>
                    <?php 
										while (has_sub_field("tab_content")):
					            if (get_row_layout() == "wysiwyg_layout"):
					              $wysiwyg = get_sub_field('wysiwyg');
					              include 'template-parts/wysiwyg.php';
					            elseif (get_row_layout() == "title_sponsors_layout"):
					              include 'template-parts/title-sponsors.php';
					            elseif (get_row_layout() == "presenting_sponsors_layout"):
					              include 'template-parts/presenting-sponsors.php';
											elseif (get_row_layout() == "featured_exhibitors_layout"):
												include 'template-parts/featured-exhibitors.php';	
					            elseif (get_row_layout() == "training"):
					              include 'template-parts/training2.php';
											elseif (get_row_layout() == "schedule"):
												include 'template-parts/schedule.php';												
											elseif (get_row_layout() == "exhibitor_list"):
												include 'template-parts/exh-list.php';												
					            endif;
					          endwhile; 
										?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
				<!-- TABS END -->
				
				<!-- SIDEBAR START -->
        <div class="sidebar">
          <!-- TITLE SPONSORS, PRESENTING SPONSORS AND FEATURED EXHIBITORS : START -->					
					<?php if (have_rows('tabs')): ?>
					<?php while (have_rows('tabs')):
						the_row(); ?>
					
					<?php 
					while (has_sub_field("tab_content")):
						if (get_row_layout() == "title_sponsors_layout"):
							include 'template-parts/title-sponsors-sidebar.php';
						elseif (get_row_layout() == "presenting_sponsors_layout"):
							include 'template-parts/presenting-sponsors-sidebar.php';						
						elseif (get_row_layout() == "featured_exhibitors_layout"):
							include 'template-parts/featured-exhibitors-sidebar.php';												
						endif;
					endwhile; 
					?>
					
					<?php endwhile; ?>
					<?php endif; ?>
					<!-- TITLE SPONSORS, PRESENTING SPONSORS AND FEATURED EXHIBITORS : END -->					
					
            <div class="sidebar-item">
                <div class="title">
                    <h5>Event Details</h5>
                </div>
                <div class="inner">

                    <!-- event status -->
                    <?php
								     $status = get_field_object('event_status');
								     $value = $status['value'];
								     $label = $status['choices'][$value];
								     ?>
                    <?php if (!empty($status)): ?>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="details">
                            <div class="label">Status</div>
                            <div class="desc"><?php echo esc_html($label); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- venue -->
                    <?php
								     $venue = get_field('venue');
								     if (!empty($venue)): ?>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="details">
                            <div class="label">Venue</div>
                            <div class="desc"><?php echo $venue; ?></div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- location -->
                    <?php
								     $address = get_field('address');
								     $map = get_field('google_maps_link');
								     if (!empty($address)): ?>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="details">
                            <div class="label">Address</div>
                            <div class="desc"><a href="<?php echo esc_url($map); ?>" target="blank"><?php the_field('address'); ?></a></div>
                        </div>
                    </div>
                    <?php endif; ?>
										
										<!-- floor plan -->
											<?php
											 $floorplan = get_field('floor_plan');
											 if (!empty($floorplan)): ?>
											<div class="item">
													<div class="icon">
															<i class="fas fa-map"></i>
													</div>
													<div class="details">
															<div class="label">Floor Plan</div>
															<div class="desc"><a href="<?php echo esc_url($floorplan); ?>" target="blank">View</a></div>
													</div>
											</div>
											<?php endif; ?>										


                    <!-- phone number -->
                    <?php
								     $phone = get_field('phone', 'option');
								     if (!empty($phone)): ?>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="details">
                            <div class="label">Phone</div>
                            <div class="desc"><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- fax number -->
                    <?php
								     $fax = get_field('fax', 'option');
								     if (!empty($fax)): ?>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-fax"></i>
                        </div>
                        <div class="details">
                            <div class="label">Fax</div>
                            <div class="desc"><?php echo $fax; ?></div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- fax number -->
                    <?php
								     $email = get_field('email', 'option');
								     if (!empty($email)): ?>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-at"></i>
                        </div>
                        <div class="details">
                            <div class="label">Email</div>
                            <div class="desc"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
                        </div>
                    </div>
                    <?php endif; ?>



                    <div class="button-group">
                        <!-- registration button -->
                        <?php
										      $pcs_link = get_field('registration_link');
										      if (!empty($pcs_link)): ?>
                        <a href="<?php echo $pcs_link; ?>" class="button blue">REGISTER HERE</a>
                        <?php endif; ?>

                        <!-- add to calendar button -->
                        <?php
										      $cal = get_field('calendar_file');
										      if (!empty($cal)): ?>
                        <a href="<?php echo $cal['url']; ?>" class="button blue">ADD TO CALENDAR</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="sidebar-item" style="text-align:center">
                <center>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/BB-PH.png'; ?>" alt="" style="padding:24px">
                </center>
            </div>
        </div>

        <!-- <div class="ads">ads - Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nobis non labore exercitationem eligendi voluptates minima, sapiente eius, tempore molestias, ea adipisci voluptas! Deleniti atque, commodi natus iure rerum incidunt.</div> -->
    </div>
</section>
<!-- MAIN CONTENT END -->





<?php get_footer(); ?>


