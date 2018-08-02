var is_firstview = true;
var mouse = {x: 0, y: 0, z: 0};


jQuery(window).on('mousemove', function () {
    var x = event.pageX;
    var y = event.pageY;
    mouse.x = x;
    mouse.y = y;
});

var animateRenderFrame;

function render() {
    animateRenderFrame = window.requestAnimationFrame(render);
    if (is_firstview) {
        Particles.onUpdate();
    }
}


var is_mobile_width = false;
var is_pad_width = false;
var is_desktop_width = true;

var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;

if (windowWidth < 680) {
    is_mobile_width = true;
    is_pad_width = false;
    is_desktop_width = false;
} else if (windowWidth < 1024) {
    is_pad_width = true;
    is_mobile_width = false;
    is_desktop_width = false;
} else {
    is_desktop_width = true;
    is_pad_width = false;
    is_mobile_width = false;
}


function ajastImgPosition() {
    var container = jQuery('[data-fix-img-position="img-container"]');
    var img = container.find('img');

    if (is_mobile_width && container.width() < img.width()) {
        img.css('left', ((container.width() - img.width()) / 2) + 'px');
    }

}

jQuery(window).resize(function () {


    var beforeWidth = windowWidth;


    windowWidth = jQuery(window).width();
    windowHeight = jQuery(window).height();

    if (windowWidth < 680) {
        is_mobile_width = true;
        is_pad_width = false;
        is_desktop_width = false;
    } else if (windowWidth < 1024) {
        is_pad_width = true;
        is_mobile_width = false;
        is_desktop_width = false;
    } else {
        is_desktop_width = true;
        is_pad_width = false;
        is_mobile_width = false;
    }

    home_particles_bg.onResize();


    if (beforeWidth != windowWidth) {
        menu.onResize();
    }

    Particles.onResize();
    goToTop.onResize();
    ajastImgPosition();

});


