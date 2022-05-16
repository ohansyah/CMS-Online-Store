
$('ul.pagination').hide();
$(function () {
    $('.scrolling-pagination').jscroll({
        autoTrigger: true,
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.scrolling-pagination',
        callback: function () {
            $('ul.pagination').remove();
        }
    });
});