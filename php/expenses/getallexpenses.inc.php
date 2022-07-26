<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $date = date('Y'."-01-16 00:00:00");

    $sql = "SELECT * FROM `expenses` WHERE `day_added` >= '{$date}' ORDER BY `id` DESC;";

    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $balance = number_format($res['item_price'],2);
        $rows .= "<tr>
                    <td>{$res['day_added']}</td>
                    <td><a>{$res['item_name']}</a></td>
                    <td>{$res['item_price']}</td>
                    <td>{$res['purpose']}</td>
                    <td>{$res['added_by']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                    <thead>
                        <tr>
                            <th >Day</th>
                            <th >Expense Name</th>
                            <th >Price</th>
                            <th >Purpose</th>
                            <th >Added By</th>
                        </tr>
                    </thead>
                    <tbody class='accounttable'>"
                    .$rows.
                "</tbody>
            </table>";