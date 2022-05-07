<?php
        include_once("./dbs.inc.php");
        include_once("./functions.inc.php");
        $approval_pending = "pending";
        $approval_approved  = "approved";

        $sql = "SELECT * FROM `applicant` WHERE `approval_status` = '{$approval_pending}' or
        `approval_status` = '{$approval_approved}'";

        $result = mysqli_query($conn, $sql);

        $data = "";
        if(mysqli_fetch_assoc($result)>0){
            
            $rows = "";

            while(mysqli_fetch_assoc($result)){
                $status = $result["approval_status"];
                $row = "";

                if($status == "pending"){
                    $row = "<td class='tc'><span class='awaiting'>awiating approval</span></td>";
                }else{
                    $row = "<td class='tc'><span class='approved'>approved</span></td>";
                }

                $rows .= "<tr>
                            <td>{$result['id']}</td>
                            <td><a href='?pgname=apply&applicant_id={$result['id']}'>{$result['first_name']} {$result['last_name']} {$result['othernames']}</a></td>
                            <td>{$result['phone_number']}</td>
                            <td>{$result['work_place']}</td>
                            <td>{$result['applicant_first_due_date']}</td>
                            <td>{$result['loan_to_be_payed']}</td>
                            {$row}
                        </tr>"; 
            }

            $data = "<table>
                <thead>
                    <tr>
                        <th>Applicant ID</th>
                        <th>Applicant Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th class='tc'>Status</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";
        }else{
            $data = "nothing";
        }
        