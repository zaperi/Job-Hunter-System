<?php


include_once("database.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
  $staffname = mysqli_real_escape_string($mysqli, trim($request->staff_name));
  $staffemail = mysqli_real_escape_string($mysqli, trim($request->staff_email));
  $staffpwd = mysqli_real_escape_string($mysqli, trim($request->staff_password));
  $staffphonenum = mysqli_real_escape_string($mysqli, trim($request->staff_phonenum));
  $compname = mysqli_real_escape_string($mysqli, trim($request->comp_name));
  $compssm = mysqli_real_escape_string($mysqli, trim($request->comp_ssm));
  $compsize = mysqli_real_escape_string($mysqli, trim($request->comp_size));
  $comptype = mysqli_real_escape_string($mysqli, trim($request->comp_type));
  
  $sql = "INSERT INTO comps(staff_name,staff_email,staff_password,staff_phonenum,comp_ssm,comp_name,comp_size,comp_type) VALUES ('{$staffname}','{$staffemail}','{$staffpwd}','{$staffphonenum}','{$compssm}','{$compname}','{$compsize}','{$comptype}')";
 // echo $sql;
if ($mysqli->query($sql) === TRUE) {
 
 
    $authdata = [
      'staff_name' => $staffname,
	    'staff_email' => $staffemail,
      'staff_password'=> ' ',
	    'staff_phonenum' => $staffphonenum,
      'comp_name' => $compname,
      'comp_ssm' => $compssm,
      'comp_size' => $compsize,
      'comp_type' => $comptype,
      'id' => mysqli_insert_id($mysqli)
    ];
    echo json_encode($authdata);
 
}
}
?>