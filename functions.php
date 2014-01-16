<?php

/*
*	cria uma imagem em uma pasta especifica
*	salva a imagem em files/avatar_$username
*	return @void
*/	
function save_image ($inPath,$outPath) {
    $in=    fopen($inPath, "rb");
    $out=   fopen($outPath, "wb");

    while ($chunk = fread($in,8192)) {
        fwrite($out, $chunk, 8192);
    }

    fclose($in);
    fclose($out);
}

