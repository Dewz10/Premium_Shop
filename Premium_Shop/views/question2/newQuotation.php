<form action="" method="get">
    <label for="">
        รหัสใบเสนอราคา
        <select name="quotationID" id="">
            <?php
                foreach($quotation_List as $quotation){
                    echo"
                    <option value=$quotation->quotationID>
                        $quotation->quotationID   
                    </option>";
                }
            ?>
        </select>
    </label>
    <br>
    <label for="">
        สินค้า กับ สี
        <select name="productColorID" id="">
            <?php
                foreach($productColor_List as $productColor){
                    echo "
                    <option value=$productColor->Pid,$productColor->colorID>
                        $productColor->Pname / สี : $productColor->colorName ($productColor->colorID)
                    </option>";
                }                
            ?>
        </select>
    </label>
    <br>
    <label for="">
        จำวนสินค้า
        <input type="number" name="productAmount" id="">
    </label>
    <br>
    <label for="">
        จำนวนสีที่สกิน
        <input type="number" name="printScreenNumber" id="">
    </label>
    <br>
    <input type="hidden" name="controller" value="question2">
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="addQuotation">Save</button>
</form>