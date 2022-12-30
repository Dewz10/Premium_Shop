<?php
    echo "
    <br>
    แน่ใจนะ...ว่าต้องการลบ Product นี้ในใบเสนอราคา $quotation->Qid
    <br>
    <br>
    $quotation->Pid : $quotation->Pname / $quotation->Qid
    <br>";
?>
<form action="" method="get">
    <input type="hidden" name="controller" value="question2">
    <input type="hidden" name="PQid" value="
        <?php
            echo $quotation->PQId;
        ?>
    ">
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="delete">Delete</button>
</form>