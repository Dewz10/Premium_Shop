<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>นายอัษฎาวุธ คล้ายเมือง 6320500719</h1><br>
    Add Infomation <a href="?controller=pages&action=newqua">click</a><br><br>
    <form action="" method="GET">
        <input type="text" name="key">
        <input type="hidden" name="controller" value="pages">
        <input type="submit" name="action" value="search">
    </form>
    <table border = 1>
        <tr>
            <td>No</td><td>วันที่</td><td>พนง.</td><td>ลูกค้า</td><td>Percent</td><td>เงื่อนไขชำระ</td><td>update</td><td>delete</td>
        </tr>
        <?php
            foreach($quotation_list as $quotation){
                $pt = $quotation->paymentTerms*100;
                echo "<tr><td>$quotation->no</td>
                    <td>$quotation->date</td> 
                    <td>$quotation->employee</td>
                    <td>$quotation->customer</td> 
                    <td>$pt</td>
                    <td>$quotation->payment</td>
                    <td>
                        <a href=?controller=pages&action=updateForm&Qid=$quotation->no>update</a>
                    </td>
                    <td>
                        <a href=?controller=pages&action=deleteConfirm&Qid=$quotation->no>delete</a>
                    </td>
                    </tr>";
                //$pt = $quotation->paymentTerms/100;
            }
        ?>
    </table>
        </body>
        </html>