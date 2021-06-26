$(document).ready(function() {
    $('#modal-save-filters').modal('show');
    $('.hotel-name-input').focus();
});

///////// SELECT2
$(".select2-do").select2({
    dir: 'ltr',
    width: '100%',
});

/////// data for city and airports
var data_flight = [{
        id: 0,
        text: '<div><span class="float-left ml-3">Tehran</span> <span class="text-muted short-city">Thr</span></div>',
        html: '<div>Tehran, <span class="text-muted">Iran</span><span class="text-muted float-right">Thr</span></div>',
    },
    {
        id: 1,
        text: '<div><span class="float-left ml-3">Imam khomeini</span> <span class="text-muted short-city">Thr</span></div>',
        html: '<div><span class="text-muted mr-2 ml-2">&#x2708</span>Imam khomeini <span class="text-muted float-right">Thr</span></div>',
    }, {
        id: 2,
        text: '<span class="float-left ml-3">Istanbul</span> <span class="text-muted short-city">IST</span></div>',
        html: '<div>Istanbul, <span class="text-muted">turkey</span><span class="text-muted float-right">IST</span></div>',
    }, {
        id: 3,
        text: '<span class="float-left ml-3">Istanbul new airport</span> <span class="text-muted short-city">IST</span></div>',
        html: '<div><span class="text-muted mr-2 ml-2">&#x2708</span>Istanbul new airport <span class="text-muted float-right">IST</span></div>',
    }
];

///////// select box choose city or airport
$(".select2-flight").select2({
    data: data_flight,
    escapeMarkup: function(markup) {
        return markup;
    },
    templateResult: function(data) {
        return data.html;
    },
    templateSelection: function(data) {
        return data.text;
    },
    width: '100%',

});

//////// data for city and hotels
var data_hotel = [{
        id: 0,
        text: '<div><span class="float-left ml-3">Tehran</span> <span class="text-muted short-city">Thr</span></div>',
        html: '<div>Tehran, <span class="text-muted">Iran</span><span class="text-muted float-right">3660 hotel</span></div>',
    },
    {
        id: 1,
        text: '<div><span class="float-left ml-3">Istanbul</span> <span class="text-muted short-city">Ist</span></div>',
        html: '<div>Istanbul, <span class="text-muted">Turkey</span><span class="text-muted float-right">5236 hotel</span></div>',
    }, {
        id: 2,
        text: '<span class="float-left ml-3">radison hotel</span> <span class="text-muted short-city">Ist</span></div>',
        html: '<div>radison hotel, <span class="text-muted">Istanbul</span></div>',
    }
];

///////// select box choose city or hotel
$(".select2-hotel").select2({
  ajax: {
    url: "/gnr/region-lists",
    type: "get",
    dataType: 'json',
    placeholder: 'Search for a Locations',
    data: function (params) {
      return {
        q: params.term // search term
      };
    },

    processResults: function (response) {
      return {
        results: response
      };
    },
    cache: true
  },
    width: '100%',
});

/////////// change place origin and destination
$('.change-icon').click(function() {
    var origin = $('#select2-origin-container').html();
    var destination = $('#select2-destination-container').html();
    $('#select2-origin-container').html(destination);
    $('#select2-destination-container').html(origin);
});

///////// focus input box in select2
$('.select2-selection').click(function() {
    $('.select2-search__field').focus();
})

////////// hide modal save filters
// $(document).on('focus', '.clear-filter-btn', function() {
//     // $('#modal-save-filters').modal('hide');
// });

////////// hide modal filter
$(document).on('click', '.reset-filter-modal', function() {
    $('#filter-modal').modal('hide');
    $('#filter-hotel').modal('hide');
});

