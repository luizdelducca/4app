<?php
$ip = $_SERVER['REMOTE_ADDR'];
array_map('unlink', glob("recentes/recente-" . $ip . ".html"));
echo '<div id="h" class="alert alert-warning">Histórico foi limpo!  <a id="fechaaviso" href="#" onclick="fechaaviso();">Fechar</a></div>';
?>
<?php
$abrirfile = fopen("./recentes/recente-" . $_SERVER['REMOTE_ADDR'] . ".html","a");
fwrite($abrirfile, "");
fclose($abrirfile);
?>