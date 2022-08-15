<?php
  include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Danh Sách Sinh Viên</title>

</head>
<body>
<center>
<p><a href='javascript:history.go(-1)'>Trở về</a></p>
<h2>Quản lý sinh viên</h2>
<table class="tableuser" width="100%" border="1">
						<tr>
						<th><strong>Tên sinh viên</strong></th>
						<th><strong>Xóa</strong></th>
            </tr>
<tbody>
<?php
  include("db.php");
  $id_class =$_REQUEST['id'];
  $sql = "SELECT username from join_class WHERE ma_lop = '$id_class' ";
  $result = mysqli_query($con, $sql); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        echo "<td>" . $row['username']. "</td>";
        echo "<td><form method='POST'>
                <input type=submit value=Delete name=delete >
                </form>
                </td>";
                echo "</br>";
    }}
    else {
        echo "Không có sinh viên";}
        ?>  
   </tbody>
				</table>
</center>