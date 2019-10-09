<?php
/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/2/2019
 * Time: 3:14 PM
 */

include '../includes/header.php';
include '../includes/nav_menu.php';

//var_dump($_SESSION);

$table_data = $_SESSION['form'];
?>

<?php
if (isset($table_data)) {
    echo '<h3 id="rez_prov">Rezultati provere:</h3>';

    ?>
    <div id='copycontent'>
        <table id='tableId' class='result'>


            <?php foreach ($table_data as $data) : ?>
                <tr>
                    <td class='table_data' id='jtitle' contenteditable><?php echo $data['2'] ?></td>
                    <td class='table_data' contenteditable><?php echo $data['0'];
                        echo " " . $data['1'] ?></td>
                    <td class='table_data' contenteditable><?php echo $data['3'] ?></td>

                    <td class='table_data'>Poslato</td>
                </tr>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
    <input type="button" id="select_table" value="Selektuj tabelu"
           onclick="selectElementContents( document.getElementById('tableId') );">

    <?php
} else { ?>
    <div>

        <i id="file_icon" class="fa fa-table" aria-hidden="true"></i>
        <p class="file_text">Nema podataka za tabelu</p>

    </div>


    <?php

}

include '../includes/footer.php';
?>


