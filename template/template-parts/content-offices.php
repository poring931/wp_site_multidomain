<?php
$offices = get_field('город','option');
//var_dump($offices);
?>

<section class="offices  white-back">
    <div class="offices__head flex">
        <?php if (is_front_page()):?>
        <h2 class="why_block_title _bold ">
            Офисы такси <span>Ситимобил</span>
        </h2>
        <?php else:?>
        <h1 class="why_block_title _bold " style="margin-bottom:0">
            Офисы такси <span>Ситимобил</span> в <?php echo($GLOBALS['nameForSeo'])?>
        </h1>
        <?php endif;?>
        <div class="offices__tabs__seemore">
            <span class="flex _medium">Все города</span>
            <img class="flex" loading="lazy" width='8' height="5" src="/wp-content/themes/citymobile/image/black_arrow__icon.svg" alt="">
        </div>
    </div>
   

    <div class="offices__tabs">

      <?php $count=0;  foreach ($offices as $city_name): $count++;?>
            <span  class="offices__tabs__name _bold <?php echo ($count== 1) ? 'active':'';?>" data-cityname="<?php echo trim($city_name['название_города']);?>">
                    <?php echo trim($city_name['название_города']);?>
            </span>
        <?php endforeach;?>
     
    </div>
    
    <div class="offices__tab__wrapper">
        <?php $count=0; foreach ($offices as $city_name): $count++;?>
        <div class="offices__tab <?php echo ($count== 1) ? 'active':'';?>" data-cityname="<?php echo trim($city_name['название_города']);?>">
            <div class="offices__tab__content" >
                <?php if (!empty($city_name['заголовок_карты'])):?>
                <div class="offices__tab__content__title _bold">
                        <?php echo $city_name['заголовок_карты'];?>
                </div>
                <?php endif;?>

                <?php if (!empty($city_name['режим_работы'])):?>
                <div class="offices__tab__content__works _regular">
                        <?php echo $city_name['режим_работы'];?>
                </div>
                <?php endif;?>
                <?php if (!empty($city_name['адрес'])):?>
                <div class="offices__tab__content__address _bold">
                        <?php echo $city_name['адрес'];?>
                </div>
                <?php endif;?>
                <?php if (!empty($city_name['номера_телефонов'])):?>
                <div class="offices__tab__content__phones _bold">
                    <?php foreach ($city_name['номера_телефонов'] as $phone):?>
                    
                        <a href="tel:<?php echo  str_replace([' ', '(', ')', '-'],'',$phone["номер_телефона"]) ?>"><?php echo $phone["номер_телефона"];?></a>
                <?php    endforeach;?>
                    </div>
                <?php endif;?>
            </div>
            <div class="offices_tab__map">
                    <?php if (!empty($city_name['карта_офиса'])):?>
                  
                        <a data-cityname="<?php echo trim($city_name['название_города']);?>" class="yandex_map_fake" src='<?php echo $city_name['карта_офиса'];?>' loading="lazy" width='600' height='400' class="offices__tab__content__title" frameborder="0">
                        </a>
                    <?php endif;?>
            </div>
         </div>
        <?php endforeach;?>
    </div>


</section>


