<form action="" method="get">
    <label>
        <select name="pname">
        <?php
            foreach($productList as $pro){
                echo "<option value=$pro->id";
                if($pro->id==$price->pid){
                    echo " selected='selected'";
                }
                echo ">$pro->name</option>";
            }
        ?>
        </select></label><br>
        <!-- <?php echo $price->id; ?> -->
        <input type="hidden" name="DesId" value= <?php echo $price->id; ?>>
        <!-- <input type="hidden" name="Pid" value="pname"> -->
        <!-- <?php echo $price->pid; ?> -->
        <label>ขั้นต่ำ  <input type="number" name="lowest" 
            value = <?php echo $price->qtyStart; ?>
        ></label><br>
        <label>ขั้นสูง  <input type="number" name="highest"
            value = <?php echo $price->qtyEnd; ?>
        ></label><br>
        <label>ราคา  <input type="number" name="price"
            value = <?php echo $price->price; ?>
        ></label><br>
        <label>สกรีนสีละ  <input type="number" name="screenPrice"
            value = <?php echo $price->colorSceen; ?>
        ></label><br>
        <input type="hidden" name="controller" value="price">
        <button type="submit" name="action" value="index">Back</button>
        <button type="submit" name="action" value="update">update</button>
    </form>