var btn = $('#scroll-up');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

if(window.location.hash){
    let hash = window.location.hash;
    if($(hash).length) {
        $('html,body').animate({
            scrollTop: $(hash).offset().top - 120
        }, 900, '');
    }
}