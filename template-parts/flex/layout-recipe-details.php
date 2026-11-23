<?php
$title        = get_sub_field('title');
$image_id     = (int) get_sub_field('image');
$prep_time    = get_sub_field('prep_time');
$ingredients  = get_sub_field('ingredients');
$instructions = get_sub_field('instructions');
?>

<div class="row align-items-center g-4 mb-4">
  <div class="col">
    <?php if ($title) : ?>
      <h1 class="recipe-detail-title mb-2">
        <?php echo esc_html($title); ?>
      </h1>
    <?php endif; ?>

    <?php if (is_numeric($prep_time)) : ?>
      <p class="mb-0">
        <strong>Prep time:</strong>
        <?php echo esc_html($prep_time); ?> min
      </p>
    <?php endif; ?>
  </div>

  <?php if ($image_id) : ?>
    <div class="col-4 col-md-2">
      <?php echo wp_get_attachment_image(
        $image_id,
        'medium',
        false,
        [
          'class' => 'recipe-detail-image img-fluid',
          'alt'   => '',
        ]
      ); ?>
    </div>
  <?php endif; ?>
</div>

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