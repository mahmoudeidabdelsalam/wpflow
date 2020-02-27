<?php
/**
 * Block Name: Team
*/

$headline = get_field('headline_block_models');
$slogan = get_field('slogan_block_models');
$id = 'team' . $block['id'];
$link = get_field('select_team_block');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
?>
<section class="block-team mt-5 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-12 the-content text-center mb-5">
        <h2 class="the-headline" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"><?= $headline; ?></h2>
        <p><?= $slogan; ?></p>
      </div>
      <div class="col-12">
        <div class="row">
          <?php
          if( have_rows('models_block') ):
            while ( have_rows('models_block') ) : the_row(); 
            $image = get_sub_field('headline_image_model');
            ?>
            <div class="col-md-3 col-12 features-item toggle<?= $id; ?>" data-aos="fade" data-aos-duration="500">
              <div class="card">
                <div class="img-top">
                <div class="img-team"><img src="<?= $image; ?>" alt="<?= the_sub_field('headline_features'); ?>"></div>
                </div>
                <div class="card-body text-center">
                  <h4 class="m-0"><?= the_sub_field('name_author'); ?></h4>
                  <p class="text-secondary mb-0"><?= the_sub_field('job_title_author'); ?></p>
                  <hr>
                  <h4 class="text-primary"><?= the_sub_field('position_author'); ?></h4>
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
section.block-team .card {
    background: #FFFFFF;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    overflow: visible !important;
    margin-top: 80px;
}
section.block-team h2:after {
  left: 47% !important;
}
section.block-team .img-top {
  overflow: visible;
  border-radius: 10px 10px 0px 0px;
  display: flex;
  justify-content: center;
  align-items: center;
}
section.block-team .img-top .img-team {
    height: 170px;
    width: 170px;
    overflow: hidden;
    border-radius: 100%;
    margin-top: -70px;
}
section.block-team .active .card {
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