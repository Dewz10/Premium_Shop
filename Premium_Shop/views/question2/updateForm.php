<form action="" method="get">
    <label hidden for="">
        PQid :
        <input type="text" name="PQid" id="" value="
                <?php
                    echo $quotation->PQId;
                ?>
        ">
    </label>
    <br>
    <label for="">
        รหัสใบเสนอราคา :
        <select name="quotationID" id="">
            <?php
                foreach($quotation_List as $quotationFromList){
                    echo "<option value=$quotationFromList->quotationID ";
                    if($quotationFromList->quotationID == $quotation->Qid){
                        echo "selected = 'selected'";
                    }
                    echo ">$quotationFromList->quotationID</option>";
                }
            ?>
        </select>
    </label>
    <br>
    <label for="">
        สินค้าและสี :
        <select name="productColorID" id="">
            <?php
                foreach($productColor_List as $productColor){
                    echo "<option value=$productColor->Pid,$productColor->colorID ";
                    if($productColor->colorName == $quotation->Color && $productColor->Pname == $quotation->Pname){
                        echo "selected = 'selected'";
                    }
                   echo ">$productColor->Pname / สี : $productColor->colorName</option>";
                }
            ?>
        </select>
    </label>
    <br>
    <label for="">
        จำนวน    :   
        <input type="text" name="Amount" id="" value="
                <?php
                    echo $quotation->Amount;
                ?>
        ">
    </label>
    <br>
    <label for="">
        จำนวนสีสกีน    :   
        <input type="text" name="PrintScreenNumber" id="" value="
                <?php
                    echo $quotation->PrintScNum;
                ?>
        ">
    </label>
    <br>
    <input type="hidden" name="controller" value="question2">
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="update">Update</button>
</form>