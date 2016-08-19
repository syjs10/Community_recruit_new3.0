<?php
      require_once '../include.php';
      @ $act = $_GET['act'];
      $department = $_SESSION['adminName'];


      @ $page = $_REQUEST['page']?(int)$_REQUEST['page']:1;

      $sql    = "select * from review where department = '{$department}'";
      $totalRows = getResultNum($sql);
      $pageSize  = 10;
      $totalPage = ceil($totalRows/$pageSize);
      if ($page < 1 || $page == NULL || !is_numeric($page)) {
            $page = 1;
      }
      if ($page > $totalPage) {
            $page = $totalPage;
      }
      $offset = ($page-1)*$pageSize;
      $sql    = "select * from review where department = '{$department}' order by score desc limit {$offset}, {$pageSize}";
      $rows = fetchAll($sql);
      if (!$rows) {
            //alertMse("没有选人","");
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
                                        <input type="button" value="新生列表" class="add"  >
                                    </div>

                                </div>
                                <!--表格-->
                                <table class="table" cellspacing="0" cellpadding="0" style="text-align:center;">
                                    <thead>
                                        <tr >
                                            <th width="15%">编号</th>

                                            <th width="40%">姓名</th>
                                            <th width="10%">评分</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;foreach ($rows as $row1): ?>
                                          <?php
                                                $sql = "select * from student where id = {$row1['id']}";
                                                $row = fetchOne($sql);
                                          ?>
                                        <tr>
                                            <!--这里的id和for里面的c1 需要循环出来-->
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
                                                <?php echo $row1['score']; ?>
                                            </td>

                                            <td align="center">
                                                 <input type="button" value="查看" class="btn" onclick="seeCate(<?php echo $row['id'];?>)">


                                            </td>
                                        </tr>
                                   <?php endforeach;?>
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


            </script>
      </body>
</html>
