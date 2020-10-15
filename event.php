
<?php
  get_header();
?>


<section class="hero">

  <div class="hero-slide-container">
    <div class="hero-slide" style="background-image:url(images/home-hero-charlotte.jpg)">
      <div class="hero-slide-inner">
        <div class="title"><h2>Charlotte, NC</h2></div>
        <div class="details">August 12-14 &nbsp; Charlotte Convention Center</div>
        <div class="button-group">
          <a href="#" class="button">Details</a>
          <a href="#" class="button">Register Now</a>
        </div>
      </div>
    </div>
    <div class="hero-slide" style="background-image:url(images/home-hero-denver.jpeg)">
      <div class="hero-slide-inner">
        <div class="title"><h2>Denver, CO</h2></div>
        <div class="details">August 12-14 &nbsp; Charlotte Convention Center</div>
        <div class="button-group">
          <a href="#" class="button">Details</a>
          <a href="#" class="button">Register Now</a>
        </div>
      </div>
    </div>
  </div>

</section>


<section class="hero">
<?php
  if( have_posts() ){
    while( have_posts() ){
      the_post();
      the_content();
    }
  }
?>
</section>



<?php
  get_footer();
?>


