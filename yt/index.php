<meta name="robots" content="index,follow"/>
<meta name="author" content="Luiz Del Ducca"/>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 0 );
$ida = $_GET["id"];
if($ida == ""){
$ida = 'Gm649oqgxk0';
}
require 'yt.php';
# Get video links
YT::init( $ida );
$myVar = YT::get_links();
YT::init( $ida );
$vdata = YT::get_data();
?>
<?
$tite = $vdata['title'];
$mp1 = $myVar['mp4-1280x720'][2];
$mp2 = $myVar['mp4-640x360'][2];
$mp3 = $myVar['mp4-426x240'][2];
$mp4 = $myVar['mp4-320x240'][2];
$mp5 = $myVar['mp4-256x144'][2];
$mp6 = $myVar['mp4-176x144'][2];
?>
<?php
$mp41 = "<a href='$mp1&title=$tite- www.ferramentaswap.wapka.me.mp4'>Download MP4 1280x720</a>\n<br>";
if($mp1 == ""){
$mp41 = "";
}
$mp42 = "<a href='$mp2&title=$tite- www.ferramentaswap.wapka.me.mp4'>Download MP4 640x360</a>\n<br>";
if($mp2 == ""){
$mp42 = "";
}
$mp43 = "<a href='$mp3&title=$tite- www.ferramentaswap.wapka.me.mp4'>Download MP4 426x240</a>\n<br>";
if($mp3 == ""){
$mp43 = "";
}
$mp44 = "<a href='$mp4&title=$tite - www.ferramentaswap.wapka.me.mp4'>Download MP4 320x240</a>\n<br>";
if($mp4 == ""){
$mp44 = "";
}
$mp45 = "<a href='$mp5&title=$tite- www.ferramentaswap.wapka.me.mp4'>Download MP4 256x144</a>\n<br>";
if($mp5 == ""){
$mp45 = "";
}
$mp46 = "<a href='$mp6&title=$tite- www.ferramentaswap.wapka.me.mp4'>Download MP4 176x144</a>\n<br>";
if($mp6 == ""){
$mp46 = "";
}
?>
<?
$webm1 = $myVar['webm-1280x720'][2];
$webm2 = $myVar['webm-640x360'][2];
$webm3 = $myVar['webm-426x240'][2];
$webm4 = $myVar['webm-320x240'][2];
$webm5 = $myVar['webm-256x144'][2];
$webm6 = $myVar['webm-176x144'][2];
?>
<?
$web1 = "<a href='$webm1&title=$tite- www.ferramentaswap.wapka.me.webm'>Download WEBM 1280x720</a>\n<br>";
if($webm1 == ""){
$web1 = "";
}
$web2 = "<a href='$webm2&title=$tite- www.ferramentaswap.wapka.me.webm'>Download WEBM 640x360</a>\n<br>";
if($webm2 == ""){
$web2 = "";
}
$web3 = "<a href='$webm3&title=$tite- www.ferramentaswap.wapka.me.webm'>Download WEBM 426x240</a>\n<br>";
if($webm3 == ""){
$web3 = "";
}
$web4 = "<a href='$webm4&title=$tite- www.ferramentaswap.wapka.me.webm'>Download WEBM 320x240</a>\n<br>";
if($webm4 == ""){
$web4 = "";
}
$web5 = "<a href='$webm5&title=$tite- www.ferramentaswap.wapka.me.webm'>Download WEBM 256x144</a>\n<br>";
if($webm5 == ""){
$web5 = "";
}
$web6 = "<a href='$webm6&title=$tite- www.ferramentaswap.wapka.me.webm'>Download WEBM 176x144</a>\n<br>";
if($webm6 == ""){
$web6 = "";
}
?>
<?
$flv1 = $myVar['flv-1280x720'][2];
$flv2 = $myVar['flv-640x360'][2];
$flv3 = $myVar['flv-426x240'][2];
$flv4 = $myVar['flv-320x240'][2];
$flv5 = $myVar['flv-256x144'][2];
$flv6 = $myVar['flv-176x144'][2];
?>
<?
$fl1 = "<a href='$flv1&title=$tite- www.ferramentaswap.wapka.me.flv'>Download FLV 1280x720</a>\n<br>";
if($flv1 == ""){
$fl1 = "";
}
$fl2 = "<a href='$flv2&title=$tite- www.ferramentaswap.wapka.me.flv'>Download FLV 640x360</a>\n<br>";
if($flv2 == ""){
$fl2 = "";
}
$fl3 = "<a href='$flv3&title=$tite- www.ferramentaswap.wapka.me.flv'>Download FLV 426x240</a>\n<br>";
if($flv3 == ""){
$fl3 = "";
}
$fl4 = "<a href='$flv4&title=$tite- www.ferramentaswap.wapka.me.flv'>Download FLV 320x240</a>\n<br>";
if($flv4 == ""){
$fl4 = "";
}
$fl5 = "<a href='$flv5&title=$tite- www.ferramentaswap.wapka.me.flv'>Download FLV 256x144</a>\n<br>";
if($flv5 == ""){
$fl5 = "";
}
$fl6 = "<a href='$flv6&title=$tite- www.ferramentaswap.wapka.me.flv'>Download FLV 176x144</a>\n<br>";
if($flv6 == ""){
$fl6 = "";
}
?>
<?
$tgp1 = $myVar['3gp-1280x720'][2];
$tgp2 = $myVar['3gp-640x360'][2];
$tgp3 = $myVar['3gp-426x240'][2];
$tgp4 = $myVar['3gp-320x240'][2];
$tgp5 = $myVar['3gp-256x144'][2];
$tgp6 = $myVar['3gp-176x144'][2];
?>
<?
$gp1 = "<a href='$tgp1&title=$tite- www.ferramentaswap.wapka.me'>Download 3GP 1280x720</a>\n<br>";
if($tgp1 == ""){
$gp1 = "";
}
$gp2 = "<a href='$tgp2&title=$tite- www.ferramentaswap.wapka.me'>Download 3GP 640x360</a>\n<br>";
if($tgp2 == ""){
$gp2 = "";
}
$gp3 = "<a href='$tgp3&title=$tite- www.ferramentaswap.wapka.me'>Download 3GP 426x240</a>\n<br>";
if($tgp3 == ""){
$gp3 = "";
}
$gp4 = "<a href='$tgp4&title=$tite- www.ferramentaswap.wapka.me'>Download 3GP 320x240</a>\n<br>";
if($tgp4 == ""){
$gp4 = "";
}
$gp5 = "<a href='$tgp5&title=$tite- www.ferramentaswap.wapka.me'>Download 3GP 256x144</a>\n<br>";
if($tgp5 == ""){
$gp5 = "";
}
$gp6 = "<a href='$tgp6&title=$tite- www.ferramentaswap.wapka.me'>Download 3GP 176x144</a>\n<br>";
if($tgp6 == ""){
$gp6 = "";
}
?>
<?
echo $mp41;
echo $mp42;
echo $mp43;
echo $mp44;
echo $mp45;
echo $mp46;
?>
<?
echo $web1;
echo $web2;
echo $web3;
echo $web4;
echo $web5;
echo $web6;
?>
<?
echo $fl1;
echo $fl2;
echo $fl3;
echo $fl4;
echo $fl5;
echo $fl6;
?>
<?
echo $gp1;
echo $gp2;
echo $gp3;
echo $gp4;
echo $gp5;
echo $gp6;
?>
