<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			require_once '../include.php'
			$id = $_REQUEST['id'];
			$sql = "select * from student where id = ".$id;
			$row = fetchOne($sql);
			echo "<div class = \"form\"> <table>";
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
			echo "<td><img src=\"photo/".$id.".jpeg\"  width=\"128\" height=\"128\"></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>班级：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['class']))."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>部门：</td>";
			echo "<td>".htmlspecialchars(stripslashes($row['department']))."</td>";
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
			echo "</tr>";
			echo "<tr><td></td><td>";
			echo "<form class=\"\" action=\"update.php\" method=\"post\">";
			echo "<input type=\"text\" name=\"id\" style = \"display:none;\" value=\"".$id."\">";
			echo "<input type=\"text\" name=\"department\" >";
			echo "<input type=\"submit\" value=\"提  交\">";
			echo "</form>";
			echo "</td></tr>";
		?>

	</body>
</html>