jQuery(function () {

    page_load_preview.init();
    ScrollAnimation.init();

    Particles.init(120, true);
    home_particles_bg.init();
    render();
    owlCarousel.init();

    menu.init();
    goToTop.init();
    auto_increment.init();

    ajastImgPosition();

    // $(block_animation.triggerContainer).addClass('hidden');

    // jQuery('[data-css-animate=trigger]').addClass('hidden').viewportChecker({
    //      classToAdd: 'visible animated fadeInUp',
    //      // classToAddForFullView: 'visible animated fadeIn',
    //      offset: 10, 
    //  });


    jQuery(window).on('scroll', function () {

        auto_increment.init();
        block_animation.init();
        menu.onScroll();

        if (is_desktop_width) {
            ScrollAnimation.onScroll(jQuery(window).scrollTop());
        }

    });

    var isIE = ((navigator.appName == 'Microsoft Internet Explorer') || (navigator.userAgent.indexOf('Trident/7.0') != -1) || (navigator.userAgent.indexOf('Edge/') != -1));

    if (isIE) {
        jQuery('.services-call-to-action .cj-container h3').css('background', '#fff');
        jQuery('.active-nav-item').css('background', 'transparent');
        jQuery('.success-ico-color').css('background', '#fff');
    }


    /*
     * Google map
     *
     * */


     var geocoder;
     var map;
     var query = new Array('г. Минск, улица Гамарника, 30', 'бульвар Вацлава Гавела, 4, Київ');
     var idArr = new Array('mp1', 'mp0');

     function initialize() {
        geocoder = new google.maps.Geocoder();
        var mapOptions = {
            center: {'lat': 50.448087, 'lng': 30.425054},
            zoom: 4,
            styles: [{
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "saturation": 36
                },
                {
                    "color": "#333333"
                },
                {
                    "lightness": 40
                }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 20
                }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 17
                },
                {
                    "weight": 1.2
                }
                ]
            },
            {
                "featureType": "administrative.locality",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#e30808"
                }
                ]
            },
            {
                "featureType": "administrative.neighborhood",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#e30808"
                }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#f5f5f5"
                },
                {
                    "lightness": 20
                }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#f5f5f5"
                },
                {
                    "lightness": 21
                }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#dedede"
                },
                {
                    "lightness": 21
                }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                {
                    "lightness": 17
                },
                {
                    "color": "#ffffff"
                }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                {
                    "lightness": 29
                },
                {
                    "weight": 0.2
                },
                {
                    "color": "#ffffff"
                }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 18
                }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#f2f2f2"
                },
                {
                    "lightness": 19
                }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#e9e9e9"
                },
                {
                    "lightness": 17
                }
                ]
            }]
        }

        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        codeAddress();
    }

    function codeAddress() {
        for (var i = 0; i < query.length; i++) {
            var address = query[i];
            geocoder.geocode({
                'address': address
            }, function (k) {
                return function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var a = document.getElementById(idArr[k]);
                        a.onclick = function () {
                            map.setZoom(10);
                            map.setCenter(results[0].geometry.location);
                        }
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                }
            }(i)
            );
        }
    }

    if (jQuery('#map').length) {
        initialize();
    }


    jQuery('[data-team-member="detail"]').on('click', function () {

        var duration = 300;

        var currentElem = jQuery(this).find('.team-member-photo article');

        jQuery('[data-team-member="detail"]').each(function (i, e) {

            var elem = jQuery(e).find('.team-member-photo article');

            if (elem.css('opacity') != 0 && currentElem.get(0) !== elem.get(0)) {
                elem.animate({opacity: 0}, duration);
            }


        });

        if (currentElem.css('opacity') == 0) {
            currentElem.animate({opacity: 0.7}, duration);
            return false;
        }

        currentElem.animate({opacity: 0}, duration);
    });

    jQuery(document).on('mouseover', '.sevice-wrapper', function () {
        var current = jQuery(this);
        jQuery.each(jQuery('.sevice-wrapper'), function (i, e) {
            if (current.get(0) !== jQuery(e).get(0)) {
                jQuery(e).find('.sevice-wrapper-overlay').css('opacity', '0.7');
            }
        });
    });

    jQuery(document).on('mouseout', '.sevice-wrapper', function () {
        jQuery.each(jQuery('.sevice-wrapper'), function (i, e) {
            jQuery(e).find('.sevice-wrapper-overlay').css('opacity', '0');
        });
    });


    jQuery('.tild-effect').tilt({
        glare: true,
        maxGlare: .5
    });



    jQuery('.flip-container').on('click', function() {
        var item = jQuery(this);

        if(item.hasClass('hover'))
        {
            item.removeClass('hover');
        }
        else
        {
            jQuery('.flip-container').removeClass('hover');
            item.addClass('hover');
        }
    });


});


/*
 *
 * Home page particles container size
 *
 * */

 var home_particles_bg = {

    container: '.home-title',

    is_mobile_size_set: false,


    doResize: function () {
        if (is_mobile_width && this.is_mobile_size_set)
            return false;


        var height = jQuery(window).height();


        jQuery(home_particles_bg.container).css({
            'height': height,
            'width': '100%'
        });

        if (is_mobile_width)
            this.is_mobile_size_set = true;
        else
            this.is_mobile_size_set = true;
    },

    onResize: function () {
        this.doResize();
    },

    init: function () {
        this.doResize();
    }
};


var auto_increment = {

    triggerContainer: '[data-projectsAutocount=container]',

    fields: '[data-projectsAutocount=field]',

    flag: true,

    init: function () {

        if (jQuery(this.fields).length == 0) {
            return false;
        }

        if (auto_increment.flag) {
            var w_top = jQuery(window).scrollTop() + jQuery(window).height();
            var e_top = jQuery(this.triggerContainer).offset().top;

            if (w_top >= e_top) {
                jQuery(this.fields).spincrement({duration: 3000, decimalPlaces: null, thousandSeparator: ''});
                auto_increment.flag = false;
            }
        }
    }
};


