<?php

require_once("facebook.php");
  $config = array();
  $config[‘appId’] = '';
  $config[‘secret’] = '';
  $config[‘fileUpload’] = false; // optional

  $facebook = new Facebook($config);
  echo "Done";
  
  $nextWeek = time() + (7*24*60*60);

$event_param = array(
    "access_token" => "",
    "name" => "Assignment 1",
    "start_time" => $nextWeek,
    "location" => "Vancouver"
);

 $app_id = "";
 $app_secret = "";
 $my_url = "https://fbduedates.herokuapp.com";
 
$code = $_REQUEST["code"];


if(empty($code)) {
    $auth_url = "http://www.facebook.com/dialog/oauth?client_id="
    . $app_id . "&redirect_uri=" . urlencode($my_url)
    . "&scope=create_event"; 
    echo("<script>top.location.href='" . $auth_url . "'</script>");
  }
  $event_id = $facebook->api("https://www.facebook.com/events/", "POST", $event_param);
?>