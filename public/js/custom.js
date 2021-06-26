////////// sidebar-menu
$(document).on('click', '.sidebar-item', function() {
    $(this).find('.sidebar-subitem-wrapper').toggle();
});
/////////// toggle sidebar menu
$('.humberger-menu').click(function(e) {
    $('.sidebar-menu').toggleClass('close-menu');
    e.stopPropagation();

});

$(document).click(function(e) {
    if (!$(e.target).is('.humberger-menu,.sidebar-item,.sidebar-subitem-wrapper,.sidebar-subitem,.sidebar-item a')) {
        $('.sidebar-menu').removeClass('close-menu');
    }
});


////////
$(document).on('click', '.modern-nav-toggle', function() {

    $('.inner-back').toggleClass('inner-back-extend');

    $('.map-fix').toggleClass('w-45');

});



//////////// expire modal

$('#expire-modal').modal('show');

$(document).on('click', '.btn-back-to-hotel', function() {

    $('#expire-modal').modal('hide');

});



///////////// map height

var height = $(window).height();

$('.hotel-map').css('height', height);



/////////// SORT

$(document).on('click', '.sort-dropdown-menu a', function() {

    var sort = $(this).text();

    $('.sortby').text(sort);

});



/////////// currency

$(document).on('click', '.currency-dropdown-menu a', function() {

    var currency = $(this).text();

    $('.currency span').text(currency);

});



/////////// bookmark

$(document).on('click', '.nobookmark', function() {

    $(this).removeClass('nobookmark').addClass('bookmarked');

    $(this).html('<i class="fa fa-bookmark fa-fw"></i>')

});

$(document).on('click', '.bookmarked', function() {

    $(this).removeClass('bookmarked').addClass('nobookmark');

    $(this).html('<i class="fa fa-bookmark-o fa-fw"></i>')

});



////////////// filter and search sidebar

$(document).on('click', '.btn-apply-filter , .close-filter', function() {

    $('.app-filter').css('transform', 'translate3d(0, 0, 0)');

    $('.app-search').css('transform', 'translate3d(0, 0, 0)');

    $('.sidenav-overlay').removeClass('d-block').addClass('d-none');

    $('body').removeClass('modal-open');

});

$(document).on('click', '.filters-toggle', function() {

    $('.app-filter').css('transform', 'translate3d(350px, 0, 0)');

    $('.sidenav-overlay').removeClass('d-none').addClass('d-block');

    $('body').addClass('modal-open');

});

$(document).on('click', '.update-search', function() {

    // $('.app-search').css('transform', 'translate3d(350px, 0, 0)');
    //
    // $('.sidenav-overlay').removeClass('d-none').addClass('d-block');
    //
    // $('body').addClass('modal-open');

});

$(document).on('click', '.sidenav-overlay', function() {

    $('.app-filter').css('transform', 'translate3d(0, 0, 0)');

    $('.app-search').css('transform', 'translate3d(0, 0, 0)');

    $('body').removeClass('modal-open');

});



//////////////

$("#mapSwitch").on('change', function() {

    if ($('#mapSwitch').prop('checked')) {

        $('.hotels-section').removeClass('col-xl-12').addClass('col-xl-6 col-lg-8 col-md-12');

        $('.hotel-col').removeClass('col-lg-6 col-md-6 col-sm-6').addClass('col-lg-12 col-md-6 col-sm-6');

        $('.map-fix').show();

    } else {

        $('.hotels-section').removeClass('col-xl-6 col-lg-8 col-md-12').addClass('col-xl-12');

        $('.hotel-col').removeClass('col-lg-12 col-md-6 col-sm-6').addClass('col-lg-6 col-md-6 col-sm-6');

        $('.map-fix').hide();

    }

});



//////// data for city and hotels

