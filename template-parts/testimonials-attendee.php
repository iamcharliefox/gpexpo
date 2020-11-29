<!-- TESTIMONIALS -->
<section class="testimonials">
  <div class="container">
    <h3>What our <span>Attendees</span> have to say</h3>
    <!-- get subtitle from options page -->
    <?php if( have_rows('testimonials_attendee_group', 'option') ): ?>
        <?php while( have_rows('testimonials_attendee_group', 'option') ): the_row(); ?>
            <?php if( get_sub_field('subtitle') ): ?><p><?php the_sub_field('subtitle'); ?></p><?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>  


    <!-- get testimonies from options page -->
    <?php if( have_rows('testimonials_attendee_group', 'option') ): ?>
        <?php while( have_rows('testimonials_attendee_group', 'option') ): the_row(); ?>

    <div class="testimonials-container">
      <?php
      $rows = get_sub_field('testimonials');
      if( $rows ) {
        foreach( $rows as $row ) { 
          $name = $row['name'];
          $company = $row['company_name'];
          $position = $row['position_title'];
          $testimony = $row['testimony'];
          $photo = $row['photo'];
        ?>      
      <div class="card">
        <div class="photo" style="background-image:url('<?php echo $photo; ?>')"></div>
        <div class="name"><?php echo $name; ?></div>
        <div class="company"><nobr><?php echo $position; ?></nobr><br/><nobr><?php echo $company; ?></nobr></div>
        <div class="testimony"><?php echo $testimony; ?></div>
      </div>
      <?php } 
      };
      ?>

    </div>    


        <?php endwhile; ?>
    <?php endif; ?>   


  </div>
</section>