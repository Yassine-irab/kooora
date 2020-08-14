$(document).ready(function() {    

// From http://learn.shayhowe.com/advanced-html-css/jquery

// Change tab class and display content
$('.tab a').on('click', function (event) {
    event.preventDefault();
    
    $('.active').removeClass('active');
    $(this).addClass('active');
    $('.tabcontent').hide();
    $($(this).attr('href')).show();
});

    
});
