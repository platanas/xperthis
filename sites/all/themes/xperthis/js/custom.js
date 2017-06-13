/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


+function ($) {
        
        var $ = jQuery.noConflict();
        
        
        $(window).scroll(function(){
            var scroll = $(this).scrollTop();
            $('.banner-wrapper').css({'background-position':'0px '+scroll/2+'px'});
            $('#block-views-webform-block').css({'background-position':'0px '+scroll/2+'px'});
            //console.log(scroll/1.5);
        });
        
        setTimeout(function(){
            $('li:has(> .categories .active)').addClass("active");
            var partnerHeight = $(".row-partner .row").height();
            $('.row-partner').css('max-height', partnerHeight+'px');
            console.log(partnerHeight);
            z=0;
            $('.row-partner').find($('.row')).each(function(){
                $(this).find($('.col-lg-3')).each(function(){
                    $(this).css('top', -partnerHeight*z+'px');
                    console.log(z);
                });
                    z++;
            });
            // Define a random integer function
            function random(n) {
                return Math.floor((Math.random() * n));
            }

            // Define some variables, hide all images and show just one of them.
            var transition_time = 500;
            var waiting_time = 500;
            var images = $('#block-views-partner-block div.views-field-field-image img');
            
            var row = $('#block-views-partner-block div.row .col-1');
            var n = images.length;
            var x = row.length;
            console.log(n);
            console.log(x);
            var current = random(n);
            var currentRow = random(x);
            console.log(current);
            row.eq(0).children('img').show();
            images.eq(current).show();
            images.eq(current).hide();

            // Periodically, we fadeOut the current image and fadeIn a random one
            var interval_id = setInterval(function () {
            console.log(current);
                var currentClass = images.eq(current).parent().parent().parent().attr('class');
                var ok = false;
                var currentKeep = current;
                var bloc = $('#block-views-partner-block div.row .'+currentClass);
                //var currentClass = bloc.length;
                var currentClassCol = random(currentClass);
                console.log(currentClass);
                
                images.eq(current).fadeOut(transition_time, function () {
                    var currentClassCol = random(currentClass);
                    //console.log('fadeout'+current);
                    //console.log(current);
                    while(ok==false){
                        current = random(n);
                        //console.log(images.eq(current).parent().parent().parent().attr('class'));
                        if (images.eq(current).parent().parent().parent().attr('class')==currentClass && current!=currentKeep){
                            ok=true;
                        }
                    }
                    
                    
                    images.eq(current).fadeIn(transition_time);
                    //console.log(current*currentRow+'okok');
                    //console.log('fadein'+current);
                    ok=false;
                    
                    while(ok==false){
                        current = random(n);
                        if (images.eq(current).css('opacity')==1){
                            ok=true;
                            console.log('okok');
                        }
                    }
                    currentRow = random(x);
                    
                });
            }, 4 * transition_time + waiting_time);

            // You can then stop the effect with:
            //clearInterval(interval_id);
        });
    
}(jQuery);