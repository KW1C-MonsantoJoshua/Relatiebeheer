<?php
$pc		= "5043WH";		// vul een geldige postcode in
$hn		= 109;			// vul een geldig huisnummer in
$tv		= "";			// vul een geldige toevoeging in of laat leeg
$ak		= "FbW29C_969cyVfAKrj";		// vul hier uw eigen key in (zie registratie hieronder).

$getadrlnk	= "https://bwnr.nl/postcode.php?pc=".urlencode($pc)."&hn=".urlencode($hn)."&tv=".urlencode($tv)."&tg=data&ac=pc2adres&ak=$ak";

$result	= file_get_contents($getadrlnk);

if ($result=="Geen resultaat.") {echo $result;} else {
    $adres = explode(";",$result);
    $str	= $adres[0];
    $pl	= $adres[1];
    echo "
		straat		: $str<br>
		plaats		: $pl<br>";
}
?>