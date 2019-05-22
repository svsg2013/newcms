// Global
    if ($('.select').length) {
        $(".select").chosen({
            no_results_text: "Oops, nothing found!",
            disable_search_threshold: 10
        });
    }

    $('.input-daterange').each(function() {
        var lang = $(this).data('lang'),
            format = $(this).data('format');
        if (typeof lang == "undefined" && !lang) {
            lang = 'en';
        }

        if (typeof format == "undefined" && !format) {
            format = 'dd/mm/yyyy';
        }
        
        $(this).datepicker({
            language: lang,
            format: format,
            templates: {
                leftArrow: '<i class="arrow_triangle-left"></i>',
                rightArrow: '<i class="arrow_triangle-right"></i>',
            },
            weekStart: 1
        });
    });

// Menu
    function menu(){
        var menu = $('.navbar-nav'),
            sub = menu.find('.sub');

        var slide = function(){
                var expand = $('.expand');
                    expand.bind('click', function(){
                        var el = $(this),
                            elContent = el.next('.sub'),
                            elParent = el.parent('li');

                        if(elContent.is(":hidden")) {
                            expand.parent('li').removeClass('showsub');
                            sub.slideUp(200);
                            elParent.addClass('showsub');
                            elContent.slideDown(200);
                        } else {
                            elContent.slideUp(200);
                            elParent.removeClass('showsub');
                        }
                    });
            }

    // constructor ----------

        var constructor = function () {
            sub.each(function(){
                var el = $(this);
                    el.prev('.expand').remove();
                    el.before('<a class="expand"><i class="icon_plus"></i></a>')
            });

            slide();
        };


        // destructor ----------

        var destructor = function () {
            menu.find('.expand').remove();
        };


        // reload ----------

        var reload = function () {

            if ((window.innerWidth < 768)) {
                constructor();
            } else {
                destructor();
            }
        };

        // debouncedresize
        reload();

        $(window).on('debouncedresize', reload);
    }
    menu();

// Search
    function searchBox(){
        var sButton = $('.navbar-search-btn'),
            sForm = $('.navbar-search');
            
            sButton.bind('click', function(e){
                e.preventDefault();
                e.stopPropagation(); 
                if(sForm.hasClass('active')) {
                    sForm.removeClass('active');
                    sButton.removeClass('active');
                } else {
                    sForm.addClass('active');
                    sButton.addClass('active');
                }
            });


            $(document).click(function(){
                if(sForm.hasClass('active')) {
                    sForm.removeClass('active');
                    sButton.removeClass('active');
                }
            });
            sForm.bind('click', function(e){
                e.stopPropagation(); 
            });
    }

    searchBox();

// Banner section
    function homeSlide(){
        var slider = $('.mainslider');
            slider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                dots: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 5000,
            });
        
            slider.find('.layer').each(function(){
                var $t = $(this),
                    rows = $.trim($t.html()).split(' ');                  
                $t.html('');
            
                $.each(rows, function(i, val){
                $('<span class="item"></span>').appendTo($t);
            
                var letters = $.trim(val).split('');
            
                $.each(letters, function(j, v){
                    v = (v == ' ') ? '&nbsp;' : v;
                    $('<span>' + $.trim(v) + '</span>').appendTo($('.item:last', $t));
                });
            
                });
            });

        slider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
            slider.find('.layer').find('span').removeClass('animate');
            ani(nextSlide);
        });

        function ani(number){
            for (i = 0; i < slider.find('.mainslider__item').eq(number).find('.layer span').length; i++) {
                (function(ind) {
                    setTimeout(function(){
                        slider.find('.mainslider__item').eq(number).find('.layer').find('span:not(".item")').eq(ind).addClass('animate');
                    }, ind * 15);
                })(i);
            }
        }

        ani(0);


        function panorama(){
            var navWrap = $('.navProduct'),
                close = navWrap.find('.close'),
                nav = navWrap.find('li'),
                content = $('.panoramaContent'),
                item = content;

                close.bind('click', function(e){
                    var el = $(this);
                        e.preventDefault();
                        navWrap.toggleClass('hide');
                });

                nav.bind('click', function(e){
                    var el = $(this);
                        index = el.index();
                        nav.removeClass('active');
                        el.addClass('active');
                        content.find('.mainslider__item__bg').removeClass('active');
                        content.find('.mainslider__item__bg').eq(index).addClass('active');
                });
        }

        panorama();
            
    }
    homeSlide();

