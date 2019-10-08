/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
*
 **/




function myFunction(obj) {
    var link = obj.getAttribute("href");
    var href = link.split(".");
    var ext = href.slice(-1)[0];
    if (ext == 'pdf') {
        //document.getElementById('frame').innerHTML = `<iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="../assets/files/${link}" frameborder="1" scrolling="auto" width="50%" ></iframe>`;
        document.getElementById('frame').innerHTML = '<iframe title="PDF in an i-Frame" src="../assets/files/' + link + '" frameborder="1" scrolling="auto"  ></iframe>';
    }
    else if (ext == 'docx' || ext == 'doc') {
        document.getElementById('frame').innerHTML = '<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=' + link + '" frameborder="0">This is an embedded <a target="_blank" href="http://office.com">Microsoft Office</a> document, powered by <a target="_blank" href="http://office.com/webapps">Office Online</a>.</iframe>';
    }
    else {
        document.getElementById('frame').innerHTML = "Kliknite na link da pogledate fajl.";
    }
    return false;
}

if (window.location.pathname.split("/").pop() === 'index.php') {
    $(document).ready(function () {

        $("#spinner").append("<img class='spiner' src='../assets/images/loading.gif'>");





        $.ajax({
            url: "index.php",
            type: "post",
            data: 'index_load',
            success: function (response) {
                $("#spinner").hide();
                setTimeout(function () {
                var data = JSON.parse(response);
                console.log(data);
                var trHTML = '';
                $.each(data, function (i, item) {

                    files_array = item.filenames;
                    trHTML += '<div class="form[checked' + i + ']  single_row">';
                    trHTML += '<div class="w3">';
                    trHTML += ' <span  class="form[checked' + i + '] remove_button"  data-toggle="tooltip" title="Remove file"  name="form[checked<?php echo $i?>][]" onclick="deleteX(this); countDivs();">X</span><br>';
                    trHTML += '<span class="form[checked' + i + '] number">' + " " + (i+1) + ". " + '</span>';
                    trHTML += '</div>';

                    trHTML += '<div class="w25">';

                    trHTML += '<span id="autori">Prezime i ime autora:';
                    trHTML += '<input class="form[checked' + i + '] input-res" type="text" name="form[checked' + i + '][]" value="' + item.author_last + '"><br>';
                    trHTML += '<input class="form[checked' + i + ']" type="text" name="form[checked' + i + '][]" value="' + item.author_first + '">';
                    trHTML += '</span></div>';

                    trHTML += '<div class="w60">';
                    trHTML += '<input class="form[checked' + i + '] journal_title" type="text" hidden name="form[checked' + i + '][]" value="' + item.journal_title + '">'+'Časopis: '+'<strong>' +item.journal_title +'</strong><span>';
                    // trHTML += '<span class="form[checked' + i + '] journal_title" type="text" name="form[checked' + i + '][]" value="' + item.journal_title + '">'+'Časopis: '+'<strong>' +item.journal_title +'</strong><span>';
                    trHTML += '<textarea class="form[checked' + i + '] title" rows="3" type="text" name="form[checked' + i + '][]">' + item.submission_title + "\\" + item.submission_id + "\\" + '</textarea>';
                    trHTML += '<span id="filename" class="proba">' +'Naziv dokumenta: '+ item.filenames[0] + '</span>';
                    trHTML += '</div>';

                    trHTML += '<div class="w10">';


                    trHTML += ' <button id="0" class="form[checked' + i + '] view_button"  href="1.pdf" onclick="myFunction(this);return false">Pogledaj dokument</button><br class="form[checked' + i + ']">';
                    if (files_array.length > 1) {

                        trHTML += '<span class="pf"><i class="fa fa-arrow-left"></i></span>';
                        trHTML += '<span class="nf"><i class="fa fa-arrow-right"></i></span>';
                    }
                    trHTML += '</div>';
                    trHTML += '</div>';


                    trHTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.journal_issn + '">';
                    trHTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.ithenticate_id + '">';
                    trHTML += '<span class="filename"><input class="form[checked' + i + '] file" type="hidden" name="form[checked' + i + '][]" value="' + item.filenames[0] + '"></span>';
                    trHTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.ithenticatePassword + '">';
                    trHTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.ithenticateUsername + '">';
                    trHTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.journal_id + '">';
                    trHTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.mail_to + '">';
                    trHTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.path + '">';





                    trHTML += '</div>';


                });
                $('#single_submission').append(trHTML);
                    $("#submit_button").show();

                // i=1;
                length = files_array.length;


                $('.nf').bind("click", function () {

                    i = $(this).siblings('button').attr("id");


                    i++;
                    if (i == length + 1) {
                        i = 0
                    }
                    $(this).siblings('button').attr("href", (files_array[i]));
                    $(this).siblings('button').attr("id", (i));
                    $('.proba').html('Ime dokumenta: '+ files_array[i]);
                    $('#file_id').attr("value", (files_array[i]));
                    (($(this).siblings('.filename').children('input').attr('value', files_array[i])));

                    if (i > length) {
                        i = 0
                    }
                });

                //o = i;
                $('.pf').bind("click", function () {
                    i = $(this).siblings('button').attr("id");
                    console.log(i);
                    if (i == 0) {
                        i = length + 1
                    }
                    i--;
                    $(this).siblings('button').attr("href", (files_array[i]));
                    $(this).siblings('button').attr("id", (i));
                    (($(this).siblings('.filename').children('input').attr('value', files_array[i])));
                    $('.proba').html('Ime dokumenta: '+ files_array[i]);

                });
            }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // console.log(textStatus, errorThrown);
            }

        });

    });


}


//Brise rad iz forme koji ne treba da s esalje na proveru

function deleteX(obj) {
   if (confirm('Da li ste sigurni da želite da obrišete ovaj fajl?')) {
       className = (obj.className.split(" ")[0]);
       // console.log(className);

       var elements = document.getElementsByClassName(className);
       while (elements.length > 0) {
           elements[0].parentNode.removeChild(elements[0]);
       }
   }
}

//Prikazuje poruku ako nema radova za slanje na proveru

function countDivs() {
    var numItems = $('.single_row');
    console.log(numItems.length);

    if (numItems.length === 0) {
        $("#submit_button").hide();
        $('#test_forma').append('<p class="file_text">Nema fajlova za proveru, pokušajte kasnije</p>');
    }
}

$(document).ready(function () {
    $('#logout').bind("click", function () {
        $.ajax({
            url: "login.php",
            type: 'post',
            data: 'logout',
            success: function (response) {
                console.log('kliknuo!');
                window.location.href = response;
            }
        });
    });
});






