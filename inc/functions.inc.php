<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 * file: --> index2.php
 * file: --> active3.php
 * file: --> qr.php
 */

function checkIfActive($card_id){

	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//search if exists the RegalCard
	$query="SELECT card_active FROM rc_card_list WHERE card_id='".$card_id."';";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	// select correct value
	$line = mysqli_fetch_array($result);

	//save the value of Regalcard
	$regalcard = $line['card_active'];

	//return the value 0 --> no active 1 --> active
	return $regalcard;

	//close connection
	mysqli_close($link);
}


/**
 * function check if Regalcard exist
 * @param char $id --> the identifcacion card with code bar
 * @return the $regalcard --> return the code bar about RegalCard
 * file -> index2.php
 * file -> qr.php
 */
function checkExistRegalCard($id){

	//include the dades of mysql database
 include 'db.inc.php';

	//save the parameter.
	$regalcard_id=$id;

	//boolean for null
	$cont="true";

	// check if is null
	if ($id==null){$cont="false";}

	//show a alert if the code regalcard is null
	if ($cont=="false"){
		    echo'<script>';
			echo 'alert("No existeix aquest codi");';
			echo 'history.go(-1);';
			echo '</script>';

	}else{
			//connect to database
		$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

		//search if exists the RegalCard
		$query="SELECT card_list_id FROM rc_card_list WHERE card_id='".$regalcard_id."';";

		//execute query
		$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

		// select correct value
		$line = mysqli_fetch_array($result);

		//save the value of RegalCard
		$regalcard = $line['card_list_id'];

		//no exists in the database
		if($regalcard==null){

		}

		//clean the $result string
		mysqli_free_result($result);

		//close connection
		mysqli_close($link);
	}
	//return the value
	return $regalcard;
}


/**
 * update the dates about price, date, and email
 * @param String $card_id --> number of card_id
 * @param decimal $balance_init --> value initial
 * @param date $date_begin --> date begin card_id
 * @param date $date_end --> date end card_id
 * @param string $email --> email
 * @return boolean if query is correctly
 * file -> active3.php
 */
function updateCardActive($card_id,$balance_init,$date_begin,$date_end,$email){

	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//delete email don't save
	$email='';
	$email_gift='';

	//search if exists the Regalcard
	$query="UPDATE rc_card_list SET balance_init=".$balance_init." , date_begin='".$date_begin."' , date_end='".$date_end."', email='".$email."', email_gift='".$email_gift."', card_active=1, card_finish=0 WHERE card_active=0 AND card_id='".$card_id."';";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	//close connection
	mysqli_close($link);

	//return false o true
	return $result;

}

/**
 * calculate the sells about one card_id
 * @param string $card_id --> number of car_id
 * @return decimal
 * file -> balance.php
 * file -> buy.php
 */
function calculateBuyRegalCard($card_id){

	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//search if exists the RegalCard
	$query="SELECT SUM(total)as balance FROM rc_purchase_list WHERE card_id='".$card_id."';";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	// select correct value
	$line = mysqli_fetch_array($result);

	//save the value of RegalCard
	return $line['balance'];

	//close connection
	mysqli_close($link);

}

/**
 * Format day in year - month - day hour:minuts:seconds
 * @param date $d
 * file -> balance.php
 * file -> buy.php
 */
function returndaycomplet($d){
	//Make complete date
	return $d['year'].'-'.$d['mon'].'-'.$d['mday'].' '.$d['hours'].':'.$d['minutes'].':'.$d['seconds'];
}

/**
 * See the balance init
 * @param string $card_id
 * @return decimal the balance init
 * file -> balance.php
 * file -> buy.php
 */
function seeBalanceInit($card_id){

	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//search if exists the RegalCard
	$query="SELECT balance_init FROM rc_card_list WHERE card_id='".$card_id."';";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	// select correct value
	$line = mysqli_fetch_array($result);

	//save the value of RegalCard
	return $line['balance_init'];

	//close connection
	mysqli_close($link);

}

/**
 * show in a table all buys about one card
 * @param string $card_id --> code about card
 * @return table of list buys
 * file -> balance.php
 */
function showAllPucharseListOneCard($card_id) {

	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//search if exists the RegalCard
	$query="SELECT purchase_list_id, date_purchase, total, shop, ticket, cashier, employer FROM rc_purchase_list WHERE card_id='".$card_id."';";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));


	while ($line = mysqli_fetch_array($result)){
		echo '<tr>';
		echo "<th>".$line['purchase_list_id']."</th><th>".$line['date_purchase']."</th><th>".$line['total']."</th><th>".$line['shop']."</th><th>".$line['ticket']."</th><th>".$line['cashier']."</th><th>".$line['employer']."</th>";
		echo '</tr>';
	}
	//save the value of RegalCard
	$balance_card = $line['balance_init'];

	//return the value about balance card
	return $balance_card;

	//close connection
	mysqli_close($link);

}


/**
 * insert new value in purchase_list
 * @param string $card_id
 * @param date $date_purchase
 * @param double $total
 * @param string $shop
 * @param string $ticket
 * @param string $cashier
 * @param string $employer
 * file -> buy3.php
 */
function insertBuy($card_id,$date_purchase,$total,$shop,$ticket,$cashier,$employer){

	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//search if exists the RegalCard
	$query="INSERT INTO rc_purchase_list (card_id, date_purchase,total,shop,ticket,cashier,employer) VALUES
			('".$card_id."','".$date_purchase."',".$total.",'".$shop."','".$ticket."','".$cashier."','".$employer."')";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	//close connection
	mysqli_close($link);
}

/**
 * Close card when no have balance to spend
 * @param string $card_id --> Number card unique
 * file -> buy3.php
 */
function closeCard($card_id){
	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//search if exists the RegalCard
	$query="UPDATE rc_card_list SET card_finish=1 WHERE card_active=1 AND card_id='".$card_id."';";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	//close connection
	mysqli_close($link);

}

/**
 * Search the identification card
 * @param string $card_id
 * @return int card_list_idunknown
 * file -> active3.php
 */
function updateInvoiceNumber(){
	//include the dades of mysql database
 include 'db.inc.php';

	//connect to database
	$link= mysqli_connect($host, $user, $password, $database) or die ($noconnect.' '.mysqli_connect_error($link));

	//search the number of list about the card list
	$query="SELECT invoice_id FROM rc_invoice_number;";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	// select correct value
	$line = mysqli_fetch_array($result);

	//save the value of RegalCard Indentification
	$invoice_id = $line['invoice_id'];

	//add one number
	$invoice = $invoice_id + 1;

	//search if exists the Regalcard
	$query="UPDATE rc_invoice_number SET invoice_id=".$invoice." WHERE invoice_id=".$invoice_id.";";

	//execute query
	$result = mysqli_query($link, $query) or die ($errorsearch.' '.mysqli_error($link));

	//close connection
	mysqli_close($link);

	//return the value about the card_list_id
	return $invoice;


}

?>
