<?php

/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */
 //include variables
 require_once $_SERVER['DOCUMENT_ROOT'].'/inc/variables.inc.php';
 
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
	<!-- Principal alert -->

	<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
	<div class="alert alert-info" role="alert" align="center">
		<h1><?php echo $label_nameapp;?></h1>
		<h3>
		<a href="<?php echo $url_link;?>/condictions.php">
		<?php echo $label_condictions;?></a>
		</h3>
	</div>
</div>
	<!-- principal column -->
	<form method="post" action="index2.php">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
				<div class="form-group">
					<label for="card_id"><?php echo $label_card_id;?></label> <input
						type="text" class="form-control input-lg" id="card_id" value=""
						name="card_id">
				</div>
				<button type="submit" class="btn btn-primary btn-lg btn-block"> <?php echo $label_check;?></button>
			</div>
		</div>
	</form>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
