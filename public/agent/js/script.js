var hotels_slider = new Swiper('.hotels-slider', {
    slidesPerView: 3,
    centeredSlides: false,
    spaceBetween: 30,
    navigation: {
        nextEl: '.hotels-slider .swiper-button-next',
        prevEl: '.hotels-slider .swiper-button-prev',
    },
    breakpoints: {
        991: {
            slidesPerView: 2,
        },
        767: {
            slidesPerView: 1,
        }
    }
});

var flights_slider = new Swiper('.flights-slider', {
    slidesPerView: 3,
    centeredSlides: false,
    spaceBetween: 30,
    navigation: {
        nextEl: '.flights-slider .swiper-button-next',
        prevEl: '.flights-slider .swiper-button-prev',
    },
    breakpoints: {
        991: {
            slidesPerView: 2,
        },
        767: {
            slidesPerView: 1,
        }
    }
});

(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('form1');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
          
            
        });
    }, false);
})();

(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('form2');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                $('.select2').css('border-color', '#28a745');
            }, false);
        });
    }, false);
})();