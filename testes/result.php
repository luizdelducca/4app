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
$url="http://4app.eu5.org/web/rest/v1_1/files.xml?category=$type&query=$searchme&limit=8&offset=$page";
$string = file_get_contents($url);
$xml = simplexml_load_string ( $string );

#N0
$pp = "nothing_found";
if($searchme == ''){
$pp = 'no_query';
}
if($xml->files->file->{0}->name == ''){
echo $pp;
exit;
}
echo '<div class="table table-bordered">';
if($xml->files->file->{0}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{0}->thumbnailUrl}'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{0}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{0}->id}</br>";
$size = FileSizeConvert($xml->files->file->{0}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{0}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
echo "<b>Modificado</b>: $modified</br>";
$dlp = $xml->files->file->{0}->downloadPage;
$downloadpage = str_replace("4app.eu5.org","www.4shared.com",$dlp);
$dl = $xml->files->file->{0}->downloadUrl;
$download = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage'>Ver no 4Shared</a></br>";
echo '</div>';
}

#N1
echo '<div class="table table-bordered">';
if($xml->files->file->{1}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{1}->thumbnailUrl}'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{1}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{1}->id}</br>";
$size = FileSizeConvert($xml->files->file->{1}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{1}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
$dlp1 = $xml->files->file->{1}->downloadPage;
$downloadpage1 = str_replace("4app.eu5.org","www.4shared.com",$dlp1);
echo "<b>Modificado</b>: $modified</br>";
$dl = $xml->files->file->{1}->downloadUrl;
$download1 = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download1'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage1'>Ver no 4Shared</a></br>";
echo '</div>';
}

#N2
echo '<div class="table table-bordered">';
if($xml->files->file->{2}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{2}->thumbnailUrl}'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{2}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{2}->id}</br>";
$size = FileSizeConvert($xml->files->file->{2}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{2}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
echo "<b>Modificado</b>: $modified</br>";
$dlp2 = $xml->files->file->{2}->downloadPage;
$downloadpage2 = str_replace("4app.eu5.org","www.4shared.com",$dlp2);
$dl = $xml->files->file->{2}->downloadUrl;
$download2 = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download2'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage2'>Ver no 4Shared</a></br>";
echo '</div>';
}

#N3
echo '<div class="table table-bordered">';
if($xml->files->file->{3}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{3}->thumbnailUrl}'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{3}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{3}->id}</br>";
$size = FileSizeConvert($xml->files->file->{3}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{3}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
echo "<b>Modificado</b>: $modified</br>";
$dlp3 = $xml->files->file->{3}->downloadPage;
$downloadpage3 = str_replace("4app.eu5.org","www.4shared.com",$dlp3);
$dl = $xml->files->file->{3}->downloadUrl;
$download3 = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download3'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage3'>Ver no 4Shared</a></br>";
echo '</div>';
}

#N4
echo '<div class="table table-bordered">';
if($xml->files->file->{4}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{4}->thumbnailUrl}' style='max-width:20%'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{4}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{4}->id}</br>";
$size = FileSizeConvert($xml->files->file->{4}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{4}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
echo "<b>Modificado</b>: $modified</br>";
$dlp4 = $xml->files->file->{4}->downloadPage;
$downloadpage4 = str_replace("4app.eu5.org","www.4shared.com",$dlp4);
$dl = $xml->files->file->{4}->downloadUrl;
$download4 = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download4'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage4'>Ver no 4Shared</a></br>";
echo '</div>';
}

#N5
echo '<div class="table table-bordered">';
if($xml->files->file->{5}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{5}->thumbnailUrl}'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{5}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{5}->id}</br>";
$size = FileSizeConvert($xml->files->file->{5}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{5}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
echo "<b>Modificado</b>: $modified</br>";
$dlp5 = $xml->files->file->{5}->downloadPage;
$downloadpage5 = str_replace("4app.eu5.org","www.4shared.com",$dlp5);
$dl = $xml->files->file->{5}->downloadUrl;
$download5 = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download5'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage5'>Ver no 4Shared</a></br>";
echo '</div>';
}

#N6
echo '<div class="table table-bordered">';
if($xml->files->file->{6}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{6}->thumbnailUrl}'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{6}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{6}->id}</br>";
$size = FileSizeConvert($xml->files->file->{6}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{6}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
echo "<b>Modificado</b>: $modified</br>";
$dlp6 = $xml->files->file->{6}->downloadPage;
$downloadpage6 = str_replace("4app.eu5.org","www.4shared.com",$dlp6);
$dl = $xml->files->file->{6}->downloadUrl;
$download6 = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download6'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage6'>Ver no 4Shared</a></br>";
echo '</div>';
}

#N7
echo '<div class="table table-bordered">';
if($xml->files->file->{7}->name == ''){
echo "";
}else{
echo "<img src='{$xml->files->file->{7}->thumbnailUrl}'/></br>";
echo "<b>Nome</b>: {$xml->files->file->{7}->name}</br>";
echo "<b>ID</b>: {$xml->files->file->{7}->id}</br>";
$size = FileSizeConvert($xml->files->file->{7}->size);
echo "<b>Tamanho</b>: $size</br>";
$date = date_create ( $xml->files->file->{7}->modified );
$modified = date_format ( $date , 'Y-m-d H:i:s' );
echo "<b>Modificado</b>: $modified</br>";
$dlp7 = $xml->files->file->{7}->downloadPage;
$downloadpage7 = str_replace("4app.eu5.org","www.4shared.com",$dlp7);
$dl = $xml->files->file->{7}->downloadUrl;
$download7 = str_replace("4app.eu5.org","www.4shared.com",$dl);
echo "<a class='btn btn-success' href='$download7'>DOWNLOAD</a></br>";
echo "<a class='btn btn-primary' target='_blank' href='$downloadpage7'>Ver no 4Shared</a></br>";
echo '</div>';
}
?>