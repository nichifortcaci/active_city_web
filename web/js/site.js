/**
 * Created by hobroker on 7/23/16.
 */
$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
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

    $('#support').click(support);

    $(document).on('submit', '#myModal #feed-create', feedCreate);

    $(document).ajaxComplete(function () {

        initialize();

        var elements = $('#feed-start_datetime, #feed-end_datetime');
        if (elements.length) {
            elements.bootstrapMaterialDatePicker({format: 'YYYY-MM-DD HH:mm', minDate: new Date()});
        }
        // $('#find_me').click();
    });

    $('#myModal').on('show.bs.modal', function () {
        loadFeedForm();
    })
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

function feedCreate(e) {
    e.preventDefault();
    var me = $(this);
    var data = me.serializeObject();
    $.ajax({
        url: '/feed/create',
        data: data,
        type: 'post',
        success: function (response) {
            if (!response)
                alert(messages.oops);
            else {
                if (!response) {
                    _snack('Something went wrong!');
                } else {
                    _snack('OK!');

                    $('#myModal').modal('hide');
                    $('#feed-body').empty();
                }
            }
        }
    });
    return false;
}

function loadFeedForm() {
    $.ajax({
        url: '/feed/create',
        success: function (response) {
            $('#feed-body').html(response);
        }
    });
}