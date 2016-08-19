<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			require_once '../include.php';
			$id = $_GET['id'];
			$department = $_SESSION['adminName'];

			@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect database.";
				exit;
			}
			$db->query("SET NAMES 'UTF8'");
			$query = "select * from student where id = ".$id;
			$result = $db -> query($query);
			$row = $result->fetch_assoc();

			echo "<table width=\"70%\" border=\"1\" cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"#cccccc\"text-algin = \"center\">";
			echo "<tr>";
			echo "<td>姓名：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['name']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>性别：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['gender']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>照片：</td>";
			echo "<td><img src=\"/photo/".$id.".jpeg\"  width=\"128\" height=\"128\"></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>班级：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['class']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>电话：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['phonenum']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>QQ：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['qqnum']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>调剂部门：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['department1']))." ".
			htmlspecialchars(stripslashes($row['department2']))." ".
			htmlspecialchars(stripslashes($row['department3']))." "."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>自我介绍：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['introduction']))."</td>";

			$query0 = "select * from review where id ='{$id}'and department = '{$department}'";
			$result1 = $db -> query($query0);
			$row1 = $result1 -> fetch_assoc();
			echo "</tr>";
			echo "<td>评分：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row1['score']))."</td>";
			echo "</tr>";
			echo "<td>面试官评价：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row1['review']))."</td>";
			echo "</tr>";
			echo "</table>";
			// //录用
			echo "<form class=\"\" action=\"insert.php\" method=\"post\">";
			echo "<input style = \"display:none;\"type=\"text\" name=\"id\" value=\"".$id."\">";
			echo "<input style = \"display:none;\"type=\"text\" name=\"department\" value=\"".$department."\">";
			echo "<input type=\"submit\" value=\"录用\">";
			echo "</form>";
			// //删除
			echo "<form class=\"\" action=\"delete.php\" method=\"post\">";
			echo "<input style = \"display:none;\"type=\"text\" name=\"id\" value=\"".$id."\">";
			echo "<input style = \"display:none;\"type=\"text\" name=\"department\" value=\"".$department."\">";
			echo "<input type=\"submit\" value=\"取消录用\">";
			echo "</form>";
		?>

	</body>
</html>
