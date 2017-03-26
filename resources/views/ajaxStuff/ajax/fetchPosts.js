function fetchPost(lastpage, postitused) { //fetchimine siin
    var page = lastpage.data('next-page');
    if (page !== null) { //Kui meil veel midagi fetchida, juurde laadida, näitame laadimise ajal loading gifi ja laeme ajaxi abil juurde
        $('.loading').show();
        clearTimeout($.data(this, "scrollCheck"));
        $.data(this, "scrollCheck", setTimeout(function () {
            var scroll_position_for_post_load = $(window).height() + $(window).scrollTop() + 100;
            if (scroll_position_for_post_load >= $(document).height()) {
                $.get(page, function (data) {
                    postitused.append(data.postitus);
                    lastpage.data('next-page', data.next_page);

                });
                $('.loading').hide(); //Kui info laetud kaotame loading gifi
            }
        }, 350))
    } else { //Kui jõumae lõppu
        $('.loading').hide();
    }
}