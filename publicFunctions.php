<?php
require_once "class/autoload.php";
session_start();

/**
*	@author K.L. Storms
*	Hier worden algemene hulp functies voor de applicatie geschreven.	
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
	$itemNoInfo = "<div class='col-md-4'>
            			<div class='product-item'>
              				<div class='pi-img-wrapper'>
                				<img src='images/producten/[[/product_image\]]' class=' col-xs-6 col-md-3'>
              				</div>
              				<h3>
              					<a href='shop-item.html'>[[/artikel\]]</a>
              				</h3>
              				<div class='pi-price'>&euro; [[/prijs\]]</div>
              					<a href='' class='btn add2cart'>Add to cart</a>
             				<div class='sticker'></div>
            			 </div>
        				</div>";
    //Alle product info van alle producten wordt vervolgens gevilterd en in een 'div' geplaatst, die hier boven te zien is.
    ///vervolgens worden alle producten in de variable $products opgeslagen en ge-echo't zodat de producten zichtbaar worden voor de gebruiker.
	foreach ($productsInfo as $key => $value) {	
			echo $products[] = str_replace(["[[/artikel\]]", "[[/product_image\]]", "[[/prijs\]]"], [$value['artikel'], $value['product_image'], $value['prijs']], $itemNoInfo);
	}
}
//Deze functie zorgt er voor dat een ingelogde klant zijn facturen kan bekijken.
function getAllFacturen(){
	if(!isLogin()){
		echo "Eerst inloggen AUB!";
	}else{

		$db = new database();
		//Select statment 
		$facturen = $db->select("*", "factuur", 0,["this"=>"klantcode", "that"=>$_SESSION['userId']]);

		if(!empty($facturen)){
			$totaalbedrag = $db->select("COUNT(prijs)", "factuurregel", 0, ["this"=>"factuurnummer", "that"=>$facturen[0]['factuurnummer']]);

			$facturen[0]['totaalbedrag'] = $totaalbedrag[0]['COUNT(prijs)'];
			$list = "<tr>
						<td>[[/factuurnummer\]]</td>
						<td>[[/factuurdatum\]]</td>
						<td>&euro;[[/totaalbedrag\]]</td>
						<td><a class='btn btn-default' href='factuur/[[/factuurnummer\]]'>Ga naar factuuur</a></td>
					</tr>";

			foreach ($facturen as $key => $value) {	
					echo $infoFacturen[] = str_replace(["[[/factuurnummer\]]", "[[/factuurdatum\]]", "[[/totaalbedrag\]]"], [$value['factuurnummer'], $value['factuurdatum'], $value['totaalbedrag']], $list);
			}
		}else{
			echo "<div class='alert alert-warning'>Geen facturen beschikbaar</div>";
		}
	}
		
}

function add2card(){

}
function getCardList(){
	
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