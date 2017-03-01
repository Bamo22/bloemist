<?php
/**
* In deze klasse worden gegevens wijzigingen doorgevoerd. 
* Tevens worden ook alle gegevens eerst opgehaald om voor de gebruiker inzichtelijk te maken.
*/
class wijzigGegevens{

	private $db;
	
	function __construct() {

		$this->db = new database();
	}

	public function loadGegevens(){
		$klantInfo = $this->db->select('*', 'klant', 1, ['this'=>'klantcode', 'that'=>$_SESSION['userId']]);
		$klantInfo = $klantInfo[0];

		$formItems = file_get_contents("html_blueprints/gebruikersGegevens.phtml");
			
				echo $products = str_replace(["[[/achternaam\]]", "[[/voorletters\]]", "[[/tussenvoegsels\]]", "[[/roepnaam\]]", "[[/geboortedatum\]]", "[[/adres\]]", "[[/postcode\]]", "[[/woonplaats\]]", "[[/gebruikersnaam\]]"], 
					[$klantInfo['achternaam'], $klantInfo['voorletters'], $klantInfo['tussenvoegsels'], $klantInfo['roepnaam'], $klantInfo['geboortedatum'], $klantInfo['adres'], $klantInfo['postcode'], $klantInfo['woonplaats'], $klantInfo['gebruikersnaam']], $formItems);
		
	}

	public function updateGegevens($column, $post){
		$this->db->update("klant", $column, $post, ['this'=>'klantcode', 'that'=>$_SESSION['userId']]);
	}

	
}