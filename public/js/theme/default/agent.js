
// $("#top-menu .tab a").each(function () {
//     let pageUrl = window.location.href.split(/[?#]/)[0];
//
//     if (this.href === pageUrl) {
//         let tab = $(this).addClass("active").parent().parent().addClass("active").attr('data-tab');
//         $('a[data-tab="' + tab + '"]').addClass("active");
//     }
// });


$(document).ready(function(){
    $('.accordion').accordion({selector: {trigger: '.title'}});
    $('.contact-list .item').tab();
    $('.chat-sections .item').tab();
    $('.ui.dropdown').dropdown();
});



