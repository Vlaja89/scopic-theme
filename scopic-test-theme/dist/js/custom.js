jQuery(function($){

    // Remove Href Tag On First Menu Item
    $('ul').find('li:has(ul)').children('a').removeAttr('href')

    // Display Submeni on Parent Click
    $('.menu-item-has-children').children('a').on('click', function(event){
        event.preventDefault();
        $(this).next('.sub-menu').slideToggle(100).end().parent('.menu-item-has-children').siblings('.menu-item-has-children').children('a').next('.sub-menu').slideUp(100);
    });

});
