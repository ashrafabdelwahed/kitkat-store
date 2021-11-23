$(function () {
    'use strict';

    $(".toggle-sidebar").on('click', function() {
        $('.content-area, .sidebar').toggleClass('no-sidebar');
    });

    // toggle submenu

    $('.toggle-submenu').on('click', function() {

        $(this).find('.fa-angle-right').toggleClass('down');

        $(this).next('.child-links').slideToggle();

    });

});