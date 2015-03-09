<?php
error_reporting(E_ALL);
ini_set('display_errors', 0 );
$user_login = "luizdelducca98@gmail.com";
$user_password = "luizqw123321";
// 5d70cDgb
$stre = $_GET['url'];
if($stre == ""){
header("Location: ?url=www.4shared.com/photo/mPsFuJvg/kitten.htm");
}
$client = new SoapClient("https://api.4shared.com:443/jax3/DesktopApp?wsdl&forDownloadHelper=true", array(
"cache_wsdl" => WSDL_CACHE_DISK,
"trace" => 1,
"exceptions" => 0
)
);
$client->yourFunction();
//Getting list of all folders
echo "<pre>";
$getAllItems  = $client->getDirectLink($user_login, $user_password, $stre);
print_r($getAllItems);
echo "</pre>";
?>
