<?php
//连接数据库
      function connect(){
            $link = mysql_connect(DB_HOST, DB_USER, DB_PWD) or die("数据库链接失败 Error：".mysql_errno().":".mysql_error());
            mysql_set_charset(DB_CHARSET);
            mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
            return $link;
      }

//插入记录
      function insert($table, $array){
            $keys = join(",", array_keys($array));
            $vals = "'".join("','", array_values($array))."'";
            $sql = "insert {$table} ({$keys}) values({$vals})";
            mysql_query($sql);
            return mysql_insert_id();
      }
//更新操作
      function update($table, $array, $where = NULL){
            $str = NULL;
            foreach ($array as $key => $value) {
                  if ($str == NULL) {
                        $sep = "";
                  } else {
                        $sep = ",";
                  }
                  $str.= $sep.$key."='".$value."'";
            }
            $sql = "update {$table} set {$str} ".($where==NUll?NULL:"where ".$where);
            $result = mysql_query($sql);
            if ($result) {
                  return mysql_affected_rows();
            } else {
                  return false;
            }

      }

//删除操作
      function delete($table,$where){
            $where = $where == NULL ? NULL:"where ".$where;
            $sql = "delete from {$table} {$where}";
            mysql_query($sql);
            return mysql_affected_rows();
      }
//查找一个
      function fetchOne($sql,$result_Type = MYSQL_ASSOC){
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result, $result_Type);
            return $row;
      }
//查找结果集
      function fetchAll($sql,$result_type = MYSQL_ASSOC){
            $result = mysql_query($sql);
            while ($row = mysql_fetch_array($result, $result_type)) {
                  $rows[] = $row;
            }
            return $rows;
      }
//结果个数
      function getResultNum($sql){
            $result = mysql_query($sql);
            return mysql_num_rows($result);
      }
?>
