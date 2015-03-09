<?php
$getq = urlencode($_GET['q']);
if($_GET['hl'] == ''){
$hl = "pt-BR";
}else{
$hl = $_GET['hl'];
}
$string = "http://www.google.de/search?safe=off&hl=$hl&nfpr=1&ie=UTF-8&q=$getq";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$string");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Nokia6630/1.0 (2.3.129) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 Configuration/CLDC-1.1');
$as = curl_exec($ch);
curl_close($ch);


$dom = new DomDocument();
@$dom->loadHTML($as);
$xpath = new DOMXPath($dom);

$filedesc = $xpath->query("//div[@class='onebox_result']");
$onebox = trim($filedesc->item(0)->nodeValue);
$filefim = $xpath->query("//i");
$fim = trim($filefim->item(0)->nodeValue);

echo $fim;
?>