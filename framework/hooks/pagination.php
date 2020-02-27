<?php
/**
* Function Name: hook Pagination - hook_pagination();
* This Function can return WordPress Bootstrap Pagination
* @param  ()
* @return ()
*/
function hook_pagination( $args = array() ) {
  $defaults = array(
    'range'           => 4,
    'custom_query'    => FALSE,
    'previous_string' => __( 'Previous', 'hook' ),
    'next_string'     => __( 'Next', 'hook' ),
    'before_output'   => '<nav aria-label="Page navigation"><ul class="pagination">',
    'after_output'    => '</ul></nav>'
  );
  $args = wp_parse_args(
    $args,
    apply_filters( 'hook_pagination_defaults', $defaults )
  );
  $args['range'] = (int) $args['range'] - 1;
  if ( !$args['custom_query'] )
  $args['custom_query'] = @$GLOBALS['wp_query'];
  $count = (int) $args['custom_query']->max_num_pages;
  $page  = intval( get_query_var( 'paged' ) );
  $ceil  = ceil( $args['range'] / 2 );
  if ( $count <= 1 )
  return FALSE;
  if ( !$page )
  $page = 1;
  if ( $count > $args['range'] ) {
    if ( $page <= $args['range'] ) {
      $min = 1;
      $max = $args['range'] + 1;
    } elseif ( $page >= ($count - $ceil) ) {
      $min = $count - $args['range'];
      $max = $count;
    } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
      $min = $page - $ceil;
      $max = $page + $ceil;
    }
  } else {
    $min = 1;
    $max = $count;
  }

  $echo = '';
  $previous = intval($page) - 1;
  $previous = esc_attr( get_pagenum_link($previous) );

  $firstpage = esc_attr( get_pagenum_link(1) );
  if ( $firstpage && (1 != $page) )
  $echo .= '<li class="previous page-item"><a class="page-link" aria-label="Next" href="' . $firstpage . '">' . __( 'First', 'hook' ) . '</a></li>';
  if ( $previous && (1 != $page) )
  $echo .= '<li class="page-item"><a class="page-link" aria-label="Previous" href="' . $previous . '" title="' . __( 'previous', 'hook') . '">' . $args['previous_string'] . '</a></li>';

  if ( !empty($min) && !empty($max) ) {
    for( $i = $min; $i <= $max; $i++ ) {
      if ($page == $i) {
        $echo .= '<li class="active page-item"><span class="page-link" class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
      } else {
        $echo .= sprintf( '<li class="page-item"><a class="page-link" href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
      }
    }
  }
  $next = intval($page) + 1;
  $next = esc_attr( get_pagenum_link($next) );
  if ($next && ($count != $page) )
  $echo .= '<li class="page-item"><a class="page-link" href="' . $next . '" title="' . __( 'next', 'hook') . '">' . $args['next_string'] . '</a></li>';

  $lastpage = esc_attr( get_pagenum_link($count) );
  if ( $lastpage ) {
    $echo .= '<li class="next page-item"><a class="page-link" href="' . $lastpage . '">' . __( 'Last', 'hook' ) . '</a></li>';
  }
  if ( isset($echo) )
  echo $args['before_output'] . $echo . $args['after_output'];
}
