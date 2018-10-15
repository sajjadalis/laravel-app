$(document).ready(function() {
    $('.js-like-article').on('click', function(e) {
        e.preventDefault();

        var $link = $(e.currentTarget);
        $link.toggleClass('far').toggleClass('fas');

        //$('.js-like-article-count').html('TEXT');
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: 'POST',
            url: $link.attr('href')
        }).done(function(data) {
            console.log(data);
            $('.js-like-article-count').html(data.hearts);
        })
     });
});