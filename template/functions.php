<?php
/**
 * citymobile functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package citymobile
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'citymobile_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function citymobile_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on citymobile, use a find and replace
		 * to change 'citymobile' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'citymobile', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		// add_theme_support( 'automatic-feed-links' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		// register_nav_menus(
		// 	array(
		// 		'menu-1' => esc_html__( 'Primary', 'citymobile' ),
		// 	)
		// );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'citymobile_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'citymobile_setup' );
// убираем dns-prefetch
remove_action( 'wp_head', 'wp_resource_hints', 2 );
// убираем стили и скрипт emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// + как бонус, удаление meta generator и короткой ссылки на материалы
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function citymobile_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'citymobile_content_width', 640 );
}
add_action( 'after_setup_theme', 'citymobile_content_width', 0 );


// фильтр передает переменную $template - путь до файла шаблона.
// Изменяя этот путь мы изменяем файл шаблона.
add_filter( 'template_include', 'my_template' );
function my_template( $template ) {

	# аналог второго способа
	// если это страница со слагом portfolio, используем файл шаблона page-portfolio.php
	// используем условный тег is_page()
	if( is_front_page() ){
	
	if ($new_template = locate_template(array('index.php')))
		return $new_template;
	}

	return $template;

}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function citymobile_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'citymobile' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'citymobile' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'citymobile_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function citymobile_scripts() {
	wp_enqueue_style( 'citymobile-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'citymobile_scripts' );
function prefix_add_footer_styles() {
   
	wp_enqueue_script( 'jquery-js', get_template_directory_uri().'/js/jquery-3.6.0.min.js', array(), true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri().'/js/slick/slick.min.js', array(), true );
	wp_enqueue_script( 'main-js', get_template_directory_uri().'/js/main.js', array(), _S_VERSION );
		wp_enqueue_style( 'slickcss-style', get_template_directory_uri().'/js/slick/slick.min.css', array(), _S_VERSION );
};
add_action( 'get_footer', 'prefix_add_footer_styles' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

register_nav_menus( array( 
        'footer_menu' => 'Меню в футере', 
        'header_menu' => 'Меню в шапке', 
    ));

function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
// add_action( 'wp_enqueue_scripts', 'del_style' );

/**
 * ACF Options page
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Соц. сети',
        'menu_title' => 'Соц. сети',
        'menu_slug' => 'theme-social',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-instagram',
        'redirect' => false
    ));

    acf_add_options_page(array(
        'page_title' => 'Слайдер главной',
        'menu_title' => 'Слайдер главной',
        'menu_slug' => 'theme-slider',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-image-flip-horizontal',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Главная. Почему выбирают ситимобил',
        'menu_title' => 'Главная. Почему выбирают ситимобил',
        'menu_slug' => 'theme-why-city',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-image-filter',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Главная. Почему выбирают таксопарк',
        'menu_title' => 'Главная. Почему выбирают таксопарк',
        'menu_slug' => 'theme-why-tax',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-image-filter',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Как начать работать',
        'menu_title' => 'Как начать работать',
        'menu_slug' => 'theme-how-start',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-calendar',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Приложение водитель',
        'menu_title' => 'Приложение водитель',
        'menu_slug' => 'theme-app-driver',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-admin-generic',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Аренда авто',
        'menu_title' => 'Аренда авто',
        'menu_slug' => 'theme-rent-auto',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-car',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Офисы такси',
        'menu_title' => 'Офисы такси',
        'menu_slug' => 'theme-offices',
        'capability' => 'edit_posts',
		'icon_url' => 'dashicons-admin-site-alt3',
        'redirect' => false
    ));

}






function wpassist_remove_block_library_css(){
wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

function rmn_custom_mime_types( $mimes ) {
    // Новый mime тип
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'rmn_custom_mime_types' );






function getSubDomain($data)
{

	$tmp = explode('.', $data);
	$tmp = array_slice($tmp, 0, -2);
	$str = implode(".", $tmp);
	if (!$str){
		$str = 'grand-citymobil.ru';
	}

	return $str;
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60f1990bcf14c',
	'title' => 'Ссылки на соц сети',
	'fields' => array(
		array(
			'key' => 'field_60f1998388bda',
			'label' => 'Google play',
			'name' => 'google_play',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_60f1998d88bdb',
			'label' => 'VK',
			'name' => 'vk',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_60f1999488bdc',
			'label' => 'Instagram',
			'name' => 'instagram',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_60f1999c88bdd',
			'label' => 'Whatsapp',
			'name' => 'whatsapp',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_612f767f63e5d',
			'label' => 'Контактный номер',
			'name' => 'contact_number',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-social',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_60f19bbfa1437',
	'title' => 'Слайдер на главной',
	'fields' => array(
		array(
			'key' => 'field_60f19bd3c7e1a',
			'label' => 'Слайды',
			'name' => 'слайды',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_60f19bebc7e1b',
					'label' => 'Изображение',
					'name' => 'изображение',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_60f19bf9c7e1c',
					'label' => 'Текст',
					'name' => 'текст',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
					'delay' => 0,
				),
				array(
					'key' => 'field_60f19c05c7e1d',
					'label' => 'Текст кнопки',
					'name' => 'текст_кнопки',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_60f19c1ac7e1e',
					'label' => 'Ссылка кнопки',
					'name' => 'ссылка_кнопки',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_61405b3c3487e',
					'label' => 'Текст кнопки_2',
					'name' => 'текст_кнопки_копия',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_61405b363487d',
					'label' => 'Ссылка кнопки_2',
					'name' => 'ссылка_кнопки_копия',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-slider',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;


/**
 * Fix pagination on archive pages
 * After adding a rewrite rule, go to Settings > Permalinks and click Save to flush the rules cache
 */
function my_pagination_rewrite() {
    add_rewrite_rule('blog/page/?([0-9]{1,})/?$', 'index.php?category_name=blog&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');