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