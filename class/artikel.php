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
	public function addProduct2Cart($params){
			if($params){

				// for ($i = 0; $i < sizeof($_SESSION['artikelen']); $i++){
			 //        if ($_SESSION['artikelen'][$i]['artikelcode'] == $params[1]){
			 //        	 return $_SESSION['artikelen'][$i]['aantal']++;
			 //        }
			 //    }
				return $_SESSION['artikelen'][] = ['artikelcode'=>$params[1], 'aantal' =>1];	



				//var_dump($_SESSION['artikelen']);
				echo '<script> location.replace("http://localhost/flowerpower/producten"); </script>';
		}
		
	}

	public function getAllProducts(){

	}

	public function prepareArtikelen(){
		$artikelList = array_keys($_SESSION['artikelen']);

		foreach ($artikelList as $key => $value) {
			$data = $db->select("*", "artikel", 0, ['this'=>'artikelcode', 'that'=>$value]);
			$this->artikelen[$key] = $data[0];
			//array_push($artikelInfo[0], "aantal"); 
			$this->artikelen[$key]['aantal'] = $_SESSION['artikelen'][$value]['aantal'];
		}
		// foreach ($variable as $key => $value) {
		// 	$artikel = $this->db->select("*", "artikel", 1, ['this'=>'artikelcode', 'that'=>$artikelcode]);
		// 	$artikel[0]['totaal'] = $artikel[0]['prijs']*$aantal;
		// 	$this->artikelen[] = $artikel[0];
		// }
	}

	//Haalt de bestelinformatie op en voegt dit toe aan een aan het afrondende bestelling.
	public function prepareOrderInfo($afhalenBij){

		$gebruikerInfo = $this->db->select("*", "klant", 1, ['this'=>'klantcode', 'that'=>$this->userId]);
		$this->gebruikerInfo = $gebruikerInfo[0];

		$winkelInfo = $this->db->select("*", "winkel", 1, ['this'=>'winkelplaats', 'that'=>$afhalenBij]);
		$this->winkelInfo = $winkelInfo[0];

		
		
		$this->aantal = $aantal;

	}

	//This methode rond de bestelling af
	public function completeOrder(){
		// echo "<pre>";
		// 	print_r($this->artikel);
		// 	print_r($this->gebruikerInfo);
		// 	print_r($this->winkelInfo);
		// 	print_r($this->totaalbedragBestelling);
		// echo "</pre>";

		$this->db->insert("factuur", "factuurdatum, klantcode", "CURRENT_DATE(), ".$this->userId, "factuurnummer");
		$lastInsertedId = $this->db->selectLastId();

		foreach ($variable as $key => $value) {
			$this->db->insert("factuurregel", "factuurnummer, artikelcode, aantal, prijs", $lastInsertedId['LAST_INSERT_ID()'].", ".$this->artikel['artikelcode'].", ".$this->aantal.", ".$this->artikel['prijs'])
;
			$this->db->insert("bestelling", "artikelcode, winkelcode, aantal, klantcode, medewerkerscode, afgehaald", $this->artikel['artikelcode'].", ".$this->winkelInfo['winkelcode'].", ".$this->aantal.", ".$this->gebruikerInfo['klantcode'].", ".rand(1, 3).", 0");
		}
		

		unset($_SESSION['artikelen']);

		echo "<div class='alert alert-success'>Bestelling geplaatst!</div>
			<script>setTimeout(function () {
			   window.location.href= 'http://localhost/flowerpower';

			},5000);</script>";
	}
}