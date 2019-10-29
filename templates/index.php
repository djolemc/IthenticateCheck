<?php
include '../includes/header.php';
include '../includes/nav_menu.php';
/*
 *
 *
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="row">
    <div class="col-md-7 " id="links">
        <div class="row">

            <h5 id="title">Izdvojeni članci kandidati iz e-Ur-a za proveru na plagijarizam:</h5>
            <h6 id="error" style="display: none">Greška prilikom komunikacije sa serverom!</h6>

        </div>
        <div class="row">
            <div id="spinner"></div>
        </div>

        <div class="row">
            <form id="test_forma" name="test_forma" method="POST" action="ithenticate.php">
                <div id="single_submission">
                </div>
                <button id="submit_button" type="submit" value="Pošalji na proveru"
                        onclick="alertF();return confirm('Da li ste sigurni da želite da proverite ove fajlove?')">
                    Pošalji na proveru
                </button>

            </form>
        </div>
    </div>


    <div class="col-md-5 float-right" id="frame">

        <i id="file_icon" class="fa fa-file-text"></i>
        <p class="file_text">Izaberite dokument koji želite da pogledate</p>

    </div>


</div>

</div>


