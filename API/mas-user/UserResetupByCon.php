<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];

    $sql_1 = "DELETE FROM UserSubCurrentStudy WHERE UserID ='".$keyword."'";
    mysqli_query($connection, $sql_1);

    $sql_8 = "DELETE FROM UserCurrentStudy WHERE UserID ='".$keyword."'";
    mysqli_query($connection, $sql_8);

    $sql_2 = "DELETE FROM UserSubTopicPassStudy WHERE UserID ='".$keyword."'";
    mysqli_query($connection, $sql_2);

    $sql_3 = "DELETE FROM UserPassStudy WHERE UserID ='".$keyword."'";
    mysqli_query($connection, $sql_3);

    $sql_4 = "DELETE FROM UserAnswerExerciseLog WHERE UserID ='".$keyword."'";
    mysqli_query($connection, $sql_4);

    $sql_5 = "DELETE FROM UserAnswerQuestionLog WHERE UserID ='".$keyword."'";
    mysqli_query($connection, $sql_5);

    $sql_6 = "DELETE FROM ops_logtest WHERE UserID ='".$keyword."'";
    mysqli_query($connection, $sql_6);

    $sql_7 = "UPDATE UserAccount SET UserCF = '0' WHERE UserID ='".$keyword."'";
    $result = mysqli_query($connection, $sql_7) or die("Error in Selecting " . mysqli_error($connection));
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