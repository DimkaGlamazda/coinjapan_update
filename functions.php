<?php

/**
 * Theme defiles
 *
 *
 */
// require_ones 'content.php';

define('CJ_MEDIA_ROOT', get_template_directory_uri() . '/media');
define('CJ_NEWS_DEFAULT_IMG', get_template_directory_uri() . '/media/logo/default-news.png');
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


  wp_localize_script( 'cj-scripts', 'myajax', 
    array(
      'url' => admin_url('admin-ajax.php')
    )
  );  
}

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


function get_link_to_page($page)
{
  $languages = pll_the_languages(['raw' => 1]);
  $current_lang = 'en';
  foreach ($languages as $key => $language){
    if($language['current_lang']){
      $current_lang = $key;
    }
  }

  return $current_lang == 'en' ? $page : $page . '-ru';
}






//$true_page = 'myparameters.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите

$achievements_page = 'achievements.php';



// add_action('admin_menu', 'true_options');

function achievements_options() {
  global $achievements_page;
  add_options_page( 'Achievements', 'Achievements', 'manage_options', $achievements_page, 'achievements_option_page');  
}

add_action('admin_menu', 'achievements_options');

/**
 * Возвратная функция (Callback)
 */ 


function achievements_option_page()
{
  global $achievements_page;
  ?><div class="wrap">
    <h2>Achievements settings</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
      <?php 
      settings_fields('achievements_options');
      do_settings_sections($achievements_page);
      ?>
      <p class="submit">  
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
      </p>
    </form>
    </div><?php
  }

/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием true_options (это также видно в предыдущей функции)
 */
function achievements_settings() {
  global $achievements_page;

  register_setting( 'achievements_options', 'achievements_options', 'true_validate_settings' ); 

  add_settings_section( 'true_section_1', null, '', $achievements_page );


  $true_field_params = array(
    'type'      => 'text',
    'id'        => 'performed_projects',
    'label_for' => 'performed_projects' 
  );
  add_settings_field( 'performed_projects', 'Performed Projects', 'achievements_display_settings', $achievements_page, 'true_section_1', $true_field_params );

  $true_field_params = array(
    'type'      => 'text',
    'id'        => 'successful_icos',
    'label_for' => 'successful_icos' 
  );
  add_settings_field( 'successful_icos', 'Successful ICOs', 'achievements_display_settings', $achievements_page, 'true_section_1', $true_field_params );

  $true_field_params = array(
    'type'      => 'text',
    'id'        => 'collected_funds',
    'label_for' => 'collected_funds' 
  );
  add_settings_field( 'collected_funds', 'Collected funds', 'achievements_display_settings', $achievements_page, 'true_section_1', $true_field_params );

  $true_field_params = array(
    'type'      => 'text', 
    'id'        => 'attracted_investors',
    'label_for' => 'attracted_investors' 
  );
  add_settings_field( 'attracted_investors', 'Attracted investors', 'achievements_display_settings', $achievements_page, 'true_section_1', $true_field_params );

  $true_field_params = array(
    'type'      => 'text', 
    'id'        => 'average_contribution_of_one_investor',
    'label_for' => 'average_contribution_of_one_investor' 
  );
  add_settings_field( 'average_contribution_of_one_investor', 'Average contribution of one investor', 'achievements_display_settings', $achievements_page, 'true_section_1', $true_field_params );

  $true_field_params = array(
    'type'      => 'text', 
    'id'        => 'average_time_to_launching_ico',
    'label_for' => 'average_time_to_launching_ico' 
  );
  add_settings_field( 'average_time_to_launching_ico', 'Average time to launching ICO', 'achievements_display_settings', $achievements_page, 'true_section_1', $true_field_params );

}
add_action( 'admin_init', 'achievements_settings' );

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function achievements_display_settings($args) 
{

  extract( $args );

  $option_name = 'achievements_options';

  $o = get_option( $option_name );
 
  switch ( $type ) {  
    case 'text':  
    $o[$id] = esc_attr( stripslashes($o[$id]) );
    echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
    echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
    break;
    case 'textarea':  
    $o[$id] = esc_attr( stripslashes($o[$id]) );
    echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";  
    echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
    break;
    case 'checkbox':
    $checked = ($o[$id] == 'on') ? " checked='checked'" :  '';  
    echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";  
    echo ($desc != '') ? $desc : "";
    echo "</label>";  
    break;
    case 'select':
    echo "<select id='$id' name='" . $option_name . "[$id]'>";
    foreach($vals as $v=>$l){
      $selected = ($o[$id] == $v) ? "selected='selected'" : '';  
      echo "<option value='$v' $selected>$l</option>";
    }
    echo ($desc != '') ? $desc : "";
    echo "</select>";  
    break;
    case 'radio':
    echo "<fieldset>";
    foreach($vals as $v=>$l){
      $checked = ($o[$id] == $v) ? "checked='checked'" : '';  
      echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
    }
    echo "</fieldset>";  
    break; 
  }
}

/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
  foreach($input as $k => $v) {
    $valid_input[$k] = trim($v);

    /* Вы можете включить в эту функцию различные проверки значений, например
    if(! задаем условие ) { // если не выполняется
      $valid_input[$k] = ''; // тогда присваиваем значению пустую строку
    }
    */
  }
  return $valid_input;
}





include 'custom-post-types/companies.php';
include 'custom-post-types/news.php';
include 'custom-post-types/staff.php';
include 'custom-post-types/positions.php';
include 'lang/lang.php';
include 'ajax/news-ajax.php';