var block_animation = {

    triggerContainer: '[data-css-animate=trigger]',
    actionType: 'visible animated fadeInUp',

    init: function () {

        if (jQuery(window).width() <= 680) {
            return false;
        }

        jQuery.each(jQuery(this.triggerContainer), function (i, e) {

            var elem = jQuery(e);
            var w_top = jQuery(window).scrollTop() + jQuery(window).height();
            var e_top = elem.offset().top;

            elem.addClass('hidden');

            if (e_top < w_top) {
                elem.addClass(block_animation.actionType);
            }
        });
    }
};


var menu = {

    header: '.header',

    langMenuTrigger: '.header-lang-btn',
    langMenuList: '.header-languages',


    onResize: function () {

        var width = jQuery(window).width();

        if (width < 1099) {
            jQuery(menu.header).css('position', 'fixed')
        } else {
            jQuery(menu.header).css('position', 'absolute')
        }

        jQuery(".menu-control").removeClass('active')
        .removeClass('internal')
        .addClass('external');

        jQuery('body').css('overflow', 'auto');

        jQuery('.header-controls')
        .css('display', 'none')
        .removeAttr('style');

        var langBlock = jQuery(menu.langMenuList);

        if (langBlock.css('display') == 'block') {
            langBlock.slideUp('medium');
        }

    },

    onScroll: function () {
        var langBlock = jQuery(menu.langMenuList);

        if (is_desktop_width) {
            if (langBlock.css('display') == 'block') {
                langBlock.slideUp('medium');
            }
        }

    },

    init: function () {


        var width = jQuery(window).width();

        if (width < 1099) {
            jQuery(menu.header).css('position', 'fixed')
        } else {
            jQuery(menu.header).css('position', 'absolute')
        }


        jQuery(".menu-control").on('click', function () {

            if (jQuery(this).hasClass('active')) {
                jQuery('body').css('overflow', 'auto');

                jQuery(this)
                .removeClass('active')
                .removeClass('internal')
                .addClass('external');

                jQuery('.header-controls').animate({opacity: 0}, 400, function () {
                    jQuery(this).css('display', 'none');
                });

                return;
            }

            jQuery('body').css('overflow', 'hidden');

            jQuery(this)
            .addClass('active')
            .removeClass('external')
            .addClass('internal');

            jQuery('.header-controls')
            .css('display', 'flex')
            .animate({opacity: 1}, 400);


        });


        jQuery(document).on('click', this.langMenuTrigger, this.langToggle);
    },

    langToggle: function () {

        var langBlock = jQuery(menu.langMenuList);
        langBlock.slideToggle('medium');
        // return false;
    }
};


var page_load_preview = {

    block: '#preloader',
    time: 1000,

    init: function () {
        jQuery(this.block).css('height', jQuery(window).height());

        setTimeout(function () {
            jQuery(page_load_preview.block).fadeOut('fast');
            block_animation.init();
        }, this.time);
    }
};


var ScrollAnimation = {

    init: function () {

        this.jQuerypan = jQuery('.breadcrumbs');
    },

    onScroll: function (t) {
        var _this = this;


        var rX = t / 10;
        if (rX < 90 && jQuery(this.jQuerypan).length) {
            TweenLite.to(_this.jQuerypan, 0.5, {
                rotationX: rX,
                transformPerspective: 2000,
                transformOrigin: "center bottom",
            });
        }

    }

}

