
	$('.main_slider').slick({
	  dots: false,
	  infinite: true,
    //   autoplay: true,
    //   autoplaySpeed:5000,
	  speed: 300,
	  arrows:false,
	  slidesToShow: 1,
	  cssEase: 'linear',
	  slidesToScroll: 1,
	});
document.addEventListener('DOMContentLoaded', () => {

    if ($('.main_slider_item').length <2){
        $('.main_slider_item__content__btns_slider').css({
            'opacity':'0',
            // 'pointer-events':'none'
        })
        $('.main_slider_item__content').css('align-items','flex-start')
    }
    if (window.innerWidth<560 && $('.main_slider_item').length <2){
        $('.main_slider_item__content__btns_slider').css('display','none')
    }


    $('.main_slider_item').attr('style','display:grid!important;')
    $('.main_next').click(function () { 
        $('.main_slider').slick('slickNext')
    });
    $('.main_prev').click(function () { 
        $('.main_slider').slick('slickPrev')
    });

    // это мб нало будет убрать
    jQuery.event.special.touchstart = {
        setup: function( _, ns, handle ) {
            this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
        }
    };
    jQuery.event.special.touchmove = {
        setup: function( _, ns, handle ) {
            this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
        }
    };
    jQuery.event.special.wheel = {
        setup: function( _, ns, handle ){
            this.addEventListener("wheel", handle, { passive: true });
        }
    };
    jQuery.event.special.mousewheel = {
        setup: function( _, ns, handle ){
            this.addEventListener("mousewheel", handle, { passive: true });
        }
    };





    var modal_form = $('.feed_back_form');
    if(modal_form.length>1){modal_form = $(modal_form[0])}
    modal_form.clone().appendTo('.popup_feedback')
    $(document).on("submit", ".feedback_bottom", function(e) {
        var isModal = false;
        if ($(this).parent().parent().attr('class') == 'popup_feedback popup'){
            isModal = true;
        };
        e.preventDefault();
        // $(this).attr('action','/wp-content/themes/citymobile/mail.php')
        $(this).attr('action','/wp-content/themes/citymobile/phpmailer/mail.php')
    let m_method = $(this).attr('method');
    let m_action = $(this).attr('action');
    let m_data = $(this).serialize();
    $.ajax({
        type: m_method,
        url: m_action,
        data: m_data,
        dataType: 'JSON',
        resetForm: 'true',
        beforeSend: function( xhr ) {
            $('.form_input button').text('отправляем...')
        },
        success: function(response) {
            // console.log(response)
            // Для метрики отслеживание отправки формы из футера или из модалки
            if(isModal==false){ym(85906957,'reachGoal','order-form-submit');
            }else if(isModal==true){ym(85906957,'reachGoal','callback-form-submit');};
            
            $('.form_input button').text('Отправить заявку')
            $('.thank_for_callback').css('display', 'flex');
            modalClose()
            setTimeout(function() {
                $('.thank_for_callback').fadeOut('slow');
                $(".feedback_bottom").trigger("reset");
                $('.feedback_bottom input:not([type="checkbox"])').val('')
            }, 4000);
        },
        error: function (jqXHR, exception) {
            console.log(jqXHR);
            console.log(exception);
        if (jqXHR.status === 0) {
            alert('Произошла ошибка: Not connect. Verify Network.');
        } else if (jqXHR.status == 404) {
            alert('Произошла ошибка: Requested page not found (404).');
        } else if (jqXHR.status == 500) {
            alert('Произошла ошибка: Internal Server Error (500).');
        } else if (exception === 'parsererror') {
            alert('Произошла ошибка: Requested JSON parse failed.');
        } else if (exception === 'timeout') {
            alert('Произошла ошибка: Time out error.');
        } else if (exception === 'abort') {
            alert('Произошла ошибка: Ajax request aborted.');
        } else {
            alert('Произошла ошибка: Uncaught Error. ' + jqXHR.responseText);
        }
        }
    });
    });
    

    $('.form_input input:not([type="checkbox"])').focus(function(e){
	var $self = $(this);
	$self.data('placeholder-tmp', $self.attr('placeholder'));
	$self.attr('placeholder', '');
    
    });

    $('.form_input input:not([type="checkbox"])').blur(function(e){
        var $self = $(this);
    
        $self.attr('placeholder', $self.data('placeholder-tmp'));
    });

    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = "/wp-content/themes/citymobile/js/jquery.maskedinput.min.js";
    setTimeout(() => {
        $ ("head").append(s);
       $('input[type="tel"]').mask('+7 (999) 999-9999');
    }, 2200);

        


  


    function scrollItem(selector){//мб надо будет убрать, если влияет на быстродействие
        var elem = $(selector);

        elem.each(function(index, el) {
            var el_top = $(el).offset().top;
            var window_top = $(window).scrollTop();
            var raznica = el_top - window_top ;
            if (raznica < window.innerHeight/1.5){
                $(el).css('opacity','1');
            } else {
                $(el).css('opacity','0.2');
            }
        });
    }

    
    function renameElement($element,newElement){

      $element.wrap("<"+newElement+">");
      $newElement = $element.parent();

        //Copying Attributes
        $.each($element.prop('attributes'), function() {
      $newElement.attr(this.name,this.value);
      });

      $element.contents().unwrap();

      return $newElement;
    }

    var currentTabStateCityBlock = false;
    $(window).scroll(function() {  
        
        scrollItem('section,.feed_back_form ')  
        if ($('.offices').length){
            if (($('.offices').offset().top - $(window).scrollTop())<500){
                if (!currentTabStateCityBlock){
                    renameElement($('a.yandex_map_fake[data-cityname="'+current_uri+'"]'),'iframe')
                    currentTabStateCityBlock = true
                }

                if ($('.offices__tabs__name[data-cityname="'+current_uri+'"]').length ){
                    
                    $('.offices__tabs__name[data-cityname="'+current_uri+'"]').trigger('click')
                }
            }
        }
    })
    
    scrollItem('section')//Загрузка айфрейма с картой - когда доскролим.
    if ($('.offices').length){
        if (($('.offices').offset().top - $(window).scrollTop())<500){

            if (!currentTabStateCityBlock){
                    renameElement($('a.yandex_map_fake[data-cityname="'+current_uri+'"]'),'iframe')
                }

            if ($('.offices__tabs__name[data-cityname="'+current_uri+'"]').length && !$('.offices__tabs__name[data-cityname="'+current_uri+'"]').hasClass('active') ){ //активация нужного таба на карте
                $('.offices__tabs__name[data-cityname="'+current_uri+'"]').trigger('click')
                console.log('типа клик' + currentTabStateCityBlock)
            }
        }
    }
 
   
    
    

   
    $('.offices__tabs__seemore').click(function () { 
        $(this).toggleClass('active')
        $('.offices__tabs').toggleClass('active')
    });
    $('.offices__tabs__name').click(function () { 
        let tabname = $(this).data('cityname')
        let indexEl = $('.offices__tabs__name').index($('.offices__tabs__name.active'));
        if (indexEl<1){
            // $(this).fadeOut(50)
            // setTimeout(() => {
                $(this).prependTo('.offices__tabs').fadeIn('slow')
            // }, 50);
        }
        if (!$(this).hasClass('active')){
            $('.offices__tabs__name.active').removeClass('active')
            $(this).addClass('active')
            $('.offices__tab.active').removeClass('active')
            $('.offices__tab[data-cityname="'+tabname+'"]').fadeIn().addClass('active')
            if ($('.yandex_map_fake[data-cityname="'+tabname+'"]').is( "a" )){
                renameElement($('a.yandex_map_fake[data-cityname="'+tabname+'"]'),'iframe')
            }
            $('.offices__tabs.active').removeClass('active')
            $('.offices__tabs__seemore.active').removeClass('active')
            
        }
        
    });





    // выбо региона PC
    $('header .current_city').one('click',function () { 
        if ($('header .choose__region__list .choose__region__list_template').length<1){
            $('body>.choose__region__list_template.pc_ver').clone().appendTo('header .choose__region__list')
        }
    });
    $('header  .current_city').one('mouseover',function () { 
        if ($('header .choose__region__list .choose__region__list_template').length<1){
            $('body>.choose__region__list_template.pc_ver').clone().appendTo('header .choose__region__list')
        }
    });
    $('footer .current_city').one('click',function () { 
        if ($('footer .choose__region__list .choose__region__list_template').length<1){
            $('body>.choose__region__list_template.pc_ver').clone().appendTo('footer .choose__region__list')
        }
    });
    $('footer  .current_city').one('mouseover',function () { 
        if ($('footer .choose__region__list .choose__region__list_template').length<1){
            $('body>.choose__region__list_template.pc_ver').clone().appendTo('footer .choose__region__list')
        }
    });



    function moveMenuItems(){
        $('header .choose__region').clone().appendTo('.mobile__header__menu__region')

        $('#header_menu').clone().appendTo('.mobile__header__menu__mainmenu')

        $('header .menu_block_bottom_social_item:nth-child(-n+1)').clone().appendTo('.mobile__header__menu__apps')
        // $('.menu_block_bottom_social_item').eq(1).clone().appendTo('.mobile__header__menu__apps')


        $('header .menu_block_top_contacts_phone').clone().appendTo('.mobile__header__menu__social_phone')

        $('header .menu_block_bottom_social_item:nth-child(n+2)').clone().appendTo('.mobile__header__menu__social__')
        // метрика для телефонов и обратной связи в мобилке
        if (document.documentElement.clientWidth < 600){	
				var mobile_tels = document.querySelectorAll(".mobile__header__menu__social_phone.flex .menu_block_top_contacts_phone ._regular");
                var obr_mass = document.querySelectorAll('a[href="#contact_us"]');
                obr_mass.forEach(element => element.onclick=function(){ym(85906957,'reachGoal','callback-btn-click')});
				mobile_tels[0].onclick = function(){
					ym(85906957,'reachGoal','telnum-click-header')
				};
				mobile_tels[1].onclick = function(){
					ym(85906957,'reachGoal','telnum-click-footer')
				};
			}
    }
            function closeMenu(){
            if ($('.hamburger').hasClass('active')){
                $('.hamburger').find('img').toggle(350)
            }
            $('.hamburger').removeClass('active')
            $('.mobile__header__menu').removeClass('active')
            $('#page').css('filter', 'unset')
            $('footer').css('filter', 'unset')
            $('body').css('overflow-y', 'scroll')
        }
    if (window.innerWidth<800){
        function openMenu(){
            $('.hamburger').find('img').toggle(350)
            $('.hamburger').addClass('active')
            $('.mobile__header__menu').toggleClass('active')
            $('#page').css('filter', 'blur(2px)')
            $('body').css('overflow-y', 'hidden')
            $('footer').css('filter', 'blur(2px)')
        }


        $('.hamburger').click(function () { 
            
            if ($(this).hasClass('active')){
                closeMenu()

            } else {
                openMenu()
                $('#page').bind('click',function () { 
                    closeMenu();
                   $('#page').unbind()
                });
                $('footer').bind('click',function () { 
                    closeMenu();
                   $('footer').unbind()
                });
            }
        });

        $('.rent_a_car__img').insertAfter('.rent_a_car__text')
        $('.offices__tabs__seemore').insertAfter('.offices__tabs')
        $('.rent_a_car__img').eq(1).remove()


        setTimeout(() => {// клонируем элементы из пк версии сайта
              moveMenuItems()
           
        }, 500);

    }

     if (window.innerWidth<600){
        $('footer .container:not(.footer__copyright) div').remove();//удаляем ПК меню. 
        $('.mobile__header__menu ').clone().appendTo('footer .footer_block');//копируем созданное меню выше в футер.
        $('#mobile__header .menu_block_top_logo').clone().prependTo('footer .mobile__header__menu__region');
     }

    


    //  модалка 
    function modalOpen(selector) { 
        $('.overlay').fadeIn();
        $(selector).fadeIn();
          $('body').css('overflow-y', 'hidden')
    }
    function modalClose(selector) {
        $('.overlay').fadeOut();
        $('.popup').fadeOut();
        $('body').css('overflow-y', 'scroll');
         closeMenu();
    }




    $('.popup_feedback input,.popup_feedback label').each(function (index, element) {
       $(element).prop('id',$(element).prop('id')+'clone'  )
        if ($(element).is('label')){
            $(element).prop('for',$(element).prop('for')+'clone')
        }
    });

    
   if (window.innerWidth<690){//модалка для гео
        $('.choose__region__list_template.mob_ver').appendTo('.popup_geo')
        $('body').on('click','.current_city',function (e) { 
            modalOpen($('.popup_geo'));
        });
   }

    
    $('.overlay,.popup_close').click(function () { 
        modalClose();
        
    });

    $('a[href="#contact_us"],.mobile__header_main_tel ').click(function (e) { 
        ym(85906957,'reachGoal','callback-btn-click');
        e.preventDefault();
        modalOpen($('.popup_feedback'));
    });

   
   if (window.location.pathname == '/kontakty/'){
         $('.offices__tabs__name[data-cityname="'+current_uri+'"]').trigger('click')
    }







        // var jivosite = document.createElement("script");
        // jivosite.type = "text/javascript";
        // jivosite.src = "//code-ya.jivosite.com/widget/KgrTtSeVHC";
        // setTimeout(() => {
        // $("footer").append(jivosite);
        // }, 12000);

});

  


