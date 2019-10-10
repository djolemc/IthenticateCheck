

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


                alert(response);
                // location.reload();
            }
        });
        e.preventDefault();
        // e.unbind();
    });

    $('input[type=submit]').click(function () {
        $(this).prop({
            disabled: true,
            value: "Poslato"
        });
        $(this).css("background", 'gray');
        $(this).closest('form').trigger('submit');


    });

});


