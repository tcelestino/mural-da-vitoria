<?php

 require_once 'facebook.php';

// api e secret app
$config = array(
	'appId' => '',
	'secret' => ''
);

$fb = new Facebook($config);
$fb->setFileUploadSupport(true);

$user = $fb->getUser();
if ($user) {
  try {
    $profile = $fb->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
$app_id 	= $fb->getAppID(); // id do app

if(!$user) {
	$params = array(
		"scope" => "user_about_me, publish_stream, read_stream",
		"redirect_uri" => "https://www.facebook.com/_?sk=app_".$app_id 
	);
	$loginUrl = $fb->getLoginUrl($params); die('<script type="text/javascript">top.location.href="' . $loginUrl . '";</script>');
}