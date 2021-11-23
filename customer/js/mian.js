$(function () {
    'use strict';

    $(".open-search, .search-close").on("click", function() {
        $(".nav-search").toggleClass("d-lg-block");
    });


    // $(".product-imgs li img").on("click", function() {

    //     $(".product-img img").attr("src", "");

    // });


    $(".arrow-down, .fa-arrow-down").on("click", function() {

        $(".quantity-num").val( parseInt($(".quantity-num").val()) -1);
    });

    $(".arrow-up, .fa-arrow-up").on("click", function() {

        $(".quantity-num").val( parseInt($(".quantity-num").val()) +1);
    });


});