<?php
/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

// RegalCard identification
$card_id = $_GET ['card_id'];

//include the header
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

if ($card_id==null){
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
	<form method="post" action="index2.php">

		<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
		<div class="row">
			<h3>SALDO INICIAL: <?php echo $balance_initial;?></h3>
			<h3>GASTAT: <?php echo $balance;?></h3>
			<h3>PENDENT: <?php echo $balance_actually;?></h3>

	<?php if ($balance_actually<=0){
				echo "<h2>TARGETA ESGOTADA</h2>";
			}
?>	<br />
			<table class="table">
					<thead>
						<tr>
							<th>LINIA</th>
							<th>DATA</th>
							<th>TOTAL</th>
							<th>BOTIGA</th>
							<th>TIQUET</th>
							<th>CAIXA</th>
							<th>EMPLEAT</th>

						</tr>

					</thead>
					<tbody>
						<?php showAllPucharseListOneCard($card_id)?>
					</tbody>
				</table>
				<br />

			<button type="submit" class="btn btn-primary btn-lg btn-block"> MENU</button>

				<input type="hidden" name="card_id" id="card_id"
					value="<?php echo $card_id;?>"> <input type="hidden" name="balance"
					id="balance" value="<?php echo $balance;?>"> <input type="hidden"
					name="balance_initial" id="balance_initial"
					value="<?php echo $balance_initial;?>">

			</div>

		</div>
	</form>
	<?php }?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
