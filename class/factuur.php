<?php
/**
* Deze klasse is verantwoordelijk voor het ophalen van facturen en een factuur.
*/
class factuur {
	
	private $userId;
	private $param;
	private $db;

	function __construct(){

		$this->userId = $_SESSION['userId'];
		$this->param = explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
		$this->db = new database();
	}
	//Met deze methode worden alle fatcures opgehaald aan de hand van het gebruikers id.
	public function getAllFacturen(){
		
		//Select statment 
		$facturen = $this->db->select("*", "factuur", 1,["this"=>"klantcode", "that"=>$_SESSION['userId']]);

		if(!empty($facturen)){
			$aantalPrijs = $this->db->select("aantal, prijs", "factuurregel", 1, ["this"=>"factuurnummer", "that"=>$facturen[0]['factuurnummer']]);
			$totaalbedrag = $aantalPrijs[0]['aantal']*$aantalPrijs[0]['prijs'];
			$facturen[0]['totaalbedrag'] = $totaalbedrag;
			//print_r($aantalPrijs);
			$list = "<tr>
						<td>[[/factuurnummer\]]</td>
						<td>[[/factuurdatum\]]</td>
						<td>&euro;[[/totaalbedrag\]]</td>
						<td><a class='btn btn-default' href='factuur/[[/factuurnummer\]]'>Ga naar factuuur</a></td>
					</tr>";

			foreach ($facturen as $key => $value) {	
					return $infoFacturen[] = str_replace(["[[/factuurnummer\]]", "[[/factuurdatum\]]", "[[/totaalbedrag\]]"], [$value['factuurnummer'], $value['factuurdatum'], $value['totaalbedrag']], $list);
			}

		}
	}
	//Haalt informatie over een factuur op uit de database. Deze factuurinfo bestaat uit klantgegevens en informatie over de factuur.
	public function getFactuurInfo(){
		//$allInfo = $this->gatherAllFactuurInfo();
		$factuurFile = file_get_contents("html_blueprints/factuurInfo.phtml");
		$klantInfo = $this->db->select("*", "klant", 1, ['this'=>'klantcode', 'that'=>$this->userId]);
		$factuur = $this->db->select("*", "factuur", 1, ['this'=>'factuurnummer', 'that'=>$this->param[1]], ['this'=>'klantcode', 'that'=>$this->userId]);
		$klantNfactuur = $klantInfo[0]; 
		$klantNfactuur += $factuur[0];

			return $factuurElementNaam = str_replace(
				["[[/factuurnummer\]]", "[[/factuurdatum\]]", "[[/voorletters\]]", "[[/tussenvoegsels\]]", "[[/achternaam\]]","[[/adres\]]","[[/postcode\]]", "[[/woonplaats\]]"], 
				[$klantNfactuur['factuurnummer'], $klantNfactuur['factuurdatum'], $klantNfactuur['voorletters'], $klantNfactuur['tussenvoegsels'], $klantNfactuur['achternaam'], $klantNfactuur['adres'], $klantNfactuur['postcode'], $klantNfactuur['woonplaats']], $factuurFile);
	}
	//Haalt de factuurregel op van een factuur en vervolgens filterd hij data in een html tabel.
	public function GetFactuurregel(){
		
		$factuurregel = $this->db->select("*", "factuurregel", ['this'=>'factuurnummer', 'that'=>$this->param[1]]);
		$artikel = $this->db->select("artikel", "artikel", ['this'=>'artikelcode', 'that'=>$factuurregel[0]['artikelcode']]);

		//HEREDEBUGIFNOTWORK

		$factuurregelNartikel = $factuurregel[0];
		$factuurregelNartikel += $artikel[0];
		$factuurregelNartikel += ['totaalPrijs'=>$factuurregelNartikel['prijs']*$factuurregelNartikel['aantal']];

		$factuurFile = file_get_contents("html_blueprints/factuurregel.phtml");
		 	
		 	$artikelLijst = $factuurElementNaam = str_replace(
		 		["[[/artikel\]]", "[[/prijs\]]", "[[/aantal\]]","[[/totaalPrijs\]]"], 
		 		[$factuurregelNartikel['artikel'], $factuurregelNartikel['prijs'], $factuurregelNartikel['aantal'], $factuurregelNartikel['totaalPrijs']], 
		 		$factuurFile);
		 	$totaal = "<tr>
						<td class='thick-line'></td>
						<td class='thick-line'></td>
						<td class='thick-line text-center'><strong>Exclusief 21% btw.</strong></td>
						<td class='thick-line text-right'>".round($factuurregelNartikel['totaalPrijs']*0.71, 2)."</td>
					</tr>
					<tr>
						<td class='no-line'></td>
						<td class='no-line'></td>
						<td class='no-line text-center'><strong>Totaalbedrag</strong></td>
						<td class='no-line text-right'>&euro; ".$factuurregelNartikel['totaalPrijs']."</td>
					</tr>";
					return $artikelLijst.$totaal;
	}
	// //
	// private function gatherAllFactuurInfo(){
	// 	$klantDetails = $this->db->select("*", "klant", 0,['this'=>'klantcode', 'that'=>$this->userId]);
	// 	$factuur = $this->db->select("*", "factuur",0 ,['this'=>'klantcode', 'that'=>$this->userId], ['this'=>'factuurnummer', 'that'=>$this->param]);
	// 	if(!empty($factuur)){	
	// 		$allArtikelen = $this->db-select();
	// 	}
	// 	return ['klantDetails'=>$klantDetails, 'factuur'=>$factuur, 'factuurregel'=>$factuurregel, 'allArtikelen'=>$allArtikelen];
		
	// }

}