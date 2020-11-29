<?php
  get_header();
?>

<div class="gpx-hero" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/topo-new.svg' ?>')">
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
  <!-- MAIN -->
  <div class="gpx-main">
    <div class="intro">
      <?php if (has_post_thumbnail()) { the_post_thumbnail('large', ['class' => 'article-hero']); } ?>
    </div>
    <article>
            <!-- post editor content -->
        <?php



          if( have_posts() ){
            while( have_posts() ){ ?>
              <?php the_post(); ?>

              <?php the_content(); ?>
            <?php }
          }
        ?> 

    </article>

  </div>

  <!-- SIDEBAR -->
  <div class="gpx-sidebar cf">
    <div class="sidebar-item" style="text-align:center">
        <center>
            <img src="<?php echo get_template_directory_uri() . '/assets/images/BB-PH.png'; ?>" alt="" style="padding:24px">
        </center>
    </div>   
  </div>


</div>



<?php
  get_footer();
?>