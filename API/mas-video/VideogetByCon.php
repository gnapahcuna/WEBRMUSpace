<?php
	error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    header('Content-Type: application/json; charset=utf-8');
    include "../config.php";

    $keyword = $_GET["keys"];
	
    $sql = "SELECT vd.VideoID,vd.VideoName,vd.URL,vd.LevelID,vd.SubTopicID,tp.TopicID FROM VideoContent vd LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID LEFT JOIN TopicMaster tp on stp.TopicID = tp.TopicID
    Where vd.VideoID=$keyword";
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