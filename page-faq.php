
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
      <img src="assets/images/single-featured-image.jpg" alt="">
    </div>
      <article>


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


