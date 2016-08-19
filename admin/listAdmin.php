<?php
      require_once '../include.php';
      $sql = "select * from admin";
      $totalRows = getResultNum($sql);
      //echo $totalRows;
      $pageSize  = 7;
      //得到总页码数
      $totalPage = ceil($totalRows/$pageSize);


      @ $page     = ($_REQUEST['page']?(int)$_REQUEST['page']:1);
      if ($page<1 || $page==NULL||!is_numeric($page)){
            $page = 1;
      }
      if ($page>$totalPage) {
            $page = $totalPage;
      }
      $offset = ($page-1)*$pageSize;
      $sql    = "select * from admin limit {$offset},{$pageSize}";
      $rows   = fetchAll($sql);
      //$rows = getAllAdmain();

?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
                        </div>

                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0" style="text-align:center;">
                        <thead>
                            <tr>
                                <th width="20%">编号</th>
                                <th width="40%">管理员名称</th>
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
                                           <?php echo $i; ?>
                                      </label>
                                </td>
                                <td>
                                     <?php echo $row['username']; ?>
                                </td>


                                <td align="center">
                                      <input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)">
                                      <input type="button" value="删除" class="btn" onclick="delAdmin(<?php echo $row['id'];?>)">
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
      function addAdmin(){
            window.location="addAdmin.php";
      }
      function editAdmin(id) {
            window.location="editAdmin.php?id="+id;
      }
      function delAdmin(id){
            if(window.confirm("你确定要删除吗？ 删除后不可恢复！！！")){
                  window.location="doAdminAction.php?act=delAdmin&id="+id;
            }
      }
</script>
</body>
</html>