<?php
/*
* Author - Rob Thomson <rob@marotori.com>
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License version 2 as
* published by the Free Software Foundation.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
*/
$linked = "http://". $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
if($linked == 'http://4app.eu5.org/web/logout'){
echo "Não se pode sair!
Cant logout!
";
exit;
}
session_start();
ob_start();
/* config settings */
$base = "http://www.4shared.com";  //set this to the url you want to scrape
$ckfile = './79b633f0342f05613ff6a3dd0c5eaadd';
//this can be set to anywhere you fancy!  just make sure it is secure.
/* all system code happens below - you should not need to edit it! */
//work out cookie domain
$cookiedomain = str_replace("http://www.","",$base);
$cookiedomain = str_replace("https://www.","",$cookiedomain);
$cookiedomain = str_replace("www.","",$cookiedomain);
$url = $base . $_SERVER['REQUEST_URI'];
if($_SERVER['HTTPS'] == 'on'){
$mydomain = 'https://'.$_SERVER['HTTP_HOST'];
} else {
$mydomain = 'http://'.$_SERVER['HTTP_HOST'];
}
// Open the cURL session
$curlSession = curl_init();
curl_setopt ($curlSession, CURLOPT_URL, $url);
curl_setopt($curlSession, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1');
curl_setopt($curlSession, CURLOPT_REFERER, "http://4shared.com/" . $_GET['id']);
curl_setopt ($curlSession, CURLOPT_HEADER, 1);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
curl_setopt ($curlSession, CURLOPT_POST, 1);
curl_setopt ($curlSession, CURLOPT_POSTFIELDS, $_POST);
}
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curlSession, CURLOPT_TIMEOUT,30);
curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt ($curlSession, CURLOPT_COOKIEJAR, $ckfile);
curl_setopt ($curlSession, CURLOPT_COOKIEFILE, $ckfile);
//handle other cookies cookies
foreach($_COOKIE as $k=>$v){
if(is_array($v)){
$v = serialize($v);
}
curl_setopt($curlSession,CURLOPT_COOKIE,"$k=$v; domain=.$cookiedomain ; path=/");
}
//Send the request and store the result in an array
$response = curl_exec ($curlSession);
// Check that a connection was made
if (curl_error($curlSession)){
// If it wasn't...
print curl_error($curlSession);
} else {
//clean duplicate header that seems to appear on fastcgi with output buffer on some servers!!
$response = str_replace("HTTP/1.1 100 Continue\r\n\r\n","",$response);
$ar = explode("\r\n\r\n", $response, 2);
$header = $ar[0];
$body = $ar[1];
//handle headers - simply re-outputing them
$header_ar = split(chr(10),$header);
foreach($header_ar as $k=>$v){
if(!preg_match("/^Transfer-Encoding/",$v)){
$v = str_replace($base,$mydomain,$v); //header rewrite if needed
header(trim($v));
}
}
//rewrite all hard coded urls to ensure the links still work!
$body = str_replace($base,$mydomain,$body);
if( strpos($body, "segundos") === false )
{
echo $body;
}else{
$dom = new DomDocument();
@$dom->loadHTML($body);
$xpath = new DOMXPath($dom);
$fileIcon = $xpath->query("//input[@id='baseDownloadLink']");
$icone = trim($fileIcon->item(0)->getAttribute('value'));
echo "<a href='$icone'>$icone</a>";
echo "</br>Obs:</br>Por favor CONTE ate 20 PARA GARANTIR que o link do download funcione. Qualquer duvida <a href='http://fb.com/luiz.delducca'>http://fb.com/luiz.delducca</a> .";
}
}
curl_close ($curlSession);
?>
<?
date_default_timezone_set("Brazil/East");
$linked = "http://". $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
$referencia = $_SERVER['HTTP_REFERER'];
$data= date("d-m-y");
$hora= date("h:i:s a");
$abrirfile = fopen("recent.html","a");
fwrite($abrirfile, "<hr size='2'/></br>URL: $linked</br>DATA: $data $hora</br>REFERER: $referencia</br><hr size='2'/>
");
fclose($abrirfile);
?>
