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
			$sql = "select * from student where id =".(int)$id;
			$row = fetchOne($sql);

		?>
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc"text-algin = "center">
			<tr>
				<td>
					姓名
				</td>
				<td>
					<?php echo htmlspecialchars(stripslashes($row['name'])); ?>
				</td>
			</tr>
			<tr>
				<td>
					性别
				</td>
				<td>
					<?php echo htmlspecialchars(stripslashes($row['gender'])); ?>
				</td>
			</tr>
			<tr>
				<td>
					班级
				</td>
				<td>
					<?php echo htmlspecialchars(stripslashes($row['class'])); ?>
				</td>
			</tr>
			<tr>
				<td>
					电话
				</td>
				<td>
					<?php echo htmlspecialchars(stripslashes($row['phonenum'])); ?>
				</td>
			</tr>
			<tr>
				<td>
					QQ
				</td>
				<td>
					<?php echo htmlspecialchars(stripslashes($row['qqnum'])); ?>
				</td>
			</tr>
			<tr>
				<td>
					自我介绍
				</td>
				<td>
					<?php echo htmlspecialchars(stripslashes($row['introduction'])); ?>
				</td>
			</tr>
			<tr>
				<td>
					面试官评价打分：
				</td>
				<td>
					<form class="" action="review.php" method="post">
						<textarea name="review" rows="8" cols="40"></textarea>
						<br/>
						<input type="text" name="score" value="">
						<input type="text" name="id" style="display:none" value="<?php echo $id?>">
						<input type="text" name="department" style="display:none" value="<?php echo $department?>">
						<input type="submit"  value="评  价">
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>
