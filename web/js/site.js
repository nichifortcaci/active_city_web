/**
 * Created by hobroker on 7/23/16.
 */
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

    $('#fake-add-comm').click(fakeComm)
});

function fakeComm() {
    alert()
}