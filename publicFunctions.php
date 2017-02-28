<?php
session_start();
//Laat alle klassen in die in de map class staan.
require_once "class/autoload.php";



/**
*	@author K.L. Storms
*	Hier worden algemene hulp functies voor de applicatie geschreven.
*	Tevens is deze ruimte ook gebruikt om code van te voren te testen om vervolgens om te zetten in een klasse/ methode	
*
*/

//Deze functie controlleerd of de gebruiker al ingelogd is.
function isLogin(){
	if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
		return true;
	}else{
		return false;
	}
}


/**
*	Deze function controlleerd op welke pagina de gebruiker is en vervolgens echo't hij de paginanaam.
*/ 
function thisPageTitle(){
	if(!isset($_GET['url'])){
		echo "hoofdpagina";
	}else{
		$page = explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
		echo $page[0];
	}
}

//Deze functie zorgt er voor de alle producten uitgeladen worden uit het database. Zodat wanneer er een nei
function getAllProducts() {
	//De globale database klasse wordt aangemaakt.
	$db = new database();
	// Vervolgens doen we een select statment op alle artikelen- tabel
	$productsInfo = $db->select('*', 'artikel');

	//Om alle producten op een juiste visuele manier weer te kunnen geven, hebben we deze div ontworpen om alle gegevens in te zetten voor elk product.
	///Informatie betrekking tot een artikel word gevilterd en vervangen. Deze filtersluitels zijn aangeduid als  [[/collumn_naam\]].
	$itemNoInfo = file_get_contents("html_blueprints/product.phtml");
    //Alle product info van alle producten wordt vervolgens gevilterd en in een 'div' geplaatst, die hier boven te zien is.
    ///vervolgens worden alle producten in de variable $products opgeslagen en ge-echo't zodat de producten zichtbaar worden voor de gebruiker.
	foreach ($productsInfo as $key => $value) {	
			echo $products[] = str_replace(["[[/artikel\]]", "[[/product_image\]]", "[[/prijs\]]", "[[/artikelcode\]]"], [$value['artikel'], $value['product_image'], $value['prijs'], $value['artikelcode']], $itemNoInfo);
	}
}
//Deze functie zorgt er voor dat een ingelogde klant zijn facturen kan bekijken.
function getAllFacturen(){
	if(!isLogin()){
		echo "Eerst inloggen AUB!";
	}else{
		$factuur = new factuur();
		$factures = $factuur->getAllFacturen();
		if (empty($factures)) {
			echo "<div class='alert alert-danger'>Geen Facturen</div>";
		}
		echo $factuur->getAllFacturen();
	}
		
}
//Deze functie is voor debuggen van de sessie waar alle artikelen in opgeslagen worden.
function printArtikelenArray(){
	if(isset($_SESSION['artikelen'])){
		echo "<pre>";print_r($_SESSION['artikelen']);echo "</pre>";
	}
}
//Deze functie word gebruikt om de lijst met artikelen te generen voor de winkelwagen.
function getCartList(){
	if(!isset($_SESSION['artikelen'])){echo "Geen producten in winkelwagen"; exit;}
	$db = new database();
	$array = array_keys($_SESSION['artikelen']);

	foreach ($array as $key => $value) {
		$data = $db->select("*", "artikel", 0, ['this'=>'artikelcode', 'that'=>$value]);
		$artikelInfo[$key] = $data[0];
		//array_push($artikelInfo[0], "aantal"); 
		$artikelInfo[$key]['aantal'] = $_SESSION['artikelen'][$value]['aantal'];
	}
	//print_r($artikelInfo[0]);
	

	//$winkelwegen = $_SESSION[artikelen][?]
	
	//var_dump($artikelInfo);

	$cardItem = file_get_contents('html_blueprints/product_winkelwagen.phtml');

	foreach ($artikelInfo as $key => $value) {	
			echo $products[] = str_replace(["[[/artikel\]]", "[[/product_image\]]", "[[/prijs\]]", "[[/aantal\]]", "[[/artikelcode\]]"], [$value['artikel'], $value['product_image'], $value['prijs'], $value['aantal'], $value['artikelcode']], $cardItem);
	}
}

function getTotaalPrijs(){
	if(!isset($_SESSION['artikelen'])){echo "Geen producten in winkelwagen"; exit;}
	$db = new database();
	$array = array_keys($_SESSION['artikelen']);
	$totaalPrijs =0;
	foreach ($array as $key => $value) {
		$data = $db->select("prijs", "artikel", 0, ['this'=>'artikelcode', 'that'=>$value]);
		$artikelInfo[$key] = $data[0];
		
		$totaalPrijs += $artikelInfo[$key]['prijs']*$_SESSION['artikelen'][$value]['aantal'];
	}
	echo $totaalPrijs;
}


/**
*	Deze functies zijn bedoeld om XSS attacks tegen te gaan, maar worden niet in de eerste intergratie/ implementatie verwerkt.
* 	Om dit te implementeren moet elke form een hidden input field hebben waar deze token in verwerkt wordt. Vervolgens moet deze input overeenkomen met de gesette session wanneer er een post wordt gedaan.
*
function setFormProtectionToken(){
	$token = md5(uniqid(rand(), TRUE));
	$_SESSION[$name] = $token;
	echo $token;
}
function checkFromProtectionToken($token, $sessionIdName){
	if($token == $_SESSION[$sessionIdName]){
		return true;
	}else{
		return false;
	}
}
*/