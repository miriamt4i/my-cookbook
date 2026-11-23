<?php
$categories = get_sub_field('categories');

if (empty($categories)) {
  return;
}

$is_front_page = is_front_page();
?>

<div class="row g-4<?php echo $is_front_page ? ' home-links' : ''; ?>">
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
    ?>

    <div class="col-12 col-sm-6 col-lg-3">
      <a class="card text-decoration-none<?php echo $is_front_page ? ' home-teaser' : ' h-100'; ?>"
         href="<?php echo $url; ?>"
         <?php if ($new_tab) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>

        <?php if ($image_id) : ?>
          <?php echo wp_get_attachment_image($image_id, 'medium_large', false, [
            'class' => 'card-img-top',
            'alt'   => '',
          ]); ?>
        <?php endif; ?>

        <div class="card-body">
          <h2 class="h4 mb-0">
            <?php echo esc_html($title); ?>
          </h2>

          <?php if ($is_front_page && $description !== '') : ?>
            <p class="home-link-description mb-0">
              <?php echo esc_html($description); ?>
            </p>
          <?php endif; ?>
        </div>

      </a>
    </div>
  <?php endforeach; ?>
</div>