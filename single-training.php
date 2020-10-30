
<?php
  get_header();
?>


<section class="hero" style="background-image:url('<?php the_post_thumbnail_url() ?>')">

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



      <div class="sidebar-item">
        
        <div class="inner">

                                                  
        </div>        
      </div>      
    </div>

    <!-- <div class="ads">ads - Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nobis non labore exercitationem eligendi voluptates minima, sapiente eius, tempore molestias, ea adipisci voluptas! Deleniti atque, commodi natus iure rerum incidunt.</div> -->
  </div>
</section>





<?php
  get_footer();
?>


