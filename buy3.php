<?php

/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

//save the POST variables
$card_id = $_POST['card_id'];
$date_purchase=$_POST['date_purchase'];
$total=$_POST['total'];
$shop=$_POST['shop'];
$ticket=$_POST['ticket'];
$cashier=$_POST['cashier'];
$employer =$_POST['employer'];
$balance = $_POST['balance'];
$balance_initial = $_POST['balance_initial'];

//include the header
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

//safe no enten
if (is_null($card_id)){
	include 'redict.php';
}else{

//balance pending after buy
$balance_pending=$balance_initial-$balance;
//balance pending before buy
$balance_pending_before=$balance_pending - $total;

//change the quote
$format_total=str_replace(',', '.', (string)$total);
//insert buy
insertBuy($card_id, $date_purchase, $format_total, $shop, $ticket, $cashier, $employer);
//Change card_finish to 1 to close the card.
if ($balance_pending_before<=0){

closeCard($card_id);
}
?>
  <body>

    <!-- principal column -->
    	 <div class="row">
    	<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
    		<h2>COMPRA AFEGIDA</h2>

    	   </div>
    </div>
		<?php }?>
	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
