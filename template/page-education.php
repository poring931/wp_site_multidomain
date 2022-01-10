<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package citymobile
 */
add_filter('wpseo_metadesc', function($metadesc){
	$number = get_field('contact_number','option','option');
	
		$metadesc = "Обучающее видео для водителей СитиМобил. По вопросам трудоустройства водителем в {$GLOBALS['nameForSeo']} звоните ☎ {$number} ";
        
	
	return $metadesc;
}, 10, 1);
function help_page_css() {
   
		wp_enqueue_style( 'help-style', get_template_directory_uri().'/css/help_page.css', array(), _S_VERSION );
		wp_enqueue_script( 'help-js', get_template_directory_uri().'/js/faq_page.js', array(), _S_VERSION );
};
add_action( 'get_footer', 'help_page_css' );
get_header();
$faq = get_field('вопрос-ответ');
?>

<main id="primary" class="">
            <section class="education  white-back">
                    <h1>Обучающие материалы для водителей СитиМобил в Москве</h1>
                   <div class="education_container"  style="text-align: center;">
                      <h2> <a href="https://www.youtube.com/watch?v=upTfpy6EJgM&ab_channel=%D0%92%D0%BB%D0%B0%D0%B4%D0%B8%D0%BC%D0%B8%D1%80%D0%A4%D1%80%D0%BE%D0%BB%D0%BE%D0%B2" class="education__title">Обучающее видео для водителей СитиМобил</a></h2> <iframe width="560" height="315" src="https://www.youtube.com/embed/upTfpy6EJgM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   </div>
                   <div class="education_container"  style="text-align: center; margin-top:70px;">
                      <h2> <a href="https://docs.google.com/presentation/d/e/2PACX-1vQRLIAxevuFSddxaNbo3fXf5pk0uGB2XsVyJLp4Z6CFrBgzp27Mg_jNgYWaoH8J-3f7TtueVjcSEazD/pub?start=false&loop=false&delayms=60000&slide=id.ga82fe89f69_0_122" class="education__title">Презентация</a></h2> 
                      <a href="https://docs.google.com/presentation/d/e/2PACX-1vQRLIAxevuFSddxaNbo3fXf5pk0uGB2XsVyJLp4Z6CFrBgzp27Mg_jNgYWaoH8J-3f7TtueVjcSEazD/pub?start=false&loop=false&delayms=60000&slide=id.ga82fe89f69_0_122">
                        <img loading="lazy" decodyng="async" src="/wp-content/themes/citymobile/image/presents.JPG" alt="">
                    </a>

            </section>
            <?php if ( !empty( get_the_content() ) ):?>
                <section class="content__  white-back">
                    <?php the_content(); ?>
		        </section>
            <?php endif;?>
            



    <?php get_template_part( 'template-parts/content', 'feedback_form' ); ?>
</main><!-- #main -->





<?php
get_footer();
