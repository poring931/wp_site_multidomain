$(document).ready(function () {
    $('.faq_question').on('click',function(){
        $(this).next('.faq_answer').slideToggle();
        $(this).parent().toggleClass('active');
    });
    $('.faq_question').eq(0).next('.faq_answer').slideToggle();
    $('.faq_question').eq(0).parent().toggleClass('active');
     
      

});