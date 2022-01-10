<?php
/**
 * Template part for displaying guide of application instalation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package citymobile
 */

?>
<?php
    add_filter('wpseo_metadesc', function($metadesc){
        $number = get_field('contact_number','option','option');
        $city_decr = $GLOBALS['nameForSeo'];
            $metadesc = "Инструкция по установке приложения «Яндекс.Навигатор». По вопросам трудоустройства водителем в {$city_decr} звоните ☎ {$number}";
        return $metadesc;
    }, 10, 1);
    get_header();
?>



<section class="content__ white-back" style="opacity: 1; display: flex; align-items: center; flex-direction: column; padding-bottom: 50px; padding-top: 20px;"><header class="page-header">
    <?php 
    $city_decr = $GLOBALS['nameForSeo'];
    if($city_decr=='Москве'){
        $city_decr = 'Москве и Московской области';
    }
    ?>
<h1 class="page-title" style="padding: 0px 40px">Инструкция по установке приложения «Яндекс.Навигатор» для работы в  <?php echo($city_decr); ?></h1>
</header><video controls="controls" width="300" height="150">
<source src="/wp-content/themes/citymobile/image/Навигатор.mp4" type="video/mp4" />
</video>
<a style="text-align: center; display: block; width: 100%; margin-top: 40px; font-size: 18px;" href="https://drive.google.com/uc?export=download&amp;id=1it4vcSQDT0d-8DdvAUH7Hm70N67kyuwG" target="blank" rel="nofollow noopener">Скачать Яндекс Навигатор</a>

</section>

<?php get_footer();