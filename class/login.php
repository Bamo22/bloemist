<?php
/**
*  @author K.L. Storms
*	Deze klasse zorgt er voor dat een gebruiker kan inloggen op deze site.
*/
class login {
	
	private $gebruikersnaam;
	private $wachtwoord;


	function __construct($gebruikersnaam, $wachtwoord)	{
		$this->gebruikersnaam = $gebruikersnaam;
		$this->wachtwoord = $wachtwoord;

		$credentials = $this->getKlantDetails();
		if(md5($this->wachtwoord) == $credentials['wachtwoord']){
			$this->setSessionId($credentials['klantcode']);
		}
		
	}

	private function getKlantDetails(){
		$db = new database();
		$credentials = $db->select("klantcode, gebruikersnaam, wachtwoord", "klant", 1, ["this"=>"gebruikersnaam", "that"=>$this->gebruikersnaam]);
		return $credentials[0];
	}

	private function setSessionId($id){
		$_SESSION['userId'] = $id;
	}

	public function successfullLogin(){
		if(isset($_SESSION['userId'])){
			return true;
		}else{
			return false;
		}
	}

}