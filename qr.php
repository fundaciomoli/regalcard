<?php
/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

// RegalCard identification
// save when gone the index.php
$card_id = $_GET ['card_id'];

//include variables
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

if ($card_id==null){
		include 'redict.php';
}else{

// check if exist or no the RegalCard
$exist=checkExistRegalCard($card_id);

if ($exist==null){
include 'redict.php';
}else{

// check if activate or not
$activate = checkIfActive ( $card_id );

?>
<body>
	<!-- principal column -->

	<div class="row">
		<div
			class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
		<?php if ($activate==0){?>
			<h2>
				<a
					href="<?php echo $url_link;?>/active.php?card_id=<?php echo $card_id;?>"
					class="btn btn-primary btn-lg btn-block"><?php echo $label_active;?></a>
			</h2>
				<?php }?>
		<?php if ($activate==1){?>


			<h2>
				<a
					href="<?php echo $url_link;?>/buy.php?card_id=<?php echo $card_id;?>"
					class="btn btn-success btn-lg btn-block">
				<?php echo $label_buy;?>
			</a>
			</h2>
			<h2>
				<a
					href="<?php echo $url_link;?>/balance.php?card_id=<?php echo $card_id;?>"
					class="btn btn-info btn-lg btn-block"><?php echo $label_balance;?></a>
			</h2>
				<h2>
				<a
					href="<?php echo $url_link;?>/show.php?card_id=<?php echo $card_id;?>"
					class="btn btn-primary btn-lg btn-block"><?php echo $label_show;?></a>
			</h2>


			<input type="hidden" value="<?php echo $card_id;?>">
		</div>
		<?php }
}
}?>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
