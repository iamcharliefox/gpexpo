
<section class="footer">
<div class="footer-top"></div>
<div class="footer-nav">
  <div class="container">

    <!-- footer navigation START -->
    <?php
      wp_nav_menu(
        array(
          'menu' => 'footer',
          'container' => '',
          'theme_location' => 'footer',
          'items_wrap' => '<ul>%3$s</ul>'
        )
      )
    ?>
    <!-- footer navigation END -->    
  </div>


</div>
</section>

<?php
  wp_footer();
?>



</body>
</html>