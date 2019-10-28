<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];
$topic = $_GET["topic"];

$sql = '';
if($topic== '0'){
    $sql = "SELECT ex.ExerciseID,ex.Question,ex.ChoiceA,ex.ChoiceB,ex.ChoiceC,ex.ChoiceD,ex.EF,stp.SubTopicName,ex.Answer,ex.IsActive 
    FROM ExerciseMaster ex LEFT JOIN SubTopicMaster stp on ex.SubTopicID = stp.SubTopicID 
    WHERE ex.Question LIKE '%$keyword%'";
}else{
    $sql = "SELECT ex.ExerciseID,ex.Question,ex.ChoiceA,ex.ChoiceB,ex.ChoiceC,ex.ChoiceD,ex.EF,stp.SubTopicName,ex.Answer,ex.IsActive 
    FROM ExerciseMaster ex LEFT JOIN SubTopicMaster stp on ex.SubTopicID = stp.SubTopicID WHERE ex.Question LIKE '%$keyword%' AND ex.SubTopicID = $topic";
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