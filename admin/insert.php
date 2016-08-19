<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			$id = $_POST['id'];
			$department = $_POST['department'];
			@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect database.";
			}
			$db->query("SET NAMES 'UTF8'");
			$query = "select * from student where id like '".$id."'";
			$result = $db -> query($query);
			$row = $result -> fetch_assoc();
			if ($row['employ_department'] != 'NULL' && $row['employ_department']!=$department) {
				if ($row['employ_department1'] != 'NULL'&& $row['employ_department1']!=$department ){
					if ($row['employ_department2'] != 'NULL' && $row['employ_department2']!=$department){
						if ( $row['employ_department3']!= $department) {
							$query1 = "update student set employ_department3 = '{$department}' where id = ".$id;
							$result1 = $db -> query($query1);
							if ($result1) {
								echo "<script>alert('录取成功');location.href='listCate3.php'</script>";
							}
						}

					}else{
						$query1 = "update student set employ_department2 = '{$department}' where id = ".$id;
						$result1 = $db -> query($query1);
						if ($result1) {
							echo "<script>alert('录取成功');location.href='listCate3.php'</script>";
						}
					}
				}else{
					$query1 = "update student set employ_department1 = '{$department}' where id = ".$id;
					$result1 = $db -> query($query1);
					if ($result1) {
						echo "<script>alert('录取成功');location.href='listCate3.php'</script>";
					}
				}
			} else {
				$query1 = "update student set employ_department = '{$department}' where id = ".$id;
				$result1 = $db -> query($query1);
				if ($result1) {
					echo "<script>alert('录取成功');location.href='listCate3.php'</script>";
				}
			}

		?>
	</body>
</html>
