<?php
/**
 * Block Name: Banner
*/
?>
<section class="block-banner">
  <?php
  if( have_rows('slider_top') ):
    while ( have_rows('slider_top') ) : the_row(); 
    $bg_banner = get_sub_field('background_block_banner');
    $headline = get_sub_field('headline_column_content');
    $editor = get_sub_field('editor_column_content');
    $button_text = get_sub_field('button_column_content_text');
    $button_link = get_sub_field('button_column_content_link');
    ?>
      <div class="item" style="background-image:url('<?= $bg_banner; ?>');">
        <div class="container vh-lg-100">
          <div class="row justify-content-center vh-lg-100 text-center">
            <div class="col align-self-center" data-aos="fade-up">
              <h2><?= $headline; ?></h2>
              <div class="the-content">
                <?= $editor; ?>
                <a class="btn btn-primary mt-4" href="<?= ($button_link)? $button_link:'#'; ?>"><?= $button_text; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    endwhile;
  endif;
  ?>  
</section>


<script>
jQuery(function ($) {
  $('.block-banner').lightSlider({
    item:1,
    loop:true,
    slideMargin:0,
  });  
});
</script>

<style>
section.block-banner {
  height: 100vh;
}
section.block-banner .item {
  height: 100vh;
  background-size: cover;
}
.the-content p {
  margin: 0;
}
section.block-banner .item h2 {
  font-weight: bold;
  font-size: 60px;
  line-height: 116%;
  text-align: center;
  color: #ED1C24;
}
section.block-banner .item .the-content h2 {
  color: #000;
  font-weight: 300;
}
section.block-banner .item .the-content p {
  font-weight: 500;
}
.lSSlideOuter {
  position: relative;
}
ul.lSPager {
  bottom: 100px !important;
  position: absolute;
  width: 100% !important;
  top: auto;
}
ul.lSPager li a {
  width: 20px !important;
  border-radius: 22px !important;
  background: #C4C4C4 !important;
}
ul.lSPager li.active a {
  background: #ED1C24 !important;
}
.vh-lg-100 {
  height: 100vh;
}

@media (max-width: 420px) {
  .navbar-nav {
    width: 50%;
    float: left;
    padding: 10px;
    background: #fffefe;
    margin-top: 10px;
    border: 1px solid #ccc;
  }

  .navbar-nav li {
    border-bottom: 1px solid #ccc;
  }

  .navbar-nav li:last-child {
    border-bottom: none;
  }
  section.block-banner {
      height: auto !important;
  }
  section.block-banner .item {
      background-size: contain;
      background-repeat: no-repeat;
      background-position: bottom;
      height: auto;
      padding: 30px 0 !important;
  }
  .vh-lg-100 {
    height: auto;
  }
}
</style>