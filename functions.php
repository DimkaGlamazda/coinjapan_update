<?php

/**
 * Theme defiles
 *
 *
 */
// require_ones 'content.php';

define('CJ_MEDIA_ROOT', get_template_directory_uri() . '/media');
define('CJ_SCRIPTS_ROOT', get_template_directory_uri() . '/js');
define('CJ_STYLESHEET_ROOT', get_template_directory_uri() . '/css');


// RESET CONTACT FORM ADDITIONAL STYLES
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * Enqueue scripts and styles.
 *
 * @since CoinJapan
 */

function cj_setup()
{
  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'coinjapan')
  ));
}

add_action('after_setup_theme', 'cj_setup');

/**
 * Enqueue scripts and styles.
 *
 * @since CoinJapan
 */
function coin_japan_scripts()
{

  // Load our main stylesheet.

  wp_enqueue_style('owl-carousel', CJ_STYLESHEET_ROOT . '/owl.carousel.min.css');
  wp_enqueue_style('owl-theme', CJ_STYLESHEET_ROOT . '/owl.theme.default.min.css');
  wp_enqueue_style('animate', CJ_STYLESHEET_ROOT . '/animate.min.css');
  wp_enqueue_style('bootstrap', CJ_STYLESHEET_ROOT . '/bootstrap.min.css');
  wp_enqueue_style('fonts', CJ_STYLESHEET_ROOT . '/fonts.css');
  wp_enqueue_style('cj-style', get_stylesheet_uri());
  // Load our main scripts.
  wp_enqueue_script('jquery', CJ_SCRIPTS_ROOT . '/jquery-3.3.1.min.js');
  wp_enqueue_script('bootstrap-js', CJ_SCRIPTS_ROOT . '/bootstrap.min.js');
  wp_enqueue_script('owl-carousel-js', CJ_SCRIPTS_ROOT . '/owl.carousel.min.js');
  wp_enqueue_script('spincrement', CJ_SCRIPTS_ROOT . '/jquery.spincrement.min.js');
  wp_enqueue_script('tilt', CJ_SCRIPTS_ROOT . '/tilt.jquery.js');
  wp_enqueue_script('TweenMax', CJ_SCRIPTS_ROOT . '/TweenMax.min.js');
  wp_enqueue_script('viewportchecker', CJ_SCRIPTS_ROOT . '/jquery.viewportchecker.js');

  //custom scripts
  wp_enqueue_script('cj-scripts', CJ_SCRIPTS_ROOT . '/main.js');

}

add_image_size('sml_size', 300);
add_image_size('mid_size', 600);
add_image_size('lrg_size', 1200);
add_image_size('sup_size', 2400);


/**
 * Menu Customization
 *
 * @since CoinJapan
 */

add_action('wp_enqueue_scripts', 'coin_japan_scripts');


function cj_menu_customization()
{
  function add_active_class_to_nav_menu($classes)
  {
    if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
      $classes = array_diff($classes, array('current-menu-item', 'current_page_item', 'active'));
      $classes[] = 'active-nav-item';
    }
    return $classes;
  }

  try {
    add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu');

    wp_nav_menu([
      'theme_location' => 'primary',
      'container' => false
    ]);

    remove_filter('nav_menu_css_class', 'add_active_class_to_nav_menu');
  }
  catch (Exeption $e) {
    var_dump($e->getMessage());
  }


}

// add_action( 'init', 'cj_menu_customization' );

/*
 *  Careers Post type
 *
 * */

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

// Add the fields to the "presenters" taxonomy, using our callback function  
add_action('categories_edit_form_fields', 'news_category_taxonomy_custom_fields', 10, 2);

// Save the changes made on the "presenters" taxonomy, using our callback function  
add_action('edited_categories', 'save_taxonomy_custom_fields', 10, 2);



/*
*
*
*
*
*
**/

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
      'title', 'editor', 'thumbnail'
    ]
    , 'menu_position' => 5
    , 'exclude_from_search' => true

  ];

  add_theme_support('post-thumbnails');
  add_post_type_support( 'staff', 'thumbnail' ); 

  register_post_type('staff', $args);
}

add_action('init', 'staff_post_type');


