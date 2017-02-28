<?php
//alle content van de pagina word hier ingeladen.
if(isset($_GET['url'])){
	//Hier word de get parameter gefilterd en opgeslagen in de variable $url.
	$url = explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
}else{
	//Wanneer er geen url is gezet naast flowerpower, word de pagina hoofdpagina.
	$url[0] = "hoofdpagina";
}

$pagePath = "pages/".$url[0].".phtml";

if(file_exists($pagePath)){
	require_once $pagePath;
	unset($url[0]);
}else{
	//var_dump($pagePath);
	echo "Pagina bestaat niet!";	
}
//Alle overige data word opgeslagen in een post.
$_POST['params'] = $url ? array_values($url) : [];