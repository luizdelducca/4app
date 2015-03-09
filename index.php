<?php
$abrirfile = fopen("./recentes/recente-" . $_SERVER['REMOTE_ADDR'] . ".html","a");
fwrite($abrirfile, "");
fclose($abrirfile);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>4APP - Busca & Download de arquivos do 4shared</title>
<meta name="description" content="[4APP] Pesquise e baixe arquivos do 4shared diretamente e gratuitamente, sem login ou espera."/>
<meta name="keywords" content="4app, download, files, 4shared, search,no account, generator, no login, free"/>
<meta name="robots" content="index,follow"/>
<meta name="author" content="Luiz Del Ducca"/>
<meta name="revisit-after" content="5"/>
<meta name="google-site-verification" content="RZwwlOA1F9-yw7Jjv1Kr8F08SkLNWvEYirbQWfS2RIE" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon"
          href="http://4app.eu5.org/img/icon-32.png" sizes="32x32">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
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
<body onload="onload();">
            <script type="text/javascript">
	function search()
	{		

                 if( $("#cpage").val() == "" ){
		
                                                $("#q").focus();

		}
                 if( $("#checksearchbox").val() == "" ){
		
			                        document.getElementById('loading').style.display='none'
						document.getElementById("loading").innerHTML = ''

		}
	if( $("#recente").html() == "-Histórico" ){
	
	document.getElementById("recente").innerHTML = '+Histórico'
 			     document.getElementById('recentes').style.display='none'
			     document.getElementById('del').style.display='none'
                        document.getElementById('nf').style.display='none'
}
		if( $("#q").val() == "" ){
                                                $("#q").focus();
		
			                        document.getElementById('loading').style.display='inline'
						document.getElementById("loading").innerHTML = '<div class="alert alert-warning well-sm">Campo não pode ficar vazio.</div>'

		}else{
                        
                        document.getElementById('h').style.display='none'
                        document.getElementById('nf').style.display='none'
                        document.getElementById('info').style.display='none'
                        document.getElementById('resultado').style.display='none'
                        document.getElementById('recentes').style.display='none'
			document.getElementById('loading').style.display='inline'
                        document.getElementById("Esconder").innerHTML = 'Esconder'
                        document.getElementById("loading").innerHTML = '<div class="alert alert-info well-sm">Pesquisando...</div>'
			$.ajax({
			
				type: 		"GET",
				url: 		"result.php",
				cache: 		false,
				data:		"q=" + $("#q").val() + "&tipo=" + $("#tipo").val(),
				success: 	function(msg)
				{
					document.getElementById('loading').style.display='none'
					
					if( msg == "Nada encontrado..." )
					{
					
			                        document.getElementById('loading').style.display='inline'
						document.getElementById("loading").innerHTML = '<div class="alert alert-warning well-sm">Nada encontrado...</div>'
                                                document.getElementById("resultado").style.display='none'
                                                $("#q").focus();
					}else{
						
                                                document.getElementById("resultado").style.display='block'

						
						$("#resultado").show().html(msg);			
						
					}
				 
				}
					
			});
								}
				 
				}
	</script>
            <script type="text/javascript">
	function Esconder()
	{		
				if( $("#Esconder").html() == "Esconder" ){
			                        document.getElementById('resultado').style.display='none'
			                        document.getElementById('form').style.display='none'
			                        document.getElementById('desc').style.display='none'
			                        document.getElementById('nf').style.display='none'
			                        document.getElementById('im').style.display='none'
						document.getElementById("Esconder").innerHTML = 'Mostrar'
                                           }else{
			                        document.getElementById('resultado').style.display='block'
			                        document.getElementById('form').style.display='block'
			                        document.getElementById('desc').style.display=''
						document.getElementById("Esconder").innerHTML = 'Esconder'
}
		}
