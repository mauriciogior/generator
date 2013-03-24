<?php

$fbconfig['appUrl'] = "https://strong-day-9898.herokuapp.com/"; 

// Create An instance of our Facebook Application.
$facebook = new Facebook(array(
  'appId'  => '108170255993438',
  'secret' => 'ba8e1bfee563b30879a118907621b0cf',
  'status' => 'true',
));

$user = $facebook->getUser();
if (!$user)
// redirect to Facebook login to get a fresh user access_token
  $loginUrl = $facebook->getLoginUrl(array('scope' => 'manage_pages, user_photos'));
else {
	 $email = $facebook->api('me', array('fields' => 'username'));
	 $email = $email["username"];
	 $check = $db->dbconsultspec("users","email",$email["username"],"a");
	 if($check == -1)
		  $db->register($email,"facebook");
	 $_SESSION["user"] = $user;
     try {
      // If the user has been authenticated then proceed
      $user_profile = $facebook->api('/me');
	  $me = $facebook->api('me', array('fields' => 'name'));
     } catch (FacebookApiException $e) {
      error_log($e);
      $user = null;
     }
}

?>