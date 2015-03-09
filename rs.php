<?php
error_reporting(0);
ini_set('display_errors', 0);
date_default_timezone_set("Brazil/East");
$dat = date("d-m-y");
$retorno = file_get_contents("recentes/recente-$dat.html");
if( strpos($retorno, 'btn btn-info') === false ){
echo 'Nenhuma busca recente.';
}else{
$dom = new DomDocument();
@$dom->loadHTML($retorno);
$xpath = new DOMXPath($dom);

$file = $xpath->query("//a[@class='btn btn-info']");
$title = trim($file->item(0)->nodeValue);

################

$a = $xpath->query("//a[@class='btn btn-info']");
$href = trim($a->item(0)->getAttribute('href'));
$title = urldecode($title);
echo "<a class='btn btn-info' href='$href'>$title</a>";
}
?>

<?php
$dat = date("d-m-y");
$retorno = file_get_contents("recentes/recente-$dat.html");
if( strpos($retorno, 'btn btn-info') === false ){
echo '';
}else{
$dom = new DomDocument();
@$dom->loadHTML($retorno);
$xpath = new DOMXPath($dom);

$file1 = $xpath->query("//a[@class='btn btn-info']");
$title1 = trim($file1->item(1)->nodeValue);

################

$a1 = $xpath->query("//a[@class='btn btn-info']");
$href1 = trim($a1->item(1)->getAttribute('href'));
$title1 = urldecode($title1);
echo "<a class='btn btn-info' href='$href1'>$title1</a>";
}
?>

<?php
$dat = date("d-m-y");
$retorno = file_get_contents("recentes/recente-$dat.html");
if( strpos($retorno, 'btn btn-info') === false ){
echo '';
}else{
$dom = new DomDocument();
@$dom->loadHTML($retorno);
$xpath = new DOMXPath($dom);

$file2 = $xpath->query("//a[@class='btn btn-info']");
$title2 = trim($file2->item(2)->nodeValue);

################

$a2 = $xpath->query("//a[@class='btn btn-info']");
$href2 = trim($a2->item(2)->getAttribute('href'));
$title2 = urldecode($title2);
echo "<a class='btn btn-info' href='$href2'>$title2</a>";
}
?>

<?php
$dat = date("d-m-y");
$retorno = file_get_contents("recentes/recente-$dat.html");
if( strpos($retorno, 'btn btn-info') === false ){
echo '';
}else{
$dom = new DomDocument();
@$dom->loadHTML($retorno);
$xpath = new DOMXPath($dom);

$file3 = $xpath->query("//a[@class='btn btn-info']");
$title3 = trim($file3->item(3)->nodeValue);

################

$a3 = $xpath->query("//a[@class='btn btn-info']");
$href3 = trim($a3->item(3)->getAttribute('href'));
$title3 = urldecode($title3);
echo "<a class='btn btn-info' href='$href3'>$title3</a>";
}
?>

<?php
$dat = date("d-m-y");
$retorno = file_get_contents("recentes/recente-$dat.html");
if( strpos($retorno, 'btn btn-info') === false ){
echo '';
}else{
$dom = new DomDocument();
@$dom->loadHTML($retorno);
$xpath = new DOMXPath($dom);

$file4 = $xpath->query("//a[@class='btn btn-info']");
$title4 = trim($file4->item(4)->nodeValue);

################

$a4 = $xpath->query("//a[@class='btn btn-info']");
$href4 = trim($a4->item(4)->getAttribute('href'));
$title4 = urldecode($title4);
echo "<a class='btn btn-info' href='$href4'>$title4</a>";
}
?>