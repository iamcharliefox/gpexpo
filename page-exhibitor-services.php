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

<div class="gpx-hero exhibitor" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/topo-new.svg' ?>')">
    <div class="hero-inner">
        <div class="container">
            <div class="title <?php the_field('show_format')?>">
                <h2><?php the_title(); ?></h2>
                <?php if( get_field('page_subtitle') ): ?>
                <h4><?php the_field('page_subtitle'); ?></h4>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="gpx-wrapper">
<!-- service manuals -->
<?php if( have_rows('service_manuals') ): ?>
    <?php while( have_rows('service_manuals') ): the_row(); 

        // Get sub field values.
        $description = get_sub_field('description');
        $link = get_sub_field('link');
				$group = get_field_object('service_manuals');
        ?>

        <div class="gpx-drawer">
					<div class="drawer-title">
						<h4><?php echo $group['label']; ?></h4>
					</div>
					<div class="drawer-content">
            <?php the_sub_field('description'); ?>  
						<?php if( $link ): ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>" class="button green"><?php echo esc_attr( $link['title'] ); ?></a>
						<?php endif; ?>
					</div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>


<!-- floor plans -->
<?php if( have_rows('floor_plans') ): ?>
    <?php while( have_rows('floor_plans') ): the_row(); 

        // Get sub field values.
        $description = get_sub_field('description');
        $link = get_sub_field('link');
				$group = get_field_object('floor_plans');
        ?>

        <div class="gpx-drawer">
					<div class="drawer-title">
						<h4><?php echo $group['label']; ?></h4>
					</div>
					<div class="drawer-content">
            <?php the_sub_field('description'); ?>  
						<?php if( $link ): ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>" class="button blue"><?php echo esc_attr( $link['title'] ); ?></a>
						<?php endif; ?>
					</div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>


<!-- training info -->
<?php if( have_rows('training_info') ): ?>
    <?php while( have_rows('training_info') ): the_row(); 

        // Get sub field values.
        $description = get_sub_field('description');
				$group = get_field_object('training_info');
        ?>
        <div class="gpx-drawer">
					<div class="drawer-title">
						<h4><?php echo $group['label']; ?></h4>
					</div>
					<div class="drawer-content">
            <?php the_sub_field('description'); ?>  
						<?php 
						$rows = get_sub_field('links');
						if( $rows ) {
								foreach( $rows as $row ) {
										$link = $row['link']; ?>
										<a href="<?php echo $link['url']; ?>" class="button green"><?php echo $link['title']; ?></a>
								<?php }
						} ?>
					</div>

        </div>

    <?php endwhile; ?>
<?php endif; ?>


<!-- breakaway sessions -->
<?php if( have_rows('breakaway_sessions') ): ?>
    <?php while( have_rows('breakaway_sessions') ): the_row(); 

        // Get sub field values.
        $description = get_sub_field('description');
				$group = get_field_object('breakaway_sessions');
        ?>
        <div class="gpx-drawer">
					<div class="drawer-title">
						<h4><?php echo $group['label']; ?></h4>
					</div>
					<div class="drawer-content">
            <?php the_sub_field('description'); ?>  
						<?php 
						$rows = get_sub_field('links');
						if( $rows ) {
								foreach( $rows as $row ) {
										$link = $row['link']; ?>
										<a href="<?php echo $link['url']; ?>" class="button green"><?php echo $link['title']; ?></a>
								<?php }
						} ?>
					</div>

        </div>

    <?php endwhile; ?>
<?php endif; ?>




</div>









	




<?php
  get_footer();
?>