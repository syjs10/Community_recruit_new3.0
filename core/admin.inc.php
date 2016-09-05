<?php
      require_once '../include.php';

      function checkAdmin($sql){
            return fetchOne($sql);
      }
      //检查管理员
      function checkLogined() {
            if ($_SESSION['adminId']=="" && $_COOKIE['adminId'] == "") {
                  alertMes("请先登陆",'login.php');
            }
      }
      //登出
      function logout() {
            $_SESSION=array();
            if (isset($COOKIE[session_name()])) {
                  setcookie(session_name(),"",time()-1);
            }
            if (isset($_COOKIE['adminId'])) {
                  setcookie("adminId", "", time()-1);
            }
            if (isset($_COOKIE['adminName'])) {
                  setcookie("adminName", "", time()-1);
            }
            session_destroy();
            header('location:login.php');
      }
      //添加管理员
      function addAdmin(){
            $arr = htmlentities($_POST);
            $arr['password'] = md5($_POST['password']);
            if (insert("admin", $arr)) {
                  $mes = '添加成功!</br><a href= "addAdmin.php">继续添加</a>|<a href="listAdmin.php">查看管理员</a>';
            } else {
                  $mes = '添加失败!</br><a href= "addAdmin.php">重新添加</a>';
            }
            return $mes;
      }
      //查看管理员
      function getAllAdmain() {
            $sql = "select * from imooc_admin ";
            $row = fetchAll($sql);
            return $row;
      }

      //编辑管理员
      function editAdmin($id) {
            $id = htmlentities($id);
            $arr = htmlentities($_POST);
            $arr['password'] = md5($_POST['password']);
            if (update("admin", $arr, "id = {$id} ")) {
                  $mes = '编辑成功!<a href="listAdmin.php">查看管理员</a>';
            } else {
                  $mes = '编辑失败，请重新修改!<a href="listAdmin.php">查看管理员</a>';
            }
            return $mes;
      }
      //删除管理员
      function delAdmin($id){
            $id = htmlentities($id);
            if (delete("admin", "id={$id}")) {
                  $mes = '删除成功!<a href="listAdmin.php">查看管理员</a>';
            } else {
                  $mes = '删除失败，请重新删除!<a href="listAdmin.php">查看管理员</a>';
            }
            return $mes;
      }

?>
