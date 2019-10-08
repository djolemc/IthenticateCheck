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

<h3 id="rez_prov">Rezultati provere:</h3>

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
<input type="button" id="select_table" value="Select table data" onclick="selectElementContents( document.getElementById('tableId') );">

<?php
include '../includes/footer.php';
?>