</script>
<script type="text/javascript">
	function historico()
{



			$.ajax({
			
				type: 		"GET",
				url: 		"/recentes/recente-<?php echo $_SERVER['REMOTE_ADDR'];?>.html",
				cache: 		false,
				success: 	function(msg)
				{
					document.getElementById('loading').style.display='none'
					
					if( msg == "" )
					{
						document.getElementById('del').style.display='none'
						document.getElementById("recentes").innerHTML = 'O histórico está vazio...'

					}else{
						
						$("#recentes").html(msg);			
					}
				 
				}
			});
	if( $("#recente").html() == "+Histórico" ){
				                        document.getElementById('h').style.display='none'
			                        document.getElementById('nf').style.display='inline'
			                        document.getElementById('im').style.display='none'
			                        document.getElementById('rs').style.display='inline-block'
	  document.getElementById('recentes').style.display='inline-block'
			     document.getElementById('del').style.display='inline-block'
	
	document.getElementById("recente").innerHTML = '-Histórico'
 
                                          }else{
			                        document.getElementById('nf').style.display='none'
			                        document.getElementById('im').style.display='none'
			                        document.getElementById('rs').style.display='none'
			                        document.getElementById('h').style.display='none'
			     document.getElementById('recentes').style.display='none'
			     document.getElementById('del').style.display='none'
                             document.getElementById("recente").innerHTML = '+Histórico'

}
}

