<?php
/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

// Regalcard identification
$card_id = $_GET ['card_id'];

//include the header
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

// null card_id exit the page
if (is_null($card_id)){
  include 'redict.php';
}else{
// save the date now
$d = getdate ();

// return date complete
$date_now_complete = returndaycomplet ( $d );

// see the balance now
$balance = calculateBuyRegalCard ( $card_id );

// see the balance init
$balance_initial = seeBalanceInit ( $card_id );

// se balance now
$balance_actually = number_format ( $balance_initial - $balance, 2 );


?>

<body>

    <!-- principal column -->
	<form method="post" action="buy2.php">

		<div
			class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
			<div class="row">
				<h3>SALDO INICIAL: <?php echo $balance_initial;?></h3>
				<h3>GASTAT: <?php echo $balance;?></h3>
				<h3>PENDENT: <?php echo $balance_actually;?></h3>
				<br />

				<div class="form-group">
					<label for="autent"><?php echo $label_autent;?></label>
					<input type="password" class="form-control input-lg" name="autent"
						id="autent" value="">
					<label for="date_purchase"><?php echo $label_date_purchase;?></label>
					<input type="text" class="form-control input-lg"
						name="date_purchase" id="date_purchase"
						value="<?php echo $date_now_complete;?>" readonly> <label
						for="total"><?php echo $label_total;?></label> <input type="text"
						class="form-control input-lg" name="total" id="total" value=""> <br />
					<label for="shop"><?php echo $label_shop;?></label> <select
						name="shop" id="shop" style="font-size: 200%">
						<option value=""></option>
						<option value="DUTTI">DUTTI</option>
						<option value="BERSHKA">BERSHKA</option>
						<option value="OYSHO">OYSHO</option>
						<option value="FDS">FDS</option>
						<option value="YERSE">YERSE</option>
            </select> <br /> <br /> <label for="ticket"><?php echo $label_ticket;?></label>
					<input type="text" class="form-control input-lg" name="ticket"
						id="ticket" value=""> <br /> <label for="cashier"><?php echo $label_cashier;?></label>
					<select name="cashier" id="cashier" style="font-size: 200%">
						<option value=""></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select> <br /> <br /> <label for="employer"><?php echo $label_employer;?></label>
					<input type="text" class="form-control input-lg" name="employer"
						id="employer" value="">
				</div>
      		<?php if ($balance_actually>0){?>
    		<button type="submit" class="btn btn-primary btn-lg btn-block"> <?php echo $label_save;?></button>
    		<?php }else {?>
    		<h1><?php echo $label_card_no_valid;?></h1>
    		<?php }?>

    		<input type="hidden" name="card_id" id="card_id"
					value="<?php echo $card_id;?>"> <input type="hidden" name="balance"
					id="balance" value="<?php echo $balance;?>"> <input type="hidden"
					name="balance_initial" id="balance_initial"
					value="<?php echo $balance_initial;?>">
		<br />
		<br />
			</div>

		</div>
	</form>
<?php }
?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
