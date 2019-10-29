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
    var path = obj.getAttribute("name");
    var href = link.split(".");
    var ext = href.slice(-1)[0];
    if (ext == 'pdf') {
        //document.getElementById('frame').innerHTML = `<iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="../assets/files/${link}" frameborder="1" scrolling="auto" width="50%" ></iframe>`;
        document.getElementById('frame').innerHTML = '<iframe title="PDF in an i-Frame" src="http://aseestant.ceesprod.mysafeservers.com' + path +'/'+ link + '" frameborder="1" scrolling="auto"  ></iframe>';
    } else if (ext == 'docx' || ext == 'doc') {
       /* office online viewer, ne cita rtf */
       
       document.getElementById('frame').innerHTML = '<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=http://aseestant.ceesprod.mysafeservers.com' + path +'/'+ link + '" frameborder="0"></iframe>';
    }
        else if (ext=='rtf') {
      //google docs viewer
        document.getElementById('frame').innerHTML = '<iframe src="http://docs.google.com/gview?url=http://aseestant.ceesprod.mysafeservers.com' + path +'/'+ link + '&embedded=true"></iframe>';
      

      console.log(document.getElementById('frame').innerHTML);
    } else {
        document.getElementById('frame').innerHTML = "Kliknite na link da pogledate fajl.";
    }
    return false;
}


