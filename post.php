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

					}
		}elseif(isLogin()) {

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