if (window.location.pathname.split("/").pop() === 'ithenticate.php') {
    $(document).ready(function () {


        //Niz sa podacima iz forme
        result = callAjax("ithenticate.php", "form_process");


        //Salje jedan po jedan rad php skripti, koja ih salje na Ithenticate
        var array = JSON.parse(result);
        //console.log(array);
        var i = 0;
        var docIds = [];
        var refreshIntervalId = setInterval(function () {
            length = array.length;
            if (i < (array.length)) {
                niz = array[i];
                html = '';
                $.ajax({
                    url: "ithenticate.php",
                    async: false,
                    type: "post",
                    data: {status: 'status', niz: niz},
                    success: function (response) {
                       console.log(niz);
                        $("#sending").html("Šaljem dokument " + (i + 1) + " od " + length);
                        $("#rezultati").append('<p>' + niz[2] + ' '+niz[3] + ' - ' +niz[1] + '<span class="element">' +': '+  response + '</span>' + '<span class="report"></span></p>');
                        console.log(response);
                         docIds.push(response);

                        if (i == (array.length - 1)) {
                            $("#rezultati").append('<br><p><strong>Done!</strong></p>');
                            $(".spinner-border").show();
                        }

                    }
                });
            } else {
                clearInterval(refreshIntervalId);
            }
            i++
        }, 500);

       // docIds = ['50789358', '50789358', '50784425', '50496982', '50496982', '50496982', '50496982', '50496982', '50789358', '50789358', '50784425', '50496982', '50496982', '50496982', '50496982', '50496982'];

        console.log(docIds);


        //Ajax funkcija

        function callAjax(url, data) {
            var result = $.ajax({
                async: false,
                url: url,
                type: "post",
                data: data,
                success: function (response) {

                }
            }).responseText;
            return result;
        }

        //Funkcija za osvezavanje statusa poslatih fajlove
        $("#ucitaj").bind("click", function () {
            broj_polja = $(".element").length;
            //   documentReportId=[];

            console.log(broj_polja);

            $('.report').each(function (i) {
                $(".report")[i].innerHTML = '';
            });
            $(".report").append("<img class='spiner' src='../assets/images/loading.gif'>");


            var delay = 300;

            var i = 0;
            var refreshIntervalId = setInterval(function () {
                if (i < broj_polja) {
                    documentId = docIds[+i];

                    $.ajax({
                        url: "ithenticate.php",
                        async: false,
                        type: "post",
                        data: {id: documentId},
                        success: function (result) {

                            res = JSON.parse(result);
                        //    console.log(res);
                            documentStatus = res[0];
                            documentReportId = res[1];

                          //  console.log(documentStatus.is_pending);
                          //  console.log(documentReportId);


                            console.log($(".report"));
                            if (documentStatus.is_pending == 1) {
                                $(".report")[i].innerHTML = "<span style='color:blue'> - Processing..</span>";
                            } else if (documentStatus.is_pending == 0 && documentReportId == false) {
                                $(".report")[i].innerHTML = "<span style='color:red'> - Failed!</span>";
                            } else if (documentStatus.is_pending == 0 && documentReportId != false) {
                                $(".report")[i].innerHTML = "<span style='color:green'> - Success!</span>";
                            }
                        }
                    });
                } else {
                    clearInterval(refreshIntervalId);
                }
                i++
            }, 100);

        });


    });
}

