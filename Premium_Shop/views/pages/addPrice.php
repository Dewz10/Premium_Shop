<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Price</title>
</head>
<body>
    <form action="" method="get">
        <select name="pname">
        <?php
            foreach($productList as $pro){
                echo "<option value=$pro->id>$pro->name</option>";
            }
        ?>
        </select><br>
        <label>ขั้นต่ำ  <input type="number" name="lowest"></label><br>
        <label>ขั้นสูง  <input type="number" name="highest"></label><br>
        <label>ราคา  <input type="number" name="price"></label><br>
        <label>สกรีนสีละ  <input type="number" name="screenPrice"></label><br>
        <input type="hidden" name="controller" value="price">
        <button type="submit" name="action" value="index">Back</button>
        <button type="submit" name="action" value="addPrice">Save</button>
    </form>
</body>
</html>