<?php
/**
 * Created by PhpStorm.
 * User: Dragoljub
 * Date: 10/2/2019
 * Time: 3:14 PM
 */

include '../includes/header.php';
include '../includes/nav_menu.php';


?>

<div class="row">
    <div class="column">
        <?php if (isset($_SESSION['msg'])) : ?>
        <div class="msg">

        <?php echo $_SESSION['msg']; unset($_SESSION['msg']) ?>

        </div>

        <?php endif; ?>

        <form id='ith_forma' action="ithenticate_list.php" method="post" name="ith_forma">
            <p class="title"> Unos novog folder Id-ja u bazu: </p>
            <table id="ith_form">
                <tr>
                    <td> Odaberite časopis:</td>

                    <td class="d2">
                        <select id="journal_id" name="journal_id">
                            <?php foreach ($journals as $journal) : ?>
                                <option value="<?php echo $journal->id ?>">
                                    <?php echo $journal->id ." - ".$journal->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
<!--                        <select id="journal_id" name="journal_id">-->
<!--                            --><?php //foreach ($list as $key => $id) : ?>
<!--                                <option value="--><?php //echo $key ?><!--">-->
<!--                                    --><?php //echo $id ?>
<!--                                </option>-->
<!--                            --><?php //endforeach; ?>
<!--                        </select>-->


                    </td>
                </tr>
                <tr>
                    <td> iThenticate Id:</td>
                    <td class="d2"><input  value="" class="casopisi" id="ithenticate_id" type="text" name="ithenticate_id"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="d2">
                        <button type="submit"  name="insertIds" value="Submit" class=""
                                onclick="return confirm('Da li ste sigurni da Želite da unesete podatke u bazu?')"
                        >Submit</button>
                    </td>
                </tr>


            </table>

        </form>
    </div>


    <div class="column1">
        <p class="title"> Spisak časopisa iz iThenticate-a sa folder Id-jem:</p>
        <input  class="casopisi" id="searchJournal" type="text" onkeyup="searchFunction()" placeholder="Traži...">
        <div id="ith_list">
        <?php foreach ($list as $id => $journal_name) : ?>
            <ul>
<!--                --><?php //if (in_array($journal_name, $journal_list)) : ?>

                <li value="<?php echo $id?>"><a><?php echo '<span style="color:darkgreen">['.$id.']</span>'."  -  ". $journal_name?></a></li>

<!--                --><?php //endif; ?>
            </ul>
        <?php endforeach; ?>
        </div>
    </div>
</div>





<?php include '../includes/footer.php'; ?>


<script>
    $("li").click(function (){

        $('#ithenticate_id').val($(this).val()) ;
    });


    function searchFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('searchJournal');
        filter = input.value.toUpperCase();
        ul = document.getElementById("ith_list");
        li = ul.getElementsByTagName('li');

        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }

</script>