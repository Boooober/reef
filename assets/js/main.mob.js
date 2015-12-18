jQuery(document).ready(function($){


    (function(){

        var langMenu = $('#lang-menu');

        $('#lang-menu .current-lang').click(function(){
            event.stopPropagation();
            event.preventDefault();
            langMenu.toggleClass('open');
        });

        $('body').click(function(){
            resetClasses();
        });

        function resetClasses(){
            if(langMenu.hasClass('open')){
                langMenu.removeClass('open');
            }
        }
    })();

    //scroll to events
    (function(){


        function goToByScroll(id){
            $('html,body').animate({
                    scrollTop: $(id).offset().top},
                3000);
        }

        $('.nav-menu').find('a').each(function(){
            var link = $(this).attr('href'),
                hash = link.substring(0,1);

            if (hash === '#'){
                $(this).click(function(){
                    event.preventDefault();
                    goToByScroll(link);
                });
            }
        });



        // slide-toggle fixed panel
        var didScroll,
            lastScrollTop = 0,
            delta = 5,
            toggleNavbar = $('.topline-wrapper'),
            navbarHeight = toggleNavbar.outerHeight();


        $(window).scroll(function(){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
//                slideFrom(150);
            }
        }, 100);

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                toggleNavbar.removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    toggleNavbar.removeClass('nav-up').addClass('nav-down');
                }
            }

            lastScrollTop = st;
        }

//        function slideFrom(value){
//            var wHeight = $(window).height();
//
//            ($(window).scrollTop() > value ) ? $('.topline').addClass('fixed-header') : $('.topline').removeClass('fixed-header');
//        }

//        $(window).scrollTop

    })();


        (function(){
            var pop = $('#reserve-popup'),
                container = pop.find('.popup-container'),
                form = $('#reserve-form'),
                inputs = form.find('.form-input'),
                body = $('body'),
                errorFlag = false;


            //open
            $('#reserve').click(function(){
                openPopup(pop);
            });


            //form submit
            form.submit(function(){
                event.preventDefault();

                inputs.blur(checkClass);

                // set error class
                inputs.each(checkClass);
                inputs.each(checkError);

                console.log(errorFlag);
                if (!errorFlag) sendAJAX();
            });

            function checkClass (){
                var input = $(this);

                if (input.val() == '' && input.attr('name') != 'fphone'){
                    input.addClass('error');
                    errorFlag = true;

                }else{
                    input.removeClass('error');
                    errorFlag = false;
                    if(input.attr('name') == 'femail'){
                        var email = jQuery.trim(input.val());
                        if(!validEmail(email)) {
                            input.addClass('error');
                            errorFlag = true;
                        }
                    }
                }
            }

            function checkError(){
                var input = $(this);
                if (input.val() == '' && input.attr('name') != 'fphone'){
                    errorFlag = true;
                    return false;
                }else{
                    if(input.attr('name') == 'femail'){
                        var email = jQuery.trim(input.val());
                        if(!validEmail(email)) {
                            errorFlag = true;
                            return false;
                        }
                    }else{
                        errorFlag = false;
                    }
                }
            }

            function validEmail(email){
                var reg = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                return reg.test(email);
            }


            function sendAJAX(){
                var data = form.serialize();
                $.ajax({
                    url : REEFmobile.ajax_url,
                    type : 'post',
                    data : {
                        data: data,
                        reef_nonce : REEFmobile.reef_nonce,
                        action : 'send_email'
                    },
                    success : function( response ) {

                        var resp = $(response);

                        container.append( resp.addClass('popup--opened') );


                        setTimeout(function(){
                            resp.toggleClass('popup--opened popup--closed');
                            setTimeout(function(){
                                resp.remove();
                                closePopup(pop);
                            }, 700);
                        }, 2000);


                    },
                    error: function(){
                        console.log('error');
                    }
                });
            }


            var swaped = false;
            swapBlocks ();
            $(window).on('resize', swapBlocks);

            function swapBlocks (){

                if( !swaped && $(window).width() <= 620 ) {
                    (pop.find('.cell.form').detach()).insertBefore(pop.find('.cell.contacts'));
                    swaped = true;
                } else if (swaped && $(window).width() > 620){
                    (pop.find('.cell.contacts').detach()).insertBefore(pop.find('.cell.form'));
                    swaped = false;
                }
            }

            swapBlocks ();
            $(window).on('resize', swapBlocks);

            function swapBlocks (){

                if( !swaped && $(window).width() <= 620 ) {
                    (pop.find('.cell.form').detach()).insertBefore(pop.find('.cell.contacts'));
                    swaped = true;
                } else if (swaped && $(window).width() > 620){
                    (pop.find('.cell.contacts').detach()).insertBefore(pop.find('.cell.form'));
                    swaped = false;
                }
            }

            function openPopup (target){
                target.addClass('popup--opened').removeClass('popup--closed').fadeIn();
                initCloseEvent(target);
            }

            function closePopup (target){
                target.removeClass('popup--opened').addClass('popup--closed').fadeOut();
                body.removeClass('open');
            }


            function initCloseEvent(target){

                var container = target.find('.popup-container'),
                    close = target.find('.popup-close');

                body.addClass('open');

                container.click(closeChecker);
                close.click(closeChecker);

                function closeChecker (){
                    if (event.target == container.get(0) || event.target == close.get(0)){
                        closePopup(target);
                    }
                }
            }


        })();







    (function(){

        $('.load-more').click(function(){
            var btn = $(this),
                lang = btn.data('lang');

            // check if this is a first click and set class
            if( !btn.hasClass('hidden') && !btn.hasClass('open') ) btn.addClass('hidden');

            //change class
            btn.toggleClass('open hidden');

            //slide hidden content
            btn.siblings().each(function(){
                var elem = $(this);
                if( elem.hasClass('show-more-target') ) elem.slideToggle();
                if (elem.hasClass('show-more-hide') ) elem.toggle();

            });


            // change buttom text
            if (btn.hasClass('open')){
                btn.html(translations(lang, 0));
            } else {
                btn.html(translations(lang, 1));
            }

            function translations (lang, index){
                var obj = {
                    ru:{
                        0:'спрятать',
                        1:'подробнее'
                    },
                    en:{
                        0:'hide',
                        1:'more'
                    },
                    fr:{
                        0:'hide',
                        1:'more'
                    }
                };

                return obj[lang][index];
            }
        });

        function loadMenu(){
            var btn = $('#show-tiles'),
                elems = btn.siblings(),
                start = 2,
                offset = 4,
                count = elems.length;

            return function(){
                var end = start + offset;
				if(end > count) end = count;

                for(; start < end; start++ ){
                    $(elems.get(start)).slideToggle();
                }
				
				if(end === count) btn.remove();
            }

        }

        $(document).on('click', '#show-tiles', loadMenu());

    })();






});

