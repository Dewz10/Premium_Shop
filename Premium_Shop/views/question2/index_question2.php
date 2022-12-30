<p>Welcome index_question2</p>
<h1>นายชนกานต์ ศรีศรุติพร 6320502371</h1>
[<a href="?controller=question2&action=newQuotation">Create Quotation</a>]
<br>
<br>
<form action="" method="get">
    <input type="text" name="key">
    <input type="hidden" name="controller" value="question2">
    <button type="submit" name="action" value="search">Search</button>
</form>
<br>
<table border = 1>
    <tr>
        <td>
            Quotation ID
        </td>
        <td>
            Product ID
        </td>
        <td>
            Product Name
        </td>
        <td>
            Color
        </td>
        <td>
            Amount
        </td>
        <td>
            PrintScreenNumber
        </td>
        <td>
            Delete Button
        </td>
        <td>
            Update Button
        </td>
    </tr>
    <?php
        foreach($quotation_List as $quotation){
            echo "
            <tr>
                <td>
                    $quotation->Qid
                </td>
                <td>
                    $quotation->Pid
                </td>
                <td>
                    $quotation->Pname
                </td>
                <td>
                    $quotation->Color
                </td>
                <td>
                    $quotation->Amount
                </td>
                <td>
                    $quotation->PrintScNum
                </td>
                <td>
                    <a href=?controller=question2&action=deleteConfirm&quotationPQId=$quotation->PQId>Delete</a>
                </td>
                <td>
                    <a href=?controller=question2&action=updateForm&quotationPQId=$quotation->PQId>Update</a>
                </td>
            </tr>
            ";
        }
        echo "</table>";
    ?>