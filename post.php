<?php

if ($_POST && isset($_POST)) {
		if(!isLogin()){
					if(isset($_POST['login'])){
						$login = new login($_POST['gebruikersnaam'], $_POST['wachtwoord']);
						if($login->successfullLogin() == true){
							echo "<div class='alert alert-success'>Login geslaagd, ververs de pagina</div>";
							//header("factures");
						}else{
							echo "<div class='alert alert-danger'>Foutief wachtwoord of gebruikersnaam</div>";
						}

					}elseif(isset($_POST['registreer'])){
						$registreer = new registreer($_POST);
						if ($registreer->checkDuplicates() == true) {
							echo "<a href='registreer'><div class='alert alert-danger'>Gebruikersnaam bestaat al, kies een andere gebruikersnaam</div></a>";
						}else{
							if($registreer->addNewKlant() == 'geregistreerd'){
								echo "<div class='alert alert-success'>Registratie geslaagd, log nu in!</div>";
							}
						}

					}elseif($_POST['params']){
						echo "<div class='alert alert-danger'>Please login!</div>";
						unset($_POST['params']);
					}
					
		}elseif(isLogin()) {
			//bestellingen afronden.
			if(isset($_POST['bestel'])){
				//$artikel = new artikel();
				echo "<pre>"; print_r($_POST); echo"</pre>";
				// foreach ($variable as $key => $value) {
				// 	$artikel->prepareArtikel();
				// 	/////$_POST['artikelcode'], $_POST['aantal'], 
				// }
				// $artikel->prepareOrderInfo($_POST['filiaal']);

				// print_r($artikel->completeOrder());
				//echo $_POST['filiaal'];

			}


			//alle afzonderlijke post die via de GET worden verzonden worden hieronder opgevangen.
			if(isset($_POST['params'][0])){
				if ($_POST['params'][0] == 'add2cart'){
					$params = $_POST['params'];
					unset($_POST['params']);
					if($params){
						if (isset($_SESSION['artikelen']) && !empty($_SESSION['artikelen'])) { 
						        if ($_SESSION['artikelen'][$params[1]]){
						        	$_SESSION['artikelen'][$params[1]]['aantal']++;
						        }else{
						        	 $_SESSION['artikelen'][$params[1]] = ['aantal' =>1];
						        }
						}else{
							$_SESSION['artikelen'][$params[1]] = ['aantal' =>1];
						}					        

						echo '<script> location.replace("http://localhost/flowerpower/producten"); </script>';
					}
				}elseif ($_POST['params'][0] == 'deleteFromCart') {
					unset($_SESSION['artikelen'][$_POST['params'][1]]);
					echo '<script> location.replace("http://localhost/flowerpower/winkelwagen"); </script>';
				}
				// elseif($_POST['params'][0] == 'test'){
				// 	echo $_POST['aantal'];
				// }

				
			}

			// if ($_SESSION['user']['roll'] == 'klant') {

			// 	// if () {
					
			// 	// }

			// }elseif ($_SESSION['user']['roll'] == 'werknemer') {
			// //Deze functionaliteit word gerealiseerd door een andere medewerker van dit project.
			// }else{

			//}

		}else{

		}
	}