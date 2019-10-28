<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];
$UserName = $_GET["UserName"];
$UserPass = $_GET["UserPass"];
$UserCF = $_GET["UserCF"];
$AccountTypeID = $_GET["AccountTypeID"];

$sql = "UPDATE UserAccount SET UserName = '".$UserName."', Password = '".$UserPass."', UserCF = '".$UserCF."', AccountTypeID = '".$AccountTypeID."' WHERE UserID ='".$keyword."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    if($result===true)
    {
       $myObj_body->IsSuccess = true;
    }else{
        $myObj_body->IsSuccess = false;
    }
	echo json_encode($myObj_body);

    //close the db connection
    mysqli_close($connection);
?>