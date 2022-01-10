<?php


add_filter('wpseo_title', function($title){

		$title = 'Работа в такси на своем или арендованном авто от работодателя в '.$GLOBALS['nameForSeo'];
	
	return $title;
}, 10, 1);

add_filter('wpseo_metadesc', function($metadesc){
	$number = get_field('contact_number','option','option');
	
		$metadesc = "Ищете работу водителем в такси в {$GLOBALS['nameForSeo']}? У нас всегда актуальные вакансии. Возможность взять авто в аренду или работать на своем. Звоните ☎ {$number} ";
	
	return $metadesc;
}, 10, 1);
// add_filter('wpseo_metadesc','custom_meta'); // Для yaost seo кастомный дескрипшн
// function custom_meta( $desc ){

//     if (/* do your test here to check template or any other values*/) {
//         $desc = "Change the description";
//     } 

//     return $desc;
// }



get_header();
$sliders = get_field('слайды','option');
$why_block_city= get_field('почему_ситимобил','option');
$why_block_tax = get_field('контентная_часть','option');
$how_start_work = get_field('этапы_работы','option');
$how_apphref = get_field('ссылки_приложений','option');
?>
<h1 style="display:none!important">Работа водителем такси в <?php echo $GLOBALS['nameForSeo'];?> </h1>
	<main id="primary" class="">
		<!-- main slider  START-->
		<section class="main_slider white-back">
			<?php $count_item=0;  foreach ($sliders as  $slide): $count_item++; if ($count_item==1){$lazy='';}else{$lazy='loading="lazy"';}?>
				<div class="main_slider_item">
					
					<div class="main_slider_item__content flex">
						<?php if ($slide["текст"]):?>
							<div class="main_slider_item__content__title _bold">
								<?php echo $slide["текст"];?>
							</div>
						<?php endif;?>
						<div class="main_slider_item__content__btns">
							<?php if ($slide["ссылка_кнопки"]):?>
								<a href="<?php echo preg_replace('/[<\>]/', '',$slide["ссылка_кнопки"]); ?>" class="main_slider_item__content__btn btn _regular" target="_blank">
									<?php echo $slide["текст_кнопки"];?>
								</a>
							<?php endif;?>
							<?php if ($slide["ссылка_кнопки_копия"]):?>
								<a href="<?php echo  preg_replace('/[<\>]/', '',$slide["ссылка_кнопки_копия"]);?>" class="main_slider_item__content__btn btn _regular" target="_blank">
									<?php echo $slide["текст_кнопки_копия"];?>
								</a>
							<?php endif;?>
							<div class="main_slider_item__content__btns_slider flex">
								<div class="main_slider_item__content__btns_slider__item main_prev flex">
									<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M6 11L1 6L6 1" stroke="#0C0C0C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</div>
								<div class="main_slider_item__content__btns_slider__item main_next flex ">
									<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L6 6L1 11" stroke="#0C0C0C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</div>
							</div>
						</div>


					</div>
					<div class="main_slider_item_img">
						<?php if ($slide["изображение"]):?>
							<img <?php echo $lazy;?> width='416' height="176" src="<?php echo $slide["изображение"];?>" alt="">
						<?php endif;?>
					</div>
				</div>
			<?php endforeach;?>
		</section>
		<!-- main slider END -->
		<?php get_template_part( 'template-parts/content', 'feedback_form' ); ?>
		<section class="why_block  white-back">
			<h2 class="why_block_title _bold ">
				<?php if (get_field("заголовок_блока_ситимобил",'option')):?>
					<?php echo get_field("заголовок_блока_ситимобил",'option');?>
				<?php endif;?>
			</h2>
			<div class="why_block__list">
				<?php foreach ($why_block_city as $why_block_item):?>
					<div class="why_block__item flex">
						<div class="why_block__item__img">
							<?php if ($why_block_item["картинка"]):?>
								<img loading="lazy" width='72' height="70" src="<?php echo $why_block_item["картинка"];?>" alt="">
							<?php endif;?>
						</div>
						<div class="why_block__item__content">
							<div class="why_block__item__content__title _bold">
								<?php if ($why_block_item["заголовок"]):?>
									<?php echo $why_block_item["заголовок"];?>
								<?php endif;?>
							</div>
							<div class="why_block__item__content__text _regular">
								<?php if ($why_block_item["текст"]):?>
									<?php echo $why_block_item["текст"];?>
								<?php endif;?>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</section>
		<section class="why_block  white-back">
			<h2 class="why_block_title _bold ">
				<?php if (get_field("заголовок_блока_таксопарк",'option')):?>
					<?php echo get_field("заголовок_блока_таксопарк",'option');?>
				<?php endif;?>
			</h2>
			<div class="why_block__list">
				<?php foreach ($why_block_tax as $why_block_item):?>
					<div class="why_block__item flex">
						<div class="why_block__item__img">
							<?php if ($why_block_item["картинка"]):?>
								<img loading="lazy" width='72' height="70" src="<?php echo $why_block_item["картинка"];?>" alt="">
							<?php endif;?>
						</div>
						<div class="why_block__item__content">
							<div class="why_block__item__content__title _bold">
								<?php if ($why_block_item["заголовок"]):?>
									<?php echo $why_block_item["заголовок"];?>
								<?php endif;?>
							</div>
							<div class="why_block__item__content__text _regular">
								<?php if ($why_block_item["текст"]):?>
									<?php echo $why_block_item["текст"];?>
								<?php endif;?>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</section>
		<section class="how_start_block  white-back">
			<h2 class="why_block_title _bold ">
				<?php if (get_field("заголовок_блока_как_начать_работать",'option')):?>
					<?php echo get_field("заголовок_блока_как_начать_работать",'option');?>
				<?php endif;?>
			</h2>
			<div class="how_start_block__list">
				<?php $count=0; foreach ($how_start_work as $how_start_work_item): 
					if ($how_start_work_item['этап'] =='') continue;
				$count++;?>
					<div class="how_start_block__item flex">
						<div class="how_start_block__item_number">
							<?php if($count<10):
								echo '0'.$count;
								else:
								echo $count;
							endif;
							?>
							
						</div>
						<div class="how_start_block__item__text">
								<?php echo $how_start_work_item['этап'];?>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</section>
		<section class="application_block  white-back">
			<h2 class="why_block_title _bold ">
				<?php if (get_field("работа_в_приложении_ситимобил_водитель",'option')):?>
					<?php echo get_field("работа_в_приложении_ситимобил_водитель",'option');?>
				<?php endif;?>
			</h2>
			<div class="application_block__list flex">
				<?php foreach ($how_apphref as $how_apphref_item): ?>
					<a target="_blank" href="<?php echo $how_apphref_item['ссылка'];?>" class="btn  application_block__item">
								<?php echo $how_apphref_item['текст'];?>
					</a>
				<?php endforeach;?>
				<a target="_blank" href="/navigator-prilozheniye/" class="btn  application_block__item">Яндекс навигатор</a>
			</div>
		</section>
		<?php get_template_part( 'template-parts/content', 'offices' ); ?>

		<?php if (get_field("выводить_блок_аренда_авто",'option')):?>
			<section class="rent_a_car  white-back">
				<div class="rent_a_car__text left_part">
					<h2 class="why_block_title _bold ">
						<?php if (get_field("заголовок_аренда_авто",'option')):?>
							<?php echo get_field("заголовок_аренда_авто",'option');?>
						<?php endif;?>
					</h2>
					<?php if (get_field("текст_под_заголовка_аренда_авто",'option')):?>
						<div class="rent_a_car__text">
							<?php echo get_field("текст_под_заголовка_аренда_авто",'option');?>
						</div>
					<?php endif;?>

					<div class="rent_a_car__cars">
					<?php $rentCar = get_field('наименование_машины','option');
					foreach ($rentCar as $car): ?>
						<div class="rent_a_car__cars__item">
							<div class="rent_a_car__cars__item__title">
								<?php if ($car["марка"]):?>
									<?php echo $car["марка"];?>
								<?php endif;?>
							</div>
							<div class="rent_a_car__cars__item__description">
							
									<span class="car__properties"><?php echo $car["коробка_топливо_год"]["название_поля"];?></span><span class="car__value"> <?php echo $car["коробка_топливо_год"]["значение"];?></span>
									<div class="rent_block flex">
										<div  class="rent_block_properties car__properties">Аренда: </div>
										<div  class="rent_block_values">
											<?php foreach($car["аренда"] as $arenda):?>
												<div class="car__value"> <?php echo $arenda["график_и_стоимость"];?></div>
											<?php endforeach;?>
										</div>

									</div>
							
							</div>
						</div>
					<?php endforeach;?>


					</div>
				</div>
				<div class="rent_a_car__img flex">
						<?php if (get_field("изображение_аренда_авто",'option')):?>
							<img loading="lazy" width='510' height="218" src="<?php echo get_field("изображение_аренда_авто",'option');?>" alt="Аренда авто">
						<?php endif;?>
				</div>
			</section>
		<?php endif;?>

		<?php get_template_part( 'template-parts/content', 'feedback_form' ); ?>

	</main><!-- #main -->

<?php
get_footer();

