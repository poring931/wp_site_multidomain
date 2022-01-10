<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package citymobile
 */




$domains =array( //список доменов
	'grand-citymobil.ru'=>'Москва',
	'volgograd' => 'Волгоград',
	'volzhskiy' => 'Волжский',
	'voronezh' => 'Воронеж',
	'dzerzhinsk' => 'Дзержинск',
	'ekb' => 'Екатеринбург',
	'kazan' => 'Казань',
	'kopeisk' => 'Копейск',
	'krd' => 'Краснодар',
	'krsk' => 'Красноярск',
	'kstovo' => 'Кстово',
	'nn' => 'Нижний Новгород',
	'nsk' => 'Новосибирск',
	'omsk' => 'Омск',
	'pervoyralsk' => 'Первоуральск',
	'perm' => 'Пермь',
	'rnd' => 'Ростов-на-Дону',
	'samara' => 'Самара',
	'spb' => 'Санкт-Петербург',
	'saratov' => 'Саратов',
	'sochi' => 'Сочи',
	'adler' => 'Сочи/Адлер',
	'tolyatti' => 'Тольятти',
	'ylyanovsk' => 'Ульяновск',
	'ufa' => 'Уфа',
	'chelyabinsk' => 'Челябинск',
	'yaroslavl' => 'Ярославль'
);
$domainsForSeo =array( //список доменов
	'grand-citymobil.ru'=>'Москве',
	'volgograd' => 'Волгограде',
	'volzhskiy' => 'Волжском',
	'voronezh' => 'Воронеже',
	'dzerzhinsk' => 'Дзержинске',
	'ekb' => 'Екатеринбурге',
	'kazan' => 'Казани',
	'kopeisk' => 'Копейске',
	'krd' => 'Краснодаре',
	'krsk' => 'Красноярске',
	'kstovo' => 'Кстово',
	'nn' => 'Нижнем Новгороде',
	'nsk' => 'Новосибирске',
	'omsk' => 'Омске',
	'pervoyralsk' => 'Первоуральске',
	'perm' => 'Перми',
	'rnd' => 'Ростове-на-Дону',
	'samara' => 'Самаре',
	'spb' => 'Санкт-Петербурге',
	'saratov' => 'Саратове',
	'sochi' => 'Сочи',
	'adler' => 'Сочи/Адлере',
	'tolyatti' => 'Тольятти',
	'ylyanovsk' => 'Ульяновске',
	'ufa' => 'Уфе',
	'chelyabinsk' => 'Челябинске',
	'yaroslavl' => 'Ярославле'
);
$array_decrs =[
	'grand-citymobil.ru'=>'Москве и области',
	'volgograd' => 'Волгограде и области',
	'volzhskiy' => 'Волжском и области',
	'voronezh' => 'Воронеже и области',
	'dzerzhinsk' => 'Дзержинске',
	'ekb' => 'Екатеринбурге',
	'kazan' => 'Казани',
	'kopeisk' => 'Копейске',
	'krd' => 'Краснодаре',
	'krsk' => 'Красноярске',
	'kstovo' => 'Кстово',
	'nn' => 'Нижнем Новгороде',
	'nsk' => 'Новосибирске',
	'omsk' => 'Омске',
	'pervoyralsk' => 'Первоуральске',
	'perm' => 'Перми',
	'rnd' => 'Ростове-на-Дону',
	'samara' => 'Самаре',
	'spb' => 'Санкт-Петербурге',
	'saratov' => 'Саратове',
	'sochi' => 'Сочи',
	'adler' => 'Сочи/Адлере',
	'tolyatti' => 'Тольятти',
	'ylyanovsk' => 'Ульяновске',
	'ufa' => 'Уфе',
	'chelyabinsk' => 'Челябинске',
	'yaroslavl' => 'Ярославле'
];

$current_domain = getSubDomain($_SERVER['HTTP_HOST']);

foreach ($domains as $key => $value) {
	if ($key == $current_domain){
		$GLOBALS['current_domain_name'] = $value;
	}
}

foreach ($domainsForSeo as $key => $value) {
	if ($key == $current_domain){
		$GLOBALS['nameForSeo'] = $value;
	}
}

// echo '<pre>';
// var_dump($GLOBALS['nameForSeo']);
// echo '</pre>'






