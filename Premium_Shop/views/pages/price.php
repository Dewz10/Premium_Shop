<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8_unicode_ci">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price</title>
</head>
<body>
    <h1>นายธิติพนธ์ สว่างศรี รหัสนิสิต 6320501588</h1>
    <br>
    [<a href="?controller=price&action=newPrice">Add new Price Range</a>]
    <form action="" method="get">
        <input type="text" name="key">
        <input type="hidden" name="controller" value="price">
        <input type="submit" name="action" value="search">
    </form>
    <table border = 1>
        <tr>
            <td>รหัสสินค้า</td><td>ชื่อสินค้า</td><td>ขั้นต่ำ</td><td>ขั้นสูง</td><td>ราคาสกรีนสี</td><td>ราคา</td><td>update</td><td>delete</td>
            <?php
                foreach($priceList as $price){
                    echo "<tr>
                        <td>$price->pid</td><td>$price->name</td><td>$price->qtyStart</td><td>$price->qtyEnd</td><td>$price->colorSceen</td><td>$price->price</td>
                        <td>
                        <a href=?controller=price&action=updateForm&DesId=$price->id>update</a>
                        </td>
                        <td>
                        <a href=?controller=price&action=deleteConfirm&DesId=$price->id>delete</a>
                        </td>

                    </tr>";
                }
            ?>
        </tr>

    </table>

</body>
</html>

