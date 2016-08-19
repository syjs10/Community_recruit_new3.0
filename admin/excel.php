<?php
require_once '../include.php';
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=test.xls");


$department = $_SESSION['adminName'];
$sql = "select * from student where employ_department = '{$department}' or employ_department1 = '{$department}' or employ_department2 = '{$department}' or employ_department3 = '{$department}'";
$rows = fetchAll($sql);
echo "{$department}\n";
echo "ID\t姓名\t性别\t班级\t电话\tQQ\t\n";
foreach ($rows as $row) {

      $count=0;
      if ($row['employ_department']=="NULL") {
            $count++;
      }
      if ($row['employ_department1']=="NULL") {
            $count++;
      }
      if ($row['employ_department2']=="NULL") {
            $count++;
      }
      if ($row['employ_department3']=="NULL") {
            $count++;
      }
      if($count < 3){
            continue;
      }
      echo $row['id']."\t".$row['name']."\t".$row['gender']."\t".$row['class']."\t".$row['phonenum']."\t".$row['qqnum']."\t\n";
}

?>
