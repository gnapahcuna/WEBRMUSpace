<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];

$sql_by = "SELECT * FROM VideoContent Where VideoID=$keyword";
        $result_by = mysqli_query($connection, $sql_by) or die("Error in Selecting " . mysqli_error($connection));
        $old_path = '';
        if($row =mysqli_fetch_assoc($result_by))
        {
            $old_path = $row['URL'];
        }
        //Delete Old File
        unlink($old_path);

$sql = "Delete FROM VideoContent WHERE VideoID = $keyword";
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