<?php
      require_once '../include.php';
      @ $page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
      $sql = "select * from student";
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
      $sql    = "select id, name  from student order by id asc limit {$offset}, {$pageSize}";
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
                                        <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addCate()">
                                    </div>

                                </div>
                                <!--表格-->
                                <table class="table" cellspacing="0" cellpadding="0" style="text-align:center;">
                                    <thead>
                                        <tr >
                                            <th width="15%">编号</th>

                                            <th width="50%">分类名称</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1;foreach ($rows as $row): ?>
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


                                            <td align="center">
                                                 <input type="button" value="查看" class="btn" onclick="seeCate(<?php echo $row['id'];?>)">
                                                  <input type="button" value="修改" class="btn" onclick="editCate(<?php echo $row['id'];?>)">
                                                  <input type="button" value="删除" class="btn" onclick="delCate(<?php echo $row['id'];?>)">
                                            </td>
                                        </tr>
                                   <?php  $i++; endforeach;?>
                                   <?php if ($rows>$pageSize): ?>
                                          <tr>
                                                <td colspan="3">
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
                        window.location="seeCate.php?id="+id;
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
