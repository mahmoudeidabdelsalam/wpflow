<?php
/**
 * Block Name: blog
*/

$headline = get_field('headline_blog_block');
$slogan = get_field('slogan_blog_block');
$id = 'blog' . $block['id'];
$link = get_field('link_blog_block');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
$posts = get_field('blogs_loop');
?>
<section class="block-blog mt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-12 the-content text-center mb-5">
        <h2 class="the-headline" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"><?= $headline; ?></h2>
        <p><?= $slogan; ?></p>
      </div>
      <div class="col-12">
        <div class="row">
          <?php
          if( $posts ): 
            foreach( $posts as $post):
              setup_postdata($post);
              $user_id = get_the_author_meta( 'ID' )
            ?>
              <div class="col-md-4 col-12 features-item toggle<?= $id; ?>" data-aos="fade" data-aos-duration="500">
                <div class="card">
                  <div class="img-top">
                    <img src="<?= Utilities::global_thumbnails($post->ID, 'full'); ?>" alt="<?= get_the_title($post->ID); ?>">
                  </div>
                  <div class="card-body">
                    <p class="row align-items-center justify-content-between m-0"><time class="text-primary" datetime="<?php echo get_the_date('c', $post->ID); ?>" itemprop="datePublished"><?= get_the_date('M j, Y', $post->ID); ?></time> <span class="ml-auto text-block"><span class="text-silver"><?php _e('by:', 'qteam'); ?></span> <?= the_author_meta( 'display_name', $user_id ); ?></span></p>
                    <h4 class="ml-0 mr-0 mt-3"><a href="<?= get_the_permalink($post->ID); ?>"><?= get_the_title($post->ID); ?></a></h4>
                  </div>
                </div>
              </div>
            <?php
            endforeach;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
      <div class="custom-buttons row align-items-center mt-5 mb-5 ml-0 mr-0 col-12">
        <button id="previous<?= $id; ?>"><span class="arrow-left"><img src="<?php echo get_theme_file_uri().'/resources/assets/images/arrow-left.png'; ?>" alt="arrow"></span></button>
        <button id="next<?= $id; ?>"><span class="arrow-right"><img src="<?php echo get_theme_file_uri().'/resources/assets/images/arrow-light.svg'; ?>" alt="arrow"></span></button>
        <a class="btn btn-primary ml-auto" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      </div>
    </div>
  </div>
</section>

<style>
section.block-blog .card {
  height: 360px;
  background: #FFFFFF;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
  border-radius: 10px;
}
section.block-blog h2:after {
  left: 47% !important;
}
section.block-blog .img-top {
  height: 300px;
  overflow: hidden;
  background: linear-gradient(180deg, #FFFFFF 10%, #C8C8C8 100%);
  border-radius: 10px 10px 0px 0px;
  display: flex;
  justify-content: center;
  align-items: center;
}

section.block-blog .active .card {
  transform: scale3d(1.1, 1.1, 1.1);
}
</style>

<script>
jQuery(function ($) {
//Waiting for images to be loaded 
  $(window).on("load", function() {
    var $el = $('.toggle<?= $id; ?>.active');
    if (!$el.length) {
      $('.toggle<?= $id; ?>').first().addClass('active');
    }
  });

  $('#previous<?= $id; ?>').click(function() {
    var $el = $('.active').prev('.toggle<?= $id; ?>');
    if (!$el.length) //If no previous, s$elect last
    {
      $el = $('.toggle<?= $id; ?>').last();;
    }
    $('.active').removeClass('active');
    $el.addClass('active');
  });

  $('#next<?= $id; ?>').click(function() {
    var $el = $('.active').next('.toggle<?= $id; ?>');
    if (!$el.length) //If no next, s$elect first
    {
      $el = $('.toggle<?= $id; ?>').first();
    }
    $('.active').removeClass('active');
    $el.addClass('active');
  });
});
</script>