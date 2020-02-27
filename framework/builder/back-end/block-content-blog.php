<?php
/**
 * Block Name: Block subscribe

 * This is the template that displays the Banner.
 */

// create id attribute for specific styling
$id = 'blog' . $block['id'];
?>

<blockquote id="<?php echo $id ?>" class="blog">
  <section class="block-blog">
    <img class="img-fluid" src="<?php echo get_theme_file_uri().'/resources/assets/images/blocks/blog.png'; ?>"/>
  </section>
</blockquote>
