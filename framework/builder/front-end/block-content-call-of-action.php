<?php
/**
 * Block Name: call of action
*/

$background_call = get_field('background_call_of_action');
$headline = get_field('headline_call_of_action');
$editor = get_field('content_call_of_action');
?>

<section class="block-call mt-4">
  <div class="container">
    <div class="row">
      <div class="col-12 the-content text-center mb-5">
        <h2 class="the-headline" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"><?= $headline; ?></h2>
        <p><?= $editor; ?></p>
      </div>
      <div class="col-12 text-center">
        <img class="m-auto img-fluid" src="<?= $background_call; ?>" alt="<?= $headline; ?>">
      </div>
    </div>
  </div>
</section>

<style>
section.block-call h2:after {
  left: 47% !important;
}
</style>
