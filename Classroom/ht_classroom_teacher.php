<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lớp học</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<?php
    include("db.php");
    $id_giaovien=$_SESSION['username'];
    $sql = "SELECT id,ten_lop,ten_mon,phong_hoc,hinh_anh,ma_lop FROM class WHERE id_giaovien = '$id_giaovien'";
    $sql_1 = mysqli_query($con,$sql);
	echo "<p><a href='homepage.php'>Trang chủ</a></p>";
    echo "<table>";
    while ($sql_2 = mysqli_fetch_array($sql_1))
    {
        echo "<tr>";
        for($i=1;$i<6;$i++)
        {
            echo "<td align='center' width='195px' >";
            if ($sql_2 != false)
            {
                $image_link = "image_php/".$sql_2['hinh_anh'];
                echo "<img src='$image_link'width='150px'>";echo"<br>";
                echo "Tên lớp: "; echo  $sql_2['ten_lop'];echo "<br>";
                echo "Tên môn: "; echo $sql_2['ten_mon'];echo "<br>";
                echo "Mã lớp: "; echo $sql_2['phong_hoc'];echo "<br>";echo "<br>";
                $temp = $sql_2['ma_lop'];
                $tenlop=$sql_2['ten_lop'];
                echo '<a href="class_detail.php?id='.$temp.'&lop='.$tenlop.'">Vào lớp</a>';
            }
            else
            {
                echo "&nbsp;";
            }
            echo "</td>";
            if($i!=5)
            {
                $sql_2=mysqli_fetch_array($sql_1);
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</center>
</body>
</html>