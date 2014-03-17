<?php
// Votre RadioUID
$radiouid = "Clé UID de votre webradio";
// Votre APIKey
$apikey = "Clé API de votre webradio";
// Récupération des pochettes
$cover = "yes"; // "yes" ou "no"
// Nombre de résultats à récupérer
$amount = "10";
// Type de retour
$type = "xml"; // "xml" ou "string"

/* --------------------------------- */
/*   #### ! NE PAS MODIFIER ! ####   */
/* --------------------------------- */
$cache = './cache_api.txt';

$expire = time() - 310;
if(@file_exists($cache) && @filemtime($cache) > $expire){	echo file_get_contents($cache);}
else{
	$context = stream_context_create(array('http' => array('timeout' => 30)));
	touch($cache);
	$xml = @file_get_contents('http://api.radionomy.com/tracklist.cfm?radiouid='.$radiouid.''.(isset($apikey) ? '&apikey='.$apikey : '').(isset($amount) ? '&amount='.$amount : '').(isset($cover) ? '&cover='.$cover : '').(isset($type) ? '&type='.$type : ''),0, $context);
	if($xml)
    @file_put_contents($cache, $xml);
	echo file_get_contents($cache);
}
?>