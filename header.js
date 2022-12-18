

$(document).ready(function(){
    $('.hamburgerBtn').click(function () {
        $(this).toggleClass('open');
        $('.menu').toggleClass('active');
    });
});

// 스크롤 탑
  $('#scrollTop').bind('click', function() {
    $('html, body').animate({scrollTop: '0'}, 680);
    console.log("clicke");
  });