$(document).ready(function() {


  $('#dropBtn').click(function(event) {

    setTimeout(function() {

      $("html, body").animate({ scrollTop: 0 }, "slow").promise().done(function() {
        $.scrollLock(true);
      });

      $('#header-exit-button').attr("disabled", "disabled");

      $('.header-info-start').fadeOut(500);
      $('.header-info').addClass('animatable--now');
      $('.header-info').addClass('header-info-fullsize');
      $('.header-info-wrapper').addClass('header-info-fullsize');
      $('.header-info-pick-wrapper').addClass('animatable--now');
      $('.header-info-pick-wrapper').removeClass('header-info-pick-wrapper-fold-in');

      $('#header-exit-button').fadeIn(600).promise().done(function() {
        $('.header-exit-button-wrap').addClass('header-exit-button-active');
        $('.header-info-pick-wrapper').fadeIn(500);
        $('.header-info').removeClass('animatable--now');
        $('.header-info-pick-wrapper').removeClass('animatable--now');
        $('#header-exit-button').removeAttr("disabled", "disabled");
      });

    }, 150);

  });

  $('#header-exit-button').click(function(event) {

    setTimeout(function() {

        $.scrollLock(true);
        $('.header-exit-button-wrap').removeClass('header-exit-button-active');
        $('.header-info-pick-wrapper').fadeOut(500);
        $('.header-info-ask-wrapper').fadeOut(500);
        $('.header-info-answer-wrapper').fadeOut(500);
        $('.header-info').addClass('animatable--now');
        $('.header-info').removeClass('header-info-fullsize');
        $('.header-info-pick-wrapper').addClass('header-info-pick-wrapper-fold-in');
        $('.header-info-pick-wrapper').addClass('animatable--now');

      $('#header-exit-button').fadeOut(500).promise().done(function() {

        $('.header-info').removeClass("animatable--now");
        $('.header-info-pick-wrapper').removeClass('animatable--now');
        $('.header-info-start').fadeIn(500);
        $('#dropBtn').fadeIn(500);
        $.scrollLock(false);

      });

    }, 200);


  });



  $('.askbtn').click(function(event) {

    $('.header-info-pick-wrapper').fadeOut(500);
    $('.header-info-ask-wrapper').delay(500).fadeIn(500);

  });

  $('.answbtn').click(function(event) {

    $('.header-info-pick-wrapper').fadeOut(500);
    $('.header-info-answer-wrapper').delay(500).fadeIn(500);

  });




  //https://gist.github.com/barneycarroll/6550066
  //Inte skapat av Gabriel Käll
  $.scrollLock = ( function scrollLockClosure() {
    'use strict';

    var $html      = $( 'html' ),
        // State: unlocked by default
        locked     = false,
        // State: scroll to revert to
        prevScroll = {
            scrollLeft : $( window ).scrollLeft(),
            scrollTop  : $( window ).scrollTop()
        },
        // State: styles to revert to
        prevStyles = {},
        lockStyles = {
            'overflow-y' : 'scroll',
            'position'   : 'fixed',
            'width'      : '100%'
        };

    // Instantiate cache in case someone tries to unlock before locking
    saveStyles();

    // Save context's inline styles in cache
    function saveStyles() {
        var styleAttr = $html.attr( 'style' ),
            styleStrs = [],
            styleHash = {};

        if( !styleAttr ){
            return;
        }

        styleStrs = styleAttr.split( /;\s/ );

        $.each( styleStrs, function serializeStyleProp( styleString ){
            if( !styleString ) {
                return;
            }

            var keyValue = styleString.split( /\s:\s/ );

            if( keyValue.length < 2 ) {
                return;
            }

            styleHash[ keyValue[ 0 ] ] = keyValue[ 1 ];
        } );

        $.extend( prevStyles, styleHash );
    }

    function lock() {
        var appliedLock = {};

        // Duplicate execution will break DOM statefulness
        if( locked ) {
            return;
        }

        // Save scroll state...
        prevScroll = {
            scrollLeft : $( window ).scrollLeft(),
            scrollTop  : $( window ).scrollTop()
        };

        // ...and styles
        saveStyles();

        // Compose our applied CSS
        $.extend( appliedLock, lockStyles, {
            // And apply scroll state as styles
            'left' : - prevScroll.scrollLeft + 'px',
            'top'  : - prevScroll.scrollTop  + 'px'
        } );

        // Then lock styles...
        $html.css( appliedLock );

        // ...and scroll state
        $( window )
            .scrollLeft( 0 )
            .scrollTop( 0 );

        locked = true;
    }

    function unlock() {
        // Duplicate execution will break DOM statefulness
        if( !locked ) {
            return;
        }

        // Revert styles
        $html.attr( 'style', $( '<x>' ).css( prevStyles ).attr( 'style' ) || '' );

        // Revert scroll values
        $( window )
            .scrollLeft( prevScroll.scrollLeft )
            .scrollTop(  prevScroll.scrollTop );

        locked = false;
    }

    return function scrollLock( on ) {
        // If an argument is passed, lock or unlock depending on truthiness
        if( arguments.length ) {
            if( on ) {
                lock();
            }
            else {
                unlock();
            }
        }
        // Otherwise, toggle
        else {
            if( locked ){
                unlock();
            }
            else {
                lock();
            }
        }
    };
}() );

});
