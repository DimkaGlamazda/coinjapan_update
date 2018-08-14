<?php
function news_post_type()
{

  $labels = [
      'name' => 'News'
    , 'singular_name' => 'News'
    , 'add_new' => 'New News'
    , 'all_items' => 'All News'
    , 'add_new_item' => 'New News'
    , 'edit_item' => 'Edit News'
    , 'new_item' => 'New News'
    , 'view_item' => 'View News'
    , 'search_item' => 'Search News'
    , 'not_found' => 'No News Found'
    , 'not_found_in_trash' => 'No News found in trash'
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
    , 'menu_icon' => 'dashicons-format-aside'
    , 'supports' => [
          'title', 'editor', 'thumbnail'
      ]
    , 'menu_position' => 6
    , 'exclude_from_search' => true

  ];

  register_post_type('news_item', $args);
}

add_action('init', 'news_post_type');



function news_short_summary_metabox()
{
  add_meta_box('short_summary', 'Short Summary', 'news_short_summary', 'news_item', 'normal', 'high');
}

add_action('add_meta_boxes', 'news_short_summary_metabox');

function news_short_summary($post)
{
  wp_nonce_field(basename(__FILE__), 'news_nonce');
  $cj_stored_meta = get_post_meta($post->ID);

  $summary = null;
  if (!empty($cj_stored_meta['summary']))
    $summary = esc_attr($cj_stored_meta['summary'][0]);

  echo '<textarea type="text" id="summary" name="summary" style="width:100%; height: 100px">' . $summary . '</textarea>';

}


function news_short_summary_meta_store($post_id)
{
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['news_nonce']) && wp_verify_nonce($_POST['news_nonce'], basename(__FILE__))) ? 'true' : 'false';

  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  $text = mb_strimwidth($_POST['summary'], 0, 700, "...");

  if (isset($_POST['summary'])) {
    update_post_meta($post_id, 'summary', sanitize_text_field($text));
  }

}

add_action('save_post', 'news_short_summary_meta_store');



function coinjapan_news_custom_taxonomies()
{
  $labels = [
      'name' => 'Category'
    , 'singular_name' => 'Category'
    , 'search_items' => 'Search Categories'
    , 'all_items' => 'All Categories'
    , 'edit_item' => 'Edit Category'
    , 'update_item' => 'Update Category'
    , 'add_new_item' => 'Add New Category'
    , 'new_item_name' => 'Category'
    , 'menu_name' => 'Categories'
  ];

  $args = [
      'hierarchical' => true
    , 'labels' => $labels
    , 'show_ui' => true
    , 'show_admin_column' => true
    , 'query_var' => true
    , 'rewrite' => ['slug' => 'categories']
  ];

  register_taxonomy('categories', ['news_item'], $args);
}

add_action('init', 'coinjapan_news_custom_taxonomies');

function news_category_taxonomy_custom_fields($tag)
{

  $t_id = $tag->term_id;
  $term_meta = get_option("taxonomy_term_$t_id");

  ?>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="color"><?php _e('Category Color'); ?></label>
    </th>
    <td>
      <input type="text" name="term_meta[categories_id]" id="term_meta[categories_id]" size="25" style="width:60%;"
             value="<?php echo $term_meta['categories_id'] ? $term_meta['categories_id'] : ''; ?>"><br/>
      <p class="description">Input HEX color code. (Without #)</p>
    </td>
  </tr>
  <?php

}

// A callback function to save our extra taxonomy field(s)
function save_taxonomy_custom_fields($term_id)
{
  if (isset($_POST['term_meta'])) {
    $t_id = $term_id;
    $term_meta = get_option("taxonomy_term_$t_id");
    $cat_keys = array_keys($_POST['term_meta']);
    foreach ($cat_keys as $key) {
      if (isset($_POST['term_meta'][$key])) {
        $term_meta[$key] = $_POST['term_meta'][$key];
      }
    }
    //save the option array
    update_option("taxonomy_term_$t_id", $term_meta);
  }
}


add_action('categories_edit_form_fields', 'news_category_taxonomy_custom_fields', 10, 2);

add_action('edited_categories', 'save_taxonomy_custom_fields', 10, 2);