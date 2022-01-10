<?php

get_header();

?>
<style>
	.blog__list{
		display: grid;
		grid-template-columns:repeat(3,1fr);
		gap:30px;
	}
	h1{
		    text-align: center;
    margin-bottom: 50px;
	}
	.blog_item{
		border: 3px solid #C4C4C4;
		border-radius: 15px;
		cursor: pointer;
		    display: flex;
    flex-direction: column;
	position: relative;
	}
	.blog_item_img{
		margin:-3px;
			border: 3px solid #C4C4C4;
		border-radius: 15px;
		height: 273px;
		background-position: center!important;
   		 background-size: 100%!important;
		transition: 0.5s ease;
flex-shrink: 0;
	}
	.blog_item:hover .blog_item_img{
		background-size:110%!important;
		
	}
	.blog_item__content{
		padding:23px 20px 20px;    height: 100%;
		    z-index: 2;
	}
	.blog_item_name{
		font-weight: bold;
		font-size: 20px;
		line-height: 24px;
margin-bottom: 10px;
display: flex;
		color: #000000;
	}
	.blog_item_preview{
		font-weight: 300;
font-size: 14px;
line-height: 130%;
margin-bottom: 25px;
color: #000000;
min-height: 38px;
	}
	.blog_item .abs_href{
		position: absolute;
		width: 100%;
		top:0;
		left:0;
		height: 100%;
	}
	.blog__list{
		margin-bottom: 40px;
	}
	.pagination{
		width: -webkit-fit-content;
		width: -moz-fit-content;
		width: fit-content;
		margin: 0 auto;
		display: flex;
		gap: 8px;
	}
	.prev.page-numbers{
		margin-right: 24px;
	}
	.next.page-numbers{
		margin-left: 24px;
	}
	a.page-numbers,span.page-numbers.current{
    font-weight: bold;
    font-size: 24px;
    line-height: 130%;
    color: #C4C4C4;
    border: 2px solid #C4C4C4;
    border-radius: 8px;
    display: flex;
    align-content: center;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
	transition: 0.3s linear;
	}
	a.page-numbers:hover{
	    filter: invert(1);
		color:#C4C4C4!important
	}
	span.page-numbers.current{
		background: #C4C4C4;
		color: #FFFFFF;
	}
	@media (max-width:560px) {
			.blog__list {
			grid-template-columns: 1fr;
		}
	}
</style>
	<main id="primary" class="">
		
			<section class="white-back">
				<h1>Полезная информация</h1>
			<div class="blog__list">

			<?php
			    $query = new WP_Query( array(
			        'category_name' => 'blog',
			        'posts_per_page' =>9,
					'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
			    ) );
			?>
			
			<?php if ( $query->have_posts() ) : ?>
			
			<!-- begin loop -->
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="blog_item">
					<a  href="<?php echo esc_url( get_permalink() );?>"  class="abs_href"></a>
					<div class="blog_item_img"
						<?php if (get_the_post_thumbnail_url()){
							echo 'style="background:url('. get_the_post_thumbnail_url() .') no-repeat;"';
						} else {
							echo 'style="background:#C4C4C4;"';
						}?>
					>

					</div>
					<div class="blog_item__content">
							<?php the_title( '<a class="blog_item_name" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?>
							
							<div class="blog_item_preview">
								<?php if (get_field('краткое_содержание_статьи_превью')):?>
								<?php the_field('краткое_содержание_статьи_превью');?>
								<?php else:
														echo mb_strimwidth(get_the_content(), 0, 80, "...");
													endif;
													?>
							
							</div>
							<a class="see_more" href="<?php echo esc_url( get_permalink() );?>">Читать статью ></a>

					</div>
				

						
				</article><!-- #post-<?php the_ID(); ?> -->


				<?php endwhile; endif;wp_reset_postdata(); ?>
			</div>
				<div class="pagination">
					<?php 
				$big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'prev_text'          => __(' <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M14.0529 18.8528C14.299 18.6066 14.4372 18.2729 14.4372 17.9248C14.4372 17.5768 14.299 17.243 14.0529 16.9969L7.55604 10.5L14.0529 4.00315C14.292 3.75561 14.4243 3.42407 14.4213 3.07994C14.4183 2.73581 14.2803 2.40661 14.0369 2.16327C13.7936 1.91992 13.4644 1.78189 13.1203 1.7789C12.7761 1.77591 12.4446 1.9082 12.197 2.14728L4.77223 9.57209C4.52617 9.81822 4.38794 10.152 4.38794 10.5C4.38794 10.8481 4.52617 11.1818 4.77223 11.428L12.197 18.8528C12.4432 19.0988 12.7769 19.2371 13.125 19.2371C13.473 19.2371 13.8068 19.0988 14.0529 18.8528V18.8528Z" fill="#C4C4C4" /> </svg> '),
					'next_text'          => __('<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M6.94715 2.14722C6.70109 2.39335 6.56287 2.72713 6.56287 3.07516C6.56287 3.42319 6.70109 3.75697 6.94715 4.0031L13.444 10.5L6.94715 16.9968C6.70807 17.2444 6.57577 17.5759 6.57876 17.9201C6.58175 18.2642 6.71979 18.5934 6.96314 18.8367C7.20648 19.0801 7.53568 19.2181 7.87981 19.2211C8.22394 19.2241 8.55548 19.0918 8.80302 18.8527L16.2278 11.4279C16.4739 11.1818 16.6121 10.848 16.6121 10.5C16.6121 10.1519 16.4739 9.81816 16.2278 9.57203L8.80302 2.14722C8.55689 1.90117 8.22311 1.76294 7.87509 1.76294C7.52706 1.76294 7.19328 1.90117 6.94715 2.14722Z" fill="#C4C4C4" /> </svg> '),
					'current' => max( 1, get_query_var('paged') ),
					'total' => $query->max_num_pages
				) );
					?>
				</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();

