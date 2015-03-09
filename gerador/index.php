<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>4APP - Gerador de links premium para o 4shared</title>
<meta name="description" content="[4APP] Pesquise e baixe arquivos do 4shared diretamente e gratuitamente, sem login ou espera."/>
<meta name="keywords" content="4app, download, files, 4shared, search, no account, no login, 4shared premium, premium, gerador, direct, link, direto, generator, no login, free"/>
<meta name="robots" content="index,follow"/>
<meta name="author" content="Luiz Del Ducca"/>
<meta name="revisit-after" content="5"/>
<meta name="google-site-verification" content="RZwwlOA1F9-yw7Jjv1Kr8F08SkLNWvEYirbQWfS2RIE" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon"
          href="http://4app.eu5.org/img/icon-32.png" sizes="32x32">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>


<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60483766-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
            <script type="text/javascript">
	function gerar()
	{		

		if( $("#q").val() == "" ){
		
			                        document.getElementById('loading').style.display='inline'
						document.getElementById("loading").innerHTML = '<div class="alert alert-warning well-sm">Campo não pode ficar vazio.</div>'

		}else{

                        document.getElementById('resultado').style.display='none'
                        document.getElementById('desc').style.display='none'
                        document.getElementById('inf').style.display='none'
			document.getElementById('loading').style.display='inline'
                        document.getElementById("loading").innerHTML = '<div class="alert alert-info well-sm">Gerando...</div>'
			$.ajax({
			
				type: 		"POST",
				url: 		"/gerador/4.php",
				cache: 		false,
				data:		"q=" + $("#q").val() + "&register-captcha-bubble=" + $("#register-captcha-bubble").val(),
				success: 	function(msg)
				{
					document.getElementById('loading').style.display='none'
					
					if( msg == "Captcha errado." )
					{
			                        document.getElementById('loading').style.display='inline'
						document.getElementById("loading").innerHTML = '<div class="alert alert-warning well-sm">Captcha errado.</div>'
                                                document.getElementById("resultado").style.display='none'
	                                        document.getElementById("register-captcha-bubble").setAttribute("value","");
	                                        document.getElementById("captcha").setAttribute("src","http://4app.eu5.org/gerador/captcha/captcha.php?" +(new Date()).getTime());
                                                $("#register-captcha-bubble").focus();
					}else{
						
                                                document.getElementById("resultado").style.display='block'
	                                        document.getElementById("register-captcha-bubble").setAttribute("value","");
	                                        document.getElementById("captcha").setAttribute("src","http://4app.eu5.org/gerador/captcha/captcha.php?" +(new Date()).getTime());
						
						$("#resultado").show().html(msg);			
						
					}
				 
				}
					
			});
								}
				 
				}
	</script>
<?php
date_default_timezone_set("Brazil/East");
$referencia = $_SERVER['HTTP_REFERER'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$data = date("d/m/y");
$hora = date(" h:i:s a ");
$urlatual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$getq = $_GET['q'];
if($getq == ''){
$getph = 'www.4shared.com/photo/mPsFuJvg/kitten.htm';
}else{
$getph = $getq;
}

$h = '<div id="h" style="display:none;"></div>';

$Esconder = "<a onclick='document.location.reload(true)' class='btn btn-warning' id='reload'>Recarregar</a>";
$info = '<p id="info" class="text-muted"><b>Gerador de links premium para arquivos do 4shared.</b></p>';

echo '<div class="well well-sm" style="margin-bottom: 0%;">
<table class="table table-bordered responsive-utilities">
<thead>
<tr>
  <td style="width:130px;">
      <a name="top" href="http://4app.eu5.org/"><img src="/img/icon-90.png" alt="4APP logo" style="margin-left: 10%;margin-top: 5%;"></a>
</td>
  <td>
<form id="form" method="post" accept-charset="utf-8" action="javascript:;">
<input name="q" placeholder="'.$getph.'" class="form-control" type="text" id="q" name="q" value="'.$getq.'">
<img id="captcha" class="thumbnail well-sm" style="margin-bottom: 0%;" alt="Captcha" src="./captcha/captcha.php"/>
<input name="register-captcha-bubble" id="register-captcha-bubble" class="form-control" type="text">
<input class="btn btn-default" onclick="gerar();" value="Gerar" type="submit">
</form>
  </td>
  </tr>
</thead>
<tbody>
  <tr>
    <td>
      '.$Esconder.'
  </td>
<td id="desc">
'.$info.'
</td></tr>
</tbody>
</table>
</div>';
$dat = date("d-m-y");
$abrirfile = fopen("./logs/" . $dat . "-ip-" . $_SERVER['REMOTE_ADDR'] . ".html","a");
fwrite($abrirfile, "<b><font size='5'>$getq</font></b> - <font size='4'>$data _  $hora</font><br>
<b>REFERER: </b><i>$referencia</i><br>
<b>IP: </b><i>$ip</i><br>
<b>UA: </b><i>$ua</i><br>
<hr color='black'></hr>");
fclose($abrirfile);
echo '<div id="loading" style="display:none;"></div>';
echo '<div id="resultado" class="well well-sm" style="display:none;"></div>';
echo '<div id="inf" class="alert alert-warning well-sm">No momento só funciona com arquivos Mp3.</div>';
if($ua == 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'){
$gtype = $_GET['tipo'];
$gsearch = urlencode($_GET['q']);
$gpage = $_GET['page'];
$googlebot = file_get_contents("http://4app.eu5.org/gerador/4.php?isbot=true&url=$geturl");
echo $googlebot;
}
if($ua == 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)'){
$btype = $_GET['tipo'];
$bsearch = urlencode($_GET['q']);
$bpage = $_GET['page'];
$bingbot = file_get_contents("http://4app.eu5.org/gerador/4.php?isbot=true&url=$geturl");
echo $bingbot;
}
echo '<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-alert.js"></script>
';

echo "</body>";
echo "</html>";
?>