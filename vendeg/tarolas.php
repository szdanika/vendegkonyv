<?php
	session_start();
	if($_POST['valasz'] == $_SESSION['veletlenszam'])
	{
		$_SESSION['voltemar'] = 'igen';
	
	
	
	
		$fp = Fopen("velemenyek.txt", "r");
		$sor= Fread($fp, filesize("velemenyek.txt"));
		Fclose($fp);
		$tomb = explode(';',$sor);
		$fp = Fopen("velemenyek.txt", "w");
		$nezo = $hossza;
		$velemeny = $_POST['velemenyek'];
		$nev = $_POST['nev'];
		
		
		$velemeny = str_replace( "<" , "&lt;" , $velemeny ) ;
		$velemeny = str_replace( "'" , "\'" , $velemeny ) ;
		$velemeny = str_replace( ";" , ",", $velemeny);
		
		$nev = str_replace( "<" , "&lt;" , $nev ) ;
		$nev = str_replace( "'" , "\'" , $nev ) ;
		$nev = str_replace( ";" , ",", $nev);
	
		$sor = count($tomb) . "." . $nev . "-" . date("Y-m-d") . ":" . $velemeny . ";" . "\n" . $sor;
		Fwrite($fp, $sor);
	
	
	
	
	
		Fclose($fp);
		/*$to = 'ddaszanot@gmail.com';
		$subject = 'valaki véleményt mondot!';
		$message = $nev . ' pont véleményt mondot az oldalról!';
		$header='From: danikaszab@gmail.com' . "\r\n" . 'Reply-To: danikaszab@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $header);*/
	
	
	
	
	
	
	
	
	
	
	
	
		echo"hello";
		$_SESSION['voltemar'] = 'igen';
		$_SESSION['probanev'] = $_POST['nev'];
		$_SESSION['elronttota'] = 'nem';
		$_SESSION['demarjo'] = 'igen';
	}
	else
	{
		$_SESSION['elronttotnev'] = $_POST['nev'];
		$_SESSION['elrontottavelemeny'] = $_POST['velemenyek'];
		$_SESSION['elrontotta'] = 'igen';
		$_SESSION['demarjo'] = 'nem';
	}
	

?>
<script>


parent.location.href = parent.location.href
</script>