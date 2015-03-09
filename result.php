<?php
date_default_timezone_set("Brazil/East");
$referencia = $_SERVER['HTTP_REFERER'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$data = date("d/m/y");
$hora = date(" h:i:s a ");
$urlatual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$type = $_GET['tipo'];
$search = $_GET['q'];
$page = $_GET['page'];
$limit = $_GET['limite'];
$preview = "PREVIEW";
if($page == ''){
$page = "0";
}
if($page == 'undefined'){
$page = "0";
}
if($type == ''){
$type = "0";
}
$searchme = urlencode($search);
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
function format_time($t,$f=':') {if($t < 3600){
return sprintf("%02d%s%02d", floor($t/60)%60, $f, $t%60);}else{return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);}}
$offset = $page * 10;
$url="http://4app.eu5.org/web/rest/v1_1/files.xml?category=$type&query=$searchme&limit=10&offset=$offset";
$string = file_get_contents($url);
$xml = simplexml_load_string ( $string );
$dat = date("d-m-y");

fclose($abrirfile);
$abrirfile = fopen("./recentes/recente-" . $ip . ".html","a");
fwrite($abrirfile, "
<a class='btn btn-info' href='?q=$searchme&tipo=$type&page=$page'>$search</a>
");
fclose($abrirfile);

$todaylog = file_get_contents('recentes/recente-' . $dat . '.html');
if(($searchme == "") === false ){
if( strpos($todaylog, "$searchme") === false ){
$file_data = "
<a class='btn btn-info' href='../?q=$searchme'>$searchme</a>";
$file_data .= file_get_contents("recentes/recente-$dat.html");
file_put_contents('recentes/recente-' . $dat . '.html', $file_data);
}
}
$current = $page;
$next = $current + 1;
if($current == '0'){
$display = "display: none;";
$prev = 0;
}else{
$prev = $current - 1;
}
$did = file_get_contents("http://4app.eu5.org/did.php?q=$searchme");
$didl = urlencode($did);
if($did == ''){
$didshow = '';
}else{
$didshow = "Você quis dizer: <b><a href='http://4app.eu5.org/?q=$didl'>$did</a></b>";
}
echo $didshow;
#N0
$pp = '<div class="alert alert-warning" id="nf">Nada encontrado...</div>';
if($searchme == ''){
$pp = 'no_query';
}
if($page !== '0'){
$pp = '<div class="alert alert-warning" id="nf">Fim Dos Resultados. <a href="?q='.$searchme.'&tipo='.$type.'&page=0" style="'.$display.'" id="prevpage" page="0" onclick="prevPage(); document.location.href='.'#page'.';">Início</a> <a href="?q='.$searchme.'&tipo='.$type.'&page='.$prev.'" style="'.$display.'" id="prevpage" page="'.$prev.'" onclick="prevPage(); document.location.href='.'#page'.';">Voltar</a></div>';
}
if($xml->files->file->{0}->name == ''){
echo $pp;
exit;
}else{
$pp = '<div class="alert alert-warning" id="nf" style="display: none;"></div>';
echo $pp;
}

###virus detect

$virusdetect = 'success';
$virusdetect1 = 'success';
$virusdetect2 = 'success';
$virusdetect3 = 'success';
$virusdetect4 = 'success';
$virusdetect5 = 'success';
$virusdetect6 = 'success';
$virusdetect7 = 'success';
$virusdetect8 = 'success';
$virusdetect9 = 'success';
$virusalert = '"Virus detectado! O ficheiro está infectado. Você deseja realmente baixá-lo?"';
if($xml->files->file->{0}->virusScanResult == 'infected'){
$virusdetect = 'danger';
}
if($xml->files->file->{1}->virusScanResult == 'infected'){
$virusdetect1 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{2}->virusScanResult == 'infected'){
$virusdetect2 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{3}->virusScanResult == 'infected'){
$virusdetect3 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{4}->virusScanResult == 'infected'){
$virusdetect4 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{5}->virusScanResult == 'infected'){
$virusdetect5 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{6}->virusScanResult == 'infected'){
$virusdetect6 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{7}->virusScanResult == 'infected'){
$virusdetect7 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{8}->virusScanResult == 'infected'){
$virusdetect8 = "danger' onClick='return confirm($virusalert);";
}
if($xml->files->file->{9}->virusScanResult == 'infected'){
$virusdetect9 = "danger' onClick='return confirm($virusalert);";
}
###

if($xml->files->file->{0}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{0}->downloadUrl;
$download = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file0">';
if($xml->files->file->{0}->thumbnailUrl == ''){
$preview = '<img src="file.png">';
}else{
$preview = " <img src='{$xml->files->file->{0}->thumbnailUrl}' alt='{$xml->files->file->{0}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{0}->id3->length == ''){
echo $preview;
}else{
echo " <div id='player0'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{0}->thumbnailUrl}'>
 <source src='http://$download' type='{$xml->files->file->{0}->mimeType}'>
 <img src='{$xml->files->file->{0}->thumbnailUrl}' alt='{$xml->files->file->{0}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{0}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{0}->id}<br>";
$size = FileSizeConvert($xml->files->file->{0}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{0}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{0}->downloads}<br>";
$date = date_create ( $xml->files->file->{0}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{0}->id3->length == ''){
echo '';
}else{
$album = substr($xml->files->file->{0}->id3->album, 0, 20);
$time = format_time( $xml->files->file->{0}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{0}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{0}->id3->artist}<br>
<b>Duração</b>: $time<br>
<b>Faixa</b>: {$xml->files->file->{0}->id3->track}<br>
<b>Album</b>: $album<br>
<b>Ano</b>: {$xml->files->file->{0}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{0}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{0}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{0}->id3->samplerate}<br>
";
$div = "</div>";
}
$dlp = $xml->files->file->{0}->downloadPage;
$downloadpage = str_replace("http://4app.eu5.org","www.4shared.com",$dlp);

echo "<a class='btn btn-$virusdetect' target='_blank' href='https://$download'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='_blank' href='https://$downloadpage'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N1

if($xml->files->file->{1}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{1}->downloadUrl;
$download1 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file1">';
if($xml->files->file->{1}->thumbnailUrl == ''){
$preview1 = '<img src="file.png">';
}else{
$preview1 = " <img src='{$xml->files->file->{1}->thumbnailUrl}' alt='{$xml->files->file->{1}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{1}->id3->length == ''){
echo $preview1;
}else{
echo " <div id='player1'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{1}->thumbnailUrl}'>
 <source src='http://$download1' type='{$xml->files->file->{1}->mimeType}'>
 <img src='{$xml->files->file->{1}->thumbnailUrl}' alt='{$xml->files->file->{1}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{1}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{1}->id}<br>";
$size = FileSizeConvert($xml->files->file->{1}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{1}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{1}->downloads}<br>";
$date = date_create ( $xml->files->file->{1}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
$dlp1 = $xml->files->file->{1}->downloadPage;
$downloadpage1 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp1);
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{1}->id3->length == ''){
echo '';
}else{
$album1 = substr($xml->files->file->{1}->id3->album, 0, 20);
$time1 = format_time( $xml->files->file->{1}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{1}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{1}->id3->artist}<br>
<b>Duração</b>: $time1<br>
<b>Faixa</b>: {$xml->files->file->{1}->id3->track}<br>
<b>Album</b>: $album1<br>
<b>Ano</b>: {$xml->files->file->{1}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{1}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{1}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{1}->id3->samplerate}<br>
";
}
echo "<a class='btn btn-$virusdetect1' target='_blank' href='https://$download1'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage1'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N2

if($xml->files->file->{2}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{2}->downloadUrl;
$download2 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file2">';
if($xml->files->file->{2}->thumbnailUrl == ''){
$preview2 = '<img src="file.png">';
}else{
$preview2 = " <img src='{$xml->files->file->{2}->thumbnailUrl}' alt='{$xml->files->file->{2}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{2}->id3->length == ''){
echo $preview2;
}else{
echo " <div id='player2'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{2}->thumbnailUrl}'>
 <source src='http://$download2' type='{$xml->files->file->{2}->mimeType}'>
 <img src='{$xml->files->file->{2}->thumbnailUrl}' alt='{$xml->files->file->{2}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{2}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{2}->id}<br>";
$size = FileSizeConvert($xml->files->file->{2}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{2}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{2}->downloads}<br>";
$date = date_create ( $xml->files->file->{2}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{2}->id3->length == ''){
echo '';
}else{
$album2 = substr($xml->files->file->{2}->id3->album, 0, 20);
$time2 = format_time( $xml->files->file->{2}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{2}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{2}->id3->artist}<br>
<b>Duração</b>: $time2<br>
<b>Faixa</b>: {$xml->files->file->{2}->id3->track}<br>
<b>Album</b>: $album2<br>
<b>Ano</b>: {$xml->files->file->{2}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{2}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{2}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{2}->id3->samplerate}<br>
";
}
$dlp2 = $xml->files->file->{2}->downloadPage;
$downloadpage2 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp2);
echo "<a class='btn btn-$virusdetect2' target='_blank' href='https://$download2'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage2'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N3

if($xml->files->file->{3}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{3}->downloadUrl;
$download3 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file3">';
if($xml->files->file->{3}->thumbnailUrl == ''){
$preview3 = '<img src="file.png">';
}else{
$preview3 = " <img src='{$xml->files->file->{3}->thumbnailUrl}' alt='{$xml->files->file->{3}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{3}->id3->length == ''){
echo $preview3;
}else{
echo " <div id='player3'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{3}->thumbnailUrl}'>
 <source src='http://$download3' type='{$xml->files->file->{3}->mimeType}'>
 <img src='{$xml->files->file->{3}->thumbnailUrl}' alt='{$xml->files->file->{3}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{3}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{3}->id}<br>";
$size = FileSizeConvert($xml->files->file->{3}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{3}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{3}->downloads}<br>";
$date = date_create ( $xml->files->file->{3}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{3}->id3->length == ''){
echo '';
}else{
$album3 = substr($xml->files->file->{3}->id3->album, 0, 20);
$time3 = format_time( $xml->files->file->{3}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{3}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{3}->id3->artist}<br>
<b>Duração</b>: $time3<br>
<b>Faixa</b>: {$xml->files->file->{3}->id3->track}<br>
<b>Album</b>: $album3<br>
<b>Ano</b>: {$xml->files->file->{3}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{3}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{3}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{3}->id3->samplerate}<br>
";
}
$dlp3 = $xml->files->file->{3}->downloadPage;
$downloadpage3 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp3);
echo "<a class='btn btn-$virusdetect3' target='_blank' href='https://$download3'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage3'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N4

if($xml->files->file->{4}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{4}->downloadUrl;
$download4 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file4">';
if($xml->files->file->{4}->thumbnailUrl == ''){
$preview4 = '<img src="file.png">';
}else{
$preview4 = " <img src='{$xml->files->file->{4}->thumbnailUrl}' alt='{$xml->files->file->{4}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{4}->id3->length == ''){
echo $preview4;
}else{
echo " <div id='player4'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{4}->thumbnailUrl}'>
 <source src='http://$download4' type='{$xml->files->file->{4}->mimeType}'>
 <img src='{$xml->files->file->{4}->thumbnailUrl}' alt='{$xml->files->file->{4}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{4}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{4}->id}<br>";
$size = FileSizeConvert($xml->files->file->{4}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{4}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{4}->downloads}<br>";
$date = date_create ( $xml->files->file->{4}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{4}->id3->length == ''){
echo '';
}else{
$album4 = substr($xml->files->file->{4}->id3->album, 0, 20);
$time4 = format_time( $xml->files->file->{4}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{4}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{4}->id3->artist}<br>
<b>Duração</b>: $time4<br>
<b>Faixa</b>: {$xml->files->file->{4}->id3->track}<br>
<b>Album</b>: $album4<br>
<b>Ano</b>: {$xml->files->file->{4}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{4}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{4}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{4}->id3->samplerate}<br>
";
}
$dlp4 = $xml->files->file->{4}->downloadPage;
$downloadpage4 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp4);
echo "<a class='btn btn-$virusdetect4' target='_blank' href='https://$download4'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage4'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N5

if($xml->files->file->{5}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{5}->downloadUrl;
$download5 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file5">';
if($xml->files->file->{5}->thumbnailUrl == ''){
$preview5 = '<img src="file.png">';
}else{
$preview5 = " <img src='{$xml->files->file->{5}->thumbnailUrl}' alt='{$xml->files->file->{5}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{5}->id3->length == ''){
echo $preview5;
}else{
echo " <div id='player5'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{5}->thumbnailUrl}'>
 <source src='http://$download5' type='{$xml->files->file->{5}->mimeType}'>
 <img src='{$xml->files->file->{5}->thumbnailUrl}' alt='{$xml->files->file->{5}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{5}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{5}->id}<br>";
$size = FileSizeConvert($xml->files->file->{5}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{5}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{5}->downloads}<br>";
$date = date_create ( $xml->files->file->{5}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{5}->id3->length == ''){
echo '';
}else{
$album5 = substr($xml->files->file->{5}->id3->album, 0, 20);
$time5 = format_time( $xml->files->file->{5}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{5}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{5}->id3->artist}<br>
<b>Duração</b>: $time5<br>
<b>Faixa</b>: {$xml->files->file->{5}->id3->track}<br>
<b>Album</b>: $album5<br>
<b>Ano</b>: {$xml->files->file->{5}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{5}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{5}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{5}->id3->samplerate}<br>
";
}
$dlp5 = $xml->files->file->{5}->downloadPage;
$downloadpage5 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp5);
echo "<a class='btn btn-$virusdetect5' target='_blank' href='https://$download5'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage5'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N6

if($xml->files->file->{6}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{6}->downloadUrl;
$download6 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file6">';
if($xml->files->file->{6}->thumbnailUrl == ''){
$preview6 = '<img src="file.png">';
}else{
$preview6 = " <img src='{$xml->files->file->{6}->thumbnailUrl}' alt='{$xml->files->file->{6}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{6}->id3->length == ''){
echo $preview6;
}else{
echo " <div id='player6'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{6}->thumbnailUrl}'>
 <source src='http://$download6' type='{$xml->files->file->{6}->mimeType}'>
 <img src='{$xml->files->file->{6}->thumbnailUrl}' alt='{$xml->files->file->{6}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{6}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{6}->id}<br>";
$size = FileSizeConvert($xml->files->file->{6}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{6}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{6}->downloads}<br>";
$date = date_create ( $xml->files->file->{6}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{6}->id3->length == ''){
echo '';
}else{
$album6 = substr($xml->files->file->{6}->id3->album, 0, 20);
$time6 = format_time( $xml->files->file->{6}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{6}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{6}->id3->artist}<br>
<b>Duração</b>: $time6<br>
<b>Faixa</b>: {$xml->files->file->{6}->id3->track}<br>
<b>Album</b>: $album6<br>
<b>Ano</b>: {$xml->files->file->{6}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{6}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{6}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{6}->id3->samplerate}<br>
";
}
$dlp6 = $xml->files->file->{6}->downloadPage;
$downloadpage6 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp6);
echo "<a class='btn btn-$virusdetect6' target='_blank' href='https://$download6'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage6'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N7

if($xml->files->file->{7}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{7}->downloadUrl;
$download7 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file7">';
if($xml->files->file->{7}->thumbnailUrl == ''){
$preview7 = '<img src="file.png">';
}else{
$preview7 = " <img src='{$xml->files->file->{7}->thumbnailUrl}' alt='{$xml->files->file->{7}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{7}->id3->length == ''){
echo $preview7;
}else{
echo " <div id='player7'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{7}->thumbnailUrl}'>
 <source src='http://$download7' type='{$xml->files->file->{7}->mimeType}'>
 <img src='{$xml->files->file->{7}->thumbnailUrl}' alt='{$xml->files->file->{7}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{7}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{7}->id}<br>";
$size = FileSizeConvert($xml->files->file->{7}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{7}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{7}->downloads}<br>";
$date = date_create ( $xml->files->file->{7}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{7}->id3->length == ''){
echo '';
}else{
$album7 = substr($xml->files->file->{7}->id3->album, 0, 20);
$time7 = format_time( $xml->files->file->{7}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{7}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{7}->id3->artist}<br>
<b>Duração</b>: $time7<br>
<b>Faixa</b>: {$xml->files->file->{7}->id3->track}<br>
<b>Album</b>: $album7<br>
<b>Ano</b>: {$xml->files->file->{7}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{7}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{7}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{7}->id3->samplerate}<br>
";
}
$dlp7 = $xml->files->file->{7}->downloadPage;
$downloadpage7 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp7);
echo "<a class='btn btn-$virusdetect7' target='_blank' href='https://$download7'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage7'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N8

if($xml->files->file->{8}->name == ''){
echo "";
}else{
$dl = $xml->files->file->{8}->downloadUrl;
$download8 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file8">';
if($xml->files->file->{8}->thumbnailUrl == ''){
$preview8 = '<img src="file.png">';
}else{
$preview8 = " <img src='{$xml->files->file->{8}->thumbnailUrl}' alt='{$xml->files->file->{8}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{8}->id3->length == ''){
echo $preview8;
}else{
echo " <div id='player8'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{8}->thumbnailUrl}'>
 <source src='http://$download8' type='{$xml->files->file->{8}->mimeType}'>
 <img src='{$xml->files->file->{8}->thumbnailUrl}' alt='{$xml->files->file->{8}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{8}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{8}->id}<br>";
$size = FileSizeConvert($xml->files->file->{8}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{8}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{8}->downloads}<br>";
$date = date_create ( $xml->files->file->{8}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{8}->id3->length == ''){
echo '';
}else{
$album8 = substr($xml->files->file->{8}->id3->album, 0, 20);
$time8 = format_time( $xml->files->file->{8}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{8}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{8}->id3->artist}<br>
<b>Duração</b>: $time8<br>
<b>Faixa</b>: {$xml->files->file->{8}->id3->track}<br>
<b>Album</b>: $album8<br>
<b>Ano</b>: {$xml->files->file->{8}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{8}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{8}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{8}->id3->samplerate}<br>
";
}
$dlp8 = $xml->files->file->{8}->downloadPage;
$downloadpage8 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp8);
echo "<a class='btn btn-$virusdetect8' target='_blank' href='https://$download8'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage8'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}

#N9

if($xml->files->file->{9}->name == ''){
echo "";
$disablenextlink = 'disabled="disabled"';
}else{
$dl = $xml->files->file->{9}->downloadUrl;
$download9 = str_replace("http://4app.eu5.org","www.4shared.com",$dl);
echo '<div class="table table-bordered" id="file9">';
if($xml->files->file->{9}->thumbnailUrl == ''){
$preview9 = '<img src="file.png">';
}else{
$preview9 = " <img src='{$xml->files->file->{9}->thumbnailUrl}' alt='{$xml->files->file->{9}->name}' style='width:200px'/><br>";
}
if($xml->files->file->{9}->id3->length == ''){
echo '<img src="file.png">';
}else{
echo " <div id='player9'><video style='background-color: rgba(24, 23, 21, 0.81);' width='200' height='200' controls='true' poster='{$xml->files->file->{9}->thumbnailUrl}'>
 <source src='http://$download9' type='{$xml->files->file->{9}->mimeType}'>
 <img src='{$xml->files->file->{9}->thumbnailUrl}' alt='{$xml->files->file->{9}->name}' style='width:200px'/>
 </video></div><br>";
}
echo "<b>Nome</b>: {$xml->files->file->{9}->name}<br>";
echo "<b>ID</b>: {$xml->files->file->{9}->id}<br>";
$size = FileSizeConvert($xml->files->file->{9}->size);
echo "<b>Tamanho</b>: $size<br>";
echo "<b>mimeType:</b>: {$xml->files->file->{9}->mimeType}<br>";
echo "<b>Downloads:</b>: {$xml->files->file->{9}->downloads}<br>";
$date = date_create ( $xml->files->file->{9}->modified );
$modified = date_format ( $date , 'd-m-Y H:i:s' );
echo "<b>Modificado</b>: $modified<br>";
if($xml->files->file->{9}->id3->length == ''){
echo '';
}else{
$album9 = substr($xml->files->file->{9}->id3->album, 0, 20);
$time9 = format_time( $xml->files->file->{9}->id3->length );
echo "<div class='table table-bordered'>
<b>Informações da música(Id3):</b><br>
<b>Título</b>: {$xml->files->file->{9}->id3->title}<br>
<b>Artista</b>: {$xml->files->file->{9}->id3->artist}<br>
<b>Duração</b>: $time9<br>
<b>Faixa</b>: {$xml->files->file->{9}->id3->track}<br>
<b>Album</b>: $album9<br>
<b>Ano</b>: {$xml->files->file->{9}->id3->year}<br>
<b>Gênero</b>: {$xml->files->file->{9}->id3->genre}<br>
<b>Biterate</b>: {$xml->files->file->{9}->id3->bitrate}<br>
<b>Samplerate</b>: {$xml->files->file->{9}->id3->samplerate}<br>
";
}
$dlp9 = $xml->files->file->{9}->downloadPage;
$downloadpage9 = str_replace("http://4app.eu5.org","www.4shared.com",$dlp9);
echo "<a class='btn btn-$virusdetect9' target='_blank' href='https://$download9'>DOWNLOAD</a><br>";
echo "<a class='btn btn-primary' target='frameview' href='https://$downloadpage9'>Ver no 4Shared</a><br>";
echo '</div>';
echo $div;
}
?>
            <script language="javascript" type="text/javascript">
	function prevPage()
	{		
			document.getElementById('loading').style.display='block'
                        document.getElementById("loading").innerHTML = '<p class="alert alert-info"><b>Carregando página ...</b></p>'
}
	</script>
            <script language="javascript" type="text/javascript">
	function nextPage()
	{		
			document.getElementById('loading').style.display='inline'
                        document.getElementById("loading").innerHTML = '<p class="alert alert-info"><b>Carregando página ...</b></p>'
}
	</script>
            <script language="javascript" type="text/javascript">
	function Suporte()
	{		
				if( $("#suporte").html() == "" ){
			                        document.getElementById('suporte').style.display='block'
						document.getElementById("suporte").innerHTML = '<br><b>Email</b>: <i>luizdelducca98@gmail.com</i><br><b>Whatsapp</b>: <i>35 99103618</i><br><b>Aplicativo Loja Firefox</b>: <i><a href="https://marketplace.firefox.com/app/4app?src=application">4Search</a></i><hr size="2"/>'
                                           }else{
			                        document.getElementById('suporte').style.display='none'
						document.getElementById("suporte").innerHTML = ''
}
		}
</script>
    <nav>
  <ul class="pager">
    <b>Página atual: <?php echo $current;?></b>
    <a class="btn btn-info" href="?q=<?php echo $searchme;?>&tipo=<?php echo $type;?>&page=<?php echo $prev;?>" style="<?php echo $display;?>" id="prevpage" page="<?php echo $prev;?>" onclick="prevPage(); document.location.href='#page';">Voltar</a>
    <a class="btn btn-info" href="?q=<?php echo $searchme;?>&tipo=<?php echo $type;?>&page=<?php echo $next;?>" id="nextpage" page="<?php echo $next;?>" onclick="nextPage(); document.location.href='#page';" <?php echo $disablenextlink;?>>Próxima</a></li>
<center>    <div class="input-group">
<form method="get" accept-charset=utf-8 action="">
      <input type="hidden" value="<?php echo $searchme;?>" name="q"/>
      <input type="hidden" value="<?php echo $type;?>" name="tipo"/>
      <input type="number" style="width: 80%;" name="page" class="form-control">
      <span class="input-group-btn">
        <input class="btn btn-default" onclick="search();" value="Pular!" type="submit"/>
      </span>
</form>
Compartilhar esta página: <input type="text" onClick="this.select();" style="width: 100%;" value="http://4app.eu5.org/?q=<?php echo $searchme;?>&tipo=<?php echo $type;?>&page=<?php echo $page;?>"/></center>
<center><a href="#contato" id="contato" onclick="Suporte();">Suporte</a> | <a href="#top">^Subir^</a></center>
<div id="suporte"></div>
 </ul>

</nav>