// Highline Section
    function homeHighline(){
        let homeHighline = $('.homeHightline');
        let width = $(window).width();

        function addHead(){
            var item = $('.homeHightline__item');
                item.each(function(){                
                    var el = $(this),
                        thumb = el.data('title'),
                        image = el.data('image'),
                        active = '';
                    if(el.hasClass('active')) {
                        active = ' active';
                    }
                    el.before('<a class="homeHightline__head'+ active +'" style="background-image: url('+ image +')"><span>'+thumb+'</span></a>');
                    $('.homeHightline__head').prev('.homeHightline__head').remove();
                })
        }

        function removeHead(){
            $('.homeHightline__head').remove();
        }

        if(width > 767) {
            removeHead();
            homeHighline.not('.slick-initialized')
            .slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                speed: 200,
                fade: true,
                customPaging : function(slider, i) {
                    var thumb = $(slider.$slides[i]).data('title'),
                        image = $(slider.$slides[i]).data('image');
                    return '<a style="background-image: url('+ image +')"><span>'+thumb+'</span></a>';
                },
            });

            homeHighline.find('.slick-dots li').on('mouseover', function() {
                homeHighline.slick('goTo', $(this).index());
            });
        } else {
            if(homeHighline.is('.slick-initialized')) {
                homeHighline.slick('unslick');
            }
            addHead();
        }

        var expand = $('.homeHightline__head');
            expand.bind('click', function(){
                var el = $(this),
                    elContent = el.next('.homeHightline__item');

                if(elContent.is(":hidden")) {
                    $('.homeHightline__item').slideUp(200);
                    expand.removeClass('active');
                    el.addClass('active');
                    elContent.slideDown(200);
                } else {
                    elContent.slideUp(200);
                    el.removeClass('active');
                }
            });

    }

    homeHighline();

    $(window).on('debouncedresize', homeHighline);

// Products Section
    function homeProducts(){
        var proSlide = $('.homeProducts__slide');

        proSlide.slick({
            prevArrow  : '<a class="arrow arrow--prev" href="#"></a>',
            nextArrow  : '<a class="arrow arrow--next" href="#"></a>',
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            infinite: true,
            centerPadding: '0',
            arrows: true,
            dots: true
        });
    };

    homeProducts();

// Home Partners
    function homePartners(){
                
        $('.homePartner__slide').slick({
            prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 5
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        slidesToShow: 2
                    }
                }
            ]
        });
    }

    homePartners();

