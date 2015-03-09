<?php
date_default_timezone_set("Brazil/East");
$vID = $_GET['id'];
$maisq = $_GET['mais'];
$url="http://gdata.youtube.com/feeds/api/videos/$vID?v=2&alt=jsonc&prettyprint=tru";
$json = file_get_contents($url,true);
$json_output = json_decode($json);
$maisinfo = $json_output->data->description;
$playerdefault = $json_output->data->player->default;
$watch = 'Assistir no youtube';
$rtspflv = $json_output->{'data'}->{'content'}->{'1'};
$rtsp3gp = $json_output->{'data'}->{'content'}->{'6'};
$time =  gmdate("H:i:s", $json_output->data->duration);
?>
<?php
$send = 'Enviado por';
$like = 'pessoas gostam';
$views = 'visualizacoes e';
$com = 'comentarios';
$str3gp = 'STREAM 3GP';
$strflv = 'STREAM FLV';
$vm = 'Mostrar descrição';
$vl = 'Esconder descrição';
$amais = "</br><a href=\"?get-mais=1&get-id=$vID#i\"><font color=#00cc00>$vm</font></a>\n";
$amenos =  "</br><a href=\"?get-mais=0&get-id=$vID#download\"><font color=red>$vl</font></a>\n";
$br = '</br>';
$tite = $json_output->data->title;
if($rtspflv == ""){
$strflv = "";
}
if($rtsp3gp == ""){
$str3gp = "";
}
if($tite == ""){
$send = '';
$watch = '';
$playerdefault = '';
$like = '';
$views = '';
$com = '';
$strflv = '';
$str3gp = '';
$amais = '';
$amenos = '';
$br = '';
}
?>
<h4><? echo $json_output->data->title; ?></h4></br><a href='<? echo $json_output->data->thumbnail->hqDefault; ?>'><img src="<? echo $json_output->data->thumbnail->sqDefault; ?>"/></a><? echo $time; ?></br><img src="http://i1.ytimg.com/vi/<? echo $vID; ?>/1.jpg" width="55" height="55"/><img src="http://i1.ytimg.com/vi/<? echo $vID; ?>/2.jpg" width="55" height="55"/><img src="http://i1.ytimg.com/vi/<? echo $vID; ?>/3.jpg" width="55" height="55"/><? echo $br; ?><b><? echo $send; ?> <font color="blue"><a href="http://www.youtube.com/user/<? echo $json_output->data->uploader; ?>"><? echo $json_output->data->uploader; ?></a></font><? echo $br; ?><font color="green"><? echo $json_output->data->likeCount; ?></font> <? echo $like; ?><? echo $br; ?><? echo $json_output->data->viewCount; ?> <? echo $views; ?> <? echo $json_output->data->commentCount; ?> <? echo $com; ?><? echo $br; ?><a href="<?php echo $rtspflv;?>"><? echo $strflv; ?></a><? echo $br; ?><a href="<?php echo $rtsp3gp;?>"><? echo $str3gp; ?></a><? echo $br; ?><a href="<?php echo $playerdefault;?>"><? echo $watch; ?></a><? echo $br; ?>
<a name="i"></a>
<?php
if($maisq == "1"){
echo '<font color="gray">';
echo $maisinfo;
echo '</font>';
$vm = '';
}
if($tite == ""){
echo '';
}
?>
<?
if($maisq == "0"){
$amenos = '';
}
?>
<?
if($maisq == "1"){
$amais = '';
}
?>
<?php
if($maisq == "0"){
$maisinfo = '';
$vl = '';
}
if($tite == ""){
echo '';
}else{
echo '<font color="green">';
echo $amais;
echo $amenos;
echo '</font>';
}
$ip = $_GET['ip'];
$phone = $_GET['phone'];
$dat = date("d-m-y");
$datar = date("d/m/y");
$timeh = date(" h:i:s a ");
if($vID == "qRx8heXfeOM"){
exit;
}else{
$abrirfila = fopen('logs/' . $dat . '.html',"a");
fwrite($abrirfila, "<h4><b>$tite</b> - $vID</h4><div><img src='http://i1.ytimg.com/vi/$vID/default.jpg'>$time</img>$br $datar $br $timeh $br $ip $br $phone</div>$br<a href='$rtspflv'>$rtspflv</a><a href='$rtsp3gp'>$rtsp3gp</a><hr size='4'/> $br");
fclose( $abrirfila );
}
?>
