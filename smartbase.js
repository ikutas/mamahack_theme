$(function() {
    var pageTop = $('#page-top');
    pageTop.hide();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 400) {
            pageTop.fadeIn();
        } else {
            pageTop.fadeOut();
        }
    });
    pageTop.click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('.pagination')[0].scrollLeft = $('.pagination .current').position().left - 100;
});
$(document).ready(function() {
    $(".acordion_tree").css("display", "none");
    $(".trigger").click(function() {
        if ($("+.acordion_tree", this).css("display") == "none") {
            $(this).addClass("active");
            $("+.acordion_tree", this).slideDown("normal");
        } else {
            $(this).removeClass("active");
            $("+.acordion_tree", this).slideUp("normal");
        }
    });
});
