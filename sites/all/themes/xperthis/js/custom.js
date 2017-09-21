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
            //Partner slider
            var partnerHeight = $(".row-partner .row").height();
            $('.row-partner').css('max-height', partnerHeight+'px');
            z=0;
            $('.row-partner').find($('.row')).each(function(){
                $(this).find($('.col-lg-3')).each(function(){
                    $(this).css('top', -partnerHeight*z+'px');
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
            //console.log(n);
            //console.log(x);
            var current = random(n);
            var currentRow = random(x);
            //console.log(current);
            row.eq(0).children('img').show();
            images.eq(current).show();
            images.eq(current).hide();

            // Periodically, we fadeOut the current image and fadeIn a random one
            var interval_id = setInterval(function () {
            //console.log(current);
                var currentClass = images.eq(current).parent().parent().parent().attr('class');
                var ok = false;
                var currentKeep = current;
                var bloc = $('#block-views-partner-block div.row .'+currentClass);
                //var currentClass = bloc.length;
                var currentClassCol = random(currentClass);
                //console.log(currentClass);
                
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
                            }
                        }
                        currentRow = random(x);

                    });
                }, 4000);

                // You can then stop the effect with:
                //clearInterval(interval_id);
            }, 3000);
            
            
        $(document).ready(function () {
            $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
            $("#edit-email").attr("placeholder", "E-mail").placeholder();
            });
            
            $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
              $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });
            
            $(".date-month .date-display-single").each(function() {
                       //console.log('ok');
               if ($(this).text().length == 3){
                   $(this).text($(this).text()+'.');
               }
            });
            
            // Whole icon product homepage clickable
            $(".homepage-icons-bg").click(function() {
                window.location = $(this).find('.views-field-field-hompage-icon').find('.field-content').find("a").attr("href"); 
                return false;
            });
            
            $(".pixel-overlay").hover(
                function() {
                  $( this ).addClass( "no-overlay" );
                }, function() {
                  $( this ).removeClass( "no-overlay" );
                }
            );
    
            if ($('li .categories').hasClass('active')) {
                $('li .categories.active a').addClass("active");
            } else {            
                $('li.all .categories a').addClass("active");
                $('li.all').addClass("active");
            }
            
                $("#block-views-news-block-4").cornerSlider({
                    showAtScrollingHeight : 1500,
                    directionEffect       : "right",
                    speedEffect           : 300,
                    right                 : 20,
                    bottom                : 200,
                    cookieMinutesToExpiry : 15,
                    //onClose               : function() {
                    //alert("Not to be seen again in the near future.");
                    //},
                });
            
            // Track submission events.
            if ($('.block-e-book-download .webform-client-form').length) {
                $('.block-e-book-download .webform-client-form').submit(function() {
                    ga('send','event','Whitepaper','Download', $("input[name=form_id]").val(), 1);
                });
            }
            
             
            
           
            
            if ($("#block-views-news-block-6").length) {
                if ($(".view-taxonomy-term .view-content .views-row-1").length) {
                    $("#block-views-news-block-6").insertAfter(".view-taxonomy-term .view-content .views-row-1");
                    $("#block-views-news-block-6").css('display', 'block');
                } else {
                    $("#block-views-news-block-6").insertAfter(".view-taxonomy-term .view-content .row article:nth-child(3)");
                    $("#block-views-news-block-6").css('display', 'block');
                }
            }
            //$(".webform-confirmation").insertAfter(".col-sm-8 .page-header");
            //$(".webform-confirmation").css('display', 'block');
            
            //console.log($('.date-month .date-display-single').text().length); 
            
            
        });
    
}(jQuery);