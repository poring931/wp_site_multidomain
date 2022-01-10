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

add_filter('wpseo_title', function($title){

    $title = "Работа водителем-курьером в {$GLOBALS['nameForSeo']} на личном или арендованном авто | СитиМобил";

return $title;
}, 10, 1);

add_filter('wpseo_metadesc', function($metadesc){
    $number = get_field('contact_number','option','option');
    $city_decr = $GLOBALS['nameForSeo'];
        $metadesc = "Ищете работу водителем-курьером в {$city_decr}? В СитиМобил вы всегда найдете актуальные вакансии. Индивидуальный график работы, стабильный заработок. Звоните ☎ {$number}";
    return $metadesc;
}, 10, 1);

get_header();
?>

<div class="feed_back_form second-form  white-back" copy-attr="0" style="opacity: 1;">
    <div class="why_block_title _bold ">Заявка на работу водителем курьером в <?php $city_decr = $GLOBALS['nameForSeo'];?>
        <?=$city_decr ?></div>
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
            <a href="/polzovatelskoe-soglashenie/">Пользовательского соглашения</a>
        </div>
    </form>
</div>
<main id="primary">
    <section class="how_start_block  white-back" style="opacity: 1;">
    <h2 class="why_block_title _bold ">
        Как начать работать							
    </h2>
    <div class="how_start_block__list">
        <div class="how_start_block__item flex">
            <div class="how_start_block__item_number">
                01							
            </div>
            <div class="how_start_block__item__text">
                Отправить необходимые документы
                и дождаться окончания регистрации						
            </div>
        </div>
        <div class="how_start_block__item flex">
            <div class="how_start_block__item_number">
                02							
            </div>
            <div class="how_start_block__item__text">
                Скачать приложение						
            </div>
        </div>
        <div class="how_start_block__item flex">
            <div class="how_start_block__item_number">
                03							
            </div>
            <div class="how_start_block__item__text">
                Нажать кнопку войти						
            </div>
        </div>
        <div class="how_start_block__item flex">
            <div class="how_start_block__item_number">
                04							
            </div>
            <div class="how_start_block__item__text">
                Ввести указанный при регистрации
                номер телефона						
            </div>
        </div>
        <div class="how_start_block__item flex">
            <div class="how_start_block__item_number">
                05							
            </div>
            <div class="how_start_block__item__text">
                Дождаться СМС и ввести
                код подтверждения						
            </div>
        </div>
        <div class="how_start_block__item flex">
            <div class="how_start_block__item_number">
                06							
            </div>
            <div class="how_start_block__item__text">
                Если вы зарегистрированы в нескольких
                парках, то нужно будет выбрать парк ГРАНД						
            </div>
        </div>
    </div>
    </section>
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

    <link rel="stylesheet" id="help-style-css" href="https://grand-citymobil.ru/wp-content/themes/citymobile/css/help_page.css" media="all">
    <section class="faq  white-back" style="opacity: 1;">
        <h1>Требования к водителям и автомобилю для работы в 
        <?php $city_decr = $GLOBALS['nameForSeo'];?>
        <?=$city_decr ?>                    
        </h1>
        <div class="faq_wrap">
            <div class="faq__item active">
                <div class="faq_question _bold">
                    <span>  Я хочу поменять номер телефона. Как это сделать?</span>
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 13L12.0147 13M12.0147 13L12 1M12.0147 13L0 13M12.0147 13L12 25" stroke="#0C0C0C" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="faq_answer _regular" style="display: block;">
                    Вы можете обратиться в офис нашего парка в вашем городе или позвонить по номеру: +7 (958) 548-64-07. Обращаем ваше внимание, что удалённое изменение номера телефона (без посещения офиса) возможно только при балансе меньше 150р на водительском аккаунте.
                </div>
            </div>
            <div class="faq__item">
                <div class="faq_question _bold">
                    <span>  У меня поменялся автомобиль. Как изменить его в приложении?</span>
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 13L12.0147 13M12.0147 13L12 1M12.0147 13L0 13M12.0147 13L12 25" stroke="#0C0C0C" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="faq_answer _regular">
                    Чтобы изменить или добавить еще один автомобиль, вам необходимо отправить на номер офиса нашего парка или на номер круглосуточной техподдержки (+7 (958) 548-64-07) следующие фото:<br>
                    1. Фото стороны СТС с информацией об автомобиле<br>
                    2. Фото стороны СТС с информацией о собственнике<br>
                    3. Фото автомобиля спереди<br>
                    4. Фото автомобиля сзади<br>
                    5. Фото автомобиля слева<br>
                    6. Фото автомобиля справа
                </div>
            </div>
            <div class="faq__item">
                <div class="faq_question _bold">
                    <span>  Что делать, если у клиента недостаточно средств для оплаты поездки?</span>
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 13L12.0147 13M12.0147 13L12 1M12.0147 13L0 13M12.0147 13L12 25" stroke="#0C0C0C" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="faq_answer _regular">
                    В окне заказа есть кнопка «Помощь», с помощью неё можно связаться с диспетчером Ситимобил, которому нужно рассказать о сложившейся проблеме. Заказ будет закрыт, а за клиентом закрепится долг.
                </div>
            </div>
            <div class="faq__item">
                <div class="faq_question _bold">
                    <span>  Я вывел деньги с помощью приложения, но они не пришли на карту. Что делать?</span>
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 13L12.0147 13M12.0147 13L12 1M12.0147 13L0 13M12.0147 13L12 25" stroke="#0C0C0C" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="faq_answer _regular">
                    Позвонить в офис нашего парка или по номеру: <a href="tel:+7(958)5486407">+7 (958) 548-64-07</a>. Вам подскажут, что именно произошло с вашим платежом.
                </div>
            </div>
            <div class="faq__item">
                <div class="faq_question _bold">
                    <span>  Где мне найти контакты офиса?</span>
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 13L12.0147 13M12.0147 13L12 1M12.0147 13L0 13M12.0147 13L12 25" stroke="#0C0C0C" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="faq_answer _regular">
                    Зайдите в водительское приложение. Внизу экрана нажмите на «КАБИНЕТ», а потом на кнопку «НОВОСТИ». В этом разделе публикуется вся необходимая для водителя информация, включая контакты офиса и обучающие материалы.
                </div>
            </div>
            <div class="faq__item">
                <div class="faq_question _bold">
                    <span>  При попытке вывести средства появляется сообщение о необходимости обратиться в парк. Что это значит?</span>
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 13L12.0147 13M12.0147 13L12 1M12.0147 13L0 13M12.0147 13L12 25" stroke="#0C0C0C" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="faq_answer _regular">
                    При удалённой регистрации водителя, ему недоступен вывод средств до тех пор, пока он не подтвердит свою личность. Сделать это можно лично посетив офис нашего парка. Верификация потребует не более 5 минут вашего времени, после чего вывод будет доступен вам круглосуточно. <strong>Перед посещением офиса, не забудьте взять с собой паспорт</strong>.
                </div>
            </div>
        </div>
        <a target="_blank" href="<?php echo get_field('ссылка_кнопки_стать_водителем', 12)?>" class="btn btn__faq flex _bold">
        Стать водителем
        </a>
    </section>
    <script src="https://grand-citymobil.ru/wp-content/themes/citymobile/js/jquery-3.6.0.min.js" id="jquery-js-js"></script>
    <script src="https://grand-citymobil.ru/wp-content/themes/citymobile/js/faq_page.js" id="help-js-js"></script>
    <section class="offices  white-back" style="opacity: 1;">
   <div class="offices__head flex">
      <h2 class="why_block_title _bold ">
         Офисы такси <span>Ситимобил</span>
      </h2>
      <div class="offices__tabs__seemore">
         <span class="flex _medium">Все города</span>
         <img class="flex" loading="lazy" width="8" height="5" src="/wp-content/themes/citymobile/image/black_arrow__icon.svg" alt="">
      </div>
   </div>
   <div class="offices__tabs"><span class="offices__tabs__name _bold active" data-cityname="Москва">
      Москва            </span><span class="offices__tabs__name _bold" data-cityname="Краснодар">
      Краснодар            </span>
      <span class="offices__tabs__name _bold" data-cityname="Волгоград">
      Волгоград            </span>
      <span class="offices__tabs__name _bold " data-cityname="Волжский">
      Волжский            </span>
      <span class="offices__tabs__name _bold " data-cityname="Воронеж">
      Воронеж            </span>
      <span class="offices__tabs__name _bold " data-cityname="Дзержинск">
      Дзержинск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Екатеринбург">
      Екатеринбург            </span>
      <span class="offices__tabs__name _bold " data-cityname="Казань">
      Казань            </span>
      <span class="offices__tabs__name _bold " data-cityname="Копейск">
      Копейск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Красноярск">
      Красноярск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Кстово">
      Кстово            </span>
      <span class="offices__tabs__name _bold " data-cityname="Нижний Новгород">
      Нижний Новгород            </span>
      <span class="offices__tabs__name _bold " data-cityname="Новосибирск">
      Новосибирск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Омск">
      Омск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Первоуральск">
      Первоуральск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Пермь">
      Пермь            </span>
      <span class="offices__tabs__name _bold " data-cityname="Ростов-на-Дону">
      Ростов-на-Дону            </span>
      <span class="offices__tabs__name _bold " data-cityname="Самара">
      Самара            </span>
      <span class="offices__tabs__name _bold " data-cityname="Санкт-Петербург">
      Санкт-Петербург            </span>
      <span class="offices__tabs__name _bold " data-cityname="Саратов">
      Саратов            </span>
      <span class="offices__tabs__name _bold " data-cityname="Сочи">
      Сочи            </span>
      <span class="offices__tabs__name _bold " data-cityname="Сочи/Адлер">
      Сочи/Адлер            </span>
      <span class="offices__tabs__name _bold " data-cityname="Тольятти #1">
      Тольятти #1            </span>
      <span class="offices__tabs__name _bold " data-cityname="Тольятти #2">
      Тольятти #2            </span>
      <span class="offices__tabs__name _bold " data-cityname="Ульяновск">
      Ульяновск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Уфа">
      Уфа            </span>
      <span class="offices__tabs__name _bold " data-cityname="Челябинск">
      Челябинск            </span>
      <span class="offices__tabs__name _bold " data-cityname="Ярославль">
      Ярославль            </span>
   </div>
   <div class="offices__tab__wrapper">
      <div class="offices__tab" data-cityname="Волгоград">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Волгограде<br>
                  можно подключиться удаленно или у нас в офисе
               </p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00                
            </div>
            <div class="offices__tab__content__address _bold">
               бул. 30-летия Победы, 16А  2 этаж                 
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79044169759">+7 (904) 416-97-59</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Волгоград" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab72f5bb3f57e605c82d0cd49545cf6a1b821d5acc4de52fdab875fbfd71a759d&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Волжский">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Волжском можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00 ПН - ПТ                
            </div>
            <div class="offices__tab__content__address _bold">
               бул. Профсоюзов, 7Б (ТЦ «Радуга», 2 этаж)                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79954164735">+7 (995) 416-47-35</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Волжский" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A1230e7fd486c8f289b9a09448e443152aca7faee788adf5ce9632fa1bb6f5b91&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Воронеж">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Воронеже можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Ворошилова, д. 2                  
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79525479907">+7 (952) 547-99-07</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Воронеж" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Acc16fcf943d88ad7d9344a38bd7c0b23bad497cb965e5828c67c0e422d867c1a&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Дзержинск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Дзержинск&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Дзержинске можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00                
            </div>
            <div class="offices__tab__content__address _bold">
               пр-т Дзержинского,д. 15                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79081546073">+7 (908) 154-60-73</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Дзержинск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A95756f56cffd860e29bee922d150c93344260ca896e4e3e7fafb907e4431e674&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Екатеринбург">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Екатеринбург&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Екатеринбурге можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Куйбышева, д. 149а                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79505484731">+7 (950) 548-47-31</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Екатеринбург" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A3d369212165f3069390208485ad446ab87a70de1546848a576ca670a462dd968&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Казань">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Казани можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00  Ежедневно Обед с 14:00 - 15:00                
            </div>
            <div class="offices__tab__content__address _bold">
               Ул. Ташаяк 2а. восточная трибуна 9 сектор. 2 этаж                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79509456344">+7 (950) 945-63-44</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Казань" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab3e90c606069084556958ca5196eaf263d1c7ee7ae7569c3a86c709adb3237b4&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Копейск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Копейске можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: "10:00 - 19:00 ПН-ПТ Обед 14:00 - 15:00"                
            </div>
            <div class="offices__tab__content__address _bold">
               пр-кт Коммунистический, д.27А                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79026080707">+7 (902) 608-07-07</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Копейск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A2fdf33cd6a4c8cfb096b285ad9fa3f065277fd7bf49ebfa1ae6c3ec8ce756586&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab" data-cityname="Краснодар" style="display: block;">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Краснодаре можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 9:00 - 18:00                
            </div>
            <div class="offices__tab__content__address _bold">
               Ул:Стасова, д. 186 . ТЦ Уровни                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79002509407">+7 (900) 250-94-07</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <iframe data-cityname="Краснодар" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A40fd82605b0bff5ed92d57155f487e9969db4b6696bd92ed73186f060b27e37d&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </iframe>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Красноярск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Красноярске можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 09:00-18:00                 
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Батурина, д. 36а, 5 этаж, офис 52-4а                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79082210101">+7 (908) 221-01-01</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Красноярск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A821e0fea63fd679620c675dd44fb916d4cbc8bffe0ffe852226c5f9d2f277fa8&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Кстово">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Кстово можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00 - 19:00 ПН-ПТ Обед 14:00 - 15:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Магистральная, д. 47                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79503705030">+7 (950) 370-50-30</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Кстово" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A5cc854637dabf3708a0bb932bf0ae52f55f41b077f635502fb20d32f723600ab&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab active" data-cityname="Москва" style="display: block;">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Москва&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Москве и Московской области можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00  Ежедневно                
            </div>
            <div class="offices__tab__content__address _bold">
               Бакунинская 23/41                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79013505050">+7 (901) 350-50-50</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <iframe data-cityname="Москва" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A5ca448e62898dea43db12e72b368b98f51338364038f2f1c71dfe196beb19fd8&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </iframe>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Нижний Новгород">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Нижний Новгород&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Нижнем Новгороде можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10.00-19 00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Удмуртская, 10 Тех, Центр " Лира" 2й эт.                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79023000764">+7 (902) 300-07-64</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Нижний Новгород" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Acba671413366012a12ae324bdd5eea42ea5f3079dbb19b8ee74570eef98206e9&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Новосибирск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Новосибирске можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул.Серебренниковская, д. 1                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79529103005">+7 (952) 910-30-05</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Новосибирск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae383da12d9e4fa420abca9f954600a3732c2d9ad5b0291c6831672916f37d069&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Омск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Омске можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 09:00-18:00                 
            </div>
            <div class="offices__tab__content__address _bold">
               ул. 70 лет Октября, д. 41                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79048263199">+7 (904) 826-31-99</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Омск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A92b94a6d84d83f934598d896358decec1b73d5393ace70ed22b05e5085e6d4f3&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Первоуральск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Первоуральск&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Первоуральске можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: пн- пт 10:00 - 19:00  сб-вс выходные                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Трубников, д.31                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79920067886">+7 (992) 006-78-86</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Первоуральск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A2c678ccbcb577cc2ca1bed49a07b8d6ddb0027700fd997cb0b2da4e2e33b0096&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Пермь">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Пермь&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Пермьми можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00 Ежедневно, Обед: с 14:00 - до 15:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул.Революции 20 - БЦ Бонус  1 этаж                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79082791285">+7 (908) 279-12-85</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Пермь" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A78eb83a227acfd8812fdd4c0b5e5245233af2e43b96e643b20d713d8824524c0&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Ростов-на-Дону">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Ростове-на-Дону можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00 перерыв с 14-00 до 15-00, без выходных                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Нансена, д. 135/11, этаж 5, офис 510                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79508572207">+7 (950) 857-22-07</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Ростов-на-Дону" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A4fd182d11c20539b006d6092350cee5cefd924b895ea1f8ba7bede7af88c9a26&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Самара">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Самара&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Самаре можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: Пн-пт 9:00-18:00                 
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Промышленности, д. 269 А , офис 13                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79967353533">+7 (996) 735-35-33</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Самара" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Acf84f5a9b9e550c8dc2a2b85d9e7f251742251792a37777a368003fa1d0871fa&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Санкт-Петербург">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Санкт-Петербурге можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00 без вых обед с 14:00 - 15:00                
            </div>
            <div class="offices__tab__content__address _bold">
               СПб, ул. Богатырский проспект, д. 14к2, Лит. А.  ТЦ Мегаполис, секция 5                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79523602612">+7 (952) 360-26-12</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Санкт-Петербург" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A48ed7bf9814364941e6769243738b80ff782ee90b04e22198f866d17ea3342bb&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Саратов">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Саратов&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Саратове можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: пн-пт 10:00-19:00 сб-вс 10:00-18:00  обед с 14:00 до 15:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Шехурдина, д. 26Б, 2 этаж                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79020410605">+7 (902) 041-06-05</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Саратов" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A3eae1707f9bef6b93d8890511a3a40d08eab9ea5a395e44a439bac786bd57867&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Сочи">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Сочи&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Сочи можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 09:00-18:00                 
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Транспортная, д. 16                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79914540625">+7 (991) 454-06-25</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Сочи" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A9483a6429de5d0c0d1a548d84f67124650c6fa52ea00d9a6665633ebb3c336e6&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Сочи/Адлер">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Сочи/Адлере можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 08:00-17:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Кишиневская, д. 8а                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79384557688">+7 (938) 455-76-88</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Сочи/Адлер" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab8ebe44b43ed0df7530c35f558f564914f466ffcc2775568f8f6e515a2ec7f45&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Тольятти #1">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Тольятти&quot;}" data-sheets-userformat="{&quot;2&quot;:5057,&quot;3&quot;:{&quot;1&quot;:0},&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;12&quot;:0,&quot;15&quot;:&quot;Arial&quot;}">Тольятти можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00 ПН - ПТ обед с 14:00 до 15:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Ленина, д. 92 ТЦ "Юность", оф. 231                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79019425730">+7 (901) 942-57-30</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Тольятти #1" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A0dc66500278a453e5c83e420a098d081ad55dac10d572d87fb8c2b42ee562a1e&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Тольятти #2">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Тольятти можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00 ПН - ПТ  обед 13-14                
            </div>
            <div class="offices__tab__content__address _bold">
               Бул. Приморский, д. 55, оф 209                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79272155502">+7 (927) 215-55-02</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Тольятти #2" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab3827635f35c8ddf0bc21ad985fa45572cb8193dfc1475d354ce801daee3d64a&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Ульяновск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Ульяновске можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 9:00-18:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул. Октябрьская, д. 51а, этаж 2                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79025892561">+7 (902) 589-25-61</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Ульяновск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A6fa10d704c91890aa1a2c6563ba1bfe743d9bca0c86ebe5b0d34b21ef7e14722&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Уфа">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В Уфе можно подключиться удаленно или у нас в офисе</p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00                
            </div>
            <div class="offices__tab__content__address _bold">
               г.Уфа, ул. М.Губайдуллина, д. 3                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79027120101">+7 (902) 712-01-01</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Уфа" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab1d11dae6467e436cee6edc25253650435dd068a5efefb1bd16a242e86ffa5a8&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Челябинск">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Челябинск&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Челябинске можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00                
            </div>
            <div class="offices__tab__content__address _bold">
               ул.Каслинская, 38А, 1 этаж                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79517705256">+7 (951) 770-52-56</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Челябинск" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3Af114ce6495dad739d6cac237d0d93937d725c19a85ef420da83a4f600fc7a2e1&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
      <div class="offices__tab " data-cityname="Ярославль">
         <div class="offices__tab__content">
            <div class="offices__tab__content__title _bold">
               <p>В <span data-sheets-value="{&quot;1&quot;:2,&quot;2&quot;:&quot;Ярославль&quot;}" data-sheets-userformat="{&quot;2&quot;:4544,&quot;9&quot;:1,&quot;10&quot;:2,&quot;11&quot;:4,&quot;15&quot;:&quot;Arial&quot;}">Ярославле можно подключиться удаленно или у нас в офисе</span></p>
            </div>
            <div class="offices__tab__content__works _regular">
               Режим работы: 10:00-19:00 ПН-ПТ.  Обед с 14.00 - 15.00                
            </div>
            <div class="offices__tab__content__address _bold">
               пр-т Толбухина, 3 (ТЦ Формула, 4 этаж)                
            </div>
            <div class="offices__tab__content__phones _bold">
               <a href="tel:+79657263868">+7 (965) 726-38-68</a>
            </div>
         </div>
         <div class="offices_tab__map">
            <a data-cityname="Ярославль" class="yandex_map_fake" src="https://yandex.ru/map-widget/v1/?um=constructor%3A8f39cf51ea69c07a5153f7672197d9d5dd0dfd17489aa85c8fc03a0401ac5e6d&amp;source=constructor" loading="lazy" width="600" height="400" frameborder="0">
            </a>
         </div>
      </div>
   </div>
</section>
</main>

<div class="feed_back_form  white-back" style="opacity: 1;">
    <div class="why_block_title _bold ">Оставить заявку</div>
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
            <a href="/polzovatelskoe-soglashenie/">Пользовательского соглашения</a>
        </div>
    </form>
    </div>

<?php
get_footer();