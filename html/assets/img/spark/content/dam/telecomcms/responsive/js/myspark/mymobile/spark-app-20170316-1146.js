var initialise = function() {
    detectMobileOS();
    addEventListeners();
};

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

function detectMobileOS() {
    if( isMobile.iOS() ){
        showIOS()
    }else if ( isMobile.Android() ){
        showAndroid()
    }else{
        showIosAndAndroid()
    }
}

function showAndroid() {
    $android = $('.android');
    $ios = $('.ios');
    $android.show()
    $ios.hide()
}

function showIOS() {
    $android = $('.android');
    $ios = $('.ios');
    $ios.show()
    $android.hide()
}

function showIosAndAndroid() {
    $android = $('.android');
    $ios = $('.ios');
    $android.show()
    $ios.show()
}

var removeSticky = function() {
    $('.sticky').remove();
}

var addEventListeners = function() {
    $('.spark-app-close').on('click', removeSticky);
    $(window).scroll(handleSticky);
}


function handleSticky() {
    var distanceFromTop = $(this).scrollTop();

    if (distanceFromTop >= $('.trigger-sticky').offset().top) {
        $('.sticky').show();
        $('.sticky').removeClass('slideUp');
        $('.sticky').addClass('slideDown');

    } else {
        $('.sticky').removeClass('slideDown');
        $('.sticky').addClass('slideUp');
       $('.sticky').hide();
    } 
}

$(document).ready(initialise);
