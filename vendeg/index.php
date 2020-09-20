<style>
	.button{
		border: none;
		background-color: black;
		text-align: center;
		cursor: pointer;
		color: white;
		padding: 25px 40px;
		}
	.container{
		height: 100%;
		width: 100%
		position: relative;
	}
	.center{
		margin: 0;
		position: absolute;
		top:50%;
		left:50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
	}
	body{	
		background-image: url('hatterszurk.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
	}
	p{color:white;}
	.buttoner{text-indent: 30%;}
	textarea {
   resize: none;
   }
   .no-padding {
    padding: 0;
}

.my-styles {
    border-top: 1px solid #dedbdb;
    padding: 15px;
}

	
</style>
<?php
	session_start();
	$szam1 = rand(1,10);
	$szam2 = rand(1,10);
	$vegsoszam = $szam1 + $szam2;
	$apu =false;
	$_SESSION['veletlenszam'] = $vegsoszam;
if($_SESSION['elrontotta'] == 'igen' && $_SESSION['demarjo'] == 'nem')
{
		$_SESSION['veletlenszam'] = $vegsoszam;
		echo $_SESSION['elronttota'];
		$_SESSION['elronttota'] = 'nem';
		echo"
		<form action='tarolas.php' method='post' target='megjeleno'>
			<div class='container'>
				<div class='center'>
				
					<p indent: 50px>". $szam1 . "+" . $szam2 ."</p><br>
					<input name='valasz' id='valasz' type='number' indent: 50px><br>
					<p>Név :<input type='text' name='nev' value='". $_SESSION['elronttotnev'] ."'></p>
					<textarea cols=60 rows=7 name='velemenyek'resize: none>";echo $_SESSION['elrontottavelemeny']; echo"</textarea><br><br>
						<div class='buttoner'>
							<input type='submit' name='beolvasas' value='Beolvasás' class='button'";
							
								if($apu == true) 
									echo"disabled indent: 50px>";
								else
									echo"indent: 50px>";
							echo"
						</div>
				</div>
			</div>
			
			
		</form>
		
		<iframe name='megjeleno'></iframe>
		";
		$_SESSION['voltemar'] = 'nem';
}
else
{
	if($_SESSION['voltemar'] != 'igen')
	{	
		echo"
		<form action='tarolas.php' method='post' target='megjeleno'>
			<div class='container'>
				<div class='center'>
				
					<p indent: 50px>". $szam1 . "+" . $szam2  ."</p><br>
					<input name='valasz' id='valasz' type='number' indent: 50px><br>
					
					<p>Név :<input type='text' name='nev'></p>
					<textarea cols=60 rows=7 name='velemenyek' resize: none></textarea><br><br>
						<div class='buttoner'>
							<input type='submit' name='beolvasas' value='Beolvasás' class='button'";
							
								if($apu == true) 
									echo"disabled indent: 50px>";
								else
									echo"indent: 50px>";
							echo"
						</div>
				</div>
			</div>
			
			
		</form>
		
		<iframe name='megjeleno'></iframe>
		";
		
	}
	else
	{
		$fp = Fopen("velemenyek.txt", "r");
		$sor= Fread($fp, filesize("velemenyek.txt"));
		Fclose($fp);
		$tomb = explode(';',$sor);
		$aktualis = 0;
		echo "<h1 color: white>Korábbi vélemények:</h1><br>";
		while($aktualis < count($tomb))
		{
			echo"
				<div class='row no-padding'>
					<div class='col md-4 my-styles'>
					<p>". $tomb[$aktualis] ."</p>
					</div>
				</div>
			";
			
			
			
			//echo $tomb[$aktualis];
			echo "<br>";
			$aktualis = $aktualis +1 ;
		}
		
		
		
		
		
		
		/*echo"<p >anyud</p>";
		echo date("Y-m-d");
		echo"<br>";
		echo $_SESSION['probanev'];
		echo"<textarea cols=60 rows=1>"; echo $_SESSION['probanev']; echo"</textarea>";*/
	}
}
?>

