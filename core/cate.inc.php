<?php
//添加分类操作
      function addCate() {
            $arr = $_POST;
            if(insert('imooc_cate', $arr)) {
                  $mes = "分类添加成功<br/><a href = 'addCate.php'>继续添加</a>|<a href = 'listCate.php'>查看分类</a>";
            } else {
                  $mes = "分类添加失败<br/><a href = 'addCate.php'>重新添加</a>|<a href = 'listCate.php'>查看分类</a>";
            }
            return $mes;
      }
//根据id得到分类信息
      function getCateById($id) {
            $sql = "select id, cName from imooc_cate where id = {$id}";
            return fetchOne($sql);
      }
      function editCate($where) {
            $arr = $_POST;
            if (update("imooc_cate", $arr, $where)) {
                  $mes = "分类修改成功!<a href = 'listCate.php'>查看分类</a>";
            } else {
                  $mes = "分类修改失败!<a href = 'listCate.php'>重新修改</a>";
            }
            return $mes;
      }
?>
