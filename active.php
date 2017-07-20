<?php

/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */


//RegalCard identification
$card_id = $_GET['card_id'];

//include the header
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

//save the date now
$d = getdate();
//return date complete
$date_now_complete = returndaycomplet($d);

//if card_id is null
if (is_null($card_id)){
	include 'redict.php';
}else{
?>

    <!-- principal column -->
    <form method="post" action="active2.php">
			<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
				<div class="row">
				<div class="form-group">
				<label for="autent"><?php echo $label_autent;?></label>
					<input type="password" class="form-control input-lg" name="autent"
						id="autent" value="">
					<label for="balance_init"><?php echo $label_balance_init;?></label>
					<input type="text" class="form-control input-lg" id="balance_init"
						value="" name="balance_init">
					<label for="date_begin"><?php echo $label_date_begin;?></label>
					<input type="text" class="form-control input-lg" id="date_begin"
						value="<?php echo $date_now_complete;?>" name="date_begin" readonly>
					<label for="email"><?php echo $label_email;?></label> <input
						type="text" class="form-control input-lg" id="email"
						value="" name="email">
					<label for="email_2"><?php echo $label_email_2;?></label> <input
						type="text" class="form-control input-lg" id="email_2"
						value="" name="email_2">
		</div>
					<button type="submit" class="btn btn-primary btn-lg btn-block"> <?php echo $label_save;?></button>
					<input type="hidden" name="card_id" value="<?php echo $card_id;?>">


			</div>
		</div>
   </form>
   <?php } ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
