<?php 
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

  get_header();
?>

<div class="gpx-hero" style="height:100px;background-image:url('<?php echo get_template_directory_uri() . '/assets/images/topo-new.svg' ?>')">
    <div class="hero-inner" style="min-height:0;height:100px;">
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


  <div class="page-not-found">
    <div class="page-not-found-inner">
    <h2>404</h2>
<?php if( get_field('headline','options') ): ?><h1><?php the_field('headline','options');?></h1><?php endif; ?>
<?php if( get_field('subheadline','options') ): ?><h6><?php the_field('subheadline','options');?></h6><?php endif; ?>
<?php the_field('description','options'); ?>
<div class="button-group">
  <a href="<?php echo site_url(); ?>" class="button blue">Attendee Portal</a>
  <a href="<?php echo site_url(); ?>/exhibit" class="button blue">Exhibitor Portal</a>
</div>

    </div>

  </div>



<?php
  get_footer();
?>