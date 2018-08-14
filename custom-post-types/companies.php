<?php
function companies_post_type()
{
  $labels = [
      'name' => 'Companies'
    , 'singular_name' => 'Company'
    , 'add_new' => 'New Company'
    , 'all_items' => 'All Companies'
    , 'add_new_item' => 'New Company'
    , 'edit_item' => 'Edit Company'
    , 'new_item' => 'New Company'
    , 'view_item' => 'View Company'
    , 'search_item' => 'Search Company'
    , 'not_found' => 'No Companies Found'
    , 'not_found_in_trash' => 'No Companies found in trash'
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
    , 'menu_icon' => 'dashicons-admin-site'
    , 'hierarchical' => false
    , 'supports' => [
          'title', 'editor', 'thumbnail'
      ]
    , 'menu_position' => 6
    , 'exclude_from_search' => true

  ];

  add_theme_support('post-thumbnails');
  add_post_type_support( 'companies', 'thumbnail' );

  register_post_type('companies', $args);
}

add_action('init', 'companies_post_type');


function coinjapan_companies_metabox()
{
  add_meta_box('company_type', 'Company type', 'coinjapan_company_types', 'companies', 'side', 'high');
  add_meta_box('company_referece', 'Company Reference', 'coinjapan_company_reference', 'companies', 'side', 'high');
}

add_action('add_meta_boxes', 'coinjapan_companies_metabox');


function coinjapan_company_types($post)
{
  wp_nonce_field(basename(__FILE__), 'companies_type_nonce');
  $cj_stored_meta = get_post_meta($post->ID);

  $types = maybe_unserialize( get_post_meta( $post->ID, 'type', true ) );

  $postMeta = [
      'client' => 'Clients',
      'partner' => 'Partners',
      'consortium' => 'Consortium'
  ];

  foreach ($postMeta as $slug => $title) {

    if ( is_array( $types ) && in_array( $slug, $types ) ) {
      $checked = 'checked="checked"';
    } else {
      $checked = null;
    }


    echo '<label for="'.$slug.'"><input id="'.$slug.'" type="checkbox" name="company_type[]" value="'.$slug.'" '.$checked.' >'.$title.'</label><br>';
  }
}

function coinjapan_company_reference($post)
{
  wp_nonce_field(basename(__FILE__), 'companies_reference_nonce');
  $cj_stored_meta = get_post_meta($post->ID);

  $label = null;
  if (!empty($cj_stored_meta['reference_label']))
    $label = esc_attr($cj_stored_meta['reference_label'][0]);

  echo '<label for="reference_label">Label:</label><br>';
  echo '<input type="text" id="reference_label" name="reference_label" value="' . $label . '" />';

  echo '<br>';

  $reference = null;
  if (!empty($cj_stored_meta['reference']))
    $reference = esc_attr($cj_stored_meta['reference'][0]);

  echo '<label for="reference">Url:</label><br>';
  echo '<input type="text" id="reference" name="reference" value="' . $reference . '" size="25" />';
}

function coinjapan_companies_type_meta_save($post_id)
{
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['companies_nonce']) && wp_verify_nonce($_POST['companies_nonce'], basename(__FILE__))) ? 'true' : 'false';

  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  if (isset($_POST['company_type'])) {
    update_post_meta( $post_id, 'type', $_POST['company_type'] );
  } else {
    delete_post_meta( $post_id, 'type' );
  }
}

add_action('save_post', 'coinjapan_companies_type_meta_save');

function coinjapan_companies_reference_meta_save($post_id)
{
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['companies_nonce']) && wp_verify_nonce($_POST['companies_nonce'], basename(__FILE__))) ? 'true' : 'false';

  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  if (isset($_POST['reference_label'])) {
    update_post_meta($post_id, 'reference_label', sanitize_text_field($_POST['reference_label']));
  }

  if (isset($_POST['reference'])) {
    update_post_meta($post_id, 'reference', sanitize_text_field($_POST['reference']));
  }
}

add_action('save_post', 'coinjapan_companies_reference_meta_save');