///////// dark mode and light mode by toggle
$(document).on('click', '.btn-toggle', function() {
    $('.header').toggleClass('dark');
    $('.system-navbar .navbar').toggleClass('dark');
    $('.include-bottom').toggleClass('dark-blue');
    $('.useful-link .list-inline-item a').toggleClass('txt-white');
    $('.top-footer a').toggleClass('txt-white');
    $('.top-footer-title').toggleClass('txt-white');
    $('.search-field-box').toggleClass('dark-blue');
    $('.t-dates').toggleClass('txt-white');
    $('.select-passenger-count button').toggleClass('txt-white');
    $('.change-icon').toggleClass('txt-white');
    $('.change-icon').toggleClass('dark-blue');
    $('.t-check-in').toggleClass('dark-border');
    $('.select-passenger-count .dropdown-menu').toggleClass('dark-blue');
    $('.select-passenger-count .dropdown-menu').toggleClass('txt-white');
    $('.count-number').toggleClass('txt-white');
    $('.count-minus').toggleClass('dark-minus');
    $('.setting-nav #collapsibleNavbar').toggleClass('dark-blue');
    $('.setting-nav #collapsibleNavbar a').toggleClass('txt-white');
    $('.setting-nav .tab-text').toggleClass('txt-white');
    $('.setting-nav').toggleClass('dark-border');
    $('body').toggleClass('dark');
    $('body').toggleClass('txt-white');
    $('.select2-selection').toggleClass('dark-blue');
    $('.select2-selection').toggleClass('dark-border');
    $('.select2-container--default .select2-selection--single .select2-selection__rendered').toggleClass('txt-white');
    $('.include-bottom').toggleClass('dark-border');
    $('.settings-title').toggleClass('txt-white');
    $('.document-passenger-box').toggleClass('dark-blue');
    $('.document-tab-description').toggleClass('txt-white');
    $('#documents small').toggleClass('txt-white');
    $('input').toggleClass('dark-blue');
    $('input').toggleClass('dark-border');
    $('.has-float-label input').toggleClass('txt-white');
    $('.has-float-label label::after').toggleClass('dark-blue');
    $('.has-float-label label').toggleClass('bg-none');
    $('.destination-box').toggleClass('dark-blue');
    $('.dropdown-menu').toggleClass('dark-blue');
    $('.dropdown-menu').toggleClass('txt-white');
    $('.dropdown-menu ul li').toggleClass('txt-white');
    $('.dropdown-menu label').toggleClass('txt-white');
    $('.dropdown-menu span').toggleClass('txt-white');
    $('.select-passenger-count .dropdown-menu').toggleClass('dark-blue');
    $('.guest-number').toggleClass('txt-white');
    $('#select2-citizenship-container').toggleClass('dark-blue');
    $('#select2-citizenship-container').toggleClass('dark-border');
    $('.ticket-main-part').toggleClass('dark-blue');
    $('.flight-more').toggleClass('dark-blue');
    $('.next-prev-submit-box').toggleClass('dark-blue');
    $('.neighboring-dates-row').toggleClass('dark-blue');
    $('.active-date , .active-date-cost').toggleClass('txt-white');
    $('.flight-navbar').toggleClass('dark-blue');
    $('.flight-navbar').toggleClass('dark-border');
    $('.flight-navbar a').toggleClass('txt-white');
    $('.keep-track , .popular-filters , .flight-box , .help-tofind-ticket').toggleClass('dark-blue');
    $('.filter-box .card').toggleClass('dark-blue');
    $('.filter-box .card a').toggleClass('txt-white');
    $('.compare-tickets .card-body').toggleClass('dark-blue');
    $('.open-new-tab').toggleClass('txt-white');
    $('.collapse-ticket, .collapse-flight').toggleClass('txt-white');
    $('.noluggage-text').toggleClass('txt-white');
    $('.select-luggage .nav-tabs .nav-link.active').toggleClass('dark-border');
    $('.navbar-locale-selector .dropdown-item').toggleClass('txt-white');
    $('.share-box').toggleClass('dark-blue');
    $('.select-passenger-count .dropdown-menu ul li').toggleClass('dark-blue');
    $('.childrens-age-box').toggleClass('txt-white');
    $('.hotel-top-page').toggleClass('dark-blue');
    $('.hotel-box').toggleClass('dark-blue');
    $('.hotel-box-description , .hotel-box a').toggleClass('txt-white');
    $('.btn-map').toggleClass('dark-border');
    $('.hotel-pictures').toggleClass('dark-blue');
    $('.hotel-pictures h4').toggleClass('txt-white');
    $('.select-room').toggleClass('dark-blue');
    $('.hotel-information').toggleClass('dark-blue');
    $('.about').toggleClass('dark-blue');
    $('.half-circle-left , .half-circle-right').toggleClass('dark-blue');
    $('.about .card , .about .card-header').toggleClass('dark-blue');
    $('.modal-content').toggleClass('dark-blue');
    $('.document-passenger-box').toggleClass('dark-border');
    $('.map-colors , .map-view-top , .search-hotel-box .card , .search-hotel-box .card-body , .search-hotel-box').toggleClass('dark-blue');
    $('.hotel-name input , .hotel-name-input , .hotel-title a').toggleClass('txt-white');
    $('#select2-citizenship-container , #select2-select-currency-container').toggleClass('border-0');
    $('#select2-modal-citizenship-container').toggleClass('dark-border');

});