?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<style>
@font-face{font-family: 'Jeko'; src: url('/wp-content/themes/citymobile/fonts/Jeko Medium.ttf') format('truetype'); font-weight: 400; font-style: normal; font-display: swap;}@font-face{font-family: 'Jeko'; src: url('/wp-content/themes/citymobile/fonts/Jeko Regular.ttf') format('truetype'); font-weight: 500; font-display: swap;}@font-face{font-family: 'Jeko'; src: url('/wp-content/themes/citymobile/fonts/Jeko Bold.ttf') format('truetype'); font-weight: 700; font-style: normal; font-display: swap;}html,body,div,a,span,li{font-family: 'Jeko', BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;}a{text-decoration: none; color:#111;}a:hover{color:#7654FF!important;}body{background:#E5E5E5;}#primary>section{margin-bottom: 60px; border-radius: 15px; padding:60px 90px;}.menu_block_top_logo{width: 188px;}.menu_block_top_contacts_phone a{width:221px}.container{max-width: 1200px; width:100%; margin:0 auto;}.white-back{background:#FFFFFF;}._regular{font-weight: 500;}._medium{font-weight: 400;}._bold{font-weight: 700;}.menu_block_top{justify-content: space-between; border-bottom: 1px solid #F5F5F7;}.menu_block_top_contacts{justify-content: center;}.menu_block_top{height: 60px;}.flex{align-items: center; align-content: center; display: flex;}.menu_block_bottom{height: 66px; justify-content: space-between;}.nav-menu a{font-size: 16px; color: #0C0C0C;}.nav-menu li{margin-right: 35px;}.nav-menu li:last-child{margin-right:0;}.menu_block_bottom_social_item{height: 36px;}.menu_block_bottom_social_item:nth-child(-n+1){padding: 10px 15px;}.menu_block_bottom_social_item{padding: 10px; border: 1px solid #0C0C0C; box-sizing: border-box; border-radius: 5px; margin-left: 15px; transition: 0.3s linear; -webkit-transition: 0.3s linear; -moz-transition: 0.3s linear; -ms-transition: 0.3s linear; -o-transition: 0.3s linear;}.menu_block_bottom_social_item:first-child{margin-left: 0;}.menu_block_bottom_social_item:hover{border: 1px solid #7654FF; transition: 0.3s linear; -webkit-transition: 0.3s linear; -moz-transition: 0.3s linear; -ms-transition: 0.3s linear; -o-transition: 0.3s linear;}.menu_block_bottom_social_item:hover svg path{fill: #7654FF; transition: 0.3s linear; -webkit-transition: 0.3s linear; -moz-transition: 0.3s linear; -ms-transition: 0.3s linear; -o-transition: 0.3s linear;}.menu_block_bottom_menu{height: 100%;}.main-navigation{height: 100%;}.main-navigation div,.main-navigation ul, .main-navigation li{height: 100%; display: flex; align-items: center; justify-content: center; align-content: center;}.nav-menu li.current_page_item{position: relative;}.nav-menu li.current_page_item:after{content:''; background: #FA6400; border-radius: 2px 2px 0px 0px; height:2px; -webkit-border-radius: 2px 2px 0px 0px; -moz-border-radius: 2px 2px 0px 0px; -ms-border-radius: 2px 2px 0px 0px; -o-border-radius: 2px 2px 0px 0px; width: 100%; position: absolute; bottom: 0; transition: 0.3s linear; -webkit-transition: 0.3s linear; -moz-transition: 0.3s linear; -ms-transition: 0.3s linear; -o-transition: 0.3s linear;}.menu_block_top_contacts_phone{margin-left: 40px;}.menu_block_top_contacts_phone a{font-size: 24px;}.choose__region>div{margin:0 10px;}.nav-menu li.current_page_item:hover:after{opacity:0}body{position: relative; height: 100%; min-height: 100vh; color:#0C0C0C;}.btn{background: #7654FF; border-radius: 10px; cursor:pointer; position: relative;}.main_slider{border-radius: 15px; margin-top: 60px;}.main_slider_item{display:none; grid-template-columns: 1.2fr 1fr; justify-content: space-between; column-gap: 90px;}.main_slider_item__content__title{font-size: 32px; margin-bottom: 30px;}.main_slider_item__content{flex-direction: column; justify-content: space-between; align-items: end;}.main_slider_item__content__title p{margin:0;}.main_slider_item__content__title span{margin:0; color:#FA6400;}.main_slider_item__content__btn:hover{color:white!important;}.main_slider_item__content__btn{color:white!important;}.btn:hover:after{width: 100%; opacity: 0.2; z-index: 1;}.btn:after{width: 0%; height: 100%; top: 0; left: 0; background: #f5f5f5; z-index: 2; content: ''; position: absolute; z-index: -1; -webkit-transition: all 0.3s; -o-transition: all 0.3s; -moz-transition: all 0.3s; transition: all 0.3s; opacity: 0;}.main_slider_item__content__btn{padding:20px 17px;}.main_slider_item__content__btns{display: flex; justify-content: space-between; width: 100%;}.main_slider_item__content__btns_slider__item{width: 40px; height: 40px; justify-content: center; border: 1px solid #0C0C0C; cursor:pointer; border-radius: 100%; -webkit-border-radius: 100%; -moz-border-radius: 100%; margin-left: 25px; -ms-border-radius: 100%; -o-border-radius: 100%;}.main_slider_item__content__btns_slider__item._active svg path,.main_slider_item__content__btns_slider__item:hover svg path{stroke:white;}.main_slider_item__content__btns_slider__item{transition: 0.2s linear; -webkit-transition: 0.2s linear; -moz-transition: 0.2s linear; -ms-transition: 0.2s linear; -o-transition: 0.2s linear; position:relative;}.main_slider_item__content__btns_slider__item svg{position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); -o-transform: translate(-50%, -50%);}.main_slider_item__content__btns_slider__item._active,.main_slider_item__content__btns_slider__item:hover{background: #7654FF; border: 1px solid #7654FF;}.main_slider_item__content__btns_slider__item svg path{transition: 0.2s linear; -webkit-transition: 0.2s linear; -moz-transition: 0.2s linear; -ms-transition: 0.2s linear; -o-transition: 0.2s linear;}#mobile__header{display: none;}body{overflow-x: hidden;}@media (max-width: 1199px){  .main_slider_item { grid-template-columns: 1.6fr 1fr; column-gap: 16px; }.container{padding:0 20px;}header .flex,footer .flex{flex-wrap: wrap;}.menu_block_bottom{height: auto;}.menu_block_bottom_menu ,.menu_block_bottom_social{height:auto; padding: 15px 0;}.breadcrumb{padding: 2px}#primary>section{padding: 60px 50px;}}@media (max-width:930px){.menu_block_bottom{    justify-content: center;}}@media (max-width:750px){header#masthead{display: none;}#mobile__header{display: flex; position:relative; padding:10px 16px;}.container{padding: 0 16px;}.mobile__header_main{justify-content: space-between; width: 100%;}.mobile__header__menu{position: absolute; left:-100%; transition: all 0.35s linear;}.mobile__header__menu.active{left:0%; transition: all 0.35s ease-in-out;}.main_slider_item_img{margin-bottom: 15px; grid-row: 1; justify-self: center;}.main_slider_item{grid-template-columns: 1fr;}}@media (max-width:550px){body .main-navigation ul{display: flex;}#primary>section{margin-bottom: 30px;}.main_slider{margin-top: 30px;min-height:370px;}.main_slider_item_img{min-height:132px; background-color: #fff;}}@media (min-width:1100px){.main_slider{min-height:300px}}
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JRC80FTCE5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JRC80FTCE5');
</script>


	<?php wp_head(); ?>
</head>

<body >
	<div class="overlay"></div>


<div class="white-back sticky">
	<header id="masthead" class="container menu_block">
		
		<div class="menu_block_top flex">
			<a href="/" class="menu_block_top_logo">
					<img width="188" height="22"  src="<?php echo get_template_directory_uri()?>/image/logo.svg" alt="СитиМобил">
			</a>
			<div class="menu_block_top_contacts flex">
				<div class="menu_block_top_contacts_region ">
					<div class="choose__region flex">
					<svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.76829 4.87704C-0.184711 4.65123 -0.275989 3.43351 0.63422 3.08844L8.58648 0.073668C9.45535 -0.255729 10.3046 0.581194 9.89308 1.36128L6.14318 8.46938C5.74822 9.21805 4.57413 9.16209 4.26462 8.37984L3.28179 5.89584C3.16613 5.60351 2.90203 5.38261 2.57576 5.30531L0.76829 4.87704Z" fill="#FA6400"/>
					</svg>
					<div class="_regular current_city">
						<?php echo $GLOBALS['current_domain_name'];?>
					</div>
						<svg class="arrow" width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8.71818 0.188299C8.58508 0.0670151 8.41494 0.000194446 8.23888 5.2782e-05C8.06281 -8.88816e-05 7.89258 0.0664579 7.7593 0.187528L4.5 3.14926L1.2407 0.187527C1.10756 0.0665578 0.937522 4.09804e-08 0.761625 3.32917e-08C0.585727 2.5603e-08 0.415694 0.0665578 0.282552 0.187527L0.253229 0.214529C0.173748 0.286952 0.109998 0.376518 0.0663058 0.477151C0.0226133 0.577785 -3.00355e-08 0.687131 -3.48717e-08 0.797772C-3.9708e-08 0.908412 0.0226133 1.01776 0.0663058 1.11839C0.109998 1.21903 0.173748 1.30859 0.253229 1.38101L4.02056 4.81181C4.1538 4.93319 4.32414 5 4.50037 5C4.6766 5 4.84693 4.93319 4.98017 4.81181L8.74677 1.38101C8.82625 1.30859 8.89 1.21903 8.93369 1.11839C8.97739 1.01776 9 0.908413 9 0.797772C9 0.687131 8.97739 0.577785 8.93369 0.477152C8.89 0.376518 8.82625 0.286952 8.74677 0.21453L8.71745 0.188299L8.71818 0.188299Z" fill="#0C0C0C"/>
						</svg>
						<div class="choose__region__list">

						</div>
					</div>
					

				</div>
				<div class="menu_block_top_contacts_phone">
					<a class="_regular" href="tel:<?php echo str_replace([' ', '(', ')', '-'],'',get_field('contact_number','option','option'));?>"><?php the_field('contact_number','option','option');?></a>
				</div>
			</div>
		</div>
		<div class="menu_block_bottom flex">
			<div class="menu_block_bottom_menu flex">
			<nav id="header_menu" class="main-navigation flex">
			
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header_menu',
						'menu_class' => 'nav-menu _regular flex'
					)
				);
				?>
			</nav>
			</div>
			<div class="menu_block_bottom_social flex">
				<!-- <a href="<?php the_field('apple_store','option','option');?>" target="_blank" class="menu_block_bottom_social_item flex">
					<svg width="90" height="15" viewBox="0 0 90 15" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4.06783 15.0001C1.84209 14.9871 0 10.5469 0 8.28454C0 4.5905 2.83676 3.78166 3.92959 3.78166C4.42242 3.78166 4.9483 3.97069 5.41208 4.13783C5.73662 4.25423 6.07219 4.37461 6.2585 4.37461C6.37069 4.37461 6.63413 4.27214 6.86652 4.1826C7.36135 3.98959 7.97839 3.74982 8.69659 3.74982H8.7006C9.2375 3.74982 10.8642 3.86523 11.8409 5.29986L12.0703 5.63614L11.7397 5.87889C11.2689 6.22611 10.4105 6.85886 10.4105 8.11342C10.4105 9.5988 11.3831 10.1699 11.8509 10.4445C12.0572 10.5658 12.2706 10.6912 12.2706 10.9648C12.2706 11.1439 10.8121 14.9782 8.69459 14.9782C8.17572 14.9782 7.8091 14.826 7.48556 14.6917C7.15901 14.5554 6.87654 14.438 6.41076 14.438C6.17436 14.438 5.87586 14.5474 5.55933 14.6638C5.1276 14.821 4.63778 15.0001 4.08285 15.0001H4.06783Z" fill="#0C0C0C"/>
						<path d="M8.49225 6.86646e-05C8.54734 2.26942 7.11494 3.84434 5.68454 3.74584C5.44814 1.93514 7.11494 6.86646e-05 8.49225 6.86646e-05ZM29.2831 2.98276L31.022 8.10845H27.5442L29.2831 2.98276ZM25.0901 11.9388H26.24L27.2076 9.06951H31.3446L32.3262 11.9388H33.5323L30.1386 1.97991H28.5399L25.0901 11.9388ZM38.746 11.1031C38.0038 11.1031 37.4138 10.8802 36.979 10.4066C36.5443 9.94701 36.334 9.26451 36.334 8.35916V8.24773C36.334 7.35631 36.5443 6.67381 36.9931 6.20024C37.4428 5.72667 38.0178 5.48989 38.732 5.48989C39.3781 5.48989 39.924 5.7406 40.3447 6.21417C40.7654 6.68774 40.9908 7.37024 40.9908 8.24773V8.35916C40.9908 9.25058 40.7934 9.91915 40.4148 10.3927C40.0221 10.8663 39.4752 11.1031 38.746 11.1031ZM35.2131 14.4738H36.376V10.7409C36.6004 11.1309 36.9239 11.4513 37.3577 11.702C37.7784 11.9527 38.2832 12.0641 38.8582 12.0641C39.8549 12.0641 40.6542 11.7299 41.2712 11.0334C41.8883 10.337 42.1968 9.43165 42.1968 8.30345V8.19202C42.1968 7.07774 41.8743 6.20024 41.2572 5.53167C40.6392 4.86311 39.8398 4.52882 38.8582 4.52882C38.3441 4.52914 37.8398 4.6688 37.3998 4.93275C36.937 5.19739 36.6004 5.51774 36.376 5.87989V4.65418H35.2131V14.4738ZM47.5388 11.1031C46.7955 11.1031 46.2065 10.8802 45.7718 10.4066C45.3371 9.94701 45.1267 9.26451 45.1267 8.35916V8.24773C45.1267 7.35631 45.3371 6.67381 45.7858 6.20024C46.2346 5.72667 46.8095 5.48989 47.5247 5.48989C48.1698 5.48989 48.7167 5.7406 49.1374 6.21417C49.5581 6.68774 49.7825 7.37024 49.7825 8.24773V8.35916C49.7825 9.25058 49.5862 9.91915 49.2076 10.3927C48.8149 10.8663 48.268 11.1031 47.5388 11.1031ZM44.0048 14.4738H45.1688V10.7409C45.3932 11.1309 45.7157 11.4513 46.1504 11.702C46.5711 11.9527 47.076 12.0641 47.6509 12.0641C48.6466 12.0641 49.446 11.7299 50.063 11.0334C50.68 10.337 50.9885 9.43165 50.9885 8.30345V8.19202C50.9885 7.07774 50.666 6.20024 50.049 5.53167C49.4319 4.86311 48.6326 4.52882 47.6509 4.52882C47.1368 4.52914 46.6326 4.6688 46.1925 4.93275C45.7297 5.19739 45.3932 5.51774 45.1688 5.87989V4.65418H44.0038L44.0048 14.4738ZM59.8314 12.0641C60.813 12.0641 61.6404 11.7856 62.2995 11.2284C62.9586 10.6713 63.2952 9.96094 63.2952 9.12523C63.2952 8.2338 63.0147 7.56523 62.4678 7.14738C61.9209 6.72952 61.0655 6.4231 59.8875 6.2281C58.9058 6.08881 58.2608 5.87989 57.9522 5.61524C57.6297 5.36453 57.4754 4.97453 57.4754 4.44525C57.4754 3.97168 57.6577 3.58168 58.0224 3.27526C58.387 2.98276 58.8918 2.82954 59.5649 2.82954C60.2661 2.82954 60.799 2.96883 61.1776 3.2474C61.5423 3.52597 61.7947 3.98561 61.9209 4.59846H63.0147C62.9166 3.72097 62.566 3.03847 61.977 2.5649C61.374 2.09133 60.5746 1.85455 59.5649 1.85455C58.6254 1.85455 57.8541 2.11919 57.2511 2.63454C56.634 3.1499 56.3395 3.79061 56.3395 4.55668C56.3395 5.39239 56.606 6.01917 57.1669 6.43703C57.7138 6.85488 58.5552 7.13345 59.6912 7.30059C60.6307 7.45381 61.2758 7.66273 61.6124 7.9413C61.9489 8.21987 62.1172 8.63773 62.1172 9.2088C62.1172 9.76594 61.8928 10.2256 61.4581 10.5738C61.0234 10.922 60.4765 11.0891 59.8314 11.0891C59.3406 11.0891 58.9199 11.0334 58.5833 10.922C58.2467 10.8106 57.9803 10.6574 57.798 10.4345C57.6092 10.2403 57.4656 10.0073 57.3773 9.75201C57.2812 9.47666 57.2153 9.19179 57.1809 8.90237H56.004C56.1021 9.84951 56.4527 10.6156 57.0557 11.2006C57.6587 11.7856 58.5833 12.0641 59.8314 12.0641ZM67.5303 12.0363C67.8949 12.0363 68.2315 11.9945 68.526 11.8831V10.9081C68.2595 11.0195 67.965 11.0613 67.6285 11.0613C67.0114 11.0613 66.7169 10.7131 66.7169 10.0027V5.62917H68.4278V4.65418H66.7169V2.99669H65.553V4.65418H64.5012V5.62917H65.553V10.1142C65.553 10.7131 65.7213 11.1866 66.0578 11.5209C66.3944 11.8691 66.8852 12.0363 67.5303 12.0363ZM73.328 12.0641C74.3658 12.0641 75.2352 11.7299 75.9224 11.0334C76.5955 10.337 76.9461 9.44558 76.9461 8.34523V8.2338C76.9461 7.14738 76.5955 6.26988 75.9224 5.57346C75.2493 4.87703 74.3798 4.52882 73.3421 4.52882C72.2903 4.52882 71.4208 4.87703 70.7477 5.57346C70.0746 6.26988 69.738 7.16131 69.738 8.24773V8.35916C69.738 9.43165 70.0746 10.3231 70.7477 11.0195C71.4208 11.7159 72.2903 12.0641 73.328 12.0641ZM73.3421 11.1031C72.5988 11.1031 72.0098 10.8663 71.5891 10.3649C71.1544 9.86344 70.944 9.19487 70.944 8.35916V8.24773C70.944 7.41202 71.1544 6.74345 71.5891 6.24203C72.0098 5.7406 72.5988 5.48989 73.3421 5.48989C74.0713 5.48989 74.6462 5.7406 75.081 6.24203C75.5157 6.74345 75.7401 7.42595 75.7401 8.26166V8.35916C75.7401 9.19487 75.5157 9.84951 75.081 10.3509C74.6462 10.8524 74.0713 11.1031 73.3421 11.1031ZM78.7481 11.9388H79.9121V7.9413C79.9121 7.10559 80.1084 6.50667 80.5151 6.17238C80.9077 5.8381 81.5108 5.65703 82.3241 5.61524V4.52882C81.7071 4.55668 81.2022 4.68203 80.8376 4.91882C80.473 5.16953 80.1645 5.51775 79.9121 5.96346V4.65418H78.7481V11.9388ZM86.8167 12.0641C87.6581 12.0641 88.3593 11.8831 88.9202 11.4931C89.4811 11.1031 89.8177 10.5599 89.9439 9.83558H88.78C88.6257 10.6852 87.9806 11.1031 86.8307 11.1031C86.0734 11.1031 85.4984 10.8941 85.1058 10.4484C84.7131 10.0027 84.5028 9.36201 84.4747 8.5263H90V8.15023C90 6.93845 89.6775 6.0331 89.0464 5.43417C88.4153 4.83525 87.63 4.52882 86.7045 4.52882C85.6948 4.52882 84.8674 4.87703 84.2223 5.57346C83.5772 6.26988 83.2687 7.17524 83.2687 8.26166V8.37309C83.2687 9.48737 83.5912 10.3927 84.2504 11.0613C84.9095 11.7299 85.7649 12.0641 86.8167 12.0641ZM84.5168 7.59309C84.615 6.95238 84.8534 6.43702 85.246 6.06096C85.6247 5.68489 86.1155 5.48989 86.7045 5.48989C87.9946 5.48989 88.6958 6.20024 88.808 7.59309H84.5168Z" fill="#0C0C0C"/>
					</svg>

				</a> -->
				<a href="<?php the_field('google_play','option');?>" target="_blank" class="menu_block_bottom_social_item flex">
					<svg width="99" height="15" viewBox="0 0 99 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.95256 10.1818L8.29115 8.51808L2.19302 14.6428L9.95356 10.1818H9.95256ZM9.95256 5.65308L2.19302 1.19215L8.29115 7.31683L9.95256 5.65308ZM12.3841 8.75793C12.8809 8.36325 12.8809 7.47166 12.3513 7.07597L10.7236 6.13278L8.90723 7.91796L10.7236 9.70315L12.3841 8.75894V8.75793ZM0.59918 15L7.69098 7.91492L0.59918 0.831871C0.24146 1.0201 0 1.36318 0 1.80846V14.0234C0 14.4687 0.240466 14.8118 0.59918 15ZM27.2911 11.0795C28.5987 11.0795 29.6421 10.6969 30.4211 9.91769C31.2001 9.13844 31.6036 8.03333 31.6036 6.58818V5.83727H27.5126V6.85737H30.4201C30.3923 7.82081 30.128 8.60005 29.6133 9.19512C29.0846 9.79018 28.3195 10.0877 27.2901 10.0877C26.1354 10.0877 25.259 9.71934 24.6469 8.98259C24.0348 8.24585 23.7288 7.22575 23.7288 5.93645V5.8231C23.7288 4.56214 24.0348 3.5562 24.6747 2.79112C25.3147 2.02604 26.1911 1.6435 27.3179 1.6435C28.9316 1.6435 29.8637 2.39441 30.128 3.88207H31.3383C31.1852 2.80529 30.7401 2.01187 30.0028 1.47348C29.2516 0.935096 28.3473 0.665902 27.2901 0.665902C25.8711 0.665902 24.7026 1.16179 23.8122 2.13939C22.9219 3.11699 22.4767 4.34961 22.4767 5.83727V5.95061C22.4767 7.48077 22.8941 8.7134 23.7566 9.66266C24.6191 10.6119 25.7876 11.0795 27.2901 11.0795H27.2911ZM36.564 11.0795C37.5934 11.0795 38.4559 10.7394 39.1376 10.031C39.8053 9.32263 40.1531 8.41587 40.1531 7.29659V7.18324C40.1531 6.07813 39.8053 5.18554 39.1376 4.47713C38.4698 3.76872 37.6073 3.41452 36.5779 3.41452C35.5345 3.41452 34.672 3.76872 34.0043 4.47713C33.3365 5.18554 33.0026 6.0923 33.0026 7.19741V7.31075C33.0026 8.4017 33.3365 9.30846 34.0043 10.0169C34.672 10.7253 35.5345 11.0795 36.564 11.0795ZM36.5779 10.1019C35.8406 10.1019 35.2563 9.86102 34.8389 9.35096C34.4077 8.84091 34.199 8.16084 34.199 7.31075V7.19741C34.199 6.34732 34.4077 5.66725 34.8389 5.1572C35.2563 4.64715 35.8406 4.39212 36.5779 4.39212C37.3013 4.39212 37.8716 4.64715 38.3029 5.1572C38.7341 5.66725 38.9567 6.36149 38.9567 7.21158V7.31075C38.9567 8.16084 38.7341 8.82674 38.3029 9.3368C37.8716 9.84685 37.3013 10.1019 36.5779 10.1019ZM44.9594 11.0795C45.9889 11.0795 46.8514 10.7394 47.533 10.031C48.2008 9.32263 48.5486 8.41587 48.5486 7.29659V7.18324C48.5486 6.07813 48.2008 5.18554 47.533 4.47713C46.8653 3.76872 46.0028 3.41452 44.9734 3.41452C43.93 3.41452 43.0675 3.76872 42.3998 4.47713C41.732 5.18554 41.3981 6.0923 41.3981 7.19741V7.31075C41.3981 8.4017 41.732 9.30846 42.3998 10.0169C43.0675 10.7253 43.93 11.0795 44.9594 11.0795ZM44.9734 10.1019C44.236 10.1019 43.6518 9.86102 43.2344 9.35096C42.8032 8.84091 42.5945 8.16084 42.5945 7.31075V7.19741C42.5945 6.34732 42.8032 5.66725 43.2344 5.1572C43.6518 4.64715 44.236 4.39212 44.9734 4.39212C45.6967 4.39212 46.2671 4.64715 46.6984 5.1572C47.1296 5.66725 47.3522 6.36149 47.3522 7.21158V7.31075C47.3522 8.16084 47.1296 8.82674 46.6984 9.3368C46.2671 9.84685 45.6967 10.1019 44.9734 10.1019ZM53.2307 9.7335C52.5898 9.7335 52.0612 9.50681 51.6309 9.03927C51.1997 8.57172 50.99 7.94832 50.99 7.1549V7.04156C50.99 6.24814 51.1858 5.61058 51.6021 5.12886C52.0194 4.64715 52.5759 4.39212 53.3003 4.39212C54.0098 4.39212 54.5662 4.63298 54.9836 5.08636C55.4009 5.55391 55.6096 6.19147 55.6096 7.01322V7.1124C55.6096 7.93415 55.386 8.57172 54.9418 9.03927C54.4967 9.50681 53.9263 9.7335 53.2307 9.7335ZM53.2436 13.6581C54.287 13.6581 55.1217 13.3889 55.7616 12.8505C56.3876 12.3121 56.7086 11.5045 56.7215 10.4561V3.54203H55.5668V4.73215C55.0531 3.85373 54.2592 3.41452 53.188 3.41452C52.2013 3.41452 51.3944 3.78289 50.7535 4.4913C50.1136 5.1997 49.7936 6.07813 49.7936 7.09823V7.19741C49.7936 8.21752 50.0997 9.0676 50.7267 9.71934C51.3527 10.3852 52.1446 10.7111 53.1045 10.7111C53.6053 10.7111 54.0922 10.5836 54.5513 10.3002C54.9975 10.031 55.3452 9.70517 55.5678 9.30846V10.3852C55.5678 11.1645 55.3592 11.7454 54.9547 12.1138C54.5374 12.4821 53.968 12.6663 53.2297 12.6663C51.9926 12.6663 51.2971 12.2413 51.1291 11.377H49.9467C50.045 12.0571 50.364 12.6096 50.9075 13.0347C51.4501 13.4597 52.2291 13.6581 53.2446 13.6581H53.2436ZM59.0864 10.952H60.255V0H59.0864V10.952ZM65.5949 11.0795C66.4296 11.0795 67.1252 10.8953 67.6816 10.4986C68.2381 10.1019 68.5719 9.54932 68.6971 8.81258H67.5425C67.3895 9.67683 66.7496 10.1019 65.6088 10.1019C64.8576 10.1019 64.2873 9.88935 63.8977 9.43598C63.5082 8.98259 63.2995 8.33086 63.2717 7.48077H68.7528V7.09823C68.7528 5.8656 68.4328 4.94468 67.8068 4.33545C67.1808 3.72622 66.4018 3.41452 65.4836 3.41452C64.482 3.41452 63.6612 3.76872 63.0213 4.47713C62.3814 5.18554 62.0754 6.10646 62.0754 7.21158V7.32492C62.0754 8.45837 62.3953 9.3793 63.0491 10.0594C63.703 10.7394 64.5516 11.0795 65.5949 11.0795ZM63.3135 6.53151C63.4108 5.87977 63.6473 5.35555 64.0368 4.97301C64.4125 4.59047 64.8994 4.39212 65.4836 4.39212C66.7635 4.39212 67.459 5.11469 67.5703 6.53151H63.3135ZM74.2895 10.952H75.4998V6.82904H77.1135C78.1429 6.82904 78.9776 6.58818 79.6175 6.10646C80.2575 5.62475 80.5913 4.85967 80.5913 3.83956V3.78289C80.5913 2.79112 80.2575 2.04021 79.6175 1.55849C78.9776 1.07678 78.1429 0.821751 77.1135 0.821751H74.2895V10.952ZM75.4998 5.85144V1.81352H77.197C78.6438 1.81352 79.3811 2.47942 79.3811 3.78289V3.83956C79.3811 4.4913 79.1863 5.00135 78.8107 5.34138C78.4351 5.68142 77.8925 5.85144 77.197 5.85144H75.4998ZM82.3173 10.952H83.4859V0H82.3173V10.952ZM87.7825 10.1444C86.8644 10.1444 86.4053 9.7335 86.4053 8.89758C86.4053 7.93415 87.24 7.43827 88.9371 7.43827H89.9388V8.3592C89.9388 8.92592 89.7301 9.36513 89.3267 9.67683C88.9232 9.98853 88.4085 10.1444 87.7825 10.1444ZM87.6712 11.0795C88.6172 11.0795 89.3823 10.7253 89.9388 10.0169V10.952H91.0934V6.06396C91.0934 4.30711 90.2031 3.41452 88.4363 3.41452C87.6573 3.41452 87.0035 3.61287 86.4748 3.98124C85.9323 4.34962 85.6262 4.93051 85.5567 5.72392H86.7113C86.8226 4.8455 87.3791 4.39212 88.3807 4.39212C88.9371 4.39212 89.3267 4.5338 89.5771 4.78883C89.8136 5.04385 89.9388 5.4689 89.9388 6.06396V6.60235H88.8954C87.8381 6.60235 86.9756 6.78653 86.2801 7.1549C85.5845 7.52328 85.2506 8.10417 85.2506 8.89758C85.2506 9.63433 85.4732 10.1727 85.9184 10.5411C86.3635 10.9095 86.9478 11.0795 87.6712 11.0795ZM93.8111 13.5306H94.9796L99 3.54203H97.8175L95.8004 8.85508L93.5746 3.54203H92.3365L95.1883 10.1869L93.8111 13.5306Z" fill="#0C0C0C"/>
					</svg>

				</a>
				<a href="<?php the_field('vk','option');?>" target="_blank" class="menu_block_bottom_social_item flex">
					<svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M13.7703 5.08628C14.301 5.5441 14.8612 5.97485 15.3372 6.47885C15.5475 6.70281 15.7466 6.93393 15.8989 7.19385C16.1147 7.56333 15.9192 7.96993 15.5442 7.99199L13.2133 7.99106C12.6121 8.03514 12.1325 7.8213 11.7293 7.45813C11.4066 7.1677 11.1077 6.85859 10.7974 6.55836C10.6702 6.43565 10.537 6.32018 10.3779 6.22891C10.0597 6.04643 9.78353 6.1023 9.60169 6.39552C9.41649 6.69376 9.37448 7.02399 9.3563 7.35637C9.33132 7.84132 9.16542 7.96881 8.61407 7.99101C7.43578 8.04011 6.31753 7.88261 5.2787 7.35743C4.36284 6.89445 3.65263 6.24085 3.03447 5.50091C1.83089 4.06008 0.909193 2.47685 0.0808054 0.849256C-0.105658 0.482559 0.0307068 0.285717 0.488638 0.27875C1.24905 0.265699 2.00936 0.266628 2.77067 0.277821C3.07973 0.281816 3.28433 0.438434 3.40366 0.6964C3.81507 1.59018 4.31847 2.44052 4.95036 3.22873C5.11863 3.43857 5.29022 3.64842 5.53456 3.79612C5.80487 3.95966 6.01068 3.90546 6.13784 3.63941C6.21854 3.47072 6.25386 3.28902 6.27205 3.10834C6.3323 2.48674 6.34024 1.86621 6.23457 1.2468C6.1697 0.860218 5.92326 0.609962 5.48667 0.536809C5.26388 0.499512 5.29705 0.426265 5.40492 0.313911C5.59228 0.120134 5.76849 -0.000488281 6.11976 -0.000488281H8.75406C9.16878 0.0718294 9.26088 0.236437 9.31766 0.605132L9.31992 3.1905C9.3154 3.33323 9.40061 3.75678 9.69158 3.85125C9.92447 3.91851 10.078 3.7539 10.2177 3.62343C10.8484 3.03198 11.2986 2.333 11.7007 1.60922C11.8792 1.29097 12.0327 0.96045 12.1814 0.630213C12.2916 0.38516 12.4645 0.264584 12.7769 0.269925L15.3122 0.271922C15.3874 0.271922 15.4635 0.272898 15.5363 0.283906C15.9635 0.348235 16.0806 0.510613 15.9486 0.879215C15.7407 1.45752 15.3362 1.93946 14.9407 2.42362C14.5179 2.94053 14.0657 3.43974 13.6464 3.95971C13.2611 4.43453 13.2917 4.67387 13.7703 5.08628Z" fill="#0C0C0C"/>
					</svg>

				</a>
				<a href="<?php the_field('instagram','option');?>" target="_blank" class="menu_block_bottom_social_item flex">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M11.2335 0H4.76649C2.13823 0 0 2.13823 0 4.76649V11.2335C0 13.8618 2.13823 16 4.76649 16H11.2335C13.8618 16 16 13.8618 16 11.2335V4.76649C16 2.13823 13.8617 0 11.2335 0ZM11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8ZM12 5C12.5523 5 13 4.55228 13 4C13 3.44772 12.5523 3 12 3C11.4477 3 11 3.44772 11 4C11 4.55228 11.4477 5 12 5Z" fill="#0C0C0C"/>
					</svg>

				</a>
				<a href="<?php the_field('whatsapp','option');?>" target="_blank" class="menu_block_bottom_social_item flex">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M8.03337 0C10.1645 0.000914574 12.1647 0.826571 13.6687 2.3252C15.1728 3.82377 16.0007 5.81571 16 7.93411C15.9982 12.3056 12.4241 15.8625 8.03343 15.8625H8.03017C6.69686 15.8621 5.3868 15.5291 4.2232 14.8975L0 16L1.13017 11.8916C0.432972 10.6891 0.0662289 9.32526 0.0667429 7.92789C0.0685148 3.55651 3.64234 0 8.03337 0ZM10.3053 8.94355C10.4878 9.00966 11.4664 9.48898 11.6654 9.58806C11.7043 9.60741 11.7406 9.62488 11.7742 9.64107C11.9131 9.70787 12.0069 9.75297 12.0469 9.81943C12.0967 9.902 12.0967 10.2987 11.9308 10.7615C11.7649 11.2242 10.9697 11.6466 10.5872 11.7035C10.2443 11.7545 9.81039 11.7758 9.33347 11.625C9.04439 11.5336 8.67353 11.4118 8.19867 11.2077C6.33288 10.4058 5.07179 8.60605 4.83325 8.26561C4.8165 8.24172 4.8048 8.22501 4.79827 8.21635L4.79666 8.21421C4.69125 8.07422 3.98547 7.13703 3.98547 6.16703C3.98547 5.25444 4.43585 4.77615 4.64318 4.55598C4.65739 4.54089 4.67046 4.52701 4.68216 4.51429C4.86462 4.31595 5.08027 4.2664 5.21296 4.2664C5.3457 4.2664 5.4785 4.26766 5.5945 4.27337C5.6088 4.27409 5.62367 4.27401 5.63904 4.27392C5.75505 4.27327 5.89969 4.27246 6.04233 4.61349C6.09752 4.74543 6.1784 4.9414 6.26361 5.14785C6.43454 5.56198 6.62287 6.01826 6.65605 6.08446C6.70587 6.1836 6.73907 6.29932 6.67273 6.43149C6.66275 6.45136 6.65352 6.47011 6.64471 6.48803C6.59487 6.58931 6.55823 6.66377 6.47364 6.762C6.44038 6.80065 6.406 6.84232 6.37162 6.88397C6.30312 6.96697 6.23464 7.04996 6.17502 7.10909C6.0753 7.20789 5.97159 7.31509 6.0877 7.51337C6.20382 7.71183 6.60336 8.36052 7.19507 8.88577C7.83153 9.45077 8.38458 9.68945 8.66471 9.81034C8.71924 9.83388 8.76343 9.85295 8.79587 9.86909C8.99484 9.96829 9.11096 9.95166 9.22707 9.81955C9.34319 9.68726 9.72479 9.24109 9.85748 9.0428C9.9901 8.84446 10.1229 8.87754 10.3053 8.94355Z" fill="#0C0C0C"/>
					</svg>

				</a>
			</div>
		</div>
		

		
	</header><!-- #masthead -->
	<header id="mobile__header" class="container menu_block">
			<div class="mobile__header_main flex">
				<div class="hamburger flex">
					<img width="20" height="14"  src="<?php echo get_template_directory_uri()?>/image/burger_open.svg" alt="">
					<img width="14" height="14" loading="lazy" src="<?php echo get_template_directory_uri()?>/image/burger_close.svg" alt="" style="display: none;">
				</div>
				<a href="/" class="menu_block_top_logo flex">
						<img width="188" height="22" loading="lazy" src="<?php echo get_template_directory_uri()?>/image/logo.svg" alt="СитиМобил">
				</a>
				<a href="/" class="mobile__header_main_tel flex">
						<img width="30" height="30"  src="<?php echo get_template_directory_uri()?>/image/tel__icon.svg" alt="">
				</a>
			</div>
			<div class="mobile__header__menu white-back">
					<div class="mobile__header__menu__item mobile__header__menu__region flex">
					</div>
					<div class="mobile__header__menu__item mobile__header__menu__mainmenu">
					</div>
					<div class="mobile__header__menu__item mobile__header__menu__apps flex">
					</div>
					<div class="mobile__header__menu__item mobile__header__menu__social ">
						<div class="mobile__header__menu__social_phone flex">
						</div>
						<div class="mobile__header__menu__social__ flex">
						</div>
					</div>
			</div>
	</header>
</div>

<div id="page" class="container">
	

<?php if( !is_front_page() ){
	if(function_exists('bcn_display'))
{?>
	<div class="container breadcrumb flex">
<?php bcn_display();?>
</div>
<?php }
}?>

