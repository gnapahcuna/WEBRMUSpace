<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$UnitName = $_GET["UnitName"];
$UnitValue = $_GET["UnitValue"];
$IsActive = 1;

$sql_ins = "insert into UnitMaster (UnitName,UnitValue,IsActive)
	 		 	VALUES('".$UnitName."', '".$UnitValue."', '".$IsActive."')";
$result = mysqli_query($connection, $sql_ins);
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