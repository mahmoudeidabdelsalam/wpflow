<?php
/**
 * Block Name: Banner
*/

$alight_content = get_field('select_alight_content');
$the_headline = get_field('the_headline');
$the_content = get_field('the_contents');
$id = 'banner' . $block['id'];
$link = get_field('select_page_content');
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
?>
<section class="block-about">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-md-7 col-12 content-about <?= ($alight_content)? 'order-2':''; ?>" data-aos="fade-up">
        <div class="status-icon">
          <?php
          if( have_rows('icon_status_about') ):
            while ( have_rows('icon_status_about') ) : the_row(); 
            $image = get_sub_field('icon_status');
            $file = file_get_contents($image['url']);
            ?>
            <div class="statusitems toggle<?= $id; ?>">
              <div class="icons"><?= $file; ?></div>
              <h3><?= the_sub_field('headline_status'); ?></h3>
              <h5><?= the_sub_field('content_status'); ?></h5>
              <span class="arrow-up"><img src="<?php echo get_theme_file_uri().'/resources/assets/images/arrow.svg'; ?>" alt="arrow"></span>
            </div>
          <?php
            endwhile;
          endif;
          ?>
        </div>
      </div>
      <div class="col-md-5 col-12 the-content" data-aos="fade-up">
        <h2 class="the-headline"><?= $the_headline; ?></h2>
        <div class="content-editor"><?= $the_content; ?></div>
        <div class="custom-buttons row align-items-center ml-0 mr-0">
          <button id="previous<?= $id; ?>"><span class="arrow-left"><img src="<?php echo get_theme_file_uri().'/resources/assets/images/arrow-left.png'; ?>" alt="arrow"></span></button>
          <button id="next<?= $id; ?>"><span class="arrow-right"><img src="<?php echo get_theme_file_uri().'/resources/assets/images/arrow-light.svg'; ?>" alt="arrow"></span></button>
          <a class="btn btn-primary ml-auto" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

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

<style>
section.block-about {
    padding: 100px 20px 60px;
}

.status-icon {
    background: #2F2F2F;
    height: 280px;
    border-radius: 10px;
    display: flex;
    justify-content: space-around;
}

.statusitems {
    width: 200px;
    background: #FFFFFF;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    height: 280px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-flow: column;
    margin-top: 70px;
    position: relative;
}

.statusitems svg path {
    fill: #2f2f2f !important;
}

.statusitems.active svg path {
    fill: #ED1C24 !important;
}
.statusitems.active {
    color: #ED1C24;
    transform: scale3d(1.1, 1.1, 1.1);
}

.statusitems h3 {
    text-align: center;
}

span.arrow-up {
    position: absolute;
    bottom: -25px;
    opacity: 0;
    transition: opacity .5s;
}

.statusitems.active span.arrow-up {
    opacity: 1;
}
.custom-buttons {
    margin-top: 100px;
}

.custom-buttons button {
    border: none;
    background: transparent;
}

.btn-primary {
    height: 40px;
}

.the-content h2.the-headline {
    font-weight: bold;
    line-height: 116%;
    color: #000000;
    padding-bottom: 30px;
    position: relative;
    margin: 0 0 50px
}

.the-content h2.the-headline:after {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100px;
    height: 4px;
    content: "";
    background: #ED1C24;
    border-radius: 22px;
}

.statusitems .icons {
    background: #F5F5F5;
    width: 105px;
    height: 105px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
    margin-bottom: 20px;
}
</style>