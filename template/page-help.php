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
function help_page_css() {
   
		wp_enqueue_style( 'help-style', get_template_directory_uri().'/css/help_page.css', array(), _S_VERSION );
		wp_enqueue_script( 'help-js', get_template_directory_uri().'/js/faq_page.js', array(), _S_VERSION );
};
add_action( 'get_footer', 'help_page_css' );
add_filter('wpseo_metadesc', function($metadesc){
    $number = get_field('contact_number','option','option');
    $city_decr = $GLOBALS['nameForSeo'];
        $metadesc = "Перечень требований к водителям и автомобилям для устройства на работу таксистом в {$city_decr} ";
    return $metadesc;
}, 10, 1);
get_header();
$faq = get_field('вопрос-ответ');
?>
<main id="primary" class="">
            <?php if ( !empty( get_the_content() ) ):?>
                <section class="content__  white-back">
                    <?php the_content(); ?>
		        </section>
            <?php endif;?>
            
            <section class="faq  white-back">
                    <h1>Требования к водителям и автомобилю для работы в 
                        <?php 
                            $city_decr = $GLOBALS['nameForSeo'];
                            echo($city_decr); 
                        ?>
                    </h1>
                    <div class="faq_wrap">
                    
                        <?php foreach ($faq as $faq_item):?>

                            <?php if ($faq_item["вопрос"]):?>
                                <div class="faq__item">
                                
                                    <?php if ($faq_item["вопрос"]):?>
                                        <div class="faq_question _bold">
                                            <span>  <?php echo$faq_item["вопрос"];?></span>
                                            <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24 13L12.0147 13M12.0147 13L12 1M12.0147 13L0 13M12.0147 13L12 25" stroke="#0C0C0C" stroke-width="2"/>
                                            </svg>
                                        </div>
                                    <?php endif;?>
                                    <?php if ($faq_item["ответ"]):?>
                                        <div class="faq_answer _regular">
                                            <?php echo preg_replace( '%<p(.*?)>|</p>%s','',$faq_item["ответ"]) ?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>

                        <?php endforeach;?>

                    </div>
                    <a target="_blank" href="<?php echo preg_replace('/[<\>]/', '',get_field('ссылка_кнопки_стать_водителем'));?>" class="btn btn__faq flex _bold">
                        Стать водителем
                    </a>
            </section>


    <?php get_template_part( 'template-parts/content', 'feedback_form' ); ?>
</main><!-- #main -->





<?php
get_footer();
