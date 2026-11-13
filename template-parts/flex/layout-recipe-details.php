<?php
$prep_time    = get_sub_field('prep_time');
$ingredients  = get_sub_field('ingredients');
$instructions = get_sub_field('instructions');
?>

<?php if (is_numeric($prep_time)) : ?>
  <p><strong>Prep time:</strong> <?php echo esc_html($prep_time); ?> min</p>
<?php endif; ?>

<div class="row g-4">
  <?php if ($ingredients) : ?>
    <div class="col-12 col-md-5">
      <h2>Ingredients</h2>
      <?php echo wp_kses_post($ingredients); ?>
    </div>
  <?php endif; ?>

  <?php if ($instructions) : ?>
    <div class="col-12 col-md-7">
      <h2>Instructions</h2>
      <?php echo wp_kses_post($instructions); ?>
    </div>
  <?php endif; ?>
</div>