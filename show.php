<?php

/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

// RegalCard identification
$card_id = $_GET ['card_id'];

//include variables
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

if ($card_id==null){
		include 'redict.php';
}else{

	// include code qr
	require_once $_SERVER['DOCUMENT_ROOT'].'/phpqrcode/qrlib.php';
	// send email to activate
	require_once $_SERVER['DOCUMENT_ROOT'].'/class/Mail.php';

?>
<body>

	<!-- principal column -->

		<div style="text-align:center" class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
		<div class="row">
			<h2><?php echo $label_card_activate;?></h2>
			<div class="row">

			<br />
			<?php
			//create the code qr to the html
			$qr_gen='qr_gen.php?id='.$card_id;
			echo '<img src="'.$qr_gen.'"/>';
			echo '<h2>'.$card_id.'</h2>';
			?>
			</div>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }?>
