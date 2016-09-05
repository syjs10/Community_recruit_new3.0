<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$id = htmlentities($_POST['id']);
			$department = htmlentities($_POST['department']);
			$db = new mysqli('localhost', 'student', 'student123', 'student');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect database.";
			}
			$db->query("SET NAMES 'UTF8'");
			$query = "select * from student where id like '".$id."'";
			$result = $db -> query($query);
			$row = $result -> fetch_assoc();
			if ($row['employ_department']==$department) {
				$query1 = "update student set employ_department = 'NULL' where id = ".$id;
			}
			if ($row['employ_department1']==$department) {
				$query1 = "update student set employ_department1 = 'NULL' where id = ".$id;
			}
			if ($row['employ_department2']==$department) {
				$query1 = "update student set employ_department2 = 'NULL' where id = ".$id;
			}
			if ($row['employ_department3']==$department) {
				$query1 = "update student set employ_department3 = 'NULL' where id = ".$id;
			}
			$result1 = $db -> query($query1);
			if ($result1) {
				echo "<script>alert('取消录取');location.href='listCate.php'</script>";

			}


		?>
	</body>
</html>
