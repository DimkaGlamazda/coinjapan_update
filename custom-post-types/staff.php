<?php
function staff_post_type()
{
  $labels = [
      'name' => 'Staff'
    , 'singular_name' => 'Staff'
    , 'add_new' => 'New Member'
    , 'all_items' => 'All Members'
    , 'add_new_item' => 'New Member'
    , 'edit_item' => 'Edit Member'
    , 'new_item' => 'New Member'
    , 'view_item' => 'View Member'
    , 'search_item' => 'Search Members'
    , 'not_found' => 'No Members Found'
    , 'not_found_in_trash' => 'No Members found in trash'
    , 'parent_item_column' => 'Parent Item'
  ];

  $args = [
      'labels' => $labels
    , 'public' => true
    , 'has_archive' => true
    , 'publicly_queryable' => true
    , 'query_var' => true
    , 'rewrite' => true
    , 'capability_type' => 'post'
    , 'menu_icon' => 'dashicons-groups'
    , 'hierarchical' => false
    , 'supports' => [
          'title', 'editor', 'thumbnail', 'page-attributes'
      ]
    , 'menu_position' => 5
    , 'exclude_from_search' => true
  ];

  add_theme_support('post-thumbnails');
  add_post_type_support( 'staff', 'thumbnail');

  register_post_type('staff', $args);
}

add_action('init', 'staff_post_type');


function coinjapan_staff_metabox()
{
  add_meta_box('member_position', 'Member Position', 'coinjapan_member_position', 'staff', 'side', 'high');
}

add_action('add_meta_boxes', 'coinjapan_staff_metabox');


function coinjapan_member_position($post)
{
  wp_nonce_field(basename(__FILE__), 'staff_nonce');
  $cj_stored_meta = get_post_meta($post->ID);

  $position = null;
  if (!empty($cj_stored_meta['position']))
    $position = esc_attr($cj_stored_meta['position'][0]);

  echo '<label for="position">Member Position:</label><br>';
  echo '<input type="text" id="position" name="position" value="' . $position . '" />';

}


function coinjapan_staff_meta_save($post_id)
{
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['staff_nonce']) && wp_verify_nonce($_POST['staff_nonce'], basename(__FILE__))) ? 'true' : 'false';

  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  if (isset($_POST['position'])) {
    update_post_meta($post_id, 'position', sanitize_text_field($_POST['position']));
  }

}

add_action('save_post', 'coinjapan_staff_meta_save');