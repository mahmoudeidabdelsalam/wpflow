<?php
 /**
 * Load all custome fields folder
 * Load all page templates
 */

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('custom/custom-classes', get_theme_file_uri() . '/framework/assets/custom-classes.css', false, null);
}, 100);


 $files = array_merge(
   glob(__DIR__.'/utilities/*.php'),
   glob(__DIR__.'/hooks/*.php'),
   glob(__DIR__.'/acf/*.php'),
   glob(__DIR__.'/posttype/*.php'),
   glob(__DIR__.'/taxonomies/*.php'),
   glob(__DIR__.'/backend/*.php'),
   glob(__DIR__.'/builder/*.php')

 );
 foreach ($files as $filename)
 {
   include $filename;
 }
