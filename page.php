<?php
  get_header();
?>

<section class="hero" style="min-height:105px;">

</section>



<section class="content">
  <div class="container">

  

    <div id="tabs" class="tabs">
      <article>
              <!-- post editor content -->
          <?php



            if( have_posts() ){
              while( have_posts() ){ ?>
                <?php the_post(); ?>
                <h2 class="headline"><?php the_title(); ?></h2>
                <hr>
                <?php the_content(); ?>
              <?php }
            }
          ?> 

      </article>
    </div>
 
    <div class="sidebar">


      <div class="sidebar-item" style="text-align:center">
      <center>
      <img src="<?php echo get_template_directory_uri() . '/assets/images/BB-PH.png' ?>" alt="" style="padding:24px">
      </center>
      </div>


    </div>

    <!-- <div class="ads">ads - Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nobis non labore exercitationem eligendi voluptates minima, sapiente eius, tempore molestias, ea adipisci voluptas! Deleniti atque, commodi natus iure rerum incidunt.</div> -->
  </div>
</section>




    




<?php
  get_footer();
?>