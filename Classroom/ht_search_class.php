<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tìm kiếm (Admin)</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require("db.php");
    if(trim($_GET['keywords'])!=""){
        $m=explode(" ",$_GET['keywords']);  
        $find_sql="";
        for($i=0;$i<count($m);$i++)
        {
            $tu=trim($m[$i]);
            if($tu!="")
            {
                $find_sql=$find_sql." ten_lop like '%".$tu."%' or ten_mon like '%".$tu"%' or phong_hoc like '%".$tu"%' or";
            }
        }

        $m_2=explode(" ",$find_sql);  
        $find_sql_2="";
        for($i=0;$i<count($m_2)-1;$i++)
        {
            $find_sql_2=$find_sql_2.$m_2[$i]." ";
        }

        $sql="SELECT id,ten_lop,ten_mon,phong_hoc,hinh_anh,ma_lop FROM class WHERE $find_sql_2";
        $sql_1=mysqli_query($con,$sql);
        echo "<table>";
        while($sql_2=mysqli_fetch_array($sql_1))
        {
            echo "<tr>";
        for($i=1;$i<6;$i++)
        {
            echo "<td align='center' width='195px' >";
            if ($sql_2 != false)
            {
                $image_link = "image_php/".$sql_2['hinh_anh'];

                echo "<img src='$image_link'width='150px'>";echo"<br>";
                echo  $sql_2['ten_lop'];echo "<br>";
                echo $sql_2['ten_mon'];echo "<br>";
                echo $sql_2['phong_hoc'];echo "<br>";echo "<br>";
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