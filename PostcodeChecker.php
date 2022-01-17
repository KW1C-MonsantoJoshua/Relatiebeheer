<?php
$pc		= "1234AB";		// vul een geldige postcode in
$hn		= 1;			// vul een geldig huisnummer in
$tv		= "a";			// vul een geldige toevoeging in of laat leeg
$ak		= "apikey";		// vul hier uw eigen key in (zie registratie hieronder).

$getadrlnk	= "https://bwnr.nl/postcode.php?pc=".urlencode($pc)."&hn=".urlencode($hn)."&tv=".urlencode($tv)."&tg=data&ac=pc2adres&ak=$ak";

$result	= file_get_contents($getadrlnk);

if ($result=="Geen resultaat.") {echo $result;} else {
    $adres = explode(";",$result);
    $str	= $adres[0];
    $pl	= $adres[1];
    $lat	= $adres[2];
    $lon	= $adres[3];
    $gm	= $adres[4];
    echo "
		straat1		: $str<br>
		plaats		: $pl<br>
		lat 		: $lat<br>
		lon 		: $lon<br>
		googlemaps	: $gm<br>";
}
?>