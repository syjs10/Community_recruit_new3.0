<?php
      require_once '../include.php';

      $where = "";
      $department = $_SESSION['adminName'];

            $where = "where employ_department = '{$department}' or employ_department1 = '{$department}' or employ_department2 = '{$department}' or employ_department3 = '{$department}'";

      @ $page = $_REQUEST['page']?(int)$_REQUEST['page']:1;

      $sql = "select * from student ".$where;
      $totalRows = getResultNUm($sql);
      $pageSize  = 10;
      $totalPage = ceil($totalRows/$pageSize);
      if ($page < 1 || $page == NULL || !is_numeric($page)) {
            $page = 1;
      }
      if ($page > $totalPage) {
            $page = $totalPage;
      }
      $offset = ($page-1)*$pageSize;
      $sql    = "select * from student {$where} order by id asc limit {$offset}, {$pageSize}";
      $rows = fetchAll($sql);
      if (!$rows) {
            alertMse("没有学生请添加","addCate.php");
            exit;
      }
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title></title>
            <link rel="stylesheet" href="styles/backstage.css">
      </head>
      <body>
            <div class="details">
                                <div class="details_operation clearfix">
                                    <div class="bui_select">
                                        <input type="button" value="冲突人员" class="add"  >
                                    </div>

                                </div>
                                <!--表格-->
                                <table class="table" cellspacing="0" cellpadding="0" style="text-align:center;">
                                    <thead>
                                        <tr >
                                            <th width="15%">编号</th>
                                            <th width="30%">姓名</th>
                                            <th width="20%">录取部门</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;foreach ($rows as $row): ?>
                                          <?php
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
                                                if($count == 3){
                                                      continue;
                                                }

                                          ?>
                                        <tr>

                                            <td>
                                                  <input type="checkbox" id="c1" class="check">
                                                  <label for="c1" class="label">
                                                       <?php echo $row['id']; ?>
                                                  </label>
                                            </td>
                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                            <td>
                                                 <?php
                                                 $dep=htmlspecialchars(stripslashes($row['employ_department']))=="NULL"?" ":htmlspecialchars(stripslashes($row['employ_department']));
                                                 $dep1=htmlspecialchars(stripslashes($row['employ_department1']))=="NULL"?" ":htmlspecialchars(stripslashes($row['employ_department1']));
                                                 $dep2=htmlspecialchars(stripslashes($row['employ_department2']))=="NULL"?" ":htmlspecialchars(stripslashes($row['employ_department2'])); $dep3=htmlspecialchars(stripslashes($row['employ_department3']))=="NULL"?" ":htmlspecialchars(stripslashes($row['employ_department3']));
                                                 echo $dep." ".$dep1." ".$dep2." ".$dep3;
                                                 ?>
                                            </td>

                                            <td align="center">
                                                 <input type="button" value="查看" class="btn" onclick="seeCate(<?php echo $row['id'];?>)">
                                                  
                                            </td>
                                        </tr>

                                   <?php  $i++; endforeach;?>
                                   <?php if ($rows>$pageSize): ?>
                                          <tr>
                                                <td colspan="4">
                                                      <?php echo showPage($page,$totalPage) ?>
                                                </td>
                                          </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

            <script type="text/javascript">
                  function addCate(){
                        window.location="addCate.php";
                  }
                  function seeCate(id) {
                        window.location="see_all.php?id="+id;
                  }
                  function editCate(id) {
                        window.location="editCate.php?id="+id;
                  }
                  function delCate(id){
                        if(window.confirm("你确定要删除吗？ 删除后不可恢复！！！")){
                              window.location="doAdminAction.php?act=delCate&id="+id;
                        }
                  }
            </script>
      </body>
</html>
