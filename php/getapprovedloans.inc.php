<?php
        include_once("./dbs.inc.php");
        include_once("./functions.inc.php");
        $approval_pending = "pending";
        $approval_approved  = "approved";

        $sql = "SELECT * FROM `applicant` WHERE `approval_status` = '{$approval_pending}' OR `approval_status` = '{$approval_approved}'
        AND `loan_status` = 'NULL';";

        $result = mysqli_query($conn, $sql);

        $data = "";
        $rows = "";

            while($res = mysqli_fetch_assoc($result)){
               $status = $res["approval_status"];
               $btn = '<button class="grant" onclick="handleGrantLoan('.$res["id"].')">Loan Granted</button>';
                $row = "";

                if($status == "pending"){
                    $row = "<td class='tc'><span class='awaiting'>awiating approval</span></td>";
                    $rows .= "<tr>
                            <td>{$res['id']}</td>
                            <td><a href='?pgname=apply&applicant_id={$res['id']}'>{$res['first_name']} {$res['last_name']} {$res['other_names']}</a></td>
                            <td>+233{$res['phone_number']}</td>
                            <td>{$res['work_place']}</td>
                            <td>{$res['applicant_first_due_date']}</td>
                            <td>GH¢ {$res['loan_to_be_payed']}</td>
                            {$row}
                        </tr>"; 
                }else{
                    $row = "<td class='tc'><span class='approved'>approved</span></td>";
                    $rows .= "<tr>
                            <td>{$res['id']}</td>
                            <td><a href='?pgname=apply&applicant_id={$res['id']}'>{$res['first_name']} {$res['last_name']} {$res['other_names']}</a></td>
                            <td>+233{$res['phone_number']}</td>
                            <td>{$res['work_place']}</td>
                            <td>{$res['applicant_first_due_date']}</td>
                            <td>GH¢ {$res['loan_to_be_payed']}</td>
                            {$row}
                            <td class='tc'>
                                <input type='text' name='id' value='{$res["id"]}' hidden />
                                {$btn}
                            </td>
                        </tr>"; 
                }
            }

            echo $data = "<table>
                <thead>
                    <tr>
                        <th>Applicant ID</th>
                        <th>Applicant Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th class='tc'>Status</th>
                        <th class='tc'>Granted Status</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";