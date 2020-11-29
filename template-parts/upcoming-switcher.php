<?php if (get_sub_field('upcoming_layout') == "grid"): ?>
  <?php include 'upcoming-grid.php'; ?>
<?php else: ?>
  <?php include 'upcoming-table.php'; ?>
<?php endif; ?>
