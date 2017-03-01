<?php
/**
* @author K.L. Storms
*
* Met deze klas worden alle producten die een klant wil kopen opgevraagd en verwerkt. zodat bestellingen gedaan kunnen worden.
*/
class artikel{

	private $userId;
	private $db;

	// private $artikelcode;
	// private $artikel;
	// private $aantal;
	// private $totaalbedragBestelling;

	 private $gebruikerInfo;
	 private $winkelInfo;
	
	private $artikelen;

	function __construct(){
		$this->userId = $_SESSION['userId'];
		$this->db = new database();

	}
	//voegd een artikel toe aan de winkelwagen
	// public function addProduct2Cart($params){
	// 		if($params){

	// 			if (isset($_SESSION['artikelen']) && !empty($_SESSION['artikelen'])) { 
	// 					        if ($_SESSION['artikelen'][$params[1]]){
	// 					        	$_SESSION['artikelen'][$params[1]]['aantal']++;
	// 					        }else{
	// 					        	 $_SESSION['artikelen'][$params[1]] = ['aantal' =>1];
	// 					        }
	// 					}else{
	// 						$_SESSION['artikelen'][$params[1]] = ['aantal' =>1];
	// 					}					        

	// 					echo '<script> location.replace("http://localhost/flowerpower/producten"); </script>';
	// 	}
	// }

	// public function getAllProducts(){

	// }

	public function prepareArtikelen(){
		$artikelList = array_keys($_SESSION['artikelen']);

		foreach ($artikelList as $key => $value) {
			$data = $this->db->select("*", "artikel", 0, ['this'=>'artikelcode', 'that'=>$value]);
			$this->artikelen[$key] = $data[0];
			//array_push($artikelInfo[0], "aantal"); 
			$this->artikelen[$key]['aantal'] = $_SESSION['artikelen'][$value]['aantal'];
		}
	}

	//Haalt de bestelinformatie op en voegt dit toe aan een aan het afrondende bestelling.
	public function prepareOrderInfo($afhalenBij){

		$gebruikerInfo = $this->db->select("*", "klant", 1, ['this'=>'klantcode', 'that'=>$this->userId]);
		$this->gebruikerInfo = $gebruikerInfo[0];

		$winkelInfo = $this->db->select("*", "winkel", 1, ['this'=>'winkelplaats', 'that'=>$afhalenBij]);
		$this->winkelInfo = $winkelInfo[0];

	}

	//This methode rond de bestelling af
	public function completeOrder(){

		$this->db->insert("factuur", "factuurdatum, klantcode", "CURRENT_DATE(), ".$this->userId, "factuurnummer");
		$lastInsertedId = $this->db->selectLastId();

		foreach ($this->artikelen as $value) {

			$this->db->insert("factuurregel", "factuurnummer, artikelcode, aantal, prijs", 
				$lastInsertedId['LAST_INSERT_ID()'].", ".$value['artikelcode'].", ".$value['aantal'].", ".$value['prijs']);

			$this->db->insert("bestelling", "artikelcode, winkelcode, aantal, klantcode, medewerkerscode, afgehaald", 
				$value['artikelcode'].", ".$this->winkelInfo['winkelcode'].", ".$value['aantal'].", ".$this->userId.", ".rand(1, 3).", 0");
		}
	
		unset($_SESSION['artikelen']);

		echo "<div class='alert alert-success'>Bestelling geplaatst! Morgen kunt u de bestelling ophalen in ".$this->winkelInfo['winkelplaats']."!</div>
			<script>setTimeout(function () {
			   window.location.href= 'http://localhost/flowerpower';

			},5000);</script>";
	}
}