/////////// select2 change mode of dark and light
$('.select2').click(function() {
    if ($('body').hasClass('dark')) {
        $('.select2-dropdown').toggleClass('dark-blue');
    }
});

//////// change currency in header
$('.dropdown-currency .dropdown-menu .dropdown-item').click(function() {
    $('.dropdown-currency .dropdown-menu .dropdown-item').removeClass('blue');
    $('.dropdown-currency .dropdown-menu .dropdown-item span').removeClass('blue');
    $('.dropdown-currency .dropdown-menu .dropdown-item svg').remove();
    $(this).addClass('blue');
    $(this).find('span').addClass('blue');
    $(this).append('<i class="fa fa-check float-right"></i>');
    var currency = $(this).find('span').text();
    $('.navbar-locale-text').text(currency);
});

////////// hide collapsibleNavbar after click navlink in setting.php
$(document).on('click', '#collapsibleNavbar .nav-link', function() {
    $(this).parent().parent().removeClass('show');
});

/////////// active navlink on focus in setting.php
$(document).on('focus', '.setting-nav .nav-link', function() {
    $('.setting-nav .nav-link.active').removeClass('active');
});

/////// slider in index.php
var app_slider = new Swiper('.slider-box .swiper-container', {
    effect: 'coverflow',
    observer: true,
    observeParents: true,
    centeredSlides: true,
    observer: true,
    observeParents: true,
    slidesPerView: 3.8,
    spaceBetween: -40,
    touchEventsTarget: 'wrapper',
    shortSwipes: true,
    allowTouchMove: true,
    preloadImages: true,
    loop: true,
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 180,
        modifier: 1,
        slideShadows: true,
    },
    // autoplay: {
    //     delay: 3000,
    //     disableOnInteraction: false,
    // },
    breakpoints: {
        991: {
            slidesPerView: 3.5,
            spaceBetween: -150,
        },
        450: {
            slidesPerView: 1.8,
            spaceBetween: -150,
        },
        680: {
            slidesPerView: 2.5,
            spaceBetween: -200,
        },
    },
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

/////// slider hotel
var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 6,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop: true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs,
    },
});

/////// slider of calendar in search.php
var date_slider = new Swiper('.neighboring-date-slider .swiper-container', {
    observer: true,
    observeParents: true,
    slidesPerView: 4.5,
    breakpoints: {
        1100: {
            slidesPerView: 3.5,
        },
    },
});

///////// change css by select gender
$(document).on('click', 'input[name=gender]', function() {
    var val = $(this).val();
    if (val == 'male') {
        $('input[name=gender]').parent().find('label').removeClass('blue').addClass('.custom-control-label');
        $(this).parent().find('label').addClass('blue');
    } else if (val == 'female') {
        $('input[name=gender]').parent().find('label').removeClass('blue').addClass('.custom-control-label');
        $(this).parent().find('label').addClass('blue');
    }

});

////////// date mask
$('#date,#validity,#modal-date,#modal-validity').mask('00.00.0000', { 'translation': { 0: { pattern: /[0-9*]/ } } });

//////// active date in top of search.php
$(document).on('click', '.neighboring-date-slider .swiper-slide', function() {
    $('.neighboring-date-slider .swiper-slide').removeClass('active-date');
    $(this).addClass('active-date');
    $('.progress-bar').animate({ 'width': '100%' }, 1000);
    $('.neighboring-dates-left').hide();
    $('.neighboring-dates-left-loading').show();
});

///////// open information of flight by collapse btn
$(document).on('click', '.collapse-flight', function() {
    $(this).parents('.flight-box').find('.details-flight-hide').toggle(300);
    $(this).parents('.flight-box').find('.flight-divider').toggle();
    $(this).parents('.flight-box').find('.there').toggle();
    $(this).parents('.flight-box').find('.back').toggle();
    $(this).find('.fa-caret-up').toggle();
    $(this).find('.fa-caret-down').toggle();
});