var goToTop = {

    trigger: '[data-go-to-top="btn"]',
    triggerDown: '[data-go-to-top="btn-down"]',
    downDestination: '[data-go-to-top=down-destination]',

    init: function () {
        jQuery(document).on('click', this.trigger, this.go);
        jQuery(document).on('click', this.triggerDown, this.goDown);

        jQuery(window).on('scroll', this.onScroll);

        goToTop.onResize();
    },

    onScroll: function () {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        var height = jQuery(window).height();

        if (1098 >= jQuery(window).width())
            return false;

        if (scrollTop >= height) {
            jQuery(goToTop.trigger).slideDown();
        } else {
            jQuery(goToTop.trigger).slideUp();
        }
    },

    onResize: function () {
        var elem = jQuery(goToTop.trigger);
        var parent = elem.parent();
        var right = parent.offset().left;
        elem.css('right', right + 10);

    },

    go: function () {
        jQuery('html, body').animate({scrollTop: 0}, 500);
        return false;
    },

    goDown: function () {
        var destination = jQuery(goToTop.downDestination).offset().top;

        if (jQuery(window).width() <= 1026) {
            var navbar = 100;

            if (jQuery(window).width() <= 680)
                navbar = 70;

            destination -= navbar;
        }

        jQuery('html, body').animate({scrollTop: destination}, 500);
        return false;
    }
};


var owlCarousel = {

    init: function () {


        var consortium_carousel = jQuery('.consortium-carousel');

        if(consortium_carousel.length != 0)
        {
            consortium_carousel.owlCarousel({
                nav: false,
                lazyLoad: true,
                loop: true,
                responsiveClass: true,
                items : 1,
                autoplay : true,
                autoplayHoverPause : true
            });
        }

        var partners_page_slider = jQuery('.partners-list-wrapper');

        if (partners_page_slider.length > 0) {
            partners_page_slider.owlCarousel({
                nav: false,
                lazyLoad: true,
                loop: true,
                responsiveClass: true,
                items: 3,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    720: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false
                    }
                }

            });

            jQuery('.arrow-right-img').on('click', function () {
                partners_page_slider.trigger('next.owl.carousel');
            });

            jQuery('.arrow-left-img').on('click', function () {
                partners_page_slider.trigger('prev.owl.carousel');
            });

        }

        var sliderClients = jQuery('.owl-carousel.owl-carousel-2');

        if (sliderClients.length != 0) {
            sliderClients.owlCarousel({
                nav: true,
                lazyLoad: true,
                loop: true,
                responsiveClass: true,
                items: 3,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    720: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false
                    }
                }
            });

            jQuery('.arrow-right-img').on('click', function () {
                sliderClients.trigger('next.owl.carousel');
            });

            jQuery('.arrow-left-img').on('click', function () {
                sliderClients.trigger('prev.owl.carousel');
            });
        }

        var reviews_slider = jQuery('.owl-carousel.review-clients-slider')

        if (reviews_slider.length != 0) {
            sliderClients.owlCarousel({
                nav: false,
                lazyLoad: true,
                loop: true,
                // items : 1,
                responsiveClass: true,
            });
        }
    }
};


function getMaxmin(max, min) {
    return Math.random() * (max - min) + min;
}

