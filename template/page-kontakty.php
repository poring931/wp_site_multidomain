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
    $city_decr = $GLOBALS['nameForSeo'];
    if($city_decr=='Москве'){
        $city_decr = 'Москве и Московской области';
    }
		$metadesc = "Контактная информация СитиМобил по {$city_decr}. Схемы проезда.";
	return $metadesc;
}, 10, 1);
get_header();
?>

<main id="primary" class="">
            <?php if ( !empty( get_the_content() ) ):?>
                <section class="content__  white-back">
                    <?php the_content(); ?>
		        </section>
            <?php endif;?>
            
            <?php get_template_part( 'template-parts/content', 'offices' ); ?>


    <?php get_template_part( 'template-parts/content', 'feedback_form' ); ?>
</main><!-- #main -->





<?php
get_footer();
