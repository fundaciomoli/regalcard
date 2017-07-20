<?php

/**
 * RegalCard
 * @author angel zambrana
 * @owner Fundacio moli de puigvert
 * @date october 2015
 */

// RegalCard identification
$card_id = $_POST ['card_id'];
$balance_init = $_POST ['balance_init'];
$email = trim ( strtolower ( $_POST ['email'] ) );
$date_begin = $_POST ['date_begin'];
$date_end = $_POST ['date_end'];
$email_shop = trim ( $_POST ['email_shop'] );
$balance_init_no_tax = $balance_init / 1.21;


//include the header
require_once $_SERVER['DOCUMENT_ROOT'].'/header.php';

//if card_id is null
if (is_null($card_id)){
	include 'redict.php';
}else{

	// include code qr
	require_once $_SERVER['DOCUMENT_ROOT'].'/phpqrcode/qrlib.php';
	// send email to activate
	require_once $_SERVER['DOCUMENT_ROOT'].'/class/Mail.php';


// check the email to gift
$cont = 'true';

// check if email shop
if (is_null ( $email_shop )) {
	$cont = 'false';
}

// comprobations
if ($cont == 'false') {
	echo '<script>';
	echo 'alert("Introdueix correctament el email");';
	echo 'history.go(-1);';
	echo '</script>';
}



// search the autonumeric list to invoice
$invoice = updateInvoiceNumber();


// Clean the buffer
ob_start ();
?>

<script type="text/javascript">

  function imprSelec(nombre)

  {
  var ficha = document.getElementById(nombre);
  var ventimp = window.open('', '_blank');
  ventimp.document.write( ficha.innerHTML );
  ventimp.document.close();
  ventimp.print( );
  ventimp.close();

  }

</script>

	<!-- principal column -->

		<?php
		// save the content
		$html_head = ob_get_clean ();
		// show the head of html
		echo $html_head;
		ob_start ();
		?>

		<div style="text-align: center"
		class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
		<div class="row">

		<?php

		if (checkIfActive ( $card_id ) == 0) {
			// update the dades in mysql
			$activate = updateCardActive ( $card_id, $balance_init, $date_begin, $date_end, $email);
			?>
			<h2><?php echo $label_card_activate;?></h2>
			<div id="select">
			Factura simplificada número: RC-<?php echo $invoice;?> <br />
			Data: <?php echo $date_begin;?><br /> <br /> DADES FISCALS<br />
				Fundacio Privada El Moli de Puigvert <br /> Carrer Gorg del Moli de
				Puigvert, 1 <br /> 08389 Palafolls <br /> NIF: ESG62873971 <br /> <br />
				DADES COMPRA TARGETA <br /> <br />
			LLOC DE COMPRA: <?php echo $email_shop;?><br />
			REGALCARD: <?php echo $card_id;?><br /> <br />
			QUANTITAT INICIAL: <?php echo number_format($balance_init/1.21,2);?><br />
			IVA 21%: <?php echo number_format($balance_init-($balance_init/1.21),2);?><br />
				<br />

				<h2>TOTAL: <?php echo $balance_init;?></h2>
				<br /> <br />
			<?php
			// create the code qr to the html
			$qr_gen = $url_link . '/qr_gen.php?id=' . $card_id;
			echo '<img src="' . $qr_gen . '"/>';
			?>
			<br />
			</div>
			<br /> <a
				href="<?php echo $url_link;?>/show.php?card_id=<?php echo $card_id;?>">
				CODI QR</a> <br />
				<br /> <a
				href="<?php echo $url_link;?>/balance.php?card_id=<?php echo $card_id;?>">
				SALDO</a> <br />


			<?php
			$html_body = ob_get_clean ();
			// show the invoice
			echo $html_body;
			// create the code qr to the html
			// $qr_gen='qr_gen.php?id='.$card_id;
			// echo '<img src="'.$qr_gen.'"/>';
			ob_start ();
			?>

			<br /> <br /> <a href="javascript:imprSelec('select')">Imprimeix el
				tiquet</a>
		</div>
			<?php }else{?>
			<h2><?php echo $label_card_no_activate;?></h2>
			<?php }?>
		</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
// save the body about html
$html_footer = ob_get_clean ();
// show the invoice
echo $html_footer;
// email
$email_principal = 'dolors@fundaciomoli.org';

// send email
$headers = array ();
$headers [] = 'MIME-Version: 1.0';
$headers [] = 'Content-type: text/html; charset= UTF-8"';
$headers [] = 'Content-Transfer-Encoding: 7bit';
switch ($email_shop){
	case 'DUTTI':
		$email_addres = 'massimodutti@fundaciomoli.org';
		$name = 'Franquiciat Massimo Dutti';
		break;
	case 'BERSHKA':
		$email_addres = 'bershka@fundaciomoli.org';
		$name = 'Franquiciat Bershka';
		break;
	case 'YERSE':
		$email_addres = 'yerse@fundaciomoli.org';
		$name = 'Franquiciat YERSE';
		break;
	case 'OYSHO':
		$email_addres = 'oysho@fundaciomoli.org';
		$name = 'Franquiciat OYSHO';
		break;
	case 'FDS':
		$email_addres = 'foradeserie@fundaciomoli.org';
		$name = 'Fora De Serie';
		break;
	default:
		$email_addres = 'angel@fundaciomoli.org';
		$name = 'Fundacio Moli';
		break;
}

$headers [] = 'From: '.$name.' <' . $email_addres . '>';

// send email to shop
mail ( $email_addres, $label_card_activate . ': ' . $card_id, $html_body, join ( "\r\n", $headers ) );

// send email to administration
mail ( $email_principal, $label_card_activate . ': ' . $card_id, $html_body, join ( "\r\n", $headers ) );

if (strlen ( $email ) > 0) {
	// send email to buy card
	mail ( $email, $label_card_activate . ': ' . $card_id, $html_body, join ( "\r\n", $headers ) );
}

}?>
