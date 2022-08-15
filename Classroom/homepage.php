<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Welcome Home</title>
</head>
<body>
<center>
<?php
	if ($_SESSION['role']=="admin")
	{
		echo "<div class='formhomepage'>
				<p><a href='editrole.php'>Chỉnh sửa role</a></p>
				<p><a href='add_classroom.php'>Thêm lớp</a></p>
				<p><a href='ht_classroomadmin.php'>Tất cả lớp</a></p>
				<p><a href='editclass.php'>Chỉnh sửa lớp học</a></p>
				<p><a href='searchform.php'>Tìm kiếm lớp học</a></p>
				<p><a href='logout.php'>Logout</a></p>
			  </div>";
	}
	else if ($_SESSION['role']=="teacher")
	{
		echo "<div class='formhomepage'>
				<form action='add_classroom.php' method='post' name='Creating Class'>
					<input name='submit' type='submit' class='btnlogin' value='Tạo lớp học'/></p>
					<p><a href='ht_classroom_teacher.php'>Danh sách lớp học</a></p>
					<p><a href='manage_classroom.php'>Quản lý lớp học</a></p>
					<p><a href='searchform.php'>Tìm kiếm lớp học</a></p>
					<p><a href='logout.php'>Logout</a></p>
				</form>
			  </div>";
	}
	else
	{
		echo "<div class='formhomepage'>
				<form action='join_classroom.php' method='post' name='Joining'>
					<p><input type='text' name='code' placeholder='code'/>
					<input name='submit' type='submit' class='btnlogin' value='Tham gia'/></p>
					<p><a href='searchform.php'>Tìm kiếm lớp học</a></p>
					<p><a href='ht_classroom.php'>Danh sách tham gia</a></p>
					<p><a href='logout.php'>Logout</a></p>
				</form>
			  </div>";
	}
?>
</center>
</body>
</html>