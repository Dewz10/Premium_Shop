<?php
    echo "<br>Are you sure to delete this range?<br>
            <br>$price->pid $price->name ขั้นต่ำ $price->qtyStart ขั้นสูง $price->qtyEnd";
    // echo $price->id;
?>

<form action="" method="GET">
    <input type="hidden" name="controller" value="price">
    <input type="hidden" name="DesId" value="<?php echo $price->id ?>">
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="delete">Delete</button>
</form>