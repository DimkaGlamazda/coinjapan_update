<?php

add_action('wp_footer', 'news_javascript', 99);

function news_javascript() {
  ?>
  <script type="text/javascript">
    jQuery(document).ready(function($) 
    {
      $('[data-news-ajax="trigger"]').on('click', function(evt) {
        evt.preventDefault();

        var container = $('[data-news-ajax="container"]');


        var data = {
          action: 'news',
          countItems: $('[data-news-ajax="item"]').length,
          category: $('[data-news-ajax="currentCategory"]').val()
        };

        jQuery.post( myajax.url, data, function(data) {

          var response = JSON.parse(data);

          if(response.status === 'error')
          {
            cnsole.log(response.error);
          }
          else
          {
            container.append(response.content);

            if(! response.canMore)
            {
              $('[data-news-ajax="trigger"]').css('display', 'none');
            }
          }
        });

      });
    });

  </script>
  <?php
}

add_action('wp_ajax_news', 'news_callback');
add_action('wp_ajax_nopriv_news', 'news_callback');

function news_callback() 
{


  $response = [];

  try
  {
   $args = [
    'post_type' => 'news_item'
    , 'posts_per_page' => -1
  ];

  $slug = $_POST['category'];

  if ($slug) {
    $args = array(
      'post_type' => 'news_item'
      , 'posts_per_page' => -1
      , 'tax_query' => [
        [
          'taxonomy' => 'categories',
          'field' => 'slug',
          'terms' => $slug
        ]
      ]);
  }



  $count_data = new WP_Query($args);

  $count = count( $count_data->posts );

  $offset = $_POST['countItems'];

  $limit = 2;

  $canMore = true;

  if($count <= $offset + $limit)
  {
    $canMore = false;
  }

  

  $args = [
    'post_type' => 'news_item', 
    'posts_per_page' => $limit,
    'offset' => $offset
  ];

  $slug = $_POST['category'];

  if ($slug) {
    $args = array(
      'post_type' => 'news_item', 
      'posts_per_page' => $limit,
      'offset' => $offset,
      'tax_query' => [
        [
          'taxonomy' => 'categories',
          'field' => 'slug',
          'terms' => $slug
        ]
      ]);
  }

  $news_data = new WP_Query($args);

  $news = [];


  while ($news_data->have_posts()) :

    $news_data->the_post();

    $categories_data = wp_get_object_terms($post->ID, 'categories');

    $news_item['categories'] = [];
    foreach ($categories_data as $category) {
      $news_item['categories'][] = [
        'title' => $category->name,
        'color' => get_option("taxonomy_term_" . $category->term_id)['categories_id'],
        'url' => get_permalink(get_page_by_path('news')) . '?' . $category->slug . '=' . $category->name
      ];
    }

    $custom_fields = get_post_custom(get_the_ID());
    $news_item['summary'] = $custom_fields['summary'][0];

    $news_item['date'] = get_the_date('Y/n/j');
    $news_item['thumbnail'] = get_the_post_thumbnail_url();
    $news_item['title'] = get_the_title();
    $news_item['link'] = get_permalink();

    $news[] = $news_item;
  endwhile;

  $html = '';

  foreach ($news as $piece_of_news):

    $html .= '<div data-news-ajax="item" class="col-12 col-sm-6 col-md-6 col-lg-3">';
    $html .= '<a class="news-list-link-wrapper" href="'.$piece_of_news['link'].'">';
    $html .= '<div class="news-item-list-img">';
    $html .= '<img src="'.$piece_of_news['thumbnail'].'" alt="'.$piece_of_news['title'].'">';
    $html .= '</div>';
    $html .= '<div class="news-item-list-content">';
    $html .= '<h4>'.$piece_of_news['title'].'</h4>';
    $html .= '<div class="news-item-footer">';
    $html .= '<span class="news-item-footer-date">'.$latest_news['date'].'</span>';
    $html .= '<div class="news-item-categories-list">';
    foreach ($piece_of_news['categories'] as $category):
      $html .= '<a href="'.$category['url'].'" class="news-item-footer-category"style="color:#'.$category['color'].';">';
      $html .=    '<span class="news-item-footer-category-label" style="background: #'.$category['color'].'"></span>';
      $html .=      $category['title'];
      $html .= '</a>';
    endforeach;
    $html .= '</div>';          
    $html .= '</div>'; 
    $html .= '</div>'; 
    $html .= '</a>';      
    $html .= '</div>'; 
  endforeach;

  $response = [
    'status' => 'success',
    'canMore' => $canMore,
    'content' => $html
  ];

   

}
catch(Exeption $e)
{
    $response = [
    'status' => 'error',
    'message' => $e->getMessage()
  ];
}

 echo json_encode($response); 

wp_die();
}