function coinjapan_staff_metabox()
{
  add_meta_box('member_position', 'Member Position', 'coinjapan_member_position', 'staff', 'side', 'high');
}

// add_action('add_meta_boxes', 'coinjapan_positions_metabox');

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



/*
*
*
*
*
*
**/

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




add_action('init', function () {

  if (function_exists('pll_register_string')) {
    // Breadcrumbs
    pll_register_string('breadcrumb_home', 'Home', 'breadcrumbs');
    pll_register_string('breadcrumb_about', 'About', 'breadcrumbs');
    // Home Page
    pll_register_string('title_first', 'ICO Consulting and', 'Home');
    pll_register_string('title_second', 'Blockchain Technologies', 'Home');
    pll_register_string('title_we_are_coinjapan', 'We are CoinJapan', 'Home');
    pll_register_string('description_we_are_coinjapan', "description_we_are_coinjapan", 'Home', true);
    pll_register_string('btn_we_are_coinjapan', 'Read more', 'Home');


    pll_register_string('title_achievements', 'Achievements', 'Home');
    pll_register_string('header_achievements_one', 'Collected funds', 'Home');
    pll_register_string('header_achievements_two', 'Successful ICOs', 'Home');
    pll_register_string('header_achievements_three', 'Attracted investors', 'Home');
    pll_register_string('milion_achievements', 'Million', 'Home');
    pll_register_string('btn_achievements_milion', 'Read more', 'Home');

    pll_register_string('title_news', 'News', 'Home');
    pll_register_string('title_partners', 'Partners', 'Home');

    // About Page

    pll_register_string('about_our_team_title', 'About', 'About');

    pll_register_string('about_title', 'Who we are', 'About');
    pll_register_string('about_description', 'about_description', 'About', true);
    pll_register_string('about_vision_title', 'Vision', 'About');
    pll_register_string('about_vision_description', 'about_vision_description', 'About', true);
    pll_register_string('about_our_aim_title', 'Our Aim', 'About');
    pll_register_string('about_our_aim_description', 'about_our_aim_description', 'About', true);

    pll_register_string('about_our_team_title', 'Our Team', 'About');



    pll_register_string('about_services_bottom_link', 'Services', 'About');
    pll_register_string('about_projects_bottom_link', 'Projects', 'About');

// SERVICES

    pll_register_string('services_header', 'SERVICES', 'Services');
    pll_register_string('services_desription_header', 'Your success story begins here', 'Services');
    pll_register_string('services_desription', 'services_desription', 'Services', true);

    pll_register_string('services_desription_notes_title', 'Three fundamental conditions for gaining success in the Japanese market:', 'Services');
    pll_register_string('services_desription_notes_note1', 'Professional localization', 'Services');
    pll_register_string('services_desription_notes_note2', 'Effective strategic planning', 'Services');
    pll_register_string('services_desription_notes_note3', 'Willingness to follow the Japanese business rules', 'Services');

    pll_register_string('services_desription_notes2', 'Partnerships with CoinJapan is your guarantee of entering Japanese market for the providing of hyper-growth your product. We can help to raise funds for you because we understand the market, know its features, requirements and business rules.', 'Services', true);

    pll_register_string('services_list_title', 'What we can do for you', 'Services');
    pll_register_string('services_list_item_title1', 'Strategic Advisory', 'Services');
    pll_register_string('services_list_item_description1', 'On the first stage of our cooperation we will help you to appraise the strengths, weaknesses, opportunities and threats of your project. After the appraisal our experts will help you to develop “must do” activities plan to solve problems and use advantages. It allows to prepare for entering in the investment market.', 'Services', true);

    pll_register_string('services_list_item_title2', 'Crowdfunding', 'Services');
    pll_register_string('services_list_item2_note1', 'ICO Strategy and Planning', 'Services');
    pll_register_string('services_list_item2_note2', 'Fundraising via Pre-sale', 'Services');
    pll_register_string('services_list_item2_note3', 'Fundraising via ICO', 'Services');
    pll_register_string('services_list_item2_note4', 'Putting on the listings of Japanese exchanges', 'Services');
    pll_register_string('services_list_item2_note5', 'Affiliate Programs', 'Services');
    pll_register_string('services_list_item2_note6', 'Dashboard Solutions', 'Services');

    pll_register_string('services_list_item_title3', 'Marketing', 'Services');
    pll_register_string('services_list_item3_note1', 'Localization (Whitepaper, Web, Marketing)', 'Services');
    pll_register_string('services_list_item3_note2', 'Online advertisement in Japan', 'Services');
    pll_register_string('services_list_item3_note3', 'Promotion to Japanese Angel Investors', 'Services');
    pll_register_string('services_list_item3_note4', 'Press releases on Japanese media', 'Services');
    pll_register_string('services_list_item3_note5', 'Public Relations', 'Services');
    pll_register_string('services_list_item3_note6', 'Social media control', 'Services');

    pll_register_string('services_list_item_title4', 'Support', 'Services');
    pll_register_string('services_list_item4_note1', 'Legal consultation', 'Services');
    pll_register_string('services_list_item4_note2', 'Sales Channel Development', 'Services');
    pll_register_string('services_list_item4_note3', 'Long Term Business Development', 'Services');
    pll_register_string('services_list_item4_note4', 'Partner Search', 'Services');
    pll_register_string('services_list_item4_note4', 'Sales support', 'Services');

    pll_register_string('services_download_ico_menu_btn', 'Download ICO Menu', 'Services');


    pll_register_string('projects_header', 'PROJECTS', 'Projects');
    pll_register_string('projects_dercription_header', 'The way of ICO providing is successful with us', 'Projects');
    pll_register_string('projects_description', 'projects_description', 'Projects', true);
    pll_register_string('projects_description_notes_title', 'Our mutual success based on the next components:', 'Projects');
    pll_register_string('projects_description_note1', 'Knowledge the Japanese investors’ interests', 'Projects');

    pll_register_string('projects_description_note2', 'Use of business methods adopted in Japan', 'Projects');
    pll_register_string('projects_description_note3', 'Our reputation growth on the number of successful ICO', 'Projects');
    pll_register_string('projects_description2', 'Cooperation with CoinJapan is the very decision, which will open your business for investments from Japan. We are sure in our capabilities and are able to create solutions for the growth of your project.', 'Projects', true);

    pll_register_string('projects_achivments_header', 'Achievements', 'Projects');
    pll_register_string('projects_achivment1', 'Performed Projects', 'Projects');
    pll_register_string('projects_achivment2', 'Successful ICOs', 'Projects');
    pll_register_string('projects_achivment3', 'Collected funds', 'Projects');
    pll_register_string('projects_achivment3_additional_description', 'Million', 'Projects');
    pll_register_string('projects_achivment4', 'Attracted investors', 'Projects');
    pll_register_string('projects_achivment5', 'Average contribution of one investor', 'Projects');
    pll_register_string('projects_achivment5_additional_description', 'Thousand', 'Projects');
    pll_register_string('projects_achivment6', 'Average time to launching ICO', 'Projects');
    pll_register_string('projects_achivment6_additional_description', 'Month', 'Projects');
    pll_register_string('projects_achivment7', 'Our Clients', 'Projects');
    pll_register_string('projects_note', '*Most projects cannot be shared due to NDA', 'Projects');
    pll_register_string('projects_clients_title', 'What our clients say', 'Projects');
    pll_register_string('projects_clients_says', 'projects_clients_says', 'Projects', true);
    pll_register_string('projects_client', 'Maxim Prasolov', 'Projects');

// partners 
    pll_register_string('partners_page_title', 'Partners', 'Partners');
    pll_register_string('partners_description_title', 'In blockchain we trust', 'Partners');
    pll_register_string('partners_description', 'partners_description', 'Partners', true);
    pll_register_string('partners_section_title', 'Partners', 'Partners');

    pll_register_string('partners_partner1_title', 'UVCA', 'Partners');
    pll_register_string('partners_partner1_description', 'Ukrainian Venture Capital and Private Equity Association was established to spread the word about Ukraine’s achievements and opportunities and to support investors in every aspect, from providing reliable information to establishing international connections at the industry and government levels.', 'Partners', true);
    pll_register_string('partners_partner2_title', 'Hacken', 'Partners');
    pll_register_string('partners_partner2_description', 'Hacken is Ecosystem, which includes the international community of white hat hackers and own cryptocurrency Hacken (HKN). The main idea of Hacken Ecosystem is to provide cybersecurity services on tokenized bug bounty marketplace platform HackenProof.', 'Partners', true);
    pll_register_string('partners_partner3_title', 'Hi-Tech Park Belarus', 'Partners');
    pll_register_string('partners_partner3_description', 'HTP Belarus provides special business environment for IT  business. HTP attractiveness is based not on tax benefits and costs alone, but on knowledge, innovation and highly qualified human resources. Belarusian programmers get trained at the training centers of IBM, SAP, Oracle, Microsoft, and other world IT leaders.', 'Partners', true);
    pll_register_string('partners_partner4_title', 'Axon Partners', 'Partners');
    pll_register_string('partners_partner4_description', 'Axon Partners provide the quality services of top-tier consulting companies and law firms but with a different approach. An approach that the technocrats would like to see in their own business: humane, creative and technology-based and that is how it should be nowadays.', 'Partners', true);
    pll_register_string('partners_consorcium_title', 'Consortium', 'Partners');
    pll_register_string('partners_consorcium_description', 'partners_consorcium_description', 'Partners', true);
    pll_register_string('partners_consorcium_btn', 'Application form', 'Partners');

    pll_register_string('partners_call_to_action_title', 'Let\'s start a new chapter of the blockchain together', 'Partners');
    pll_register_string('partners_call_to_action_description', 'partners_call_to_action_description', 'Partners', true);
    pll_register_string('partners_call_to_action_btn', 'Contact us', 'Partners');

    // careers

    pll_register_string('careers_page_header', 'Careers', 'Careers');
    pll_register_string('careers_section1_header', 'What we do', 'Careers');
    pll_register_string('careers_section1_description', 'careers_section1_description', 'Careers', true);
    pll_register_string('careers_section2_header', 'Open positions in CoinJapan', 'Careers');
    pll_register_string('careers_section3_header', 'Our core values', 'Careers');
    pll_register_string('careers_section3_core_values1', 'Move fast', 'Careers');
    pll_register_string('careers_section3_core_values2', 'Make a brave decision', 'Careers');
    pll_register_string('careers_section3_core_values3', 'Share your knowledge', 'Careers');
    pll_register_string('careers_section4_header', 'Our culture', 'Careers');
    pll_register_string('careers_section4_description', 'careers_section4_description', 'Careers', true);

    // contacts

    pll_register_string('contacts_page_header', 'Contacts', 'Contacts');
    pll_register_string('contacts_address1_title', 'CoinJapan KIEV', 'Contacts');
    pll_register_string('contacts_address1_address', 'Office 20, Vatslava Havela Boulevard, 4, Kiev, 03124, Ukraine', 'Contacts');
    pll_register_string('contacts_address1_email', 'sh@coinjapan.io', 'Contacts');
    pll_register_string('contacts_address1_phone', '+380 97 575 9464', 'Contacts');
    pll_register_string('contacts_address2_title', 'CoinJapan MINSK', 'Contacts');
    pll_register_string('contacts_address2_address', '3/19, 258, Gamamika St., 30, Minsk, 22131, Belarus Republic', 'Contacts');
    pll_register_string('contacts_address2_email', 'ad@coinjapan.io', 'Contacts');
    pll_register_string('contacts_address2_email', '+380 63 171 1788', 'Contacts');
    pll_register_string('contacts_section_form_header', 'Let\'s keep in touch', 'Contacts');
    pll_register_string('contacts_section_form_label1', 'Your Name', 'Contacts');
    pll_register_string('contacts_section_form_label2', 'Your Email', 'Contacts');
    pll_register_string('contacts_section_form_label3', 'Message', 'Contacts');
    pll_register_string('contacts_section_form_btn', 'Send now', 'Contacts');
    pll_register_string('contacts_section_form_placeholder1', 'Enter your name', 'Contacts');
    pll_register_string('contacts_section_form_placeholder2', 'Enter your email address', 'Contacts');
    pll_register_string('contacts_section_form_placeholder3', 'Your message here', 'Contacts');

    // news

    pll_register_string('news_page_header', 'News', 'News');
    pll_register_string('news_section_header', 'Our latest news', 'News');
    pll_register_string('news_section_description', 'Discover the latest breaking news about the blockchain and ICO around the world.', 'News');

  }
});


