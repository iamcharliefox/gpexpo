
<?php
  get_header();
?>





<section class="hero">
<div class="hero-slide-container">
<?php
  if( have_posts() ){
    while( have_posts() ){
      the_post();
      get_template_part( 'template-parts/content', 'archive');
      }
    };
?>
</div>
</section>



<?php
  get_footer();
?>


