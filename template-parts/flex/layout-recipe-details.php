<?php
$title        = get_sub_field('title');
$image_id     = (int) get_sub_field('image');
$prep_time    = get_sub_field('prep_time');
$ingredients  = get_sub_field('ingredients');
$instructions = get_sub_field('instructions');
?>

<div class="recipe-detail">

  <div class="recipe-detail-header">
    <div class="recipe-detail-heading">
      <?php if (is_numeric($prep_time)) : ?>
        <p class="recipe-detail-time">
          <?php echo esc_html($prep_time); ?> min
        </p>
      <?php endif; ?>

      <?php if ($title) : ?>
        <h1 class="recipe-detail-title">
          <?php echo esc_html($title); ?>
        </h1>
      <?php endif; ?>
    </div>

    <?php if ($image_id) : ?>
      <?php
      echo wp_get_attachment_image(
        $image_id,
        'medium_large',
        false,
        array(
          'class' => 'recipe-detail-image',
          'alt'   => '',
        )
      );
      ?>
    <?php endif; ?>
  </div>

  <div class="recipe-detail-body">
    <?php if ($ingredients) : ?>
      <div class="recipe-detail-ingredients">
        <h2>Ingredients</h2>
        <?php echo wp_kses_post($ingredients); ?>
      </div>
    <?php endif; ?>

    <?php if ($instructions) : ?>
      <div class="recipe-detail-instructions">
        <h2>Instruction</h2>
        <?php echo wp_kses_post($instructions); ?>
      </div>
    <?php endif; ?>
  </div>

</div>