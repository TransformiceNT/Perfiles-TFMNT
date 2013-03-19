<?php

$usuario = $_GET['usuario'];
if(isset($usuario)) {

header('Content-Type: image/png');
    

$jsonurl = "http://api.formice.com/mouse/all-ranks.json?n=". $usuario . "&l=es";
$json = file_get_contents($jsonurl,0,null,null);
$settings = json_decode($json);

$api = curl_init('http://api.formice.com/mouse/stats.json?n='. $usuario . '&l=es');
curl_setopt($api,CURLOPT_RETURNTRANSFER,true);
$datos = json_decode(curl_exec($api));
curl_close($api);
$name = $datos->name;
$posicion = $settings->rank;
$rondasjugadas = $settings->rounds_rank;
$rangodequeso = $settings->cheese_rank;
$rangodequesocomochaman = $settings->sham_cheese_rank;
$rangodequesocomochamanhard = $settings->hard_saves_rank;
$rangodefirst = $settings->first_rank;
$rangodepromedioqueso = $settings->cratio_rank;
$rangodepromediosaves = $settings->sratio_rank;
$rangodepromediofirst = $settings->fratio_rank;
$rangodepromediochamanquesos = $settings->scratio_rank;
$tribu = $datos->tribe;
$titulo = $datos->title;
$rondas = $datos->rounds;
$quesoobtenido = $datos->cheese;
$quesochaman = $datos->sham_cheese;
$saves = $datos->saves;
$saveshard = $datos->hard_saves;
$first = $datos->first;

$im = imagecreatetruecolor(600, 400);

$colorfondo = imagecolorallocate($im, 28, 59, 64);

$colortexto = imagecolorallocate($im, 150, 159, 176);

$colortitulo = imagecolorallocate($im, 169, 173, 49);

$negro = imagecolorallocate($im, 0, 0, 0);

imagefilledrectangle($im, 0, 0, 600, 399, $colorfondo); 

$fuente = "./soopafre.ttf";
$fuentetexto = "./arialbd.ttf";

imagettftext($im, 20, 0, 12, 32, $negro, $fuente, $name);
imagettftext($im, 20, 0, 8, 28, $negro, $fuente, $name);
imagettftext($im, 20, 0, 10, 30, $colortitulo, $fuente, $name);

$todoeltexto = 
"Está en la tribu $tribu \n
Tiene $rondas rondas jugadas \n
Tiene $quesoobtenido quesos como raton y $quesochaman quesos como chaman en un total de \n $rondasjugadas rondas \n
Tiene $saves ratones salvados como chamán y $saveshard ratones salvados en \n modo difícil \n
Ocupa el rango $posicion en CheeseForMice \n
Título actual: ";

$todoeltexto1 =
"\n\n\n\n\n\n
$titulo";

$todoeltexto2 = "Programador de este sistema";

$firma = "Hecho por: Superjd10 ( superjd10.com ) para TransformiceNT.com";

imagettftext($im, 12, 0, 10, 60, $colortexto, $fuentetexto, $todoeltexto);

if($usuario == "superjd") {
	imagettftext($im, 10, 90, 590, 300, $colortitulo, $fuente, $todoeltexto2);
	imagettftext($im, 25, 0, 120, 70, $colortexto, $fuente, $todoeltexto1);
}else{
	imagettftext($im, 25, 0, 10, 50, $colortexto, $fuente, $todoeltexto1);
}

imagettftext($im, 8, 0, 10, 395, $colortitulo, $fuentetexto, $firma);

imagepng($im);
imagedestroy($im);

/*
$tribu; 

$titulo; 

$posicion; 

$rondas; 

$quesoobtenido; 

$quesochaman; 

$saves; 

$saveshard; 

$first;


$rondasjugadas; 

$rangodequeso; 

$rangodequesocomochaman; 

$rangodequesocomochamanhard; 

$rangodefirst; 

$rangodepromedioqueso; 

$rangodepromediochamanquesos; 

$rangodepromediosaves; 

$rangodepromediofirst; 

*/
}else{

header('Location: http://transformicent.com');

}
?>