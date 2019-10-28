<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

$video_id = $_POST['VideoID'];
$video_name = $_POST['VideoName'];
$IsActive = $_POST['IsActive'];

if(!$video_name){
    // Update record
    $sql = "UPDATE VideoDefaultContent SET VideoDefaultName = '".$video_name."', IsActive = '".$IsActive."' WHERE VideoDefaultID ='".$video_id."'";
    $result = mysqli_query($connection, $sql);
    if($result===true)
    {
        $myObj_body->IsSuccess = true;
    }else{
        $myObj_body->IsSuccess = false;
    }
    //close the db connection
    mysqli_close($connection);
}else{
    $maxsize = 5242880; // 5MB
 
$name = $_FILES['file']['name'];
$target_dir = "VideoFile/";
$target_file = $target_dir . $_FILES["file"]["name"];

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
        $sql_by = "SELECT * FROM VideoDefaultContent Where VideoDefaultID=$video_id";
        $result_by = mysqli_query($connection, $sql_by) or die("Error in Selecting " . mysqli_error($connection));
        $old_path = '';
        if($row =mysqli_fetch_assoc($result_by))
        {
            $old_path = $row['URL'];
        }
        //Delete Old File
        unlink($old_path);

       // Update record
       $sql = "UPDATE VideoDefaultContent SET VideoDefaultName = '".$video_name."', IsActive = '".$IsActive."', URL = '".$target_file."' WHERE VideoDefaultID ='".$video_id."'";
        $result = mysqli_query($connection, $sql);
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
}
echo json_encode($myObj_body);
?>