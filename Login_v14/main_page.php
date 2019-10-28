<?php
session_start();
if(!isset($_SESSION['UserID']) || $_SESSION['UserName']==""){
    header("Location:../index.php");
}
// ใส่ไว้ด้านบนของไฟล์สำหรับ เช็คว่าเป็น user หรือไม่
?>