// Home News
    function homeNews(){
                
        $('.newsSlide__inner').slick({
            prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    homeNews();

// Product Pages
    function products(){
        var images = $('.product__image');
            images.slick({
                slidesToShow    : 1,
                slidesToScroll  : 1,
                arrows          : true,
                dots            : true,
                centerMode      : true,
                variableWidth   : true,
                prevArrow       : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
                nextArrow       : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
            });

        var area = $('area');
            area.each(function(){
                var el = $(this),
                    text = el.attr('alt');
                    img = el.attr('href');

                    text = '<div class="img"><img src="' + img + '"/></div>' + text;

                    el.qtip({
                    content: {
                        text: text
                    },
                    position: {
                        target: 'mouse',
                        adjust: { x: 5, y: 5 },
                        my: 'bottom center'
                    }
                });  
            }); 

        $('.map').maphilight({
            fill: true,
            fillColor: 'a1cf67',	
            fillOpacity: 0.5,
            stroke: true,
            strokeColor: 'df7d22',
            strokeOpacity: 1,
            strokeWidth: 1,
            fade: false
        });

        if($('.reservation').length) {
            $('body').addClass('productDetail');
        }

        var related = $('.productRelated__content');
            related.slick({
                slidesToShow    : 3,
                slidesToScroll  : 1,
                arrows          : true,
                prevArrow       : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
                nextArrow       : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: true,
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: true,
                            slidesToShow: 1
                        }
                    }
                ]
            });

        var scroll = $('.productBox__footer__info');
            scroll.each(function () {
                var el = $(this),
                    id = el.attr('id');
                if (typeof id !== "undefined" && id) {
                    new SimpleBar($('#' + id)[0]);
                }
            });
            var scroll = $('.faqs__services--customers');
            scroll.each(function () {
                var el = $(this),
                    id = el.attr('id');
                if (typeof id !== "undefined" && id) {
                    new SimpleBar($('#' + id)[0]);
                }
            });
            
        var scroll = $('.faqs__footer__info');
        scroll.each(function () {
            var el = $(this),
                id = el.attr('id');
            if (typeof id !== "undefined" && id) {
                new SimpleBar($('#' + id)[0]);
            }
        });

        var service = $('.product__serviceSlide');
        service.slick({
            prevArrow: '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
            nextArrow: '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
            // slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            centerMode: true,
            variableWidth: true,
            // autoplay: true,
            // autoplaySpeed: 2000,                        
        });
    }

    products();

    $('img[usemap]').rwdImageMaps();

    function imageZoom() {
        var image = $('.imageZoom');

            image.magnifierRentgen();
    }

    imageZoom();

