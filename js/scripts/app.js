(function ($) {
    $(document).foundation();

    var fixCaption = _.debounce(function() {

        $('figure').each(function(){
            var capHeight = $(this).find('.wp-caption-text').outerHeight() + 10;
            $(this).css('margin-bottom', capHeight + 'px');
        });

    }, 200);

    fixCaption();
    $(window).on('resize', fixCaption);
})(jQuery);