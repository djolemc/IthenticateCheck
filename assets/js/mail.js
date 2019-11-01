

tinymce.init({
    selector: '.mytextarea',
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }

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

            }
        });
        e.preventDefault();
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


