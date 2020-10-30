
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

        <div class="faq-container">
          <ul id="trigger">
            <li id="general" class="">General</li>
            <li id="registration" class="">Registration</li>
            <li id="training" class="">Training</li>
          </ul>

        <?php

        // Check rows exists.
        if( have_rows('questions_and_answers') ):

            // Loop through rows.
            while( have_rows('questions_and_answers') ) : the_row();

                // Load sub field value.
                $question = get_sub_field('question');
                $answer = get_sub_field('answer');
                $question_category = strtolower(get_sub_field('question_category'));
            
                
                // Do something...
                ?>
                      <div class="faq-item faq-<?php echo $question_category; ?>">
                        <div class="question">
                          <div class="cap">Q</div>
                          <div class="item-text"><?php echo $question ?></div>
                        </div>
                        <div class="answer">
                          <div class="cap">A</div>
                          <div class="item-text"><?php echo $answer ?></div>
                        </div>                      
                      </div>                
                <?php
            // End loop.
            endwhile;

        // No value.
        else :
            // Do something...
        endif;

        ?>

                        
        </div>  

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


