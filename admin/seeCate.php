<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title></title>
            <style media="screen">
                  table{
                        position: absolute;
                        left: 15%;
                        top: 20%;
                        text-align: center;
                  }
            </style>
      </head>
      <body>
            <?php
                  require_once '../include.php';
                  $id = $_REQUEST['id'];
                  $sql = "select * from student where id = ".$id;
			$row = fetchOne($sql);
            ?>
            <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc"text-algin = "center">
                  <tr>
                        <td>
                              姓名
                        </td>
                        <td>
                              <?php echo htmlspecialchars(stripslashes($row['name'])); ?>
                        </td>
                  </tr>
                  <tr>
                        <td>
                              性别
                        </td>
                        <td>
                              <?php echo htmlspecialchars(stripslashes($row['gender'])); ?>
                        </td>
                  </tr>
                  <tr>
                        <td>
                              班级
                        </td>
                        <td>
                              <?php echo htmlspecialchars(stripslashes($row['class'])); ?>
                        </td>
                  </tr>
                  <tr>
                        <td>
                              电话
                        </td>
                        <td>
                              <?php echo htmlspecialchars(stripslashes($row['phonenum'])); ?>
                        </td>
                  </tr>
                  <tr>
                        <td>
                              QQ
                        </td>
                        <td>
                              <?php echo htmlspecialchars(stripslashes($row['qqnum'])); ?>
                        </td>
                  </tr>
                  <tr>
                        <td>
                              自我介绍
                        </td>
                        <td>
                              <?php echo htmlspecialchars(stripslashes($row['introduction'])); ?>
                        </td>
                  </tr>
                  <tr>
                        <td>
                              录取部门
                        </td>
                        <td>
                              <?php
                              $dep=htmlspecialchars(stripslashes($row['employ_department']))=="NULL"?
                              " ":htmlspecialchars(stripslashes($row['employ_department']));
                              $dep1=htmlspecialchars(stripslashes($row['employ_department1']))=="NULL"?
                              " ":htmlspecialchars(stripslashes($row['employ_department1']));
                              $dep2=htmlspecialchars(stripslashes($row['employ_department2']))=="NULL"?
                              " ":htmlspecialchars(stripslashes($row['employ_department2'])); $dep3=htmlspecialchars(stripslashes($row['employ_department3']))=="NULL"?
                              " ":htmlspecialchars(stripslashes($row['employ_department3']));
                              echo $dep.$dep1.$dep2.$dep3;
                              ?>
                        </td>
                  </tr>
                  <tr>
                        <td>
                              最终部门
                        </td>
                        <td>
                              <form class="" action="update.php" method="post">
                                    <input type="test" style = "display:none"name="id" value="<?php echo $id?>">
                                    <input style="height:20px;"type="text" name="department">
                                    <input type="submit"style="height:25px;" value="提  交">
                              </form>
                        </td>
                  </tr>

            </table>
      </body>
</html>
