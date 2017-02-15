<?php
if(!isset($_GET['url'])){
	$url = "hoofdpagina";
}else{
	$url = $_GET['url'];
}
	
$page = explode('/',filter_var(rtrim($url, '/'),FILTER_SANITIZE_URL));

if(isset($page[1])){
	$_POST['extraParams'] = $page[1];
	$page = $page[0];
}

$pagePath = "pages/".$page[0].".phtml";

if(file_exists($pagePath)){
	require_once $pagePath;
}else{
	echo "Page does not exist!";
	
}