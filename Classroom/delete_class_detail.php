<?php
    require("db.php");
    $id=$_REQUEST['id'];
    $sql = "DELETE FROM class_detail WHERE id = $id";
    mysqli_query($con,$sql);
    header("Location: manage_class_detail.php")
?>
