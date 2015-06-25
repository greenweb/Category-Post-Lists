<?php
/*
Plugin Name: Category Post Lists
Description: Use the following ShortCode: <code>[catposts]</code> shortCode has the following attributes <code>orderby='name' OR 'id' OR 'count' OR 'name' OR 'slug' hide_empty=1 OR 0 order='DESC' OR 'ASC' exclude='0' OR '1,20,39'</code> eg: <code>[catposts orderby='id' exclude='1,20,39']</code>
Plugin URI: http://www.beforesite.com/docs/category-post-lists-shortcode/
Author: Rew Rixom
Author URI: http://www.greenvilleweb.com/
Version: 1.0
License: GPL2
Text Domain: cat_posts
Domain Path: /
*/

/*
  Copyright (C) 2015  Rew Rixom  (email : rew@rixom.org)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// Add Shortcode
function cp_shortcode( $atts ) {
  // Attributes
  extract( shortcode_atts(
      array(
        'orderby'       => 'name', #id, count, name, slug,
        'hide_empty'    =>  1, # 0
        'order'         => 'DESC', #'ASC'
        'exclude'       => '0', #'1,20,39'
        'include'       => '',
        'post_orderby'  => 'date', 
        'post_order'    => 'DESC', #'ASC'
      ), $atts )
  );
  
  $categories = get_terms( 'category', array(
    'orderby'    => $orderby,
    'hide_empty' => $hide_empty,
    'order'      => $order,
    'exclude'    => $exclude,
    'include'    => $include
  ) );

  $return_html ='<ul class="catposts">';
  foreach ($categories as $key => $value) {
    $return_html  .= '<li><h3 class="cat-titles"><a href="'.get_category_link( $value->term_id ).'">';
      $return_html .= $value->name;
    $return_html .= '</h3>';
    $return_html .= cp_get_posts( $value->term_id, $post_orderby, $post_order );
    $return_html .= '</li>';
  }
  $return_html .='</ul>';
  return $return_html;
}

add_shortcode( 'catposts', 'cp_shortcode' );

function cp_get_posts($id, $post_orderby='date', $post_order='DESC' ){
    $args = array(
      'posts_per_page'   => -1,
      'cat'              => $id,
      'orderby'          => $post_orderby,
      'order'            => $post_order,
      'post_type'        => 'post',
  );
  $posts_array = new WP_Query( $args );

  $posts_title = '<ul>';
  while ( $posts_array->have_posts() ) {
    $posts_array->the_post();
    $posts_title .= '<li class="post-titles"><a href="';
      $posts_title .= get_the_permalink();
    $posts_title .= '">';
      $posts_title .= get_the_title();
      $posts_title .= '</a> ';
    $posts_title .= '</li>';
  }
  $posts_title .= '</ul>';
  wp_reset_postdata();
  return $posts_title;
}



// EOF