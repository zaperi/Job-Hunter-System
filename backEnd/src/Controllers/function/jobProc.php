<?php


//get all jobs
function getAllJobs($db)
{
$sql = 'Select j.id, j.job_title, j.jstaff_name, j.jcomp_name, j.jstaff_email, j.jphone_num, j.comp_ssm from jobs j ';
//$sql .='Inner Join comps c on j.comp_id = c.id';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get jobs by ssm
function getJob($db, $compSSM)
{
  $sql = 'Select j.id, j.job_title, j.jstaff_name, j.jcomp_name, j.jstaff_email, j.jphone_num, j.comp_ssm from jobs j ';
  //$sql .='Inner Join comps c on j.comp_id = c.id';
  $sql .= 'Where j.comp_ssm = :comp_ssm';
  $stmt = $db->prepare ($sql);
  $comp_ssm = (int) $compSSM;
  $stmt->bindParam(':comp_ssm', $comp_ssm, PDO::PARAM_INT);
  $stmt ->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get jobs by id
function getJobId($db, $jobId)
{
  $sql = 'Select j.id, j.job_title, j.jstaff_name, j.jcomp_name, j.jstaff_email, j.jphone_num, j.comp_ssm from jobs j ';
  //$sql .='Inner Join comps c on j.comp_id = c.id';
  $sql .= 'Where j.id = :id';
  $stmt = $db->prepare ($sql);
  $id = (int) $jobId;
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt ->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//add new jobs
function createJob($db, $form_data) {
    $sql = 'Insert into jobs (job_title, jstaff_name, jcomp_name, jstaff_email, jphone_num, comp_ssm ) ';
    $sql .= 'values (:job_title, :jstaff_name, :jcomp_name, :jstaff_email, :jphone_num, :comp_ssm )';
    $stmt = $db->prepare ($sql);
    
    $stmt->bindParam(':job_title', $form_data['job_title']);
    $stmt->bindParam(':jstaff_name',$form_data['jstaff_name']);
    $stmt->bindParam(':jcomp_name', $form_data['jcomp_name']);
    $stmt->bindParam(':jstaff_email', $form_data['jstaff_email']);
    $stmt->bindParam(':jphone_num', $form_data['jphone_num']);
    $stmt->bindParam(':comp_ssm', $form_data['comp_ssm']);
    $stmt->execute();
    return $db->lastInsertID();//insert last number.. continue
    }

    //delete jobs by job_id
function deleteJob($db,$jobId) {
    $sql = ' Delete from jobs where id = :id';
    $stmt = $db->prepare($sql);
    $id = (int) $jobId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }


//update jobs by jobid
function updateJob($db,$form_data,$jobId) {
    $sql = 'UPDATE jobs SET job_title = :job_title , jstaff_name = :jstaff_name , jcomp_name = :jcomp_name , jstaff_email = :jstaff_email , jphone_num = :jphone_num , comp_ssm = :comp_ssm ';
    $sql .=' WHERE id = :id';
    $stmt = $db->prepare ($sql);
    //$sql .= 'Where j.comp_ssm = :comp_ssm';
    $id = (int) $jobId;

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':job_title', $form_data['job_title']);
    $stmt->bindParam(':jstaff_name', $form_data['jstaff_name']);
    $stmt->bindParam(':jcomp_name', $form_data['jcomp_name']);
    $stmt->bindParam(':jstaff_email', $form_data['jstaff_email']);
    $stmt->bindParam(':jphone_num', $form_data['jphone_num']);
    $stmt->bindParam(':comp_ssm', $form_data['comp_ssm']);
    $stmt->execute();
}