</script>
            <script type="text/javascript">
	function delhistorico()
{
				document.getElementById('recentes').style.display='none'
				document.getElementById('del').style.display='none'
			     document.getElementById('loading').style.display='inline'
                             document.getElementById('loading').innerHTML = '<div class="alert alert-info well-sm">Limpando Histórico...</div>'
			$.ajax({
			
				type: 		"GET",
				url: 		"/delhistorico.php",
				cache: 		false,
				success: 	function(msg)
				{
	                                document.getElementById("recente").innerHTML = '+Histórico'
					document.getElementById('loading').style.display='none'
					document.getElementById('recentes').style.display='none'
					document.getElementById('del').style.display='none'
						
						$("#h").html(msg);			
				 	document.getElementById("recentes").innerHTML = 'O histórico está vazio...'
					document.getElementById('h').style.display='inline'
				}
			});
}
	function fechaaviso()
{
					document.getElementById('h').style.display='none'
				 	document.getElementById("recentes").innerHTML = 'Carregando...'
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
$type = $_GET['tipo'];
$search = $_GET['q'];
$page = $_GET['page'];
$limit = $_GET['limite'];
if($search == ''){
$sbox = '';
}else{
$sbox = 'filled';
}
$selected = 'selected="selected"';
if($type == ''){
$s = $selected;
}

if($type == '1'){
$s1 = $selected;
}

if($type == '2'){
$s2 = $selected;
}

if($type == '3'){
$s3 = $selected;
}

if($type == '4'){
$s4 = $selected;
}

if($type == '5'){
$s5 = $selected;
}

if($type == '6'){
$s6 = $selected;
}

if($type == '7'){
$s7 = $selected;
}

if($type == '8'){
$s8 = $selected;
}

if($type == '10'){
$s10 = $selected;
}


$h = '<div id="h" style="display:none;"></div>';

$gerador = "<a href='http://4app.eu5.org/gerador/' class='btn btn-primary' id='GeradorLink'>Gerador</a>";
$Esconder = "<a href='#' class='btn btn-warning' id='Esconder' onclick='Esconder()'>Esconder</a>";
$history = "<a href='#' class='btn btn-default' id='recente' onclick='historico()'>+Histórico</a>";
$info = '<p id="info" class="text-muted"><b>  Pesquise e baixe arquivos do 4shared diretamente e gratuitamente, sem login ou espera.</b></p>';

echo '<div class="well well-sm" style="margin-bottom: 0%;">
<table class="table table-bordered responsive-utilities">
<thead>
<tr>
  <td style="width:130px;">
      <a name="top" href="http://4app.eu5.org/"><img src="/img/icon-90.png" alt="4APP logo" style="margin-left: 10%;margin-top: 5%;"></a>
</td>
  <td>
<form id="form" method="get" accept-charset=utf-8 action="javascript:;">
<input class="form-control" type="text" id="q" name="q" value="'.$_GET['q'].'"/>
<select id="tipo" class="form-control"  name="tipo">
<option '.$s.' value=""> Todos os arquivos </option>
<option '.$s1.' value="1"> Musicas</option>
<option '.$s2.' value="2"> Videos</option>
<option '.$s3.' value="3"> Fotos </option>
<option '.$s4.' value="4"> Arquivos </option>
<option '.$s5.' value="5"> Livros/Documentos </option>
<option '.$s6.' value="6"> Programas </option>
<option '.$s7.' value="7"> Web </option>
<option '.$s8.' value="8"> Celular </option>
<option '.$s10.' value="10"> Android </option>
</select>
<input type="hidden" id="checksearchbox" value="'.$sbox.'"/>
<input type ="hidden" id="cpage" value="'.$page.'"/>
<input class="btn btn-default" value="Pesquisar" onclick="search();" type="submit"/>
</form>
  </td>
  </tr>
</thead>
<tbody>
  <tr>
    <td>
      '.$gerador.''.$Esconder.''.$history.'
  </td>
<td id="desc">
'.$info.'
</td></tr>
</tbody>
</table>
</div>';
$recenttext = '<div class="well" style="display: none;" id="recentes">Carregando...</div><a class="btn btn-danger" id="del" style="display: none;" onclick="delhistorico();" href="#">[ Limpar histórico ]</a>';

echo $recenttext;

$pagei = $_GET['q'];
if($pagei == ''){
$displayupdt = "";
}else{
$displayupdt = "display:none;";
}
$dat = date("d-m-y");
$rs = file_get_contents("http://4app.eu5.org/rs.php");

echo "<a id='page'></a>";
echo $h;
echo '<div id="loading" style="display:none;"></div>';
echo '
<div id="nf" style="'.$displayupdt.'"><div id="rs" class="well well-sm" style="margin-bottom: 0%;"><b>Buscas recentes: </b> '.$rs.'</div>
<div id="im" class="alert alert-info well-sm"><b>Atualizações:</b><br>
<ul>
<li><b>07/03/2015</b></li>
<li>Agora você pode ouvir as músicas antes de baixa-las, se seu dispositivo ter suporte ao HTML5.</li>
</ul>
<ul>
<li><b>06/03/2015</b></li>
<li>Adicionado Gerador de links premium para arquivos do 4shared.</li>
</ul>
<ul>
<li><b>05/03/2015</b></li>
<li>Adicionado "<i>Você quis dizer</i>" para ajudar a corrigir erros de escrita nas buscas.</li>
</ul>
<ul>
<li><b>02/03/2015</b></li>
<li>4shared atualizou seu banco de dados de pesquisa ...</li>
</ul>
<ul>
<li><b>18/02/2015</b></li>
<li>Proteção contra arquivos possivelmente infectados.</li>
<li>Adicionado "informações da música".</li>
</ul>
</div></div>';
echo '<div id="resultado" style="display:none;"></div>';
if($ua == 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'){
$gtype = $_GET['tipo'];
$gsearch = urlencode($_GET['q']);
$gpage = $_GET['page'];
$googlebot = file_get_contents("http://4app.eu5.org/result.php?q=$gsearch&tipo=$gtype&page=$gpage");
echo $googlebot;
}
if($ua == 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)'){
$btype = $_GET['tipo'];
$bsearch = urlencode($_GET['q']);
$bpage = $_GET['page'];
$bingbot = file_get_contents("http://4app.eu5.org/result.php?q=$gsearch&tipo=$gtype&page=$gpage");
echo $bingbot;
}
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./onload.js"></script>';

echo "</body>";
echo "</html>";
?>