<?php


//get all comps
function getAllComps($db)
{
$sql = 'Select c.id, c.staff_name, c.staff_email, c.staff_password, c.staff_phonenum, c.comp_name, c.comp_ssm, c.comp_size, c.comp_type from comps c ';
//$sql .='Inner Join comps c on j.comp_id = c.id';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get comps by id
function getComp($db, $compId)
{
  $sql = 'Select c.id, c.staff_name, c.staff_email, c.staff_password, c.staff_phonenum, c.comp_name, c.comp_ssm, c.comp_size, c.comp_type from comps c ';
  //$sql .='Inner Join comps c on j.comp_id = c.id';
  $sql .= 'Where c.id = :id';
  $stmt = $db->prepare ($sql);
  $id = (int) $compId;
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt ->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//add new jobs
function createComp($db, $form_data) {
  $sql = 'Insert into comps (staff_name, staff_email, staff_password, staff_phonenum, comp_name, comp_ssm, comp_size, comp_type ) ';
  $sql .= 'values (:staff_name, :staff_email, :staff_password, :staff_phonenum, :comp_name, :comp_ssm, :comp_size, :comp_type )';
  $stmt = $db->prepare ($sql);
  //$stmt->bindParam(':job_id', ($form_data['job_id']);
  $stmt->bindParam(':staff_name', $form_data['staff_name']);
  $stmt->bindParam(':staff_email',$form_data['staff_email']);
  $stmt->bindParam(':staff_password', $form_data['staff_password']);
  $stmt->bindParam(':staff_phonenum', $form_data['staff_phonenum']);
  $stmt->bindParam(':comp_name', $form_data['comp_name']);
  $stmt->bindParam(':comp_ssm', $form_data['comp_ssm']);
  $stmt->bindParam(':comp_size', $form_data['comp_size']);
  $stmt->bindParam(':comp_type', $form_data['comp_type']);
  $stmt->execute();
  return $db->lastInsertID();//insert last number.. continue
  }

    //delete comps by id
function deleteComp($db,$compId) {
  $sql = ' Delete from comps where id = :id';
  $stmt = $db->prepare($sql);
  $id = (int) $compId;
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  }

  
//update comps by id
function updateComp($db,$form_dat,$compId) {
  $sql = 'UPDATE comps SET staff_name = :staff_name , staff_email = :staff_email , staff_password = :staff_password , staff_phonenum = :staff_phonenum , comp_name = :comp_name , comp_ssm = :comp_ssm , comp_size = :comp_size, comp_type = :comp_type  ';
  $sql .=' WHERE id = :id';
  $stmt = $db->prepare ($sql);
  
  $id = (int) $compId;

  
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->bindParam(':staff_name', $form_dat['staff_name']);
  $stmt->bindParam(':staff_email', $form_dat['staff_email']);
  $stmt->bindParam(':staff_password', $form_dat['staff_password']);
  $stmt->bindParam(':staff_phonenum', $form_dat['staff_phonenum']);
  $stmt->bindParam(':comp_name', $form_dat['comp_name']);
  $stmt->bindParam(':comp_ssm', $form_dat['comp_ssm']);
  $stmt->bindParam(':comp_size', $form_dat['comp_size']);
  $stmt->bindParam(':comp_type', $form_dat['comp_type']);
  $stmt->execute();
}

