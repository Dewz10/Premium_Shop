<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลพนักงาน</title>
</head>
<body>
    <div>
        <h2>แบบฟอร์มบันทึกข้อมูล</h2>
        <form action="" method="GET">
            <div>
                <label>No :</label>
                <input type="text" id="" name="no" value="<?php echo $quotation->no; ?>"><br><br>
            </div>
            <div>
                <label>วันที่</label>    
                <input type="date" id="" name="date" value="<?php echo $quotation->date; ?>">
            </div>
            <div>
            <label>พนักงาน : </label>
                <select name="employee" id="">
                    <?php 
                        foreach($employee_list as $emp){
                            echo "<option value=$emp->id";
                            if($emp->id==$quotation->eid){
                                echo " selected='selected'";
                            }
                            echo ">$emp->empName</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
            <label>ลูกค้า : </label>
                <select name="customer" id="">
                    <?php 
                        foreach($customer_list as $customer){
                            echo "<option value=$customer->id";
                            if($customer->id==$quotation->cid){
                                echo " selected='selected'";
                            }
                            echo ">$customer->cusName</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
            <label>เงื่อนไขชำระ : </label>
                <select name="payment" id="">
                    <?php 
                        foreach($payment_list as $payment){
                            echo "<option value=$payment->id";
                            if($payment->id==$quotation->conId){
                                echo " selected='selected'";
                            }
                            echo ">$payment->payment</option>";
                        }
                    ?>
                </select>
            </div>
            <div>
                <label>Percent :</label>
                <input type="text" id="" name="paymentTerms" value="<?php $pt = $quotation->paymentTerms*100; echo $pt; ?>"><label> &percnt;</label>
            </div>
            <input type="hidden" name="controller" value="pages"><br>
            <button type="submit" name="action" value="quotate">Back</button>
            <button type="submit" name="action" value="update">Update</button>
            
        </form>
    </div>
</body>
</html>