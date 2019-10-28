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
$CF = $_POST["CF"];
$EF = $_POST["EF"];
$TopicID = $_POST["TopicID"];
$LevelID = $_POST["LevelID"];
$IsActive = 1;

$sql_ins = "insert into QuestionMaster (Question,ChoiceA,ChoiceB,ChoiceC,ChoiceD,Answer,CF,EF,TopicID,LevelID,IsActive)
                  VALUES('".$Question."', '".$ChoiceA."', '".$ChoiceB."', '".$ChoiceC."', '".$ChoiceD."', '".$Answer."', 
                  '".$CF."', '".$EF."', '".$TopicID."', '".$LevelID."', '".$IsActive."')";
                  
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