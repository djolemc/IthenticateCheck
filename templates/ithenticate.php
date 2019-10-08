<?php
include '../includes/header.php';
include '../includes/nav_menu.php';



//


//    foreach ($data as $x) {
//        echo "Ime: ".$x[0]."<br>";
//    }

?>
<div id="example"></div>

<div class="row">
    <div class="col-md-10 rezultat">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <h3>Sending files to Ithenticate...</h3>
        <h5 id="sending"></h5>


        <div id="rezultati">

        </div>

        <input type="button" class="spinner-border" id="ucitaj" value="Refresh status">

    </div>
</div>



<?php

include '../includes/footer.php';
?>


