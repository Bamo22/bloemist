<?php
/**
*  @author K.L. Storms
*	Deze klasse zorgt er voor dat een gebruiker kan inloggen op deze site.
*/
class login {
	
	private $gebruikersnaam;
	private $wachtwoord;
	private $db;


	function __construct($gebruikersnaam, $wachtwoord)	{
		$this->gebruikersnaam = $gebruikersnaam;
		$this->wachtwoord = $wachtwoord;

		$this->db = new database();

		$credentials = $this->getKlantDetails();
		//verifeerd of de wachtwoorden overeen komen.
		if(md5($this->wachtwoord) == $credentials['wachtwoord']){
			$this->setSessionId($credentials['klantcode']);
		}
		
	}

	private function getKlantDetails(){
		$db = new database();
		$credentials = $this->db->select("klantcode, gebruikersnaam, wachtwoord", "klant", 1, ["this"=>"gebruikersnaam", "that"=>$this->gebruikersnaam]);
		return $credentials[0];
	}
	//zet de gebruikerssessie, zo kan het programma de gebruiker herkennen en zien of hij is ingelogd.
	private function setSessionId($id){
		$_SESSION['userId'] = $id;
	}
	//gaaft aan of de gebruiker met succes is ingelogd.
	public function successfullLogin(){
		if(isset($_SESSION['userId'])){
			return true;
		}else{
			return false;
		}
	}

}