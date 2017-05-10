/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


+function ($) {
        $('.modal').insertAfter($('body'));
        var $ = jQuery.noConflict();
        $(window).scroll(function(){
            var scroll = $(this).scrollTop();
            $('.banner-wrapper').css({'background-position':'0px '+scroll/2+'px'});
            //console.log(scroll/1.5);
        });   
    
}(jQuery);