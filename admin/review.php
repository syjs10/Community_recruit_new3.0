<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			require_once '../include.php';
			$review = $_POST['review'];
			$score = $_POST['score'];
			$id = $_POST['id'];
			$department = $_SESSION['adminName'];

			$query = "insert into review values('{$id}', '{$department}', '{$score}', '{$review}')";
			$result = mysql_query($query);
			if ($result) {
				echo "<script>alert('提交成功');location.href='main.php'</script>";
			} else {
				echo "提交失败";
			}
		?>

	</body>
</html>
