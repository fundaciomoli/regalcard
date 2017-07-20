<?php

/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

//include variables
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/variables.inc.php';

//include functions
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/functions.inc.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $label_nameapp;?></title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
<div class="alert alert-info" role="alert" align="center">
		<h1>
		<a href="javascript:window.history.back();">
		<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		</a> |----|
		<a href="<?php echo $url_link?>">
		<span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</h1>
		<h2>
		<?php echo $label_nameapp;?>
		</h2>
		<h3>
		<a href="<?php echo $url_link;?>/condictions.php">
		<?php echo $label_condictions;?></a>
		</h3>
		<?php
		if (isset($card_id)){
		echo '<h3>'.$label_card_id.': '.$card_id.'</h3>';
		}
		?>

	</div>
</div>
