function redirectToEdit(route) {
    window.location.href = route;
}


$(document).ready(function () {
    var thisAppend = jQuery('#appendedInput');
    $('#thisImage').click(function () {
        if (thisAppend.children().length === 0) {
            thisAppend.append(
            '<input type="file" class="form-control-file" name="image" id="image"\n' +
            'value="{{old(\'image\')}}">' + '<input type="hidden" name="effacer" value="effacer">')
        }

    });
    $('.a_link').click(function () {

        $(this).parent().submit();


    })
});