var data_hotel = [{

        id: 0,

        text: '<div><span class="float-left">Tehran</span> <span class="text-muted short-city float-right">Thr</span></div>',

        html: '<div>Tehran, <span class="text-muted">Iran</span><span class="text-muted float-right">3660 hotel</span></div>',

    },

    {

        id: 1,

        text: '<div><span class="float-left">Istanbul</span> <span class="text-muted short-city float-right">Ist</span></div>',

        html: '<div>Istanbul, <span class="text-muted">Turkey</span><span class="text-muted float-right">5236 hotel</span></div>',

    }, {

        id: 2,

        text: '<span class="float-left">radison hotel</span> <span class="text-muted short-city float-right">Ist</span></div>',

        html: '<div>radison hotel, <span class="text-muted">Istanbul</span></div>',

    }

];



///////// select box choose city or hotel

$(".select2-hotel").select2({

    data: data_hotel,

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



/////// data for city and airports

var data_flight = [{

        id: 0,

        text: '<div><span class="float-left">Tehran</span> <span class="text-muted short-city float-right">Thr</span></div>',

        html: '<div>Tehran, <span class="text-muted">Iran</span><span class="text-muted float-right">Thr</span></div>',

    },

    {

        id: 1,

        text: '<div><span class="float-left">Imam khomeini</span> <span class="text-muted short-city float-right">Thr</span></div>',

        html: '<div><i class="fa fa-plane text-muted ml-1 mr-1"></i>Imam khomeini <span class="text-muted float-right">Thr</span></div>',

    }, {

        id: 2,

        text: '<span class="float-left">Istanbul</span> <span class="text-muted short-city float-right">IST</span></div>',

        html: '<div>Istanbul, <span class="text-muted">turkey</span><span class="text-muted float-right">IST</span></div>',

    }, {

        id: 3,

        text: '<span class="float-left">Istanbul new airport</span> <span class="text-muted short-city float-right">IST</span></div>',

        html: '<div><i class="fa fa-plane text-muted ml-1 mr-1"></i>Istanbul new airport <span class="text-muted float-right">IST</span></div>',

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



///////////////

$('.t-datepicker').tDatePicker({

    titleCheckIn: 'Select dates',

    titleCheckOut: '',

    numCalendar: 2,

    valiDation: false,

    titleCheckIn: 'Check In',

    titleCheckOut: 'Check Out',

    titleDateRange: 'night',

});




///////////////

$('#modify-search-modal .t-datepicker').tDatePicker({

    titleCheckIn: 'Select dates',

    titleCheckOut: '',

    numCalendar: 1

});



////////////

$('.app-search .t-datepicker').tDatePicker({

    titleCheckIn: 'Select dates',

    titleCheckOut: '',

    numCalendar: 1

});



////////////////////////// form validation

$('.needs-validation').submit(function(e) {

    var fname = $('#fname').val(); //user input

    var lname = $('#lname').val(); // user input

    var birth = $('#birth').val(); // user input

    var passport = $('#passport').val(); // user input

    var expire = $('#expire').val(); // user input



    if (fname.length < 3) {

        $('#fname').parent().parent().find('.invalid-feedback').show();

        e.preventDefault();

    } else {

        $('#fname').parent().parent().find('.invalid-feedback').hide();

    }

    if (lname.length < 3) {

        $('#lname').parent().parent().find('.invalid-feedback').show();

        e.preventDefault();

    } else {

        $('#lname').parent().parent().find('.invalid-feedback').hide();

    }

    if (birth.length == '') {

        $('#birth').parent().parent().find('.invalid-feedback').show();

        e.preventDefault();

    } else {

        $('#birth').parent().parent().find('.invalid-feedback').hide();

    }

    if (expire.length == '') {

        $('#expire').parent().parent().find('.invalid-feedback').show();

        e.preventDefault();

    } else {

        $('#expire').parent().parent().find('.invalid-feedback').hide();

    }

    if (passport.length < 6 || passport.length > 14) {

        $('#passport').parent().parent().find('.invalid-feedback').show();

        e.preventDefault();

    } else {

        $('#passport').parent().parent().find('.invalid-feedback').hide();

    }

});



////// change order of columns when width of window was changed

var width = $(window).width();



if (width < 991) {

    $('.select-luggage').addClass('order-md-9 order-sm-9 order-9');

    $('.flight-info').addClass('order-md-3 order-sm-3 order-3');

} else {

    $('.select-luggage').removeClass('order-md-9 order-sm-9 order-9');

    $('.flight-info').removeClass('order-md-3 order-sm-3 order-3');

}



$(window).on('resize', function() {

    var width = $(window).width();



    if (width < 991) {

        $('.select-luggage').addClass('order-md-9 order-sm-9 order-9');

        $('.flight-info').addClass('order-md-3 order-sm-3 order-3');

    } else {

        $('.select-luggage').removeClass('order-md-9 order-sm-9 order-9');

        $('.flight-info').removeClass('order-md-3 order-sm-3 order-3');

    }

});



// Avoid close select count dropdown when click inside

$('.count-box .dropdown-menu').on("click.bs.dropdown", function(e) {

    e.stopPropagation();

    e.preventDefault();

});



// $('.adults-box .bootstrap-touchspin-up , .adults-box .bootstrap-touchspin-down').click(function() {

//     var count = $(this).parents('.adults-box').find('.touchspin').val();

//     $('.hotel-adult').text(count);

//     $('.passenger-adult-count').text(count);

// });



var html = '';

$('.hotel-rooms').text(1);

$('#hotel-rooms').val(1);

$('.rooms-box .bootstrap-touchspin-up').click(function() {

    var count = $(this).parents('.rooms-box').find('.touchspin').val();

    $('.hotel-rooms').text(count);

    $('#hotel-rooms').val(count);



    html += '<div class="room-passengers-wrapper">'

    html += '<a class="dropdown-item adult-dropdown-item">';

    html += '<ul class="list-unstyled list-inline">';

    html += '<li class="list-inline-item">Adult</li>';

    html += '<li class="list-inline-item">';

    html += '<select class="select2-customize-result form-control" id="select2-customize-result-adult" name="rooms[' + count + '][adults]">';

    html += '<option value="1" selected>1</option>';

    html += '<option value="2">2</option>';

    html += '<option value="3">3</option>';

    html += '<option value="4">4</option>';

    html += '<option value="5">5</option>';

    html += '<option value="6">6</option>';

    html += '<option value="7">7</option>';

    html += '<option value="8">8</option>';

    html += '<option value="9">9</option>';

    html += '<option value="10">10</option>';

    html += '<option value="11">11</option>';

    html += '</select>';

    html += '</li>';

    html += '</ul>';

    html += '</a>';



    html += '<a class="dropdown-item">';

    html += '<ul class="list-unstyled list-inline">';

    html += '<li class="list-inline-item">Children</li>';

    html += '<li class="list-inline-item">';

    html += '<select class="select2-customize-result form-control" id="select2-customize-result-children"  name="rooms[' + count + '][child]">';

    html += '<option value="0" selected>0</option>';

    html += '<option value="1">1</option>';

    html += '<option value="2">2</option>';

    html += '<option value="3">3</option>';

    html += '<option value="4">4</option>';

    html += '<option value="5">5</option>';

    html += '<option value="6">6</option>';

    html += '<option value="7">7</option>';

    html += '<option value="8">8</option>';

    html += '<option value="9">9</option>';

    html += '<option value="10">10</option>';

    html += '<option value="11">11</option>';

    html += '</select>';

    html += '</li>';

    html += '</ul>';

    html += '</a>';

    html += '</div>';



    $('.room-passengers-here').html(html);

});



$('.rooms-box .bootstrap-touchspin-down').click(function() {

    var count = $(this).parents('.rooms-box').find('.touchspin').val();

    if (count > 0) {

        $('.hotel-rooms').text(count);

        $('#hotel-rooms').val(count);

    } else {

        $('.hotel-rooms').text(1);

        $('#hotel-rooms').val(1);

    }



    var length = $('.room-passengers-here .room-passengers-wrapper').length;

    if (length > 0) {

        $('.room-passengers-here .room-passengers-wrapper:nth-child(1)').remove();

        html = '';

    }

});





$('.select-nationality .dropdown-item').click(function() {

    var nationality = $(this).text();

    $('.select-nationality .btn span').text(nationality);

});

$('.select-currency .dropdown-item').click(function() {

    var currency = $(this).text();

    $('.select-currency .btn span').text(currency);

});



//////////////  SHOW AND HIDE INPUT IN NOTE BOX (hotel-book)

$(document).on('change', '.notes-box .custom-control', function() {

    var val = $(this).find('input').val();

    if (val == 'other') {

        $(".other-note").toggle();

    }

});



//////////// remove return date

$('.remove-return').click(function() {

    $(this).parents('.t-datepicker').find('.t-day-check-out').text('');

    $(this).parents('.t-datepicker').find('.t-month-check-out').text('');

    $(this).parents('.t-datepicker').find('.t-year-check-out').text('');

});



//////////// remove check out date

$('.remove-checkout').click(function() {

    $(this).parents('.t-datepicker').find('.t-day-check-out').text('');

    $(this).parents('.t-datepicker').find('.t-month-check-out').text('');

    $(this).parents('.t-datepicker').find('.t-year-check-out').text('');

});



///////// SHOW AND HIDE ROOMS

$('.rooms-toggle-btn').click(function() {

    $(this).parents('.hotel-box').find('.rooms').toggle(200);

});



//////////// SHOW AND HIDE MAP

$(document).on('click', '.show-map-btn', function() {

    $(this).hide();

    $('.hide-map-btn').show();

    $('.map-part').show();

});

$(document).on('click', '.hide-map-btn', function() {

    $(this).hide();

    $('.show-map-btn').show();

    $('.map-part').hide();

});



///////////// show and hide share box

$('.share-icon').click(function() {

    $('.share-box').hide(100);

    $(this).parents('ul').find('.share-box').show(100);

});

$('.close-share').click(function() {

    $(this).parents('ul').find('.share-box').hide(100);

});



///////////// popular filters btn active

$('.popular-filters-box .btn').click(function() {

    $('.popular-filters-box .btn').removeClass('btn-primary');

    $(this).addClass('btn-primary');

});



////////// show table calendar by collapse in top of search.php

$(document).on('click', '.open-collapse , .table-calendar', function() {

    $('.open-collapse').hide();

    $('.calendar-part').animate({ height: '350px' });

    $('.close-collapse').show();

    $('.neighboring-date-slider').hide();

    $('.graph-calendar').removeClass('text-primary');

    $('.table-calendar').addClass('text-primary');

});



////////// show graph calendar by collapse in top of search.php

$(document).on('click', '.close-collapse , .graph-calendar', function() {

    $('.close-collapse').hide();

    $('.calendar-part').animate({ height: '80px' });

    $('.open-collapse').show();

    $('.neighboring-date-slider').show();

    $('.table-calendar').removeClass('text-primary');

    $('.graph-calendar').addClass('text-primary');

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



/////////////

$(document).on('click', '.neighboring-date-slider .swiper-slide', function() {

    $('.neighboring-date-slider .swiper-slide').removeClass('active-date');

    $(this).addClass('active-date');

    $('.progress-bar').animate({ 'width': '100%' }, 1000);

    $('.neighboring-dates-left').hide();

    $('.neighboring-dates-left-loading').show();

});



///////////// NO UI SLIDER

var slider1 = document.getElementById('range-slider1');

noUiSlider.create(slider1, {

    start: [0, 100],

    connect: true,

    range: {

        'min': 0,

        'max': 100

    }

});



////////

var slider2 = document.getElementById('range-slider2');

noUiSlider.create(slider2, {

    start: [0, 100],

    connect: true,

    range: {

        'min': 0,

        'max': 100

    }

});



/////////

var modal_slider1 = document.getElementById('modal-range-slider1');

noUiSlider.create(modal_slider1, {

    start: [0, 100],

    connect: true,

    range: {

        'min': 0,

        'max': 100

    }

});



///////

var modal_slider2 = document.getElementById('modal-range-slider2');

noUiSlider.create(modal_slider2, {

    start: [0, 100],

    connect: true,

    range: {

        'min': 0,

        'max': 100

    }

});
