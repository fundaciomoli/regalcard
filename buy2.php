<?php
/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

// save the POST variables
$card_id = $_POST ['card_id'];
$date_purchase = $_POST ['date_purchase'];
$total = $_POST ['total'];
$shop = $_POST ['shop'];
$ticket = $_POST ['ticket'];
$cashier = $_POST ['cashier'];
$employer = $_POST ['employer'];
$balance = $_POST ['balance'];
$balance_initial = $_POST ['balance_initial'];
$autent=$_POST['autent'];

//include the header
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

//safe no enten
if (is_null($card_id)){
  include 'redict.php';
}else{
// balance pending after buy
$balance_pending = $balance_initial - $balance;

// change the quote
$format_total = str_replace ( ',', '.', ( string ) $total );

// check if null or correct the values
$cont = 'true';

// value null of date_purchase
if (is_null ( $date_purchase )) {
	$cont = 'false';
}

// value null of total
if (is_null ( $total )) {
	$cont = 'false';
}

// value null of shop
if (is_null ( $shop )) {
	$cont = 'false';
}

// value null of ticket
if (is_null ( $ticket )) {
	$cont = 'false';
}
// value null of cashier
if (is_null ( $cashier )) {
	$cont = 'false';
}
// value null of employer
if (is_null ( $employer )) {
	$cont = 'false';
}

// value not numeric total
if (! is_numeric ( $format_total )) {
	$cont = 'false';
}

// value < 0
if ($format_total < 0) {
	$cont = 'false';
}

// if the saldo is zero
if ($balance > $balance_initial) {
	$cont = 'false';
}
//check if not
if ($autent != $pass) {
$cont='false';
}

// comprobations
if ($cont == 'false') {
	echo '<script>';

	echo 'alert("Introdueix correctament les dades o operacio no permesa");';

	echo 'history.go(-1);';
	echo '</script>';
}

// New balance_pending before buy
$balance_pending_before = $balance_pending - $format_total;

?>

<body>
    <!-- principal column -->
	<form method="post" action="buy3.php" onsubmit="myButton.disabled = true; return true;">
		<div
			class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
			<div class="row">
				<h3>SALDO INICIAL: <?php echo $balance_initial;?></h3>
				<h3>GASTAT: <?php echo $balance;?></h3>
				<h3>PENDENT: <?php echo $balance_pending;?></h3>
				<h3>COMPRA: <?php echo $format_total;?></h3>
				<h3>NOU SALDO: <?php echo $balance_pending_before;?></h3>
				<br /> <br /> <label for="date_purchase"><?php echo $label_date_purchase;?></label>
				<h2><?php echo $date_purchase;?></h2>
				<label for="total"><?php echo $label_total;?></label>
				<h2><?php echo $total;?></h2>
				<label for="shop"><?php echo $label_shop;?></label>
				<h2><?php echo $shop;?></h2>
				<label for="ticket"><?php echo $label_ticket;?></label>
				<h2><?php echo $ticket;?></h2>
				<label for="cashier"><?php echo $label_cashier;?></label>
				<h2><?php echo $cashier;?></h2>
				<label for="employer"><?php echo $label_employer;?></label>
				<h2><?php echo $employer;?></h2>

				<button type="submit" name="myButton" class="btn btn-primary btn-lg btn-block"> <?php echo $label_save;?></button>
				<input type="hidden" name="card_id" id="card_id"
					value="<?php echo $card_id;?>"> <input type="hidden"
					name="date_purchase" id="date_purchase"
					value="<?php echo $date_purchase; ?>"> <input type="hidden"
					name="total" id="total" value="<?php echo $format_total;?>"> <input
					type="hidden" name="shop" id="total" value="<?php echo $shop; ?>">
				<input type="hidden" name="ticket" id="total"
					value="<?php echo $ticket; ?>"> <input type="hidden" name="cashier"
					id="total" value="<?php echo $cashier; ?>"> <input type="hidden"
					name="employer" id="employer" value="<?php echo $employer; ?>"> <input
					type="hidden" name="balance" id="balance"
					value="<?php echo $balance;?>"> <input type="hidden"
					name="balance_initial" id="balance_initial"
					value="<?php echo $balance_initial?>">
					<br />
					<br />
			</div>
		</div>
	</form>
	<?php } ?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
