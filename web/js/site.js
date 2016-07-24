/**
 * Created by hobroker on 7/23/16.
 */

var notifications;

$(function () {
    $.material.init();
    $.material.ripples();
    $.material.input();
    $.material.checkbox();
    $.material.radio();
    $("#owl-example").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

    $('#comment-form').submit(fakeComm);

    notifications = setInterval(notify, 1000);

    $('#support').click(support)
});

function fakeComm() {
    var template = $('.hidden .comm-item').clone();
    var input = $('#addon2');
    template.find('.comm-user-comment').text(input.val());
    var d = new Date();
    template.find('.time').text(d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds());
    input.val('');
    template.appendTo('#comments');
    return false;
}

function notify() {
    var content = "This is my awesome snackbar!";

    // $.snackbar({content: content});
}

function support() {
    var me = $(this);
    var feed_id = me.attr('data-feed-id');
    $.ajax({
        url: '/support/create',
        data: {
            'feed_id': feed_id
        },
        type: 'post',
        success: function (response) {
            if (!response) {
                _snack('Something went wrong!');
            } else {
                _snack('Thank you!');
                me.prop('disabled', true);
            }
        }
    });
}

function _snack(content) {
    $.snackbar({content: content});
}