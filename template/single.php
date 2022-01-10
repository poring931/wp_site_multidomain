<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package citymobile
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : the_post();?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							citymobile_posted_on();
							citymobile_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<?php citymobile_post_thumbnail(); ?>

				<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'citymobile' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'citymobile' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

				
			</article><!-- #post-<?php the_ID(); ?> -->


		<?php endwhile; // End of the loop. ?>
<?php $args = [
	'base'         => '%_%',
	'format'       => '?page=%#%',
	'total'        => 1,
	'current'      => 0,
	'show_all'     => False,
	'end_size'     => 1,
	'mid_size'     => 2,
	'prev_next'    => True,
	'prev_text'    => __('« Previous'),
	'next_text'    => __('Next »'),
	'type'         => 'plain',
	'add_args'     => False,
	'add_fragment' => '',
	'before_page_number' => '',
	'after_page_number'  => ''
];

echo paginate_links( $args ); ?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
