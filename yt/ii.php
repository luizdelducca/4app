<meta name="robots" content="noindex,nofollow"/>
<meta name="author" content="Luiz Del Ducca"/>
<?php
$id = $_GET["id"];
require 'yt.php';

echo "Conteudo do Vídeo";
YT::init($id);
echo '<pre>';
print_r(YT::get_data());
echo '</pre>';

echo "Informações Sobre o Vídeo";
YT::init($id);
echo '<pre>';
print_r(YT::get_info());
echo '</pre>';

echo "Vídeo Links";
YT::init($id);
echo '<pre>';
print_r(YT::get_links());
echo '</pre>';

?>