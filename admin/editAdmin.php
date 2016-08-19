<?php
      require_once '../include.php';
      $id  = $_REQUEST['id'];
      $sql = "select * from admin where id = {$id} ";
      $row = fetchOne($sql);
 ?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title></title>
      </head>
      <body>
            <h3>编辑管理员</h3>
            <form class="" action="doAdminAction.php?act=editAdmin&id=<?php echo $id; ?>" method="post">
                  <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc"text-algin = "center">
                        <tr>
                              <td>
                                    管理员名称
                              </td>
                              <td>
                                    <input type="text" name="username" placeholder="<?php echo $row['username']; ?>"/>
                              </td>
                        </tr>
                        <tr>
                              <td>
                                    密码
                              </td>
                              <td>
                                    <input type="password" name="password" placeholder="请输入新密码"/>
                              </td>
                        </tr>
                        <tr>

                              <td colspan="2">
                                    <input type="submit" value = "编辑管理员"/>
                              </td>
                        </tr>
                  </table>
            </form>
      </body>
</html>
