<?php
$stre = $_GET['url'];
$stre = preg_replace('#^https?://#', '', $stre);
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 0 );
$geturl = $_GET['url'];
$getid = $_GET['id'];
$gets = $_GET['s'];
if($geturl == ""){
header("Location: ?url=www.4shared.com/photo/mPsFuJvg/kitten.htm");
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$stre");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (J2ME/MIDP; Opera Mini/4.2.19634/23.333; U; en) Presto/2.5.25 Version/10.54');
$retorno = curl_exec($ch);
curl_close($ch);
if( strpos($retorno, "Invalid") === false )
{
$dom           	 		= new DomDocument();
@$dom->loadHTML($retorno);
$xpath          		= new DOMXPath($dom);
#############
$fileIcon              		= $xpath->query("//div[@class='fileIcon']");
$icon					= trim($fileIcon->item(0)->getAttribute('style'));
#############
$fileName              		= $xpath->query("//div[@class='fileName']");
$name					= trim($fileName->item(0)->nodeValue);
#############
$fileauthor              		= $xpath->query("//a[@class='author gaClick']");
$author					= trim($fileauthor->item(0)->nodeValue);
#############
$filesize              		= $xpath->query("//span[@class='size']");
$size					= trim($filesize->item(0)->nodeValue);
#############
$filedate              		= $xpath->query("//span[@class='date']");
$date					= trim($filedate->item(0)->nodeValue);
#############
$filetype              		= $xpath->query("//span[@class='type']");
$type					= trim($filetype->item(0)->nodeValue);
#############
echo "<b>Nome:</b> $name";
echo "</br>";
echo "<b>Tamanho:</b> $size";
echo "</br>";
echo "<b>Tipo:</b><i class='icone' style='$icon'></i>$type";
echo "</br>";
echo "<b>Data:</b> $date";
echo "</br>";
echo "<b>Autor:</b> $author";
}else{
echo "Informações do arquivo indisponivel.";
}
?>
