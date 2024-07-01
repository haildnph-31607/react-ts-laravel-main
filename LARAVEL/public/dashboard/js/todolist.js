/**
 * Template Name: Sophia- Responsive Bootstrap 4 Admin Dashboard
 * Author: Lamarena
 * Module/App: Main Js
 */


(function ($) {

    'use strict';
    $(document).ready(function () {

        $('#list-items').html(localStorage.getItem('listItems'));

        $('.add-items').submit(function(event)
        {
            event.preventDefault();

            var item = $('#todo-list-item').val();

            if(item)
            {
                $('#list-items').append("<li><input class='checkbox' type='checkbox'/>" + item + "<a class='remove mdi mdi-close-circle-outline'></a><hr></li>");

                localStorage.setItem('listItems', $('#list-items').html());

                $('#todo-list-item').val("");
            }

        });

        $(document).on('change', '.checkbox', function()
        {
            if($(this).attr('checked'))
            {
                $(this).removeAttr('checked');
            }
            else
            {
                $(this).attr('checked', 'checked');
            }

            $(this).parent().toggleClass('completed');

            localStorage.setItem('listItems', $('#list-items').html());
        });

        $(document).on('click', '.remove', function()
        {
            $(this).parent().remove();

            localStorage.setItem('listItems', $('#list-items').html());
        });

    });

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    init();

})(jQuery)

