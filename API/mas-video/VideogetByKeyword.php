<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];
$level = $_GET["level"];
$topic = $_GET["topic"];
$subtopic = $_GET["subtopic"];

$sql = '';
if($level != '0' && $topic== '0' && $subtopic== '0'){
    $sql = "SELECT vd.VideoID,vd.VideoName,vd.URL,lv.LevelName,stp.SubTopicName,tp.TopicName FROM VideoContent vd LEFT JOIN LevelMaster lv on vd.LevelID = lv.LevelID  LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID LEFT JOIN TopicMaster tp on stp.TopicID = tp.TopicID 
    WHERE vd.VideoName LIKE '%$keyword%' AND vd.LevelID = $level";
}elseif($level == '0' && $topic!= '0' && $subtopic== '0'){
    $sql = "SELECT vd.VideoID,vd.VideoName,vd.URL,lv.LevelName,stp.SubTopicName,tp.TopicName FROM VideoContent vd LEFT JOIN LevelMaster lv on vd.LevelID = lv.LevelID  LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID LEFT JOIN TopicMaster tp on stp.TopicID = tp.TopicID
     WHERE vd.VideoName LIKE '%$keyword%' AND tp.TopicID = $topic";
}elseif($level == '0' && $topic== '0' && $subtopic != '0'){
    $sql = "SELECT vd.VideoID,vd.VideoName,vd.URL,lv.LevelName,stp.SubTopicName,tp.TopicName FROM VideoContent vd LEFT JOIN LevelMaster lv on vd.LevelID = lv.LevelID  LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID LEFT JOIN TopicMaster tp on stp.TopicID = tp.TopicID
    WHERE vd.VideoName LIKE '%$keyword%' AND vd.SubTopicID = $subtopic";
}elseif($level == '0' && $topic!= '0' && $subtopic != '0'){
    $sql = "SELECT vd.VideoID,vd.VideoName,vd.URL,lv.LevelName,stp.SubTopicName,tp.TopicName FROM VideoContent vd LEFT JOIN LevelMaster lv on vd.LevelID = lv.LevelID  LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID LEFT JOIN TopicMaster tp on stp.TopicID = tp.TopicID
    WHERE vd.VideoName LIKE '%$keyword%'  AND tp.TopicID = $topic AND vd.SubTopicID = $subtopic";
}elseif($level != '0' && $topic!= '0' && $subtopic != '0'){
    $sql = "SELECT vd.VideoID,vd.VideoName,vd.URL,lv.LevelName,stp.SubTopicName,tp.TopicName FROM VideoContent vd LEFT JOIN LevelMaster lv on vd.LevelID = lv.LevelID  LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID LEFT JOIN TopicMaster tp on stp.TopicID = tp.TopicID
    WHERE vd.VideoName LIKE '%$keyword%' AND vd.LevelID = $level AND vd.SubTopicID = $subtopic";
}else{
    $sql = "SELECT vd.VideoID,vd.VideoName,vd.URL,lv.LevelName,stp.SubTopicName,tp.TopicName FROM VideoContent vd LEFT JOIN LevelMaster lv on vd.LevelID = lv.LevelID  LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID LEFT JOIN TopicMaster tp on stp.TopicID = tp.TopicID
    WHERE vd.VideoName LIKE '%$keyword%'";
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