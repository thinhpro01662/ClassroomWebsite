<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$sql = "SELECT page_id from comments where id='$id'";
$sql_1=mysqli_query($con, $sql);
while($sql_2 = mysqli_fetch_array($sql_1)){
	$page=$sql_2['page_id'];
}
$query = "DELETE FROM comments WHERE id='$id'";
$result = mysqli_query($con,$query) or die(mysql_error());
header ("Location: deletecmt.php?id=".$page);
?>

