<?php
//添加分类操作
      function addCate() {
            $arr = htmlentities($_POST);
            if(insert('imooc_cate', $arr)) {
                  $mes = "学生信息添加成功<br/><a href = 'addCate.php'>继续添加</a>|<a href = 'listCate.php'>查看分类</a>";
            } else {
                  $mes = "学生信息添加失败<br/><a href = 'addCate.php'>重新添加</a>|<a href = 'listCate.php'>查看分类</a>";
            }
            return $mes;
      }
//根据id得到分类信息
      function getCateById($id) {
            $id = htmlentities($id);
            $sql = "select id, cName from imooc_cate where id = {$id}";
            return fetchOne($sql);
      }
      function editCate($where) {
            $arr = htmlentities($_POST);
            if (update("imooc_cate", $arr, $where)) {
                  $mes = "学生信息修改成功!<a href = 'listCate.php'>查看分类</a>";
            } else {
                  $mes = "学生信息修改失败!<a href = 'listCate.php'>重新修改</a>";
            }
            return $mes;
      }
?>
