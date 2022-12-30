<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <table border = 1>
            <tr>
                <td>No</td><td>วันที่</td><td>พนง.</td><td>ลูกค้า</td><td>Percent</td><td>เงื่อนไขชำระ</td>
            </tr>
            <?php
                    echo "<tr><td>$quotation->no</td>
                        <td>$quotation->date</td> 
                        <td>$quotation->employee</td>
                        <td>$quotation->customer</td> 
                        ";
                        $pt = $quotation->paymentTerms*100;
                        echo "<td>$pt</td>";
                        if($quotation->payment=='เครดิต'){
                            echo "<td>เครดิต 30 วัน</td>";
                        }else{
                            echo "<td>$quotation->payment</td>";
                        }
                        echo "</tr>";
            ?>
        </table>
    <br>
    <form action="" method="GET">
        <input type="hidden" name="controller" value="pages">
        <input type="hidden" name="Qid" value="<?php echo $quotation->no ?>">
        <button type="submit" name="action" value="quotate">Back</button>
        <button type="submit" name="action" value="delete">Delete</button>
    </form>
</body>
</html>