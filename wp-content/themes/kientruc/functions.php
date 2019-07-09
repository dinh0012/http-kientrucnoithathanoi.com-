<?php
require_once 'lib/Custom_Walker_Nav_Menu_top.php';
require_once 'lib/Custom_Walker_Nav_Menu_Footer.php';
require_once 'lib/WPEX_Theme_Options.php';
require_once 'lib/widget/SearchSidebar.php';
require_once 'lib/widget/CommonWidget.php';
require_once 'lib/widget/widget-tabs.php';
require_once 'lib/shortcodes/init_shortcode.php';
require_once 'lib/post-type/init_post_type.php';
require_once 'lib/post-share.php';
require_once 'lib/meta-box/meta-box.php';
require_once 'lib/plugin/lightgallery/lightgallery.php';
require_once 'lib/vendor/autoload.php';

/*wp_nav_menu( array(
    'theme_location' => 'primary_menu',
    'menu_class' => 'Header-nav-item Header-nav-item--folder',
    'menu_id' => 'mmenu',
    'container' => 'false',
    'walker' => new Custom_Walker_Nav_Menu_Top
));*/

function after_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
    register_nav_menus( array(
        'main_menu_footer' => 'Main menu footer',
        'main_menu_left' => 'Menu header left',
        'main_menu_right' => 'Menu header right',
    ) );
}
add_action( 'after_setup_theme', 'after_setup_theme' );

function theme_register_meta_boxes( $meta_boxes ){
    $prefix = 'themepixels_';
    $meta_boxes[] = array(
        'id'         => 'themepixels_format_video',
        'title'      => __( 'Video Post Options', 'themepixels' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'autosave'   => true,
        'fields'     => array(

            array(
                'name'				=> __( 'Video Type', 'themepixels' ),
                'id'				=> "{$prefix}video_type",
                'type'				=> 'select',
                'options'			=> array(
                    'embed'			=> __( 'Embed', 'themepixels' ),
                    'selfhosted'	=> __( 'Self Hosted', 'themepixels' ),
                ),
                'multiple'			=> false,
                'std'				=> '',
                'placeholder'		=> __( 'Select Video Type', 'themepixels' ),
            ),

            array(
                'name'				=> __( 'Video Embed URL', 'themepixels' ) .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __( '(Learn More)', 'themepixels' ) .'</a>',
                'id'				=> "{$prefix}post_video_embed_url",
                'type'				=> 'oembed',
            ),

            array(
                'name'				=> __( 'Self Hosted Video', 'themepixels' ),
                'id'				=> "{$prefix}post_self_hosted_video",
                'type'				=> 'file_input',
            ),
        )
    );
    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'theme_register_meta_boxes' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/
function theme_scripts() {

    /*-----------------------------------------------------------------------------------*/
    /* Styles
    /*-----------------------------------------------------------------------------------*/
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'hel', get_template_directory_uri() . '/css/hel.css' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css' );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' , '', 1.999);
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome-4.2.0/css/font-awesome.css' , '', 1.999);
    wp_enqueue_style( 'jquery.mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css' , '', 1.999);
    wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.css' , '', 1.999);
    wp_enqueue_style( 'camera', get_template_directory_uri() . '/scripts/camera.css' , '', 1.999);
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui.css' , '', 1.999);
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' , '', 1.999);

    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

    /*-----------------------------------------------------------------------------------*/
    /* Scripts
    /*-----------------------------------------------------------------------------------*/
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.10.1.min.js');
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'jquery.form', get_template_directory_uri() . '/js/jquery.form.min.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'jquery.mmenu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'mobile.customized', get_template_directory_uri() . '/scripts/jquery.mobile.customized.min.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/scripts/jquery.easing.1.3.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'jquery.camera', get_template_directory_uri() . '/scripts/camera.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), 1.0, true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

function admin_style() {
    wp_enqueue_media();
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin/redux-admin.css');
    wp_enqueue_style('redux-fields', get_template_directory_uri().'/css/admin/redux-fields.css');
    wp_enqueue_script('admin-script', get_template_directory_uri().'/js/admin/admin.js');
}
add_action('admin_enqueue_scripts', 'admin_style');


function theme_widgets_init()
{

    register_sidebar(array(
        'name' => __('Primary Sidebar', 'themedecor'),
        'id' => 'primary-sidebar',
        'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title-wrapper"><span class="widget-title-inner"></span><h3 class="widget-title"><span>',
        'after_title' => '</span></h3></div>',
    ));
}
add_action( 'widgets_init', 'theme_widgets_init' );

function theme_widgets_footer_init()
{

    register_sidebar(array(
        'name' => __('Footer Sidebar', 'themedecor'),
        'id' => 'footer-sidebar',
        'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title-wrapper"><span class="widget-title-inner"></span><h3 class="widget-title"><span>',
        'after_title' => '</span></h3></div>',
    ));
}
add_action( 'widgets_init', 'theme_widgets_footer_init' );
$category = get_category(5);
//dd($category);
/*-----------------------------------------------------------------------------------*/
/* Favicon
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themedecor_favicon' ) ) {
    function themedecor_favicon() {
        $favicon = tps_get_option( 'favicon', 'url' );
        $iphone_icon = tps_get_option( 'iphone_icon', 'url' );
        $ipad_icon = tps_get_option( 'ipad_icon', 'url' );
        $iphone_icon_retina = tps_get_option( 'iphone_icon_retina', 'url' );
        $ipad_icon_retina = tps_get_option( 'ipad_icon_retina', 'url' );

        $output = '';
        if ( $favicon ) {
            $output .= '<link rel="shortcut icon" href="'. esc_url( $favicon ) .'">';
        }
        if ( $iphone_icon ) {
            $output .= '<link rel="apple-touch-icon-precomposed" href="'. esc_url( $iphone_icon ) .'">';
        }
        if ( $ipad_icon ) {
            $output .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. esc_url( $ipad_icon ) .'">';
        }
        if ( $iphone_icon_retina ) {
            $output .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url( $iphone_icon_retina ) .'">';
        }
        if ( $ipad_icon_retina ) {
            $output .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'. esc_url( $ipad_icon_retina ) .'">';
        }

        echo wp_kses( $output, array(
            'link' => array(
                'rel' => array(),
                'sizes' => array(),
                'href' => array()
            ),
        ) );
    }
}
add_filter( 'wp_head', 'themedecor_favicon' );

if ( ! function_exists('tps_get_option') ) {
    function tps_get_option($id, $param = false ) {
        global $themedecor_options;
        $output = '';
        if ( isset($themedecor_options[$id]) && $themedecor_options[$id] !== '' ) {
            $output = $themedecor_options[$id];
        }
        if ( !empty($themedecor_options[$id]) && $param ) {
            $output = $themedecor_options[$id][$param];
        }
        return $output;
    }
}

function get_theme_option($id) {
    return WPEX_Theme_Options::get_theme_option($id);
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}