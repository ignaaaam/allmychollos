require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// CATEGORY BUTTONS
$(document).ready(function() {

    const left = document.getElementById('left');
    const right = document.getElementById('right');

    const slider = document.getElementById('category-container');

    left.onclick = function () {
        document.getElementById('category-container').scrollLeft -= 200;
    }

    right.onclick = function () {
        document.getElementById('category-container').scrollLeft += 200;
    }
});

// SWIPER

const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,
    spaceBetween: 100,
    slidesPerView: 1,

    breakpoints: {
        // when window width is >= 640px
        1650: {
            slidesPerView: 2,
            spaceBetween: 100
        }
    },
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
