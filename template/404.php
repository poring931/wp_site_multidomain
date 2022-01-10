<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package citymobile
 */

get_header();
?>

	<main id="primary" class="site-main">

	<section class="content__  white-back">
			<header class="page-header">
				<h1 class="page-title">Страница не найдена</h1>
			</header><!-- .page-header -->
			<a href="/"><h2>Перейти на главную </h2></a> 
		

		</section>
<div class="feed_back_form  white-back" style="opacity: 1;">
    <div class="why_block_title _bold ">Оставьте заявку</div>
    <form class="feedback_bottom" action="/send.php" method="post">
     <input type="text" name="surname" style="display:none">
        <div class="form_input name _regular">
            <input autocomplete="off" onchange="this.setAttribute('value', this.value);" value="" type="text" name="name" id="name_1" placeholder="Введите имя">
            <label for="name_1">Имя</label>
        </div>
        <div class="form_input phone _regular">
            <input required="" autocomplete="off" onchange="this.setAttribute('value', this.value);" value="" type="tel" name="tel" id="phone_1" placeholder="+7">
            <label for="phone_1">Номер телефона</label>
        </div>
        <div class="form_input submit ">
            <button type="submit" class="flex _regular btn">Отправить заявку</button>
        </div>
        <div class="form_input check_1">
            <input type="checkbox" name="rent_mobile" id="rentmobile">
            <label for="rentmobile">Хочу арендовать автомобиль</label>
        </div>
        <div class="form_input check_2">
            <input type="checkbox" name="rent_mobile_buy" id="rent_mobile_buy">
            <label for="rent_mobile_buy">Аренда авто с выкупом</label>
        </div>
        <div class="form_input check_3">
            <input required="" type="checkbox" name="agree" id="agree" checked="">
            <label for="agree">Я соглашаюсь с условиями</label>
            <a href="Пользовательского соглашения">Пользовательского соглашения</a>
        </div>
    </form>
</div>
	</main><!-- #main -->

<?php
get_footer();
