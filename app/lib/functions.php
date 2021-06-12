<?php
function makeSafe($theValue) {
	global $cartMain,$langArray;
	for ($f = 0; $f < count($langArray); $f++) {
		if ($cartMain["languageID"] == $langArray[$f]["languageID"] && $langArray[$f]["doubleByte"] == "Y") {
			return htmlentities($theValue);
			break;
		}
	}
	return htmlentities(str_replace(array(";","<?","?>"),"",$theValue));	
}
function getFORM($vName) {
	$val = (@$_GET[$vName] != "") ? @$_GET[$vName] : @$_POST[$vName];
	return $val;
}

function check_email_address($email) {

if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {

return false;
}

$email_array = explode("@", $email);
$local_array = explode(".", $email_array[0]);
for ($i = 0; $i < sizeof($local_array); $i++) {
if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
return false;
}
}
if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { 
$domain_array = explode(".", $email_array[1]);
if (sizeof($domain_array) < 2) {
return false; 
}
for ($i = 0; $i < sizeof($domain_array); $i++) {
if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
return false;
}
}
}
return true;
}


$CONFIG['security']['password_generator'] = array(
	//"C" => array('characters' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 'minimum' => 5, 'maximum' => 5),
	//"S" => array('characters' => "!@()-_=+?*^&", 'minimum' => 1, 'maximum' => 1),
	"N" => array('characters' => '1234567890', 'minimum' => 4, 'maximum' => 4)
);
$CONFIG2['security']['password_generator'] = array(
	"C" => array('characters' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 'minimum' => 5, 'maximum' => 5),
	"S" => array('characters' => "!@()-_=+?*^&", 'minimum' => 1, 'maximum' => 1),
	"N" => array('characters' => '1234567890', 'minimum' => 4, 'maximum' => 4)
);
function GenerateRandom()
{

	$sMetaPassword = "";
	
	global $CONFIG;
	$ahPasswordGenerator = $CONFIG['security']['password_generator'];
	foreach ($ahPasswordGenerator as $cToken => $ahPasswordSeed)
		$sMetaPassword .= str_repeat($cToken, rand($ahPasswordSeed['minimum'], $ahPasswordSeed['maximum']));
		
	$sMetaPassword = str_shuffle($sMetaPassword);
	

	$arBuffer = array();
	for ($i = 0; $i < strlen($sMetaPassword); $i ++)
		$arBuffer[] = $ahPasswordGenerator[(string)$sMetaPassword[$i]]['characters'][rand(0, strlen($ahPasswordGenerator[$sMetaPassword[$i]]['characters']) - 1)];

	return implode("", $arBuffer);
}
function GeneratePass()
{

	$sMetaPassword = "";
	
	global $CONFIG2;
	$ahPasswordGenerator = $CONFIG2['security']['password_generator'];
	foreach ($ahPasswordGenerator as $cToken => $ahPasswordSeed)
		$sMetaPassword .= str_repeat($cToken, rand($ahPasswordSeed['minimum'], $ahPasswordSeed['maximum']));
		
	$sMetaPassword = str_shuffle($sMetaPassword);
	

	$arBuffer = array();
	for ($i = 0; $i < strlen($sMetaPassword); $i ++)
		$arBuffer[] = $ahPasswordGenerator[(string)$sMetaPassword[$i]]['characters'][rand(0, strlen($ahPasswordGenerator[$sMetaPassword[$i]]['characters']) - 1)];

	return implode("", $arBuffer);
}

function cek_member_session($sesi_member,$sesi_kode){
$h=_query("select * from member where username='$sesi_member' and kode='$sesi_kode' and status_member='1'");
if(_num_rows($h)>0) return true;
else return false;
}
function cek_admin_session($sesi_admin,$sesi_kode){
if($sesi_admin=='admin' && $sesi_kode=='admin') return true;
else return false;
}
function kirim_email($email, $subj, $mesg, $from){
if(mail($email, $subj, $mesg, $additional_headers)!=null){
return true;
}else{return false;}
}
?>
