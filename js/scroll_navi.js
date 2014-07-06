/* 
    Name: ScrollNavi.js
    Author: senthilkumar
    Website: http://senthildesigner.co.nr/
    mail: senthil2rajan@gmail.com
    MODIFIED on 20140526 
*/


(function ( $ ) {

    $.fn.scroll_navi = function(options) {
        
        var defaults = {
            speed        : 1000
        };
        
        var settings = $.extend( {}, defaults, options );
        var Title_bar_height = $("#title_bar").position().top;
        Title_bar_height = Title_bar_height+67.666;


        return this.each( function() {
            var win = $( window );
            var elem = $( this );
            var elem_a = "#"+elem.attr("id")+" a";
            var wh = win.height();
            wh=wh+50;
            elem.css("top",wh+"px");
            
            $(elem_a).click(function(event){
                var link_outerpage = $(this).attr("data-outerpage");
                if(link_outerpage=='true')
                {
                    console.log("this is outerpage link");  
                }
                else{
                    event.preventDefault();
                    var link_add = $(this).attr("href");
                    var pos = $(link_add).offset().top;
                    $('html, body').animate({scrollTop: pos}, settings.speed);
                }
            });
            
            $(elem).css({"position":"absolute","top":Title_bar_height+"px"});


            win.scroll(function() {
                var topvalue = win.scrollTop();
                topvalue = topvalue+18.666;
                if(Title_bar_height<=topvalue)
                {
                    $(elem).css({"position":"fixed","top":"0px"});
                    $(elem).css({"background-color":"white"});

                    $('.top_bar_lock').css({"position":"fixed","top":"50px"});
                    $('.indicator').removeClass('onpage').addClass('ontop');
                    $(elem).removeClass('onpage').addClass('ontop');
                }
                else{
                    $(elem).css({"position":"absolute","top":Title_bar_height+"px"});
                    $(elem).css({"background-color":""});
                    $('.top_bar_lock').css({"position":"fixed","top":"-50px"});                    
                    $('.indicator').addClass('onpage').removeClass('ontop');
                    $(elem).addClass('onpage').removeClass('ontop')

                }
            });
            
        });
    };
 
}( jQuery ));


