
<section class="exhibit-with-us">
  <div class="container">
    <h3><span>Exhibit</span> with us</h3>
    <!-- get subtitle from options page -->
    <?php if( have_rows('why_exhibit_group', 'option') ): ?>
        <?php while( have_rows('why_exhibit_group', 'option') ): the_row(); ?>
            <?php if( get_sub_field('description') ): ?><p><?php the_sub_field('description'); ?></p><?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>  
    <a href="/exhibit" class="button blue">Learn More</a>
  </div>
</section>
