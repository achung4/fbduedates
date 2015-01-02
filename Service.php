<?php
include_once("facebook.php");

define("FACEBOOOK_API_KEY","");
define("FACEBOOK_SECRET_KEY","");

$name = $_POST['name'];
$token = $_POST['access_token'];
$startTime = $_POST['start_time'];
$endTime = $_POST['end_time'];
$location = $_POST['location'];
$description = $_POST['description'];

$fileName = "./me2.jpg"; //profile picture of the event

$fb = new Facebook(array(
    'appId'      => FACEBOOOK_API_KEY,
    'secret'     => FACEBOOK_SECRET_KEY,
    'cookie'     => false,
//    'fileUpload' => true     // this is important !
));

$token = $fb->getAccessToken();

$data = array("name"=>$name,
              "access_token"=>$token,
              "start_time"=>$startTime,
              "end_time"=>$endTime,
              "location"=>$location,
              "description"=>$description,
              basename($fileName) => '@'.$fileName
);

print_r($data);

try{
    $result = $fb->api("/me/events","post",$data);
    $facebookEventId = $result['id'];
    echo $facebookEventId;
}catch( Exception $e){
    echo "{}";
}

?>
