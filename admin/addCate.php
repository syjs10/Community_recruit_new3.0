<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title></title>
      </head>
      <body>
            <h3>添加新生</h3>
            <form class="" action="student_commit.php" method="post">
                  <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc"text-algin = "center">
                        <tr>
					<td>姓名：</td>
					<td>
						<input class="input" type="text" name="name" maxlength="4" size="25">
					</td>
				</tr>
				<tr>
					<td>
						性别：
					</td>
					<td>
						<input style="margin-left: 0;" class="radio" type="radio" name="gender" value="男" style="margin-left:40px;">男</input>
						<input class="radio" type="radio" name="gender" value="女" style="margin-left:40px;">女</input>
						<input class="radio" type="radio" name="gender" value="女" style="margin-left:40px;">其他</input>
					</td>
				</tr>
				<tr>
					<td>专业班级：</td>
					<td>
						<input class="input" type="text" name="class" maxlength="30" size="25">
					</td>
				</tr>
				<tr>
					<td>手机：</td>
					<td>
						<input class="input" type="text" name="phonenum" maxlength="11" size="25">
					</td>
				</tr>
				<tr>
					<td>QQ:</td>
					<td>
						<input class="input" type="text" name="qqnum" maxlength="15" size="25">
					</td>
				</tr>
				<tr>
					<td>部门:</td>
					<td>
						<select class="" name="department">
								<option value="NULL">  </option>
								<option value="技术部">技术部</option>
								<option value="影音部">影音部</option>
								<option value="宣传部">宣传部</option>
								<option value="策划部">策划部</option>
								<option value="采编部">采编部</option>
								<option value="外事部">外事部</option>
						</select>

						<select class="" name="department1">
								<option value="NULL">  </option>
								<option value="技术部">技术部</option>
								<option value="影音部">影音部</option>
								<option value="宣传部">宣传部</option>
								<option value="策划部">策划部</option>
								<option value="采编部">采编部</option>
								<option value="外事部">外事部</option>
						</select>
						<select class="" name="department2">
								<option value="NULL">  </option>
								<option value="技术部">技术部</option>
								<option value="影音部">影音部</option>
								<option value="宣传部">宣传部</option>
								<option value="策划部">策划部</option>
								<option value="采编部">采编部</option>
								<option value="外事部">外事部</option>
						</select>
						<select class="" name="department3">
								<option value="NULL">  </option>
								<option value="技术部">技术部</option>
								<option value="影音部">影音部</option>
								<option value="宣传部">宣传部</option>
								<option value="策划部">策划部</option>
								<option value="采编部">采编部</option>
								<option value="外事部">外事部</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						上传照片：
					</td>
					<td>
						<input type="file" name="upfile" />
					</td>
				</tr>
				<tr>
					<td>
						自我介绍<br>（包括特长爱好）：
					</td>
					<td>
						<textarea class="input" name="introduction" rows="10" cols="15"></textarea>
					</td>
				</tr>
                        <tr>
                              <td colspan="2">
                                    <input type="submit" value = "添加学生"/>
                              </td>
                        </tr>
                  </table>
            </form>
      </body>
</html>
