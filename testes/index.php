<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>4APP - Search & Download files from 4shared</title>
<meta name="description" content="[4APP] Search and download files from 4shared without account, and free."/>
<meta name="keywords" content="4app, download, files, 4shared, search,no account, generator, no login, free"/>
<meta name="robots" content="index,follow"/>
<meta name="author" content="Luiz Del Ducca"/>
<meta name="revisit-after" content="5"/>
<meta name="google-site-verification" content="RZwwlOA1F9-yw7Jjv1Kr8F08SkLNWvEYirbQWfS2RIE" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css"/>
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>
<body>

            <script language="javascript" type="text/javascript">
	function search()
	{
		
		if( $("#q").val() == "" ){
		
			alert("Campo não pode ficar vazio.");	
		}else{
			document.getElementById('loading').style.display='inline'
			$.ajax({
			
				type: 		"GET",
				url: 		"result.php",
				cache: 		false,
				data:		"q=" + $("#q").val() + "&tipo=" + $("#tipo").val() + "&page=" + $("#page").val(),
				success: 	function(msg)
				{
					document.getElementById('loading').style.display='none'
					
					if( msg == "nothing_found" )
					{
					
						document.getElementById("alerts").innerHTML = '<center><h4>Nada encontrado..!</h4></center>'	
						$('#alerts').slideUp(200).delay(100).fadeIn(200);
						$("#q").focus();
                                                document.getElementById("resultado").style.display='none'
					}else{
						
                                                document.getElementById("resultado").style.display='block'
						$("#q").focus();

						
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
$type = $_GET['tipo'];
$search = $_GET['q'];
$page = $_GET['page'];
$limit = $_GET['limite'];

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
echo '<div><a class="close" data-dismiss="alert" href="#">&times;</a><div style="display:none;" id="alerts" class="alert alert-warning">
    </div></div>';
echo '<div class="well">
<b> Pesquisar </b>
<br/>
<form method="get" accept-charset=utf-8 action="javascript:;">
<input class="form-control" type="text" id="q" name="q" value="'.$_GET['q'].'"/>
<select class="form-control" id="tipo" name="tipo">
<option id="tipo" '.$s.' value=""> Todos os arquivos </option>
<option id="tipo" '.$s1.' value="1"> Musicas</option>
<option id="tipo" '.$s2.' value="2"> Videos</option>
<option id="tipo" '.$s3.' value="3"> Fotos </option>
<option id="tipo" '.$s4.' value="4"> Arquivos </option>
<option id="tipo" '.$s5.' value="5"> Livros/Documentos </option>
<option id="tipo" '.$s6.' value="6"> Programas </option>
<option id="tipo" '.$s7.' value="7"> Web </option>
<option id="tipo" '.$s8.' value="8"> Celular </option>
<option id="tipo" '.$s10.' value="10"> Android </option>
</select>
<input class="btn btn-default" value="Pesquisar" onclick="search();" type="submit"/>
</form>
</div>';
echo '<div id="loading" style="display:none;">Pesquisando...</div>';
echo '<div id="resultado" style="display:none;"></div>';
echo '<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-alert.js"></script>

  <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>';
echo "</body>";
echo "</html>";
?>