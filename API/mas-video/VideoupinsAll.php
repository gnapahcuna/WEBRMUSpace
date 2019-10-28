<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$video_name = $_POST['VideoName'];
$level_id = $_POST['LevelID'];
$sub_topic_id = $_POST['SubTopicID'];

//$file_video = $_FILES['Video'];
$VideoPath='VideoFile/'.$video_name.'.mp4';

$maxsize = 5242880; // 5MB
 
$name = $_FILES['file']['name'];
$target_dir = "VideoFile/";
$target_file = $target_dir .$video_name.'-'. $_FILES["file"]["name"];

// Select file type
$videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("mp4","avi","3gp","mov","mpeg");

// Check extension
if( in_array($videoFileType,$extensions_arr) ){

   // Check file size
   if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
     echo "File too large. File must be less than 5MB.";
   }else{
     // Upload
     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
       // Insert record
       $sql_ins = "insert into VideoContent (VideoName,LevelID,SubTopicID,URL)
       VALUES('".$video_name."', '".$level_id."', '".$sub_topic_id."','".$target_file."')";
        $result = mysqli_query($connection, $sql_ins);
        if($result===true)
        {
            $myObj_body->IsSuccess = true;
        }else{
            $myObj_body->IsSuccess = false;
        }
        //close the db connection
        mysqli_close($connection);
     }
   }

}else{
    $myObj_body->IsSuccess = false;
}
echo json_encode($myObj_body);
?>