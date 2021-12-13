<?php
// load all files and scrips including css and js
function digital_files() {
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('custom_styles', get_theme_file_uri('/style/style.css'));
    
    wp_enqueue_style('fa-js', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');
    wp_enqueue_script('compiled-js', get_theme_file_uri('/dist/main.js'), NULL, '1.0', true); 
}

add_action('wp_enqueue_scripts', 'digital_files');

// adding title
function page_features() {
  add_theme_support('title-tag');
  add_theme_support( 'post-thumbnails' );
}

add_action('after_setup_theme', 'page_features');

// adding them support for wp menus
add_theme_support('menus');

register_nav_menus( [
    'main-menu' => 'Top Menu Location'
]
);


// removing class from lists rendered by wp menu
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}

// allowing crossorigin acces
add_action('init', 'handle_preflight');
function handle_preflight() {
    $origin = get_http_origin();
    if ($origin === $origin) {
        header("Access-Control-Allow-Origin: * ");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        if ('OPTIONS' == $_SERVER['REQUEST_METHOD']) {
            status_header(200);
            exit();
        }
    }
}
add_filter('rest_authentication_errors', 'rest_filter_incoming_connections');
function rest_filter_incoming_connections($errors) {
    $request_server = $_SERVER['REMOTE_ADDR'];
    $origin = get_http_origin();
    if ($origin !== $origin) return new WP_Error('forbidden_access', $origin, array(
        'status' => 403
    ));
    return $errors;
}


function ws_register_images_field() {
  register_rest_field( 
      'post',
      'images',
      array(
          'get_callback'    => 'ws_get_images_urls',
          'update_callback' => null,
          'schema'          => null,
      )
  );
}

add_action( 'rest_api_init', 'ws_register_images_field' );

function ws_get_images_urls( $object, $field_name, $request ) {
  $medium = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'medium' );
  $medium_url = $medium['0'];

  $large = wp_get_attachment_image_src( get_post_thumbnail_id( $object->id ), 'large' );
  $large_url = $large['0'];

  return array(
      'medium' => $medium_url,
      'large'  => $large_url,
  );
}
