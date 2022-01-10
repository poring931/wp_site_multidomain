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

get_header();
?>

	<main id="primary" class="site-main">
            <?php if ( !empty( get_the_content() ) ):?>
                <section class="content__  white-back">
                    <?php the_content(); ?>
		        </section>
            <?php endif;?>
	</main><!-- #main -->

<?php
get_footer();
