<?php $post = pll_get_post(40); ?>
<section class="clients-section">
  <div class="container">
    <h1 class="section-title"><?php echo get_the_title($post); ?></h1>
    <?php echo get_post_field('post_content', $post); ?>
  </div>
</section>
