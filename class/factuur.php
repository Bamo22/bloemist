<?php
/**
* 
*/
class factuur {
	
	private $userId;
	private $db;

	function __construct(){

		$this->userId = $_SESSION['userId'];
		$db = new database();
	}

	public function getFacturen(){
		
		

	}

	public function getSingelFactuur(){

	}


}