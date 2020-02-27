<?php

/**
 * Count post views function using post meta
 * @param int $postID
 */
function hook_set_post_views($postID) {
    $count_key = 'hook_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    $count_update = '_hook_post_views_count_time';
    $time_to_check = 60 * 5; // 5 mins
    if (function_exists('stats_get_csv')) {
      // check if 5 minutes have elapsed since last seen
      if(get_post_meta($postID, $count_update, true) + $time_to_check < time() || empty(get_post_meta($postID, $count_update, true))):
        //var_dump( 'im in becoze '. get_post_meta($postID, $count_update, true) . ' now is ' .time() );
        $args = array(
            'days' => -1,
            'post_id' => $postID,
        );
        $postviews = stats_get_csv('postviews', $args);
        $count = $postviews['0']['views'];
        update_post_meta($postID, $count_key, $count);
        update_post_meta($postID, $count_update, time());
      else:
        //var_dump( 'im out becoze '. get_post_meta($postID, $count_update, true) . 'now is ' .time() );
      endif;

    } else {
        if ($count == '') {
            $count = 0;
            delete_post_meta($postID, $count_key);
            update_post_meta($postID, $count_key, 0);
        } else {
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
    if ($count < 30 && get_post_status($postID) == 'publish'):
        scrap_facebook_url($postID);
    endif;
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function hook_get_post_views($postID) {
    $count_key = 'hook_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        update_post_meta($postID, $count_key, '0');
        return 0;
    }

    return intval($count);
}

function scrap_facebook_url($postID) {
    $permalink = get_the_permalink($postID);
    echo "
    <script>
        jQuery(document).ready(function ($) {
            var fb_scrape_url = 'http://graph.facebook.com/?id=' + encodeURIComponent('$permalink') + '&scrape=true';
            var scrapping = $.post(fb_scrape_url);
            scrapping.done(function (data) {
                console.log(data.url + ' scraped with ID ' + data.id);
            });
        });
    </script>
    ";
}

function hook_track_post_views($post_id) {
    if (!is_single())
        return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    // will duplicate count in case of active w3tc browser cache
    echo "<!-- mfunc mysecretcode hook_set_post_views($post_id); -->";
    hook_set_post_views(get_the_ID());
    echo "<!-- /mfunc mysecretcode -->";
}

add_action('wp_head', 'hook_track_post_views');

function hook_admin_bar_post_views($wp_admin_bar) {

    if (is_single()) {
        global $post;
        $post_id = $post->ID;

        $args = array(
            'id' => 'dashicons-views',
            'title' => '<span class="ab-icon dashicons-visibility"></span> ' . hook_get_post_views($post_id) . ' ' . __('Views', 'hook'),
            'href' => get_edit_post_link($post_id),
            'meta' => array(
                'class' => 'hook-views',
            )
        );
        $wp_admin_bar->add_node($args);
    }
}

add_action('admin_bar_menu', 'hook_admin_bar_post_views', 90);