// Contact Page

    function contact(){
        var person = $('.person');
            person.slick({
                prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
                nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1450,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
    }

    contact();

// About Page

    function about(){
        var quality = $('.about__quality');
            quality.slick({
                prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
                nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1450,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });


            $('.timeline__slide').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                adaptiveHeight: true,
                asNavFor: '.timeline__nav'
            });
            $('.timeline__nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.timeline__slide',
                dots: false,
                focusOnSelect: true,
                prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
                nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
                responsive: [
                    {
                        breakpoint: 1450,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

        var team = $('.team'),
            teamClose = team.find('.team__expand__close');

            teamClose.bind('click', function(e){
                var el =  $(this),
                    expand = el.parents('.team__expand');

                    e.preventDefault();
                    expand.stop().slideUp(300);
                    el.parents('.team').removeClass('active');
            });
            team.bind('click', function(){
                var el =  $(this),
                    expand = el.find('.team__expand');

                    if(expand.is(':hidden')) {
                        team.find('.team__expand').stop().slideUp(300).queue(function(next){
                            expand.stop().slideDown(300);
                            next();
                        });
                        team.removeClass('active');
                        el.addClass('active');
                    } else {
                        expand.stop().slideUp(300);
                        el.removeClass('active');
                    }
            });
            team.bind('click mouseenter', function(){
                var el =  $(this),
                    expand = el.find('.team__expand');

                    if(expand.is(':hidden') && ( $(window).innerWidth() > 768)) {
                        team.find('.team__expand').stop().slideUp(300).queue(function(next){
                            expand.stop().slideDown(300);
                            next();
                        });
                        team.removeClass('active');
                        el.addClass('active');
                    }
            });

            team.bind('mouseleave', function(){
                var el =  $(this),
                    expand = el.find('.team__expand');

                    if(!expand.is(':hidden')) {
                        expand.stop().slideUp(300);
                        el.removeClass('active');
                    }
            });

            team.find('.team__expand').bind('click', function(e){
                e.stopPropagation(); 
            });

        var trophy = $('.trophy');
            trophy.slick({
                prevArrow       : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
                nextArrow       : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
                slidesToShow    : 3,
                slidesToScroll  : 1,
                arrows          : true,
                dots            : true,
                centerMode      : true,
                variableWidth   : true,
                responsive      : [
                    {
                        breakpoint  : 1450,
                        settings    : {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint  : 1200,
                        settings    : {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint  : 768,
                        settings    : {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint  : 480,
                        settings    : {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            $('.popup-image').magnificPopup({
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });

            $('.modal').on('shown.bs.modal', function (e) {
                var el = $(this),
                    id = el.attr('id');
                var modalSlide = $('#' + id + ' .modal__slide');
                    modalSlide.slick({
                        prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_left"></i></a>',
                        nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_right"></i></a>',
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        centerMode      : true,
                        variableWidth   : true,
                        autoplay: true,
                        autoplaySpeed: 2000,                        
                    });
            });
            $('.modal').on('hide.bs.modal', function (e) {
                var el = $(this),
                    id = el.attr('id');
                var modalSlide = $('#' + id + ' .modal__slide');
                    modalSlide.slick('unslick');
            });
            
        let scroll = $('.award__content').find('.tab-pane');
        scroll.each(function () {
            var el = $(this),
                id = el.attr('id');
            if (typeof id !== "undefined" && id) {
                new SimpleBar($('#' + id)[0]);
            }
        });
        
    }

    about();

    // Slide News Page
    function slideNewsPage(){
                
        $('.newsPageSlide__inner').slick({
            prevArrow  : '<a class="arrow arrow--prev news-page" href="#"><i class="arrow_left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next news-page" href="#"><i class="arrow_right"></i></a>',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: true,
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    slideNewsPage();

    function imagesLibrary() {
        $('.news-highlights__item__avatar').slick({
            prevArrow  : '<a class="arrow arrow--prev library" href="#"><i class="arrow_left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next library" href="#"><i class="arrow_right"></i></a>',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: true,
            fade: true,
            asNavFor: '.news-highlights__item__wrapper'
        });
        $('.news-highlights__item__wrapper').slick({
            prevArrow  : '<a class="arrow arrow--prev library--small" href="#"><i class="arrow_carrot-left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next library--small" href="#"><i class="arrow_carrot-right"></i></a>',
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
           
            focusOnSelect: true,
            asNavFor: '.news-highlights__item__avatar',
            responsive: [{
                breakpoint: 991,
                settings: {
                    arrows: true,
                    variableWidth: true,
                    slidesToShow: 4
                }
            },{
                breakpoint: 640,
                settings: {
                    arrows: true,
                    slidesToShow: 3
                }
            }
            ,{
                breakpoint: 400,
                settings: {
                    arrows: true,
                    slidesToShow: 2
                }
            }
        ]
        });
    }
    imagesLibrary();

    function imagesLibraryDetail() {
        $('.detail-page__content__big').slick({
            prevArrow  : '<a class="arrow detail-image arrow--prev" href="#"><i class="arrow_carrot-left"></i></a>',
            nextArrow  : '<a class="arrow detail-image arrow--next" href="#"><i class="arrow_carrot-right"></i></a>',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            dots: false,
            asNavFor: '.detail-page__content__small'
        });
        $('.detail-page__content__small').slick({
            prevArrow  : '<a class="arrow arrow--prev detail-image-small" href="#"><i class="arrow_carrot-left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next detail-image-small" href="#"><i class="arrow_carrot-right"></i></a>',
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            focusOnSelect: true,
            asNavFor: '.detail-page__content__big',
            responsive: [{
                breakpoint: 991,
                settings: {
                    arrows: true,
                    slidesToShow: 3
                }
            },{
                breakpoint: 768,
                settings: {
                    arrows: true,
                    slidesToShow: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    slidesToShow: 2
                }
            }]
        });
    }

    // news highlight
    function newsHighlight() {
        var li = $('.faqs__footer__info--news li'),
            liContent = $('.news-highlights__item .image');

        li.hover(function(e) {
            var el = $(this),
                elVal = el.data('value'),
                elContent = $('.image[data-value="'+ elVal +'"]')

                // Reset
                li.removeClass('active');
                liContent.addClass('hidden');

                // Set current
                el.addClass('active');
                elContent.removeClass('hidden');

        });
    }

    newsHighlight();

    imagesLibraryDetail();
    function changeColorForSvgImage() {
        jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');
        
            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');
        
                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }
        
                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');
                
                // Check if the viewport is set, else we gonna set it if we can.
                if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                }
        
                // Replace image with new SVG
                $img.replaceWith($svg);
        
            }, 'xml');
        
        });
    }

    changeColorForSvgImage();

    function newsListSlider(){
                
        $('.news-list-content').slick({
            prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_carrot-left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_carrot-right"></i></a>',
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },{
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        slidesToShow: 2
                    }
                },{
                    breakpoint: 320,
                    settings: {
                        arrows: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    newsListSlider();
    function newsLHCSlider(){
                
        $('.news-list-lhc__content--detail').slick({
            prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_carrot-left"></i></a>',
            nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_carrot-right"></i></a>',
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },{
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        slidesToShow: 2
                    }
                },{
                    breakpoint: 320,
                    settings: {
                        arrows: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    newsLHCSlider();

    function clickSmallFaqs() {
        $(".sub-tab__text__item").bind('click', function() {
            $(".sub-tab__text__item").removeClass('active');
            $(this).addClass('active');
        });
    }
    clickSmallFaqs();

// Go To Element
    function goTo(){
        let linkScroll = $('.goTo');
            linkScroll.bind('click', function(event){
                var el = $(this);
                event.preventDefault();
                var elementTo = $(el.attr('href'));
                $("html, body").animate({ scrollTop: elementTo.offset().top - 50}, 600);
            });
    }

    goTo()

/*  Go to top ------------------------------------------------------------------ */
    function gotoTop(){
        var topTop = $('.backToTop'),
            chat = $('.chat-btn');


        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                topTop.stop().fadeIn(200);
            } else {
                topTop.stop().fadeOut(200);
            }
        });
        topTop.click(function () {
            $('body,html').animate({
                scrollTop: 0 
            }, 500);
            return false;
        });

        $('.footer__copy').waypoint({
            offset: '100%',
            triggerOnce: true,
            handler: function (direction) {
                if (direction == "down") {
                    topTop.addClass('absolute');
                    chat.addClass('top');
                } else if (direction == "up") {
                    topTop.removeClass('absolute');
                    chat.removeClass('top');
                }
            }
        });
    }

    gotoTop();
//Tuyen dung page
function match_height(){
    $('.item_height').matchHeight({ });
}
match_height();
function file_style(){
    $('.inputfile-1').filestyle({
                 //badge: true,
                //input : false,
                buttonBefore: true,
                disabled : false,
                text : 'Chọn file',
				btnClass : 'btn-chosse',
				htmlIcon : '<span class="icon_cloud-upload"></span> '
    });
}
file_style();
function recruitment_slider(){
    $('.recruitment__position_slide').slick({
        infinite: true,
        slidesToShow: 2,
        rows: 2,
        prevArrow  : '<a class="arrow arrow--prev career--slide" href="#"><i class="arrow_carrot-left"></i></a>',
        nextArrow  : '<a class="arrow arrow--next career--slide" href="#"><i class="arrow_carrot-right"></i></a>',
        responsive: [
            {
              breakpoint: 800,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
      });
}
recruitment_slider();
function show_apply(){
    $(".apply_link").click(function(){
        $(".apply_link").hide();
    }); 
    $('.apply__expand__close').click(function(e){
        e.preventDefault();
        $('.collapse').collapse('hide');
        $(".apply_link").show();
    });
}
show_apply();

// event slider
function eventSlider() {
    $('.event-highlights__content').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 991,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        },{
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }]
    });
}
eventSlider();
// e-brochure page
function brochure_page(){
    $("#mybook").wowBook({ 
        width  : 1032 ,height : 756
        ,hardcovers : true
        ,turnPageDuration : 1000
        ,controls : {
            next      : '#next__page',
            back      : '#back__page'
        },
        flipSound:false,
        pages:false,
        scaleToFit: "#fix-scale"
    }).css({'display':'none', 'margin':'auto'}).fadeIn(1000);;
    
    
    $('.news__slider').slick({
        infinite: true,
        slidesToShow: 5,
        prevArrow  : '<a class="arrow arrow--prev news--slide" href="#"><i class="arrow_carrot-left"></i></a>',
        nextArrow  : '<a class="arrow arrow--next news--slide" href="#"><i class="arrow_carrot-right"></i></a>',
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4
              }
            },
            {
                breakpoint: 800,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3
                }
              },
              {
                breakpoint: 640,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              }
        ]
      }); 
}
brochure_page();
//Tu van dau tu page
function investpage(){
    var scroll = $('.investlanding__one__item__scroll');
    scroll.each(function () {
        var el = $(this),
            id = el.attr('id');
        if (typeof id !== "undefined" && id) {
            new SimpleBar($('#' + id)[0]);
        }
    });
    $('.panel-title a').click(function(){
		var tab_id = $(this).attr('data-tab');

		//$(this).removeClass('show-work');
		$('.item-map').removeClass('show__map');

		//$(this).addClass('current');
		$("#"+tab_id).addClass('show__map');
	})
}
investpage()

//utility_page
function utility_page(){
 
    var utiItem = $('.uti__item'),
        itemClose = utiItem.find('.uti__expand__close'),
        itemBox = utiItem.find('.productBox');
 
        itemClose.bind('click', function(e){
            var el =  $(this),
                expand = el.parents('.uti__expand');
 
                e.preventDefault();
                expand.stop().height(0);
                el.parents('.uti__item').removeClass('active');
        });
        utiItem.bind('click mouseenter', function(){
            var el =  $(this),
                expand = el.find('.uti__expand');
 
                heightExpand = expand.find('.uti__expand__inner').outerHeight();
                console.log(heightExpand);
                if(!el.hasClass('active')) {
                    utiItem.find('.uti__expand').stop().height(0);
                    expand.height(heightExpand);
 
                    utiItem.removeClass('active');
                    el.addClass('active');
                }
        });
 
        utiItem.bind('mouseleave', function(){
            var el =  $(this),
                expand = el.find('.uti__expand');
 
                if(el.hasClass('active')) {
                    expand.stop().height(0);
                    el.removeClass('active');
 
                }
        });
 
        utiItem.find('.uti__expand').bind('click', function(e){
            e.stopPropagation(); 
        });
 
          
    //Slide in expand
        utiSlideContent = $('.uti__expand__slide');
        function utiSlideCreate(){            
            utiSlideContent.not('.slick-initialized').slick({
                infinite: true,
                prevArrow  : '<a class="arrow arrow--prev" href="#"><i class="arrow_carrot-left"></i></a>',
                nextArrow  : '<a class="arrow arrow--next" href="#"><i class="arrow_carrot-right"></i></a>'
            });
        }
 
        function utiSlideUnCreate(){            
            if(utiSlideContent.is('.slick-initialized')) {
                utiSlideContent.slick('unslick');
            }
        }
 
        utiSlideCreate();
}
utility_page();

function clickQuestion() {
    var itemText = $('.news-highlights__item__text');
        itemText.hide();
        var dataForId = '#' + $('.click-question.active').data('value');
        $('.news-highlights__item__text' + dataForId).show();


        $('.click-question a').on('click', function(){
            var id = '#' + $(this).data('value');
            console.log(id);
            var idd = $(this).data('value');

            $('.click-question').removeClass('active');
            $('.news-highlights__item__text' + id).show();
            $(this).parents('.click-question').addClass('active');
            var ls = $('.news-highlights__item .news-highlights__item__text');
            var ul = $('.ul-click-question .click-question');
            ls.each(function(){
                if ($(this).attr('id') != idd) {
                    $(this).hide();
                }
            });
            ul.each(function(){
                if ($(this).attr('id') != idd) {
                    $(this).removeClass('active');
                }
            });
            
        });
}
clickQuestion();
$('.click-question a').click(function (e) {
    var href = $(this).attr("href");
     
      if($(window).width() < 991 ) {
        var offsetTop = href === "#" ? 0 : $(href).offset().top - 150;
      }

    $('html, body').stop().animate({
      scrollTop: offsetTop
    }, 1000);
    e.preventDefault();
  });
