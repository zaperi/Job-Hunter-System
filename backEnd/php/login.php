<?php


    include_once("database.php");
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    if(isset($postdata) && !empty($postdata))
    {
        $spwd = mysqli_real_escape_string($mysqli, trim($request->staff_password));
        $semail = mysqli_real_escape_string($mysqli, trim($request->staff_email));
        $sql = "SELECT * FROM comps where staff_email='$semail' and staff_password='$spwd'";
        if($result = mysqli_query($mysqli,$sql))
        {
            $rows = array();
            while($row = mysqli_fetch_assoc($result))
            {
                $rows[] = $row;
            }
            echo json_encode($rows);
        }
        else
        {
            http_response_code(404);
        }
    }
?>