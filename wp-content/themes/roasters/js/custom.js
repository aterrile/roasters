$(document).ready(function(){
    
    $("#para-comer a[data-toggle=collapse]").click(function(){
        $("#para-comer").find('.collapse.in').collapse('hide');
    })
    
    $('#carta .collapse').on("shown.bs.collapse", function(){
        div_id = $(this).attr('id');         
        $('html, body').stop().animate({
            scrollTop: ($('#' + div_id).offset().top - 50)
        }, 0);
    });
    
    
    $("#vimeo .close").click(function(){        
        $(".video-overlay, #vimeo").fadeOut(500);
        $("#vimeo .inner").html('');
    })
    $("#brewing .video").click(function(e){
        var vimeo;
        e.preventDefault();
        vimeo = $(this).parent().attr('href');
        if( vimeo !== undefined ){
            arr_url = vimeo.split("/");
            id_video = arr_url[( arr_url.length -1 )];
            $("#vimeo .inner").html('<iframe src="https://player.vimeo.com/video/'+id_video+'?autoplay=1&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
            $(".video-overlay, #vimeo").fadeIn(500);
        }
    })
    
    /** PRODUCTOS **/  
    $(".product_item").each(function(){
        $(this).attr('data-original-content', $(this).find('a.overlay').html() );
    })
    $(".product_item").hover(function(){             
        $(this).find('a.overlay').stop().fadeIn(200);        
    }, function(){        
        $(this).find('a.overlay').stop().fadeOut(200);
        $(this).find('a.overlay').html( $(this).data('original-content') );       
    })
    
    $(document).on('click','.overlay .plus', function(){        
        this_overlay = $(this).parent('.overlay');
        img_url = this_overlay.data('graph');        
        this_overlay.html('<img src="'+img_url+'" class="mas_info" />');
    })
    
    $('.home_bottom').innerfade({
    	speed: 2300,
    	timeout: 5000,
    	containerheight: '191px'	
    });
    
    $("header .tag").click(function(){
        $(this).toggleClass('visible');
    })
    
    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.scrollTo').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250);
        event.preventDefault();
    });
    
    
    $("a.marker").click(function(e){
        e.preventDefault();
    })
    $("a.marker").hover(function(){        
        identificador = $(this).attr('href');
        coords = $(this).position();        
        $(".tooltips .item" + identificador).show();
        $(".tooltips .item" + identificador).css({
            top : (coords.top),
            left : (coords.left)
        })
        
    }, function(){
        $(".tooltips .item" + identificador).hide();
    })  
    
    $("a[href='#']").click(function(e){
        e.preventDefault();
    })
    
          
});
