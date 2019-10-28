<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_POST["keys"];
$Question = $_POST["Question"];
$ChoiceA = $_POST["ChoiceA"];
$ChoiceB = $_POST["ChoiceB"];
$ChoiceC = $_POST["ChoiceC"];
$ChoiceD = $_POST["ChoiceD"];
$Answer = $_POST["Answer"];
$EF = $_POST["EF"];
$SubTopicID = $_POST["SubTopicID"];
$IsActive = $_POST["IsActive"];

$sql = "UPDATE ExerciseMaster SET Question = '".$Question."', ChoiceA = '".$ChoiceA."', 
ChoiceB = '".$ChoiceB."', ChoiceC = '".$ChoiceC."', ChoiceD = '".$ChoiceD."', 
Answer = '".$Answer."', EF = '".$EF."', SubTopicID = '".$SubTopicID."',
IsActive = '".$IsActive."' WHERE ExerciseID ='".$keyword."'";
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