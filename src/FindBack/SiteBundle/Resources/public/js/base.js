$(function() {

    /**
     * title  : hilight code
     */
    //$('pre.code').highlight({source:1, zebra:1, indent:'space', list:'ol'});

    /**
     * title  : Menu dropdown script
     * author : Peltho 
     */
    $( ".menu > li > a" ).each(function() {
        var wrapper = $(this).next('ul');
        $(this).parent('li').hover(
            function () {
                wrapper.slideDown();
            },
            function () {
                wrapper.slideUp();
            }
        );
    });

});