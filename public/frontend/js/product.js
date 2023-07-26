


$(document).ready(function(){

       $('#slider-detail').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '#slider-thumbnail',
        autoplay: false,
        fade: true,
        dots:false,
        focusOnSelect: true,
        autoplaySpeed: 5000,
        speed: 800,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    dots:true,

                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    dots:true,

                }
            }
        ]

    });
      $('#slider-thumbnail').slick({
       arrows: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '#slider-detail',
        autoplaySpeed: 5000,
        speed: 800,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,

                }
            }
        ]});
    if($(window).innerWidth() > 1024){
        $("#slider-detail .slick-active img").elevateZoom({
          
zoomType: 'lens',
    lensShape: 'round',
    lensSize: 200       
     });
    }
    $('#slider-detail').on('afterChange', function(event, slick, currentSlide){
        var currentSlide = $('.slider-for').slick('slickCurrentSlide');
        var img_src = $("#slider-detail .slick-active img").attr("src");
        if($(window).innerWidth() > 1024){
            $(".zoomContainer").remove();
            $("#slider-detail .slick-active img").elevateZoom({
               
zoomType: 'lens',
    lensShape: 'round',
    lensSize: 200            });
        }else{
            $(".zoomContainer").remove();
        }
    });
    $(window).resize(function(){
        if($(window).innerWidth() > 1024){
            $(".zoomContainer").remove();
            $("#slider-detail .slick-active img").elevateZoom({
                
zoomType: 'lens',
    lensShape: 'round',
    lensSize: 200            });
        }else{
            $(".zoomContainer").remove();
        }
    });
});

$(document).ready(function(){
    $('.mystar').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 500);
    return false;
});


    
    $('#feature_prod').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true
    });
    $('#op_slider').slick({
        slidesToShow:4,
        slidesToScroll: 4,
        autoplay: false,
        autoplaySpeed: 5000,
        speed:1000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });

    
 

});



$(document).ready(function () {

    $("[data-fancybox]").fancybox({
        protect: !0,
        loop: !0,
        buttons: ["zoom", "thumbs", "close"]
    }),
    $(".fancybox-media").fancybox({
        youtube: {
            controls: 1,
            showinfo: 1
        }
    })
}),

$(document).ready(function (e) {

    $(".choose-quantity .quantity").keydown(function (e) {
        checknuber(e);
        if (e.keyCode == 38) {
            var $value = $(this).val();
            if ($value == "") {
                $(this).val(1);
            }
            $value = parseInt($value) + 1;
            $(this).val($value);
        }
        if (e.keyCode == 40) {
            var $value = parseInt($(this).val());
            if ($value == "") {
                $(this).val(1);
            }
            if (parseInt($value) > 1) {
                $value = parseInt($value) - 1;
                $(this).val($value);
            }
        }

    });
    $(".choose-quantity .q-prev").click(function () {
        var $value = parseInt($(this).parents(".choose-quantity").find(".quantity").val());
        if (parseInt($value) > 1) {
            $value = parseInt($value) - 1;
            $(this).parents(".choose-quantity").find(".quantity").val($value);
        }
    });
    $(".choose-quantity .q-next").click(function () {
        var $value = parseInt($(this).parents(".choose-quantity").find(".quantity").val());
        $value = parseInt($value) + 1;
        $(this).parents(".choose-quantity").find(".quantity").val($value);
    });
    $(".choose-quantity .quantity").blur(function () {
        var $value = $(this).val();
        if ($value == "") {
            $(this).val(1);
        }
    });

    function checknuber(e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode < 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    };

});