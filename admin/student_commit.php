<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			require_once '../include.php';
		 	//create short variable name
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$class = $_POST['class'];
			$phonenum = $_POST['phonenum'];
			$qqnum = $_POST['qqnum'];
			$department = $_POST['department'];
			$department1 = $_POST['department1'];
			$department2 = $_POST['department2'];
			$department3 = $_POST['department3'];


			if (!$name || !$gender || !$class || !$phonenum || !$qqnum || !$department || !$introduction){
				echo "请填全注册信息";
				exit;
			}
			if (!get_magic_quotes_gpc()){
				$name = mysql_real_escape_string($_POST['name']);
				$gender = mysql_real_escape_string($_POST['gender']);
				$class = mysql_real_escape_string($_POST['class']);
				$phonenum = mysql_real_escape_string($_POST['phonenum']);
				$qqnum = mysql_real_escape_string($_POST['qqnum']);
				$department = mysql_real_escape_string($_POST['department']);
				$department1 = mysql_real_escape_string($_POST['department1']);
				$department2 = mysql_real_escape_string($_POST['department2']);
				$department3 = mysql_real_escape_string($_POST['department3']);

			}
			
			@ $db = new mysqli('localhost', 'student', 'student123', 'student');
			if(mysqli_connect_errno()){
				echo 'Error: Could not connect to database. Please try again.';
				exit;
			}
			$db->query("SET NAMES 'UTF8'");
			$query = "insert into student values(
					'NULL','".$name."', '".$gender."', '".$class."', '".
					$phonenum."', '".$qqnum."', '".$department."', '".
					$department1."', '".$department2."', '".$department1.
					"', '".$introduction."', 'NULL','NULL','NULL','NULL')";
			$result = $db -> query($query);
			if ($result){

				$query1 = "select * from student where name like '".$name."' and phonenum like '".$phonenum."'";
				$result1 = $db -> query($query1);
				$row = $result1 -> fetch_assoc();




				//print_r($_FILES["upfile"]);
				if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
				$upfile=$_FILES["upfile"];
				//获取数组里面的值
				//$name=$upfile["name"];//上传文件的文件名
				$type=$upfile["type"];//上传文件的类型
				$size=$upfile["size"];//上传文件的大小
				$tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径
				//判断是否为图片
				switch ($type){
				case 'image/pjpeg':$okType=true;
				break;
				case 'image/jpeg':$okType=true;
				break;
				case 'image/gif':$okType=true;
				break;
				case 'image/png':$okType=true;
				break;
				}

				if($okType){
				/**
				* 0:文件上传成功<br/>
				* 1：超过了文件大小，在php.ini文件中设置<br/>
				* 2：超过了文件的大小MAX_FILE_SIZE选项指定的值<br/>
				* 3：文件只有部分被上传<br/>
				* 4：没有文件被上传<br/>
				* 5：上传文件大小为0
				*/
					$error=$upfile["error"];//上传后系统返回的值
					// echo "================<br/>";
					// echo "上传文件名称是：".$name."<br/>";
					// echo "上传文件类型是：".$type."<br/>";
					// echo "上传文件大小是：".$size."<br/>";
					// echo "上传后系统返回的值是：".$error."<br/>";
					// echo "上传文件的临时存放路径是：".$tmp_name."<br/>";
					//
					// echo "开始移动上传文件<br/>";
					//把上传的临时文件移动到up目录下面
					if ($type == 'image/jpeg') {
						move_uploaded_file($tmp_name,'/photo'.$row['id'].".jpeg");
					}
					if ($type == 'image/png') {
						move_uploaded_file($tmp_name,'/photo'.$row['id'].".png");
					}
					if ($type == 'image/gif') {
						move_uploaded_file($tmp_name,'/photo'.$row['id'].".gif");
					}
					//$destination="up/".$name;
					//echo "================<br/>";
					//echo "上传信息：<br/>";
					if($error==0){
					//echo "文件上传成功啦！";
					//echo "<br>图片预览:<br>";
					//echo "<img src=".$destination.">";
					//echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\">";
					}elseif ($error==1){
					echo "超过了文件大小，在php.ini文件中设置";
					}elseif ($error==2){
					echo "超过了文件的大小MAX_FILE_SIZE选项指定的值";
					}elseif ($error==3){
					echo "文件只有部分被上传";
					}elseif ($error==4){
					echo "没有文件被上传";
					}else{
					echo "上传文件大小为0";
					}
					}else{
					echo "请上传jpg,gif,png等格式的图片！";
					}
				}

				 echo "<script>alert(\"".$name."同学报名成功\");location.href=\"student_commit_success.php?id=".$row['id']."\"</script>";
			} else {
				echo "报名失败";
				echo mysql_error();
			}



			$db -> close();
		?>

	</body>
</html>
