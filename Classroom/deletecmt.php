<?php
require('db.php');
include("auth.php");
$id_post=$_REQUEST['id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="tbuser">
<center>
<p><a href="homepage.php">Trang chủ</a></p>
<h2>All users</h2>
<table class="tableuser" width="100%" border="1">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>UserName</strong></th>
<th td colspan="2"><strong>Content</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from comments where page_id='$id_post';";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["content"]; ?></td>
<td align="center"><a href="deletecmt2.php?id=<?php echo $row["id"];?>">Delete</a></td>
</tr>
<?php $_SESSION['ID']=($count++)-1; } ?>
</tbody>
</table>
</center>
</div>
</body>
</html>