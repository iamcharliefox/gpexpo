<?php
  get_header();
?>



<div class="gpx-hero training-single" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/topo-new.svg' ?>')">
    <div class="hero-inner">
        <div class="container">
            <div class="title online">

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
    <div class="breadcrumbs">

<?php 
$breadcrumbs = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'events',
    'tax_query' => array(
        array (
            'taxonomy' => 'code',
            'field' => 'slug',
            'terms' => '05irv21',
        )
    ),
));


if( $breadcrumbs ): ?>
	<?php foreach( $breadcrumbs as $breadcrumb ): setup_postdata( $breadcrumb ); ?>
      <a href="<?php echo $breadcrumb->guid; ?>"><?php echo $breadcrumb->post_title; ?></a>
	<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>     

      
      
    </div>

      <?php 
      $show_code = get_field('show_code');
      $show_code_slug = $show_code->slug;
      ?>

            <!-- post editor content -->
        <?php



          if( have_posts() ){
            while( have_posts() ){ ?>
                <h2><?php the_title(); ?></h2>
                <?php if( get_field('page_subtitle') ): ?>
                <h4><?php the_field('page_subtitle'); ?></h4>
                <?php endif; ?>            
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