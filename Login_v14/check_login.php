<?php
session_start();
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// ส่วนของการเชิ่อมต่อกับฐานข้อมูล
include "config.php";

if($_POST['user_name']!="" && $_POST['user_pass']!=""){
    $q="SELECT * FROM UserAccount WHERE UserName='".$_POST['user_name']."' AND Password='".$_POST['user_pass']."' AND AccountTypeID=2";
    $result = mysqli_query($connection, $q) or die("Error in Selecting " . mysqli_error($connection));
    if($row =mysqli_fetch_assoc($result))
        {
        $_SESSION['UserID']= $row['UserID'];  // สร้างตัวแปร session ตามต้องการ
        $_SESSION['UserName'] = $row['UserName'];
        echo "1";  // เมื่อล็อกอินผ่าน
    }else{
        echo "0";
    }
}else{
    echo "0";
}
?>