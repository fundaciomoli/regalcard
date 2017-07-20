<?php

/**
 * RegalCard
* @author angel zambrana
* @owner Fundacio moli de puigvert
* @date october 2015
*/

//include code qr
require_once $_SERVER['DOCUMENT_ROOT'].'/phpqrcode/qrlib.php';

//include variables
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/variables.inc.php';

//get the param
$param=$_GET['id'];

// null card_id exit the page
if (is_null($param)){
  include 'index.php';
}else{
ob_start('callback');

//text to the code qr
$text_qr=$url_link.'/qr.php?card_id='.$param;

$debug_og=ob_get_contents();
ob_end_clean();

// generating
QRcode::png($text_qr);

//QRcode::png($text_qr, $tempDir.$param, QR_ECLEVEL_L, 3);
}
?>
