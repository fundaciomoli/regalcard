<?php

/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

//RegalCard identification
$card_id = $_POST['card_id'];
$balance_init = $_POST['balance_init'];
$email = trim(strtolower($_POST['email']));
$email_2= trim(strtolower($_POST['email_2']));
$date_begin = $_POST['date_begin'];
$date_end=$_POST['date_end'];
$autent=$_POST['autent'];

//include the header
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

//if card_id is null
if (is_null($card_id)){
	include 'redict.php';

}else{
//check if null the values
$cont='true';

//value null of email
if (is_null($email)){
	$cont='false';
}

//value null of email 2
if (is_null($email_2)){
	$cont='false';
}

// change the quote for dot
$balance_init = str_replace(',','.',$balance_init);

//value null of balance_init
if (is_null($balance_init)){
	$cont='false';
}

//value not numeric balance_init
if (!is_numeric($balance_init)){
	$cont='false';
}
//value more less 0
if($balance_init<=0){
	$cont='false';
}

//comprobations email = email_2
if ($email!=$email_2){
	$cont='false';
}

if ($autent!=$pass){
	$cont='false';
}

//comprobations
if ($cont=='false'){
	echo'<script>';
	echo 'alert("Introdueix correctament les dades");';
	echo 'history.go(-1);';
	echo '</script>';
}
?>

    <!-- principal column -->
    <form method="post" action="active3.php" onsubmit="myButton.disabled = true; return true;">
			<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
		<div class="row">
				<div class="form-group">
					<label for="balance_init"><?php echo $label_balance_init;?></label>
					<h3><?php echo $balance_init;?></h3>
					<label for="date_begin"><?php echo $label_date_begin;?></label>
					<h3><?php echo $date_begin;?></h3>
					<br />
				<label for="shop"><?php echo $label_shop;?></label>
				<br />
				 	<select
						name="email_shop" id="email_shop" style="font-size: 200%">
						<option value=""></option>
						<option value="DUTTI">DUTTI</option>
						<option value="BERSHKA">BERSHKA</option>
						<option value="OYSHO">OYSHO</option>
						<option value="FDS">FDS</option>
						<option value="YERSE">YERSE</option>
						<option value="">----</option>
						<option value="MOLI">MOLI</option>
					</select>
				<br /> <br />

					<label for="email"><?php echo $label_email;?></label>
					<h3><?php echo $email;?></h3>
				 	<br />
				</div>

					<button type="submit" name="myButton" class="btn btn-primary btn-lg btn-block"> <?php echo $label_save;?></button>
					<input type="hidden" name="balance_init" value="<?php echo $balance_init;?>">
					<input type="hidden" name="date_begin" value="<?php echo $date_begin;?>">
					<input type="hidden" name="date_end" value="<?php echo $date_end;?>">
					<input type="hidden" name="email" value="<?php echo $email;?>">
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