var Particles = {
    ready: false,
    points: [],
    colors: [
    'rgba(161,147,202,1)',
    'rgba(59,72,164,1)',
    'rgba(59,158,164,1)'
    ],

    init: function (n, f) {

        if (jQuery('#js-background-renderer').length == 0) {
            return false;
        }


        this.x = 0,
        this.y = 100,
        this.range = 40,
        this.speed = 100,
        this.maxSize = 1.3,
        this.minSize = 0.3,
        this.maxSpeed = 0.6,
        this.minSpeed = 0.2,
        this.offset = 100,
        this.node = 70,
        this.node404 = 50,
        this.ratio = 1;
        this.canvas = jQuery('#js-background-renderer')[0];
        this.ctx = this.canvas.getContext('2d');
        this.ratio = window.devicePixelRatio;
        this.fixRatio();
        this.onResize();
        this.points = [];

        var count = n;

        if (is_mobile_width) {
            count = 70;
        } else if (is_pad_width) {
            count = 100;
        } else {
            count = 150;
        }

        for (var i = 0; i < count; i++) {

            if (f) {
                var x = this.canvas.width * Math.random();
                var y = this.canvas.height / 2 + this.y * Math.random() - this.y / 2;
                var x_speed = 1.2 * this.ratio;
                var y_speed = 1 * this.ratio;
            } else {
                var x = Math.random() * this.canvas.width + 1;
                var y = Math.random() * this.canvas.height + 1;
                var x_speed = getMaxmin(this.maxSpeed, this.minSpeed);
                var y_speed = getMaxmin(this.maxSpeed, this.minSpeed);
            }

            var c = this.colors[parseInt(Math.random() * this.colors.length, 10)];

            this.points.push({
                x: x,
                y: y,
                ox: x,
                oy: y,
                vx: x_speed,
                vy: y_speed,
                vox: x_speed,
                voy: y_speed,
                col: c,
                deg: Math.random() * 360,
                radius: Math.random() * getMaxmin(this.maxSize, this.minSize),
            });
        }
        ;

        this.ready = true;
    },

    fixRatio: function () {

        this.y = this.ratio * this.y,
        this.range = this.ratio * this.range,
        this.speed = this.ratio * this.speed,
        this.maxSize = this.ratio * this.maxSize,
        this.minSize = this.ratio * this.minSize,
        this.maxSpeed = this.ratio * this.maxSpeed,
        this.minSpeed = this.ratio * this.minSpeed,
        this.offset = this.ratio * this.offset,
        this.node = this.ratio * this.node,
        this.node404 = this.ratio * this.node404;

    },

    onResize: function () {

        if (jQuery('#js-background-renderer').length == 0) {
            return false;
        }

        var w = jQuery(window).width();
        var h = jQuery(window).height();


        this.canvas.width = w * this.ratio;
        this.canvas.height = h * this.ratio;

        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        jQuery('#js-background-renderer').css({
            'width': w,
            'height': h
        });
    },

    onUpdate: function () {

        if (jQuery('#js-background-renderer').length == 0) {
            return false;
        }

        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        var count = this.points.length;

        if (is_mobile_width) {
            count = 40;
        } else if (is_pad_width) {
            count = 70;
        } else {
            count = 120;
        }

        for (var i = 0; i < count; ++i) {

            var p = this.points[i];

            if (p.deg < 360) {
                p.deg += 1;
            } else {
                p.deg = 0;
            }

            var wave = Math.sin(p.deg * (Math.PI / 180));
            p.ox = p.ox + p.vx;
            p.oy = p.oy + p.vy * wave;

            dx = mouse.x * this.ratio - p.x;
            dy = mouse.y * this.ratio - p.y;

            var distance = Math.sqrt(dx * dx + dy * dy);


            p.x = (p.x - ( dx / distance ) * ( this.range / distance) * this.speed) - ((p.x - p.ox) / 2);
            p.y = (p.y - ( dy / distance ) * ( this.range / distance) * this.speed) - ((p.y - p.oy) / 2);


            this.ctx.fillStyle = p.col;
            this.ctx.beginPath();
            this.ctx.arc(p.x, p.y, 1 * this.ratio, 0, Math.PI * 2, true);
            this.ctx.closePath();
            this.ctx.fill();

            if (p.x > this.canvas.width) {
                p.ox = p.x = 0;
                p.oy = p.y = this.canvas.height / 2 + this.y * Math.random() - this.y / 2;
            }

            if (p.y < 0) {
                p.ox = p.x = this.canvas.width * Math.random();
                p.oy = p.y = this.canvas.height / 2 + this.y * Math.random() - this.y / 2;
            }

            for (var n = 0; n < count; n++) {

                var pn = this.points[n];
                var nx = p.x - this.points[n].x;
                var ny = p.y - this.points[n].y;

                var l = Math.sqrt(Math.pow(nx, 2) + Math.pow(ny, 2));

                if (l < this.node) {
                    this.ctx.beginPath();
                    this.ctx.lineWidth = 0.08 * this.ratio;
                    this.ctx.strokeStyle = p.col;
                    this.ctx.moveTo(p.x, p.y);
                    this.ctx.lineTo(pn.x, pn.y);
                    this.ctx.closePath();
                    this.ctx.stroke();
                }

            }
            ;

        }

    },

    onUpdate404: function () {

        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        for (var i = 1; i < this.points.length; i++) {

            var p = this.points[i];
            if (p.x > this.canvas.width) {
                p.x = 0;
                p.y = Math.random() * this.canvas.height + this.offset / 2;
                p.ox = p.x;
                p.oy = p.y;
                p.vx = p.vox;
                p.vy = p.voy;
            }

            if (p.y < -this.offset) {
                p.x = Math.random() * this.canvas.width + this.offset / 2;
                p.y = this.canvas.height;
                p.ox = p.x;
                p.oy = p.y;
                p.vx = p.vox;
                p.vy = p.voy;
            }

            if (p.x < -this.offset) {
                p.x = this.canvas.width;
                p.y = Math.random() * this.canvas.height + this.offset / 2;
                p.ox = p.x;
                p.oy = p.y;
                p.vx = p.vox;
                p.vy = p.voy;
            }

            if (p.y > this.canvas.height + this.offset) {
                p.x = Math.random() * this.canvas.width + this.offset / 2;
                p.y = 0;
                p.ox = p.x;
                p.oy = p.y;
                p.vx = p.vox;
                p.vy = p.voy;
            }

            var color = p.col;
            var radius = p.radius;

            this.ctx.beginPath();
            this.ctx.fillStyle = color;

            if (isHovered) {
                var dx = mouse.x * this.ratio - p.x;
                var dy = mouse.y * this.ratio - p.y;
            } else {
                var dx = this.canvas.width / 2 - p.x;
                var dy = this.canvas.height / 2 - p.y;
            }

            var distance = Math.sqrt(dx * dx + dy * dy);

            var min = hover.dist * 220 * this.ratio;
            var dist = 30 * hover.pow * this.ratio;
            var max = hover.dist * (250 + dist) * this.ratio;

            if (min < distance && distance < max) {

                p.vx = p.vx + p.vox / 2;
                p.vy = p.vy - p.voy / 2;

                p.x = p.x - (dx / distance) - ((p.x - p.ox) / 2) + p.vx;
                p.y = p.y - (dy / distance) - ((p.y - p.oy) / 2) + p.vy;
                this.ctx.arc(p.x, p.y, radius * this.ratio, 0, Math.PI * 2, false);
                this.ctx.fill();

                for (var n = 1; n < this.points.length; n++) {
                    var pn = this.points[n];
                    var nx = p.x - this.points[n].x;
                    var ny = p.y - this.points[n].y;
                    var strokeL = Math.sqrt(Math.pow(nx, 2) + Math.pow(ny, 2));
                    if (strokeL < this.node404) {
                        this.ctx.beginPath();
                        this.ctx.lineWidth = 0.2 * this.ratio;
                        this.ctx.strokeStyle = color;
                        this.ctx.lineTo(p.x, p.y);
                        this.ctx.lineTo(pn.x, pn.y);
                        this.ctx.closePath();
                        this.ctx.stroke();
                        this.ctx.fill();
                    }
                }
                ;

            } else {

                p.vx = p.vx + p.vox;
                p.vy = p.vy - p.voy;
                p.x = p.x - (dx / distance) - ((p.x - p.ox) / 2) + p.vx;
                p.y = p.y - (dy / distance) - ((p.y - p.oy) / 2) + p.vy;
                this.ctx.arc(p.x, p.y, radius, 0, Math.PI * 2, false);
                this.ctx.fill();

            }

        }
        ;
    }
};







