<?php
$categories = get_sub_field('categories');

if (empty($categories)) {
  return;
}

$is_front_page = is_front_page();
$is_categories_page = is_page('recipe-categories');

$wrapper_class = 'row g-4';

if ($is_front_page) {
  $wrapper_class .= ' home-links';
} elseif ($is_categories_page) {
  $wrapper_class = 'category-overview';
}
?>

<div class="<?php echo esc_attr($wrapper_class); ?>">
  <?php foreach ($categories as $category) : ?>
    <?php
    $link = $category['link'] ?? [];
    $url = esc_url($link['url'] ?? '');
    $title = trim($category['title'] ?? '');
    $image_id = (int) ($category['image'] ?? 0);
    $description = trim($category['description'] ?? '');

    if ($url === '' || $title === '') {
      continue;
    }

    $new_tab = ($link['target'] ?? '') === '_blank';

    $column_class = $is_categories_page
      ? 'category-overview-item'
      : 'col-12 col-sm-6 col-lg-3';

    $card_class = 'card text-decoration-none';

    if ($is_front_page) {
      $card_class .= ' home-teaser';
    } elseif ($is_categories_page) {
      $card_class .= ' category-teaser h-100';
    } else {
      $card_class .= ' h-100';
    }
    ?>

    <div class="<?php echo esc_attr($column_class); ?>">
      <a class="<?php echo esc_attr($card_class); ?>"
         href="<?php echo $url; ?>"
         <?php if ($new_tab) : ?>
           target="_blank" rel="noopener noreferrer"
         <?php endif; ?>>

        <?php if ($image_id) : ?>
          <?php
          echo wp_get_attachment_image($image_id, 'medium_large', false, [
            'class' => 'card-img-top',
            'alt'   => '',
          ]);
          ?>
        <?php endif; ?>

        <div class="card-body">
          <h2 class="h4 mb-0">
            <?php echo esc_html($title); ?>
          </h2>

          <?php if (($is_front_page || $is_categories_page) && $description !== '') : ?>
            <p class="<?php echo $is_front_page ? 'home-link-description' : 'category-description'; ?> mb-0">
              <?php echo esc_html($description); ?>
            </p>
          <?php endif; ?>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
</div>