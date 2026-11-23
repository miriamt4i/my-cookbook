<?php
$recipes = get_sub_field('recipes');

if (empty($recipes)) {
  return;
}
?>

<ul class="recipe-list list-unstyled">
  <?php foreach ($recipes as $recipe) : ?>
    <?php
    $title = trim($recipe['title'] ?? '');
    $prep_time = trim($recipe['prep_time'] ?? '');
    $image_id = (int) ($recipe['image'] ?? 0);
    $link = $recipe['link'] ?? [];
    $url = esc_url($link['url'] ?? '');

    if ($title === '' || $url === '') {
      continue;
    }

    $new_tab = ($link['target'] ?? '') === '_blank';
    ?>

    <li>
      <a class="recipe-card text-decoration-none"
         href="<?php echo $url; ?>"
         <?php if ($new_tab) : ?>
           target="_blank" rel="noopener noreferrer"
         <?php endif; ?>>

        <div class="recipe-card-content">
          <h2 class="recipe-card-title">
            <?php echo esc_html($title); ?>
          </h2>

          <?php if ($prep_time !== '') : ?>
            <p class="recipe-card-time">
              <?php echo esc_html($prep_time); ?>
            </p>
          <?php endif; ?>
        </div>

        <?php if ($image_id) : ?>
          <?php echo wp_get_attachment_image(
            $image_id,
            'medium',
            false,
            [
              'class' => 'recipe-card-image',
              'alt'   => '',
            ]
          ); ?>
        <?php endif; ?>

      </a>
    </li>
  <?php endforeach; ?>
</ul>