///////// open information of flight by collapse btn
$(document).on('click', '.flight-information-btn', function() {
    $(this).parents('.flight-more').find('.flight-information-box').toggle(300);
    $(this).find('.fa-caret-up').toggle();
    $(this).find('.fa-caret-down').toggle();
});

//////// change caret after open and close
$(document).on('click', '.filter-box .card-link', function() {
    $(this).find('.fa-caret-down').toggle();
    $(this).find('.fa-caret-right').toggle();
});

////////// range in filter side bar in search.php
$(function() {
    $(".slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [0, 500],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $(".slider-range").slider("values", 0) +
        " - $" + $(".slider-range").slider("values", 1));
});

////////// show table calendar by collapse in top of search.php
$(document).on('click', '.open-collapse , .table-calendar', function() {
    $('.open-collapse').hide();
    $('.neighboring-dates-row').animate({ height: '350px' });
    $('.close-collapse').show();
    $('.neighboring-date-slider').hide();
    $('.graph-calendar').removeClass('blue');
    $('.table-calendar').addClass('blue');
});

////////// show graph calendar by collapse in top of search.php
$(document).on('click', '.close-collapse , .graph-calendar', function() {
    $('.close-collapse').hide();
    $('.neighboring-dates-row').animate({ height: '80px' });
    $('.open-collapse').show();
    $('.neighboring-date-slider').show();
    $('.table-calendar').removeClass('blue');
    $('.graph-calendar').addClass('blue');
});

////////// show more information of ticket by collapse btn in info.php
$(document).on('click', '.collapse-ticket', function() {
    $(this).find('.fa-caret-up').toggle();
    $(this).find('.fa-caret-down').toggle();
    $('.ticket-collapse').toggle(200);
});
////////// show rooms of hotel
$(document).on('click', '.collapse-hotel', function() {
    $(this).find('.fa-caret-up').toggle();
    $(this).find('.fa-caret-down').toggle();
    $(this).parent().find('.rooms').toggle(200);
});

/////// remove return date
$(document).on('click', '.remove-return-date', function() {
    $('.t-day-check-out , .t-month-check-out , .t-year-check-out').text('');
});
/////////////////////////////////// steps in info.php ///////////////////////////

var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function() {
    //passenger info validation
    var surname = $('#surname').val(); //user input
    var name = $('#name').val(); // user input
    var passport = $('#passport').val(); // user input
    var date = $('#date').val(); // user input
    date_split = date.split('.'); //split date
    var new_date = new Date(date_split[2], date_split[0], date_split[1]);

    var today = new Date(); // today date
    var year = today.getFullYear(); //year
    var month = today.getMonth(); // month
    var day = today.getDate(); //date
    var today_date = day + '.' + month + '.' + year; // format: dd/mm/year

    today_date_split = today_date.split('.'); //split
    var new_today = new Date(today_date_split[2], today_date_split[0], today_date_split[1]); // today

    // regix date
    var dateRegex = /^(?=\d)(?:(?:31(?!.(?:0?[2469]|11))|(?:30|29)(?!.0?2)|29(?=.0?2.(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(?:\x20|$))|(?:2[0-8]|1\d|0?[1-9]))([-.\/])(?:1[012]|0?[1-9])\1(?:1[6-9]|[2-9]\d)?\d\d(?:(?=\x20\d)\x20|$))?(((0?[1-9]|1[012])(:[0-5]\d){0,2}(\x20[AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2})?$/;

    if (surname.length < 3) {
        $('#surname').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#surname').parent().parent().find('.invalid-feedback').hide();
    }
    if (name.length < 3) {
        $('#name').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#name').parent().parent().find('.invalid-feedback').hide();
    }
    if (date == '' || new_date > new_today || dateRegex.test(date) == false) {
        $('#date').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#date').parent().parent().find('.invalid-feedback').hide();
    }
    if (passport.length < 6 || passport.length > 14) {
        $('#passport').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#passport').parent().parent().find('.invalid-feedback').hide();
    }

    //////

    if (animating) return false;
    animating = true;

    current_fs = $(this).parent().parent();
    next_fs = $(this).parent().parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                //'transform': 'scale(' + scale + ')',
                // 'position': 'absolute'
            });
            next_fs.css({ 'left': left, 'opacity': opacity });
        },
        duration: 800,
        complete: function() {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });

});

