<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];
$topicID = $_GET["topicID"];

$sql = '';
if($topicID != '0'){
    $sql = "SELECT stp.SubTopicID,stp.SubTopicName,tp.TopicName,stp.IsActive FROM SubTopicMaster stp LEFT JOIN TopicMaster tp ON stp.TopicID = tp.TopicID WHERE stp.TopicID = $topicID";
}else{
    $sql = "SELECT stp.SubTopicID,stp.SubTopicName,tp.TopicName,stp.IsActive FROM SubTopicMaster stp LEFT JOIN TopicMaster tp ON stp.TopicID = tp.TopicID WHERE stp.SubTopicName LIKE '%$keyword%'";
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