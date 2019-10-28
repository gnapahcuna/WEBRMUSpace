<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$Question = $_POST["Question"];
$ChoiceA = $_POST["ChoiceA"];
$ChoiceB = $_POST["ChoiceB"];
$ChoiceC = $_POST["ChoiceC"];
$ChoiceD = $_POST["ChoiceD"];
$Answer = $_POST["Answer"];
$EF = $_POST["EF"];
$SubTopicID = $_POST["SubTopicID"];
$IsActive = 1;

$sql_ins = "insert into ExerciseMaster (Question,ChoiceA,ChoiceB,ChoiceC,ChoiceD,Answer,EF,SubTopicID,IsActive)
                  VALUES('".$Question."', '".$ChoiceA."', '".$ChoiceB."', '".$ChoiceC."', '".$ChoiceD."', 
                  '".$Answer."', '".$EF."', '".$SubTopicID."', '".$IsActive."')";
                  
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