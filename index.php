<?php
require_once 'incs/configApp.php';
include 'functions.php';

$get_avatar = $fb->api('me?fields=picture.type(large)'); // pega o avatar usando o opengraph
$avatar     = $get_avatar['picture']['data']['url']; // url do avatar
$username   = $profile['username']; // username
$name       = $profile['name'];

$avatar_user = save_image("$avatar", "files/avatar_$username.jpg");
$avatar = "files/avatar_".$username.".jpg";

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" xmlns:fb="http://ogp.me/ns/fb#"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" xmlns:fb="http://ogp.me/ns/fb#"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mural da Virada</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bevan" >
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
    <body>

        <div id="global">
            <section id="info" class="alignleft cols">
                <span class="ir logo_pelegrino">Pelegrino 13</span>
                <h1 class="ir">Mural da Virada</h1>
                <form action="" method="post" name="text_generator">
                    <fieldset>
                        <label for="txt">Digite a mensagem</label>
                        <textarea name="txt" id="txt" cols="30" rows="10"></textarea>
                        <div class="min_txt"><input type="text" name="limit" value="140" /> caracteres restantes</div>
                    </fieldset>
                </form>
            </section>
            <section id="generator" class="alignright cols">
              
                <div id="userGenerator">
                    <p>Escreva a sua mensagem de apoio e ajude Pelegrino a mudar Salvador.</p>
                    <div class="choice_size">
                        <span>Escolha o tamanho</span>
                    </div>
                    <div id="generatorMsg">
                        <div class="wrap">
                            <span class="ir p13">P13</span>
                            <div class="mask_color"></div>
                            <span class="quote"></span>
                            <img src="<?php echo $avatar; ?>" alt="<?php echo $name ; ?>">
                            <div class="text_generated">
                                <p></p>
                                <span class="name"><?php echo $name ; ?></span>
                            </div>
                            <input type="hidden" name="msg" id="msg" />
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <a href="#" class="button" id="shareButton">Compartilhar Imagem</a>
            </section>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.1.min.js"><\/script>')</script>

        <script src="js/main.js"></script>
    </body>
</html>
