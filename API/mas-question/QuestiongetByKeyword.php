<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];
$level = $_GET["level"];
$topic = $_GET["topic"];

$sql = '';
if($level != '0' && $topic== '0'){
    $sql = "SELECT q.QuestionID,q.Question,q.ChoiceA,q.ChoiceB,q.ChoiceC,q.ChoiceD,q.CF,q.EF,lv.LevelName,q.TopicID,tp.TopicName,q.Answer,q.IsActive 
    FROM QuestionMaster q LEFT JOIN LevelMaster lv on q.LevelID = lv.LevelID 
    LEFT JOIN TopicMaster tp on q.TopicID = tp.TopicID WHERE q.Question LIKE '%$keyword%' AND q.LevelID = $level";
}elseif($level == '0' && $topic!= '0'){
    $sql = "SELECT q.QuestionID,q.Question,q.ChoiceA,q.ChoiceB,q.ChoiceC,q.ChoiceD,q.CF,q.EF,lv.LevelName,q.TopicID,tp.TopicName,q.Answer,q.IsActive 
    FROM QuestionMaster q LEFT JOIN LevelMaster lv on q.LevelID = lv.LevelID 
    LEFT JOIN TopicMaster tp on q.TopicID = tp.TopicID WHERE q.Question LIKE '%$keyword%' AND q.TopicID = $topic";
}elseif($level == '0' && $topic== '0'){
    $sql = "SELECT q.QuestionID,q.Question,q.ChoiceA,q.ChoiceB,q.ChoiceC,q.ChoiceD,q.CF,q.EF,lv.LevelName,q.TopicID,tp.TopicName,q.Answer,q.IsActive 
    FROM QuestionMaster q LEFT JOIN LevelMaster lv on q.LevelID = lv.LevelID 
    LEFT JOIN TopicMaster tp on q.TopicID = tp.TopicID WHERE q.Question LIKE '%$keyword%'";
}else{
    $sql = "SELECT q.QuestionID,q.Question,q.ChoiceA,q.ChoiceB,q.ChoiceC,q.ChoiceD,q.CF,q.EF,lv.LevelName,q.TopicID,tp.TopicName,q.Answer,q.IsActive 
    FROM QuestionMaster q LEFT JOIN LevelMaster lv on q.LevelID = lv.LevelID 
    LEFT JOIN TopicMaster tp on q.TopicID = tp.TopicID WHERE q.Question LIKE '%$keyword%' AND q.LevelID = $level AND q.TopicID = $topic";
}
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
   
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
       array_push($emparray,$row);
    }
    //$myObj_body->Response = $emparray;
	echo json_encode($emparray);

    //close the db connection
    mysqli_close($connection);
?>