

tinymce.init({
    selector: '.mytextarea'
});

$(function () {
    $('.mail_forma').on('submit', function (e) {
        var postdata = $(this).serializeArray();

        console.log(postdata);
        $.ajax({
            type: 'post',
            url: 'form.php',
            data: postdata,
            success: function (response) {


                console.log(response);
                // location.reload();
            }
        });
        e.preventDefault();
        // e.unbind();
    });

    $('input[type=submit]').click(function () {
        $(this).prop("disabled", true);
        $(this).css("background", 'gray');
        $(this).prop("value", "Poslato");

        $(this).closest('form').trigger('submit');


    });

});