$(".previous").click(function() {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent().parent();
    previous_fs = $(this).parent().parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({ 'left': left });
            previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
        },
        duration: 800,
        complete: function() {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function() {
    //send info to action page
});
////////////////////////////////////////////////////////////////

///////////// show calendar
$('.flight-datepicker').tDatePicker({
    titleCheckIn: 'Departure date',
    titleCheckOut: 'Return date'
});

$('.hotel-datepicker').tDatePicker({
    titleCheckIn: 'Arrival date',
    titleCheckOut: 'Departure date'
});

/////////// change title of header in index.php by click tabs
$('.hotels-tab').click(function() {
    $('.search-box-hotel-title').show();
    $('.search-box-flight-title').hide();
});

$('.flights-tab').click(function() {
    $('.search-box-hotel-title').hide();
    $('.search-box-flight-title').show();
});

// Avoid close select passenger count dropdown when click inside
$('.select-passenger-count .dropdown-menu').on("click.bs.dropdown", function(e) {
    e.stopPropagation();
    e.preventDefault();
});

////////// show or hide mobile and email box for send ticket to some one else
$('input[name="send-ticket"]').change(function() {
    $('.send-ticket-to-someone-else').toggle();
});
////////// change flight class by click on radio button
$('.select-passenger-count .dropdown-menu .custom-control').click(function() {
    $(this).find('input').prop("checked", true);
    var label = $(this).find('label').text();
    $('.passenger-flight-class').text(label);
});
/////////// add room
$('.room-plus').click(function() {
    var html = "";

    roomCount = parseInt($('.room-box:last-child .selected-room-count span').text());
    if (roomCount) {
        roomCount = roomCount + 1;
    } else {
        roomCount = 2;
    }

    html += '<div class="room-box-parent">';
    html += '<div class="room-box">';
    html += '<div class="selected-room-count">Room <span>' + roomCount + '</span></div>';
    html += '<ul class="list-unstyled adult-guests">';
    html += '<li class="list-inline-item">';
    html += '<div class="font-weight-bold mt-2">Adults</div>';
    html += '</li>';
    html += '<li class="list-inline-item mt-2 text-right">';
    html += '<div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>';
    html += '<input class="count-item guest-number text-dark" value="1" name="rooms[' + roomCount + '][adults]">';
    html += '<div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>';
    html += '</li>';
    html += '</ul>';
    html += '<ul class="list-unstyled children-guests">';
    html += '<li class="list-inline-item">';
    html += '<div class="font-weight-bold">Children</div>';
    html += '<div class="text-muted age-notify">under 12 years old</div>';
    html += '</li>';
    html += '<li class="list-inline-item mt-2 text-right">';
    html += '<div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>';
    html += '<input class="count-item guest-number text-dark" value="0" name="rooms[' + roomCount + '][children]">';
    html += '<div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>';
    html += '</li>';
    html += '</ul>';
    html += '<div class="childrens-age-box"></div>';
    html += '</div>';
    html += '</div>';

    $('.room-minus').removeClass('disabled');
    $('.room-box-wrapper').append(html);

    var totalRoom = parseInt($('.room-count-text span').text());
    var room = parseInt($('.show-room-count').text());
    var adultCount = parseInt($('.select-passenger-count .guest-count').text());
    parseInt($('.select-passenger-count .guest-count').text(adultCount + 1));
    $('.show-room-count').text(room + 1);
    $('.room-count-text span').text(totalRoom + 1);
})

$('.room-minus').click(function() {
    var child = $('.room-box').length;
    var room = parseInt($('.show-room-count').text());
    var totalRoom = parseInt($('.room-count-text span').text());

    if (child > 0) {
        var adultCountMinus = $('.room-box-wrapper .room-box-parent:last-child .adult-guests .guest-number').text();
        var adultCount = parseInt($('.select-passenger-count .guest-count').text());

        $('.select-passenger-count .guest-count').text(adultCount - adultCountMinus);
        $('.room-box-wrapper .room-box-parent:last-child').remove();
        $('.show-room-count').text(room - 1);
        $('.room-count-text span').text(totalRoom - 1);
    }
    if (room == 2) {
        $('.room-minus').addClass('disabled');
    }
});

// plus count of children in flight tab
$('.children .count-plus').click(function() {
    var count = parseInt($(this).parent().find('.count-number').text());
    var passenger_count = parseInt($(this).parents('.select-passenger-count').find('.passenger-count').text());
    $(this).parent().find('.count-number').text(count + 1);
    $(this).parents('.select-passenger-count').find('.passenger-count').text(passenger_count + 1);
});

// minus count of children in flight tab
$('.children .count-minus').click(function() {
    var count = parseInt($(this).parent().find('.count-number').text());
    var passenger_count = parseInt($(this).parents('.select-passenger-count').find('.passenger-count').text());
    if (count > 0) {
        $(this).parent().find('.count-number').text(count - 1);
        $(this).parents('.select-passenger-count').find('.passenger-count').text(passenger_count - 1);
    }
});

// plus count of Adult in flight tab
$('.adults .count-plus').click(function() {
    var count = parseInt($(this).parent().find('.count-number').text());
    var passenger_count = parseInt($(this).parents('.select-passenger-count').find('.passenger-count').text());
    $(this).parent().find('.count-number').text(count + 1);
    $(this).parents('.select-passenger-count').find('.passenger-count').text(passenger_count + 1);
});

// minus count of Adult in flight tab
$('.adults .count-minus').click(function() {
    var count = parseInt($(this).parent().find('.count-number').text());
    var passenger_count = parseInt($(this).parents('.select-passenger-count').find('.passenger-count').text());
    if (count > 1) {
        $(this).parent().find('.count-number').text(count - 1);
        $(this).parents('.select-passenger-count').find('.passenger-count').text(passenger_count - 1);
    }
});

// plus count of infants in flight tab
$('.infants .count-plus').click(function() {
    var adult_count = $('.adults').find('.count-number').text();
    var count = parseInt($(this).parent().find('.count-number').text());
    var passenger_count = parseInt($(this).parents('.select-passenger-count').find('.passenger-count').text());
    if (count < adult_count) {
        $(this).parent().find('.count-number').text(count + 1);
        $(this).parents('.select-passenger-count').find('.passenger-count').text(passenger_count + 1);
    }
});

// minus count of infants in flight tab
$('.infants .count-minus').click(function() {
    var count = parseInt($(this).parent().find('.count-number').text());
    var passenger_count = parseInt($(this).parents('.select-passenger-count').find('.passenger-count').text());
    if (count > 0) {
        $(this).parent().find('.count-number').text(count - 1);
        $(this).parents('.select-passenger-count').find('.passenger-count').text(passenger_count - 1);
    }
});

// plus count of adult guests in hotel tab (only 4 adult)
$('.room-box-wrapper').on('click', '.adult-guests .count-plus', function() {
    var count = parseInt($(this).parent().find('.guest-number').val());
    var guest_count = parseInt($(this).parents('.select-passenger-count').find('.guest-count').text());
    if (guest_count < 8 && count < 4) {
        $(this).parents('.adult-guests').find('.guest-number').val(count + 1);
        parseInt($(this).parents('.select-passenger-count').find('.guest-count').text(guest_count + 1));

    }
});

// minus count of adult guests in hotel tab
$('.room-box-wrapper').on('click', '.adult-guests .count-minus', function() {
    var count = parseInt($(this).parent().find('.guest-number').val());
    var guest_count = parseInt($(this).parents('.select-passenger-count').find('.guest-count').text());
    if (count > 1) {
        $(this).parents('.adult-guests').find('.guest-number').val(count - 1);
        parseInt($(this).parents('.select-passenger-count').find('.guest-count').text(guest_count - 1));
    }
});

// plus count of children guests in hotel tab (only 3 children)
var html = '';
$('.room-box-wrapper').on('click', '.children-guests .count-plus', function() {
    var roomCount = $('.room-count-text span').text();
    var children = $(this).parents('.room-box-parent').find('.childrens-age-box ul').length;
    var child_count = 1;
    if (children > 0) {
        var child_count = 2;
    }
    html += '<ul class="list-unstyled">';
    html += '<li class="list-inline-item">';
    html += '<div class="font-weight-bold">Childrens age</div>';
    html += '</li>';
    html += '<li class="list-inline-item childrens-age-select">';
    html += '<select name="rooms[' + roomCount + '][children_ages][' + child_count + ']" class="form-control custom-select">';
    html += '<option value="0">0 years</option><option value="1">1 years</option>';
    html += '<option value="2">2 years</option><option value="3">3 years</option>';
    html += '<option value="4">4 years</option><option value="5">5 years</option>';
    html += '<option value="6">6 years</option><option value="7">7 years</option>';
    html += '<option value="8">8 years</option><option value="9">9 years</option>';
    html += '<option value="10">10 years</option><option value="11">11 years</option>';
    html += '</select>';
    html += '</li>';
    html += '</ul>';

    var count = parseInt($(this).parent().find('.guest-number').val());
    var guest_count = parseInt($(this).parents('.select-passenger-count').find('.guest-count').text());
    if (guest_count < 8 && count < 2) {
        $(this).parents('.children-guests').find('.guest-number').val(count + 1);
        $(this).parents('.room-box-parent').find('.childrens-age-box').append(html);
        html = "";
    }
});

// minus count of children guests in hotel tab
$('.room-box-wrapper').on('click', '.children-guests .count-minus', function() {
    var count = parseInt($(this).parent().find('.guest-number').val());
    var guest_count = parseInt($(this).parents('.select-passenger-count').find('.guest-count').text());
    if (count > 0) {
        $(this).parents('.children-guests').find('.guest-number').val(count - 1);
        var length = $('.childrens-age-box ul').length;
        if (length > 0) {
            $('.childrens-age-box ul:last-child').remove();
            html = '';
        }
    }
});

/////////// toggle caret in popular box in index.php
$(document).on('click', '.popular-box .card', function() {
    $(this).find('.fa-caret-up').toggle();
    $(this).find('.fa-caret-down').toggle();
});
/////////// toggle caret help box
$(document).on('click', '.help-box .card', function() {
    $(this).find('.fa-caret-up').toggle();
    $(this).find('.fa-caret-down').toggle();
});

//////////// footer hover
$('.footer-item').hover(function() {
    $(this).find('a').css('color', '#f57c00');
    $(this).find('.footer-white-square').css('background', '#f57c00');
}, function() {
    $(this).find('a').css('color', 'white');
    $(this).find('.footer-white-square').css('background', 'white');
});

////////////////////////// form validation
$('.needs-validation').submit(function(e) {
    var surname = $('#surname').val(); //user input
    var name = $('#name').val(); // user input
    var passport = $('#passport').val(); // user input
    var date = $('#date').val(); // user input
    date_split = date.split('.'); //split date
    var new_date = new Date(date_split[2], date_split[0], date_split[1]);

    var today = new Date(); // today date
    var year = today.getFullYear(); //year
    var month = today.getMonth(); // month
    var day = today.getDate(); //date
    var today_date = day + '.' + month + '.' + year; // format: dd/mm/year

    today_date_split = today_date.split('.'); //split
    var new_today = new Date(today_date_split[2], today_date_split[0], today_date_split[1]); // today

    // regix date
    var dateRegex = /^(?=\d)(?:(?:31(?!.(?:0?[2469]|11))|(?:30|29)(?!.0?2)|29(?=.0?2.(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(?:\x20|$))|(?:2[0-8]|1\d|0?[1-9]))([-.\/])(?:1[012]|0?[1-9])\1(?:1[6-9]|[2-9]\d)?\d\d(?:(?=\x20\d)\x20|$))?(((0?[1-9]|1[012])(:[0-5]\d){0,2}(\x20[AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2})?$/;

    if (surname.length < 3) {
        $('#surname').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#surname').parent().parent().find('.invalid-feedback').hide();
    }
    if (name.length < 3) {
        $('#name').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#name').parent().parent().find('.invalid-feedback').hide();
    }
    if (date == '' || new_date > new_today || dateRegex.test(date) == false) {
        $('#date').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#date').parent().parent().find('.invalid-feedback').hide();
    }
    if (passport.length < 6 || passport.length > 14) {
        $('#passport').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#passport').parent().parent().find('.invalid-feedback').hide();
    }

});

////////////////////////// modal form validation
$('.modal-needs-validation').submit(function(e) {
    var surname = $('#modal-surname').val(); //user input
    var name = $('#modal-name').val(); // user input
    var passport = $('#modal-passport').val(); // user input
    var date = $('#modal-date').val(); // user input
    date_split = date.split('.'); //split date
    var new_date = new Date(date_split[2], date_split[0], date_split[1]);

    var today = new Date(); // today date
    var year = today.getFullYear(); //year
    var month = today.getMonth(); // month
    var day = today.getDate(); //date
    var today_date = day + '.' + month + '.' + year; // format: dd/mm/year

    today_date_split = today_date.split('.'); //split
    var new_today = new Date(today_date_split[2], today_date_split[0], today_date_split[1]); // today

    // regix date
    var dateRegex = /^(?=\d)(?:(?:31(?!.(?:0?[2469]|11))|(?:30|29)(?!.0?2)|29(?=.0?2.(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(?:\x20|$))|(?:2[0-8]|1\d|0?[1-9]))([-.\/])(?:1[012]|0?[1-9])\1(?:1[6-9]|[2-9]\d)?\d\d(?:(?=\x20\d)\x20|$))?(((0?[1-9]|1[012])(:[0-5]\d){0,2}(\x20[AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2})?$/;

    if (surname.length < 3) {
        $('#modal-surname').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#modal-surname').parent().parent().find('.invalid-feedback').hide();
    }
    if (name.length < 3) {
        $('#modal-name').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#modal-name').parent().parent().find('.invalid-feedback').hide();
    }
    if (date == '' || new_date > new_today || dateRegex.test(date) == false) {
        $('#modal-date').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#modal-date').parent().parent().find('.invalid-feedback').hide();
    }
    if (passport.length < 6 || passport.length > 14) {
        $('#modal-passport').parent().parent().find('.invalid-feedback').show();
        e.preventDefault();
    } else {
        $('#modal-passport').parent().parent().find('.invalid-feedback').hide();
    }
});


////// change order of columns when width of window was changed
var width = $(window).width();

if (width < 991) {
    $('.change-ticket').addClass('order-md-9 order-sm-9 order-9');
    $('.flight-tickets').addClass('order-md-3 order-sm-3 order-3');
    $('.select-luggage').addClass('order-md-9 order-sm-9 order-9');
    $('.flight-info').addClass('order-md-3 order-sm-3 order-3');
} else {
    $('.change-ticket').removeClass('order-md-9 order-sm-9 order-9');
    $('.flight-tickets').removeClass('order-md-3 order-sm-3 order-3');
    $('.select-luggage').removeClass('order-md-9 order-sm-9 order-9');
    $('.flight-info').removeClass('order-md-3 order-sm-3 order-3');
}

$(window).on('resize', function() {
    var width = $(window).width();

    if (width < 991) {
        $('.change-ticket').addClass('order-md-9 order-sm-9 order-9');
        $('.flight-tickets').addClass('order-md-3 order-sm-3 order-3');
        $('.select-luggage').addClass('order-md-9 order-sm-9 order-9');
        $('.flight-info').addClass('order-md-3 order-sm-3 order-3');
    } else {
        $('.change-ticket').removeClass('order-md-9 order-sm-9 order-9');
        $('.flight-tickets').removeClass('order-md-3 order-sm-3 order-3');
        $('.select-luggage').removeClass('order-md-9 order-sm-9 order-9');
        $('.flight-info').removeClass('order-md-3 order-sm-3 order-3');
    }
});

///////////// show and hide map
$('.btn-show-map').click(function() {
    $(this).hide();
    $('.btn-hide-map').show();
    $('.map-part').show(200);
    $('.btn-map').removeClass('btn-map-active');
    $('.btn-hide-map').addClass('btn-map-active');
});
$('.btn-hide-map').click(function() {
    $(this).hide();
    $('.btn-show-map').show();
    $('.map-part').hide();
    $('.btn-map').removeClass('btn-map-active');
});

////////////
$(document).on('click', '.btn-refresh', function() {
    $('.alert-box').hide(200);
});

/////// show and hide share box by click on share icon
$(document).on('click', '.share', function() {
    $(this).parents('ul').find('.share-box').show(200);
});

$(document).on('click', '.close-share , .share-box ul li', function() {
    $(this).parents('ul').find('.share-box').hide(200);
});
