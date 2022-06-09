<?php
$cliAddress = $_SERVER['REMOTE_ADDR'];
$cliOperatingSystem = php_uname('s');
$arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];
$agent = $_SERVER['HTTP_USER_AGENT'];

$cliBrowser = '';
foreach ($arr_browsers as $browser) {
    if (strpos($agent, $browser) !== false) {
        $cliBrowser = $browser;
        break;
    }
}
$cliInfo = "$cliAddress|$cliBrowser|$cliOperatingSystem";
setcookie("somecookie4", $cliInfo, time() + 7200);
?>
<?php
$cliReadCookie = $_COOKIE["somecookie4"];
$arrListOfStrings = explode("|", $cliReadCookie);
echo "<p>$cliInfo</p>";
echo "<p>Your IP address is: $arrListOfStrings[0] </p>";
echo "<p>Client Browser is: $arrListOfStrings[1] </p>";
echo "<p>Your OS is: $arrListOfStrings[2] </p>";
