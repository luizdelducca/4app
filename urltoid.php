<?php
header('Content-type: application/xml');
$geturl = $_GET['url'];
$geturl = preg_replace('#^https?://#', '', $geturl);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://$geturl");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36');
$as = curl_exec($ch);
curl_close($ch);

$dom = new DomDocument();
@$dom->loadHTML($as);
$xpath = new DOMXPath($dom);

if( strpos($as, "jsItemFileId") === false )
{
echo "<LinkToId xmlns=''>";

echo "<error><code>404</code><errorDesc>No jsItemFileId in the page.</errorDesc></error>";
echo "</LinkToId>";
exit;
}else{
$filelink = $xpath->query("//link[@hreflang='x-default']");
$fileUrl = trim($filelink->item(0)->getAttribute('href'));

$file = $xpath->query("//input[@class='jsItemFileId']");
$fileId = trim($file->item(0)->getAttribute('value'));

$file1 = $xpath->query("//input[@class='jsItemDirId']");
$fileDirId = trim($file1->item(0)->getAttribute('value'));

echo "<LinkToId xmlns=''>";

echo "<url>$fileUrl</url>";
echo "<fileId>$fileId</fileId>";
echo "<fileDirId>$fileDirId</fileDirId>";

echo "</LinkToId>";
}
?>