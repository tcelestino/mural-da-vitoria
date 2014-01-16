<?php
require "incs/configApp.php";

$fb->getAccessToken();
$fb->setFileUploadSupport("https://" . $_SERVER['SERVER_NAME']); // config. do envio de imagem do facebook

if($user) {
	$username = $profile['username']; // username do usuário
	$file = realpath("files/avatar_".$username.".jpg"); // avatar do usuário
 
	$status = 0; //	status da solicitação

	if(file_exists($file)) {

		// configuro o que vai ser enviado
		$args = array(
			"source" => "@" . $file,
			"message" => "Você enviou uam disgrama",
			"access_token" => $token
		);

		$data = $fb->api('/me/photos', 'POST', $args);

		if(!$data) {
			echo $status;
		} else {
			$status = 1;

			//	config. o envio do link no perfil do fdp.
			$args_feed = array(
				"link" => "https://www.facebook.com/SouPelegrino13/app_".$app_id,
				"message" => "Texto aqui caramba"
			);

			$post_link = $facebook->api('/me/feed', 'POST', $args_feed);
			if($post_link) {
				echo $status;
			}
		}

	} else {
		$url_error = "index.php";
		echo "<script>window.location.href=". $url_error ."</scirpt>";*
	}
}