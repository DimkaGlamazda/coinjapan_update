<?php
function positions_post_type()
{
  $labels = [
      'name' => 'Positions'
    , 'singular_name' => 'Position'
    , 'add_new' => 'New Position'
    , 'all_items' => 'All Position'
    , 'add_new_item' => 'New Position'
    , 'edit_item' => 'Edit Position'
    , 'new_item' => 'New Position'
    , 'view_item' => 'View Position'
    , 'search_item' => 'Search Positions'
    , 'not_found' => 'No Positions Found'
    , 'not_found_in_trash' => 'No Positions found in trash'
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
    , 'menu_icon' => 'dashicons-businessman'
    , 'hierarchical' => false
    , 'supports' => [
          'title', 'editor'
      ]
    , 'menu_position' => 5
    , 'exclude_from_search' => true

  ];

  register_post_type('positions', $args);
}

add_action('init', 'positions_post_type');


function coinjapan_positions_metabox()
{
  add_meta_box('position_locale', 'Position Location', 'coinjapan_locale', 'positions', 'side', 'high');
}

add_action('add_meta_boxes', 'coinjapan_positions_metabox');

function coinjapan_locale($post)
{
  wp_nonce_field(basename(__FILE__), 'coinjapan_positions_nonce');
  $cj_stored_meta = get_post_meta($post->ID);

  $city = null;
  if (!empty($cj_stored_meta['locale_sity']))
    $city = esc_attr($cj_stored_meta['locale_sity'][0]);

  echo '<label for="locale_sity">City:</label><br>';
  echo '<input type="text" id="locale_sity" name="locale_sity" value="' . $city . '" />';

  echo '<br>';

  $country = null;
  if (!empty($cj_stored_meta['locale_sity']))
    $country = esc_attr($cj_stored_meta['locale_country'][0]);

  echo '<label for="locale_country">Country:</label><br>';
  echo '<input type="text" id="locale_country" name="locale_country" value="' . $country . '" size="25" />';
}


function coinjapan_meta_save($post_id)
{
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['coinjapan_positions_nonce']) && wp_verify_nonce($_POST['coinjapan_positions_nonce'], basename(__FILE__))) ? 'true' : 'false';

  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  if (isset($_POST['locale_sity'])) {
    update_post_meta($post_id, 'locale_sity', sanitize_text_field($_POST['locale_sity']));
  }

  if (isset($_POST['locale_country'])) {
    update_post_meta($post_id, 'locale_country', sanitize_text_field($_POST['locale_country']));
  }

}

add_action('save_post', 'coinjapan_meta_save');