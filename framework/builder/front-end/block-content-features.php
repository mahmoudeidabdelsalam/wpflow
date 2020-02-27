<?php
/**
 * Block Name: features
*/

$headline = get_field('headline_block');
$slogan = get_field('slogan_block');
$id = 'features' . $block['id'];
$link = get_field('select_page_block');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
?>
<section class="block-features">
  <div class="container">
    <div class="row">
      <div class="col-12 the-content text-center mb-5">
        <h2 class="the-headline" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"><?= $headline; ?></h2>
        <p><?= $slogan; ?></p>
      </div>
      <div class="col-12">
        <div class="row">
          <?php
          if( have_rows('features') ):
            while ( have_rows('features') ) : the_row(); 
            $image = get_sub_field('image_features');
            ?>
            <div class="col-md-3 col-12 features-item toggle<?= $id; ?>" data-aos="fade" data-aos-duration="500">
              <div class="card">
                <div class="img-top"><img src="<?= $image['url']; ?>" alt="<?= the_sub_field('headline_features'); ?>"></div>
                <div class="card-body text-center">
                  <h3><?= the_sub_field('headline_features'); ?></h3>
                  <p class="text-primary mb-0"><?= the_sub_field('content_features'); ?></p>
                </div>
              </div>
            </div>
          <?php
            endwhile;
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
section.block-features .card {
  height: 360px;
  background: #FFFFFF;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
  border-radius: 10px;
}
section.block-features h2:after {
  left: 47% !important;
}
section.block-features .img-top {
  height: 300px;
  overflow: hidden;
  background: linear-gradient(180deg, #FFFFFF 10%, #C8C8C8 100%);
  border-radius: 10px 10px 0px 0px;
  display: flex;
  justify-content: center;
  align-items: center;
}

section.block-features .active .card {
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