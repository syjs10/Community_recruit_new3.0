<?php
      header('Content-type:utf-8');
      require_once '../include.php';
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $verify   = $_POST['verify'];
      $verify1  = $_SESSION['verify'];
      $sutoflag = $_POST['autoflag'];
      if ($verify == $verify1) {
            $sql = "select * from admin where username = '{$username}' and password = '{$password}'";
            $row = checkAdmin($sql);
            if ($row){
                  //如果autoflag有值的话
                  if ($autoflag) {
                        setcookie("adminId", $row['id'],time()+7*24*3600);
                        setcookie("adminName", $row['username'],time()+7*24*3600);
                  }
                  $_SESSION['adminName']=$row['username'];
                  $_SESSION['adminId']=$row['id'];
                  if($row['username']=="root"){
                        header("location:index.php");
                  } else {
                        header("location:index1.php");
                  }

            } else {
                  alertMes('登录失败，请重新登陆','login.php');
            }
      } else {
            alertMes('验证码错误', 'login.php');
      }
?>
