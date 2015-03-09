<?php
session_start();
$id = $_POST['q'];
$name = $_POST['name'];
$captcha = $_POST["register-captcha-bubble"];
$dl = "http://www.krafta.co/redirect/down.php?id=$id&name=$name";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$dl");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$as = curl_exec($ch);
curl_close($ch);

$dom = new DomDocument();
@$dom->loadHTML($as);
$xpath = new DOMXPath($dom);

$filelink = $xpath->query("//script");
$link = trim($filelink->item(0)->nodeValue);

$str = preg_replace('/\window.location = "/', '', $link);
$str = preg_replace('/\"/', '', $str);
    if ($_POST["register-captcha-bubble"] == $_SESSION["register-captcha-bubble"]){
$info = file_get_contents("http://4app.eu5.org/gerador/info.php?url=$id");
echo $info;
$dltxt = 'DOWNLOAD';

echo "<br><a class='btn btn-success' href='$str'>$dltxt</a>";
}else{
echo 'Captcha errado.';
}
$referencia = $_SERVER['HTTP_REFERER'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$data = date("d/m/y");
$hora = date(" h:i:s a ");
$dat = date("d-m-y");
$abrirfile = fopen("./logs/" . $dat . "-ip-" . $_SERVER['REMOTE_ADDR'] . ".html","a");
fwrite($abrirfile, "<b><font size='5'>$id</font>($captcha)</b> - <font size='4'>$data _  $hora</font><br>
<b>REFERER: </b><i>$referencia</i><br>
<b>IP: </b><i>$ip</i><br>
<b>UA: </b><i>$ua</i><br>
<hr color='black'></hr>");
fclose($abrirfile);
?>