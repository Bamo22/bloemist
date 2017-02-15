<?php
/**
* 
*/
class registreer{

	private $achternaam;
	private $voorletters;
	private $tussenvoegsel;
	private $roepnaam;
	private $telefoonnummer;
	private $geboortedatum;
	private $adres;
	private $postcode;
	private $woonplaats;
	private $gebruikersnaam;
	private $wachtwoord;

	function __construct($postData) {
		$this->achternaam = $postData['achternaam'];
		$this->voorletters = $postData['voorletters'];
		$this->tussenvoegsels = $postData['tussenvoegsels'];
		$this->roepnaam = $postData['roepnaam'];
		$this->geboortedatum = $postData['geboortedatum'];
		$this->adres = $postData['adres'];
		$this->postcode = $postData['postcode'];
		$this->woonplaats = $postData['woonplaats'];
		$this->gebruikersnaam = $postData['gebruikersnaam'];
		$this->wachtwoord = $postData['wachtwoord'];

	}
//Deze functie checkt voor duplicaten in de database. Tot nu toe controlleerd hij alleen de gebruikersnaam
	public function checkDuplicates(){
		$db = new database();
		$gebruiker = $db->select("*", "klant", 1, ['this'=>"gebruikersnaam", "that"=>$this->gebruikersnaam]);
		//var_dump($gebruiker);
		if(!empty($gebruiker[0])){
			return true;
		}

	}

	public function addNewKlant(){

		if(empty($this->tussenvoegsels)){
			$this->tussenvoegsel = NULL;}

		$values = "'".$this->achternaam."', '".$this->voorletters."', '".$this->tussenvoegsels."', '".$this->roepnaam."', '".$this->geboortedatum."', '".$this->adres."', '".$this->postcode."', '".$this->woonplaats."', '".$this->gebruikersnaam."', '".md5($this->wachtwoord)."'";
		$db = new database();
		$db->insert("klant","achternaam, voorletters, tussenvoegsels, roepnaam, geboortedatum, adres, postcode, woonplaats, gebruikersnaam, wachtwoord", $values
			);
		echo "geregistreerd";
	}

}