if (window.location.pathname.split("/").pop() === 'index.php') {
    $(document).ready(function () {

        // function getFileSize(filename) {
        //     var result = $.ajax({
        //         url: "ithenticate.php",
        //         type: 'post',
        //         async: false,
        //         data: {
        //             getFileSize : true,
        //             file:filename
        //         },
        //         success: function (response) {
        //             return response;
        //         }
        //     }).responseText;
        //     return result;
        // }


        $("#spinner").append("<img class='spiner' src='../assets/images/loading.gif'>");


        $.ajax({
            url: "index.php",
            type: "post",
            data: 'index_load',
            dataType: "json",
            success: function (response) {
                $("#spinner").hide();
                setTimeout(function () {
                    // var data = JSON.parse(response);
                    var data = response;
                    console.log(data);
                    var HTML = '';
                    var largeFiles = '';

                    $.each(data, function (i, item) {

                        files_array = JSON.parse(item.filenames);

                        console.log(files_array);

                        //Ovo je samo obicna forma sa tabelom :)

                        HTML += '<div class="form[checked' + i + ']  single_row">';
                        HTML += '<table class="form_table main"  border="0">';
                        HTML += '<tr>';
                        HTML += '<td class="tw5">' + ' <span  class="form[checked' + i + '] remove_button"  data-toggle="tooltip" title="Obriši fajl"  name="form[checked<?php echo $i?>][]" onclick="deleteX(this); countDivs();">X</span>' + '</td>';
                        HTML += '<td class="tw20">' + 'Časopis' + '</td>';
                        HTML += '<td class="tw80">' + '<input class="form[checked' + i + '] journal_title" type="text" hidden name="form[checked' + i + '][]" value="' + item.journal_title + '"><strong>' + item.journal_title + '</strong><span>' + '</td>';
                        HTML += '</tr>';
                        HTML += '<tr>';
                        HTML += '<td class="tw5"></td>';
                        HTML += '<td class="tw20">' + 'Naslov' + '</td>';
                        HTML += '<td>' + '<textarea class="form[checked' + i + '] title article_title" rows="1" type="text" name="form[checked' + i + '][]">' + ucFirst(item.submission_title) + "\\" + item.submission_id + "\\" + '</textarea>' + '</td>';
                        HTML += '</tr>';
                        HTML += '<tr>';
                        HTML += '<td class="tw5">' + '<span class="form[checked' + i + '] number">' + "Rb:" + (i + 1) + ". " + '</span>' + '</td>';
                        HTML += '<td class="tw20">' + 'Autor' + '</td>';
                        HTML += '<td>' + 'Prezime: ' + '<input class="form[checked' + i + '] input-res" type="text" name="form[checked' + i + '][]" value="' + ucFirst(item.author_last) + '">' +
                            'Ime: ' + '<input class="form[checked' + i + ']" type="text" name="form[checked' + i + '][]" value="' + ucFirst(item.author_first) + '">' + '</td>';
                        HTML += '</tr>';
                        HTML += '<tr>';
                        HTML += '<td class="tw5">' + '</td>';
                        HTML += '<td class="tw20">' + 'Dokument' + '</td>';
                        HTML += '<td>';
                        HTML += '<table id="'+i+'" class="mini form_table" border="0">';
                        HTML += '<tr>';
                        HTML += '<td>' + '<span id="filename" class="proba">' + 'Naziv dokumenta: ' + files_array[0][0] + '</span>' + '</td>';


                        if (files_array.length > 1) {
                            HTML += '<td class="tw10">' +
                                '<span class="previousFile"><i class="fa fa-arrow-left"></i></span>' +
                                '<span class="nextFile"><i class="fa fa-arrow-right"></i></span>'
                                + '</td>';
                        } else {
                            HTML += '<td class="tw10"></td>'
                        }
                        HTML += '<td class="tw10 btn20">' + ' <button id="0" class="form[checked' + i + '] view_button" name="'+item.path+'" href="'+files_array[0][0]+'" onclick="myFunction(this);return false">Pogledaj dokument</button><br class="form[checked' + i + ']">' + '</td>';
                        HTML += '</tr>';
                        HTML += '</table>';
                        HTML += '</td>';
                        HTML += ' </tr>';
                        HTML += '</table>';

                        HTML += '<span class="filename"><input class="form[checked' + i + '] file" type="hidden" name="form[checked' + i + '][]" value="' + files_array[0][0] + '"></span>';

                        HTML += '</div>';
                        HTML += '</div>';

                        HTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.journal_issn + '">';
                        HTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.ithenticate_id + '">';
                        HTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.ithenticatePassword + '">';
                        HTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.ithenticateUsername + '">';
                        HTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.journal_id + '">';
                        HTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.mail_to + '">';
                        HTML += '<input class="form[checked' + i + ']" type="hidden" name="form[checked' + i + '][]" value="' + item.path + '">';
                        HTML += '<span class="filesize"><input class="form[checked' + i + '] file" type="hidden" name="form[checked' + i + '][]" value="' + files_array[0][1] + '"></span>';

                        HTML += '</div>';


                    });
                    $('#single_submission').append(HTML); // .hide().slideDown(500);
                    $("#submit_button").show();

                    i = 1;
                    

                    $('.nextFile').bind("click", function () {
                        i = $(this).closest('td').next().find('button').attr("id");
                        j = $(this).closest('table').attr("id");
                      
                        files_array=JSON.parse(data[j].filenames);
                        length = files_array.length;
                          console.log(files_array);
                        i++;
                        if (i == length) {
                            i = 0
                        }
                        $(this).closest('td').next().find('button').attr("href", (files_array[i][0]));
                        
                        $(this).closest('td').next().find('button').attr("id", (i));
                        $(this).closest('td').prev().find('.proba').html('Naziv dokumenta: ' + files_array[i][0]);
                      //  console.log(files_array);
                        $(this).closest('td').prev().find('.size').html('Naziv dokumenta: ' + files_array[i][0]);

                        $(this).closest('.single_row').find('.filename').children('input').attr('value', files_array[i][0]);
                        $(this).closest('.single_row').find('.filesize').children('input').attr('value', files_array[i][1]);


                       //  console.log( $(this).closest('.single_row').siblings('.filesize'));

                        if (files_array[i][1] >= 20) {
                            $(this).parent().find('span.proba').css("color", "red");
                            $(this).closest('div.single_row').css("border", "2px solid red");
                        } else {
                            $(this).parent().find('span.proba').css("color", "black");
                            $(this).closest('div.single_row').css("border", "2px solid white");
                        }

                        if (i == length) {
                            i = 0;
                        }
                    });

                    $('.previousFile').bind("click", function () {
                        i = $(this).closest('td').next().find('button').attr("id");
                        if (i == 0) {
                            i = length;
                        }
                        i--;
                        $(this).closest('td').next().find('button').attr("href", (files_array[i][0]));
                        $(this).closest('td').next().find('button').attr("id", (i));
                        $(this).closest('td').prev().find('.proba').html('Naziv dokumenta: ' + files_array[i][0]);
                        $(this).closest('.single_row').find('.filename').children('input').attr('value', files_array[i][0]);

                      //  console.log(files_array[i][1]);

                        if (files_array[i][1] >= 20) {

                            $(this).parent().find('span.proba').css("color", "red");
                            $(this).closest('div.single_row').css("border", "2px solid red");


                        } else {
                            $(this).parent().find('span.proba').css("color", "black");
                            $(this).closest('div.single_row').css("border", "2px solid white");
                        }

                    });


                }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown) {

                $('#spinner').fadeOut(1000);
                $('#error').fadeIn(2000);


                console.log(errorThrown);
                console.log(jqXHR.responseText);
            }

        });

    });


    function ucFirst(string) {
        string = string.toLowerCase();
        capitalized = string.charAt(0).toUpperCase() + string.slice(1);
        return capitalized;

    }


}


//Brise rad iz forme koji ne treba da se salje na proveru

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

temp_niz=[];

function alertF() {
    if (temp_niz.length > 0) {
        confirm("Neki od fajlova su veci od 20mb");
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


//logout funkcija
$(document).ready(function () {
    $('#logout').bind("click", function () {
        $.ajax({
            url: "login.php",
            type: 'post',
            data: 'logout',
            success: function (response) {
                console.log(response);
                window.location.href = response;
            }
        });
    });


});






