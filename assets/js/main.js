(function($){
   $(document).ready(function(){


       $('#tab-slider').on('click', '.slide-title:not(.active-slider)', function(){

           $(this).addClass('active-slider').siblings().removeClass('active-slider');
           $(this).parent().next().children().removeClass('active-slider').eq($(this).index()).addClass('active-slider');
       });


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

       function removePreloader(){
           /** Preloader */
           var $preloader = $('#preloader'),
               $animation   = $preloader.find('.loader-cell');
           $animation.fadeOut('slow');
           $preloader.delay(200).fadeOut('slow');
       }

       //check event support
       var isEventSupported = (function(){
           var TAGNAMES = {
               'select':'input','change':'input',
               'submit':'form','reset':'form',
               'error':'img','load':'img','abort':'img'
           }
           function isEventSupported(eventName) {
               var el = document.createElement(TAGNAMES[eventName] || 'div');
               eventName = 'on' + eventName;
               var isSupported = (eventName in el);
               if (!isSupported) {
                   el.setAttribute(eventName, 'return;');
                   isSupported = typeof el[eventName] == 'function';
               }
               el = null;
               return isSupported;
           }
           return isEventSupported;
       })();


        // video and music manipulations
        (function(){
            var screenHeight = $(window).height(),
                toplineHeight = $('.topline-wrapper').outerHeight(),
                body = $('body'),
                videoWrapper = $('.video-wrapper'),
                theVideo,
                paused,
                isActive = true,

                equalizer = $('#equalizer'),
                music = $('#music').get(0);

            body.addClass('music-play');

            //music is loaded
            equalizer.removeClass('not-loaded');

            //stop & play music
            function stopAndPlayMusic (){
                body.toggleClass('music-play music-pause');

                ( body.hasClass('music-pause') ) ? music.pause() : music.play();
            }

            //add event listener
            equalizer.click(stopAndPlayMusic);





            //hide video when tab inactive
            window.onfocus = function () { isActive = true; };
            window.onblur = function () { isActive = false; };

            //prepare video fullscreen
            videoWrapper.height(screenHeight - toplineHeight);
            $(window).resize(function() {
                videoWrapper.height($(window).height());
            });

            // fullscreen video
            $.backgroundVideo($('#video-wrapper'), {
                "align": "centerXY",
                "width": 1280,
                "height": 720,
                "path": REEFmain.themeURL+"assets/video/",
                "filename": "reef25sec",
                "types": ["mp4","ogg","webm"],
                "preload": true,
                "autoplay": true,
                "loop": true
            });
            theVideo = $('#video_background');
            theVideo.attr('muted', 'muted');

            if(isEventSupported('canplay')){
                theVideo.bind('canplay',function() {
                    console.log("Can Play");
                    removePreloader();
                });
            } else{
                $(window).load(function(){
                    removePreloader();
                });
            }




            //pause video on scroll
            $(window).scroll(function(){
                var height = $(this).height();
                if ($(this).scrollTop() > height){
                    body.addClass('video-pause');
                } else {
                    if (body.hasClass('video-pause')){
                        body.removeClass('video-pause');
                    }
                }
            });

            // pause anf fire video
            setInterval(function () {
                paused = body.hasClass('video-pause');
                if ((isActive)&&(!paused)){
                    $('#video_background').get(0).play();
                } else {
                    $('#video_background').get(0).pause();
                }
            }, 500);


            // append full-version video from youtube
            $('#goWatch').click(function(){
                var wrapper,
                    playMusic = false;

                body.addClass('noscroll').append('<div class="video-previewer-wrapper"><div class="video-previewer"><div><div class="close"></div><iframe src="https://www.youtube.com/embed/I0Vn0XKJO8o?rel=0&amp;autoplay=1&amp;controls=0&amp;showinfo=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div></div>');
                wrapper = $('.video-previewer-wrapper');
                wrapper.fadeIn(300);

                body.addClass('open');

                if(body.hasClass('music-play')){
                    playMusic = true;
                    stopAndPlayMusic();
                }

                //pause video
                body.addClass('video-pause');

                wrapper.click(function(){
                    wrapper.fadeOut(300);
                    setTimeout(function(){

                        if(playMusic) stopAndPlayMusic();

                        //fire video back and remove previewer
                        body.removeClass('video-pause noscroll open');
                        wrapper.remove();
                    }, 500);
                });
            });
        })();




//        //set window height to sections;
//        (function(){
//            var windowHeight = $(window).height();
//
//            setHeight();
//            $(window).resize(function() {
//                setHeight();
//            });
//
//            function setHeight(){
//                $('#map').css('height', windowHeight);
//            }
//
//        })();


        //scroll to section
        (function(){
            function goToByScroll(id){
                $('html,body').animate({
                        scrollTop: $(id).offset().top},
                    1000);
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
        })();


        //toggle elements on scroll
        (function(){
            var goUp = $('#go-up');
            var topline = $('#topline');

            setInterval(function(){
                ( $(window).scrollTop() > $(window).height()* 2/3 ) ? goUp.fadeIn() : goUp.fadeOut();
            },1500);

            $(window).scroll(function(){
                ($(this).scrollTop()> 120 ) ? topline.addClass('fixed-header slidedown') : topline.removeClass('fixed-header');
            });


            goUp.click(function(){
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false;
            });

        })();



        //popups
        (function(){

            var body = $('body'),
                paused = false;


            // form popup
            (function(){
                var pop = $('#reserve-popup'),
                    container = pop.find('.popup-container'),
                    form = $('#reserve-form'),
                    inputs = form.find('.form-input'),
                    errorFlag = false;


                //open
                $('.reserve').click(function(){
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
                        url : REEFmain.ajax_url,
                        type : 'post',
                        data : {
                            data: data,
                            reef_nonce : REEFmain.reef_nonce,
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
            })();


            // news popup
            (function(){
                $('.more-news').click(function(){
                    event.preventDefault();

                    var popUps = $('.news-popup'),
                        post = $(this).data('post'),
                        pop;

                    popUps.each(function(){
                        if( $(this).data('post') === post){
                            pop = $(this);
                        }
                    });

                    openPopup(pop);
                });
            })();

            function openPopup (target){
                target.addClass('popup--opened').removeClass('popup--closed').fadeIn();
                initCloseEvent(target);
            }

            function closePopup (target){
                target.removeClass('popup--opened').addClass('popup--closed').fadeOut();
                body.hasClass('video-pause') ? body.removeClass('video-pause open') : body.removeClass('open');
            }


            function initCloseEvent(target){

                var container = target.find('.popup-container'),
                    close = target.find('.popup-close');

                body.addClass('video-pause open');

                container.click(closeChecker);
                close.click(closeChecker);

                function closeChecker (){
                    if (event.target == container.get(0) || event.target == close.get(0)){
                        closePopup(target);
                    }
                }
            }

        })();






    });




})(jQuery);

