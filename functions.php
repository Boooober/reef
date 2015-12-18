<?php

define( 'REEF_THEME_URL', get_template_directory_uri() . '/' );
define( 'REEF_THEME_DIR', get_template_directory() . '/' );
define( 'TEXTDOMAIN', 'reef');


if ( ! function_exists( 'reef_setup' ) ) :
    function reef_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on twentyfifteen, use a find and replace
         * to change 'twentyfifteen' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'TEXTDOMAIN', get_template_directory() . '/languages' );


        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        set_post_thumbnail_size( 200, 200, true );

        add_image_size( 'full-image', 1100, 1100 );
//        add_image_size( 'big-image', 750, 750 );
//        add_image_size( 'medium-image', 500, 500 );
        add_image_size( 'small-image', 250, 250, true );
        add_image_size( 'panoramic-image', 800, 400, true );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
//            'header' => __( 'Header Menu',      'TEXTDOMAIN' ),
            'cat'  => __( 'Category menu', 'TEXTDOMAIN' ),
            'langs'  => __( 'Language menu', 'TEXTDOMAIN' ),
        ) );

    }
endif;
add_action( 'after_setup_theme', 'reef_setup' );




function reef_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'reef_javascript_detection', 0 );




function reef_scripts() {


    // clear head
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    add_filter('the_generator', '__return_false');
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('set_comment_cookies', 'wp_set_comment_cookies');


    // load desktop stylesheet.
    wp_register_style( 'reef-desk-style', REEF_THEME_URL . 'assets/css/style.desk.min.css' );

    //load mobile stylesheet
    wp_register_style( 'reef-mob-style', REEF_THEME_URL . 'assets/css/style.mob.min.css' );


    // load scripts
//    wp_deregister_script('jquery');

    wp_register_script ('main-desk', REEF_THEME_URL . '/assets/js/main.js', array(), '2.0', true);
    wp_register_script ('main-mob', REEF_THEME_URL . '/assets/js/main.mob.js', array(), '2.0', true);
    wp_register_script ('backgroundvideo', REEF_THEME_URL . '/assets/js/jquery.backgroundvideo.min.js', array(), '1.0', true);


    if(reef_mobile_detect()){
        wp_enqueue_style('reef-mob-style');
        wp_enqueue_script ('main-mob');

        wp_localize_script( 'main-mob', 'REEFmobile', array(
            'reef_nonce' => wp_create_nonce('reef_nonce'),
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));

    } else{
        wp_enqueue_style('reef-desk-style');
        wp_enqueue_script ('main-desk');
        wp_enqueue_script ('backgroundvideo');

        wp_localize_script( 'main-desk', 'REEFmain', array(
            'themeURL' => REEF_THEME_URL,
            'reef_nonce' => wp_create_nonce('reef_nonce'),
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }
}
add_action( 'wp_enqueue_scripts', 'reef_scripts' );


/**
 * Руссифицирует месяца и недели в дате.
 * Функция для фильтра date_i18n.
 * @param строка $date        Дата в принятом формате
 * @param строка $req_format  Формат передаваемой даты
 * @return Дату в русском формате
 */
function kama_drussify_months( $date, $req_format ){
    // в формате есть "строковые" неделя или месяц
    if( ! preg_match('~[FMlS]~', $req_format ) ) return $date;

    $replace = array (
        "январь" => "Января", "Февраль" => "Февраля", "Март" => "Марта", "Апрель" => "Апреля", "Май" => "Мая", "Июнь" => "Июня", "Июль" => "Июля", "Август" => "Августа", "Сентябрь" => "Сентября", "Октябрь" => "Октября", "Ноябрь" => "Ноября", "Декабрь" => "Декабря",

        "January" => "Января", "February" => "Февраля", "March" => "Марта", "April" => "Апреля", "May" => "Мая", "June" => "Июня", "July" => "Июля", "August" => "Августа", "September" => "Сентября", "October" => "Октября", "November" => "Ноября", "December" => "Декабря",

        "Jan" => "янв.", "Feb" => "фев.", "Mar" => "март.", "Apr" => "апр.", "May" => "мая", "Jun" => "июня", "Jul" => "июля", "Aug" => "авг.", "Sep" => "сен.", "Oct" => "окт.", "Nov" => "нояб.", "Dec" => "дек.",

        "Sunday" => "воскресенье", "Monday" => "понедельник", "Tuesday" => "вторник", "Wednesday" => "среда", "Thursday" => "четверг", "Friday" => "пятница", "Saturday" => "суббота",

        "Sun" => "вос.", "Mon" => "пон.", "Tue" => "вт.", "Wed" => "ср.", "Thu" => "чет.", "Fri" => "пят.", "Sat" => "суб.", "th" => "", "st" => "", "nd" => "", "rd" => "",
    );

    return strtr( $date, $replace );
}
add_filter('date_i18n', 'kama_drussify_months', 11, 2);


function reef_mobile_detect () {
    include_once ( REEF_THEME_DIR . 'Mobile_Detect.php');
    $detect = new Mobile_Detect;
    if( $detect->isMobile() || $detect->isTablet() ) {
        return true;
    } else {
        return false;
    }
}

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
    $labels = array(
        "name" => "Menu",
        "singular_name" => "Menu",
        "menu_name" => "Меню",
        "all_items" => "Все меню",
        "add_new" => "Добавить новое",
        "add_new_item" => "Добавить новое меню",
        "edit" => "Редактировать",
        "edit_item" => "Редактировать меню",
        "new_item" => "Новое меню",
        "view" => "Посмотреть",
        "view_item" => "Посмотреть меню",
        "search_items" => "Найти меню",
        "not_found" => "Меню не найдено",
        "parent" => "Родительское меню",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "menu", "with_front" => true ),
        "query_var" => true,

    );
    register_post_type( "menu", $args );

// End of cptui_register_my_cpts()
}

/**
 * Set nice excerpt.
 */
function my_excerpt($excerpt_length = 55, $id = false, $echo = true) {
    if($id) {
        $the_post = & get_post( $my_id = $id );
        $text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
    } else {
        global $post;
        $text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
    }
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_more = ' ' . '[...]';
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
    if($echo){
        echo apply_filters('the_content', $text);
    }else{
        return $text;
    }
}

function get_my_excerpt($excerpt_length = 55, $id = false, $echo = false) {
    return my_excerpt($excerpt_length, $id, $echo);
}

//[fenty]
function return_fenty( $atts ){
    $id = $atts['id'];
    if($id) {
	    ob_start();
            echo '<figure' . ((mt_rand(0,3) === 0) ? ' class="spin-svg"' : '') . '>';
	            get_template_part('assets/svg/j' . $id . '.svg');
            echo '</figure>';
	    return ob_get_clean();
    }
}

add_shortcode( 'fenty', 'return_fenty' );

pll_register_string('form', 'Number of persons');
pll_register_string('form', 'Full name');
pll_register_string('form', 'Phone');
pll_register_string('form', 'Email');
pll_register_string('form', 'Send');


require_once REEF_THEME_DIR . 'includes/send-email.php';
