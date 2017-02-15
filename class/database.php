<?php

/**
* 
*/
class database {
		
	private $DBHOST;
	private $DBNAME;
	private $DBUSERNAME;
	private $DBPASSWD;

	private $connection;

	function __construct(){

		$this->DBHOST = "localhost";
		$this->DBUSERNAME = "root";
		$this->DBPASSWD = "";
		$this->DBNAME = "flowerpower";

		try{
		    $this->connection = new PDO("mysql:host=".$this->DBHOST.";dbname=".$this->DBNAME."", $this->DBUSERNAME, $this->DBPASSWD);
		    // set the PDO error mode to exception
		    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
	    }catch(PDOException $e){
		   	echo "<br>Error: " . $e->getMessage();
	    } 

    	$this->query = null;
		$this->connPDO = null;
	}
	//Create
	//Dit statement maakt een nieuwe rij aan in het database met de volgende variablen:
	//$columnNames : Naam van alle kollomen die gevuld moeten worden.
	//$values : Alle waarden die aan de columnNames zijn gekopeld.
	public function insert($table, $columnNames, $values){
		$stmt = $this->connection->prepare("INSERT INTO ".$table." (".$columnNames.") VALUES (".$values.");");
		return $stmt->execute();
		$stmt->close();	
	}
	//R-ead
	//Met deze functie kan je met voorgeprogrameerde MySql statements data uit de database halen.
	//$columns : Welke kolommen er uit de database gehaalt moeten worden.
	//$tabel : In welke tabel er gezocht moet worden.
	//$limit : Hoeveelheid rijen uit de tabel gehaald mogen worden, dit is altijd een.
	//$where : Waar een specifieke kolom een bepaalde waarde heeft. Deze variable moet gegeven worden als array met de waardes this(kolom) en that(waarde van de kolom).
	public function select($columns, $table, $limit= null, $where=null){
		if($limit == true){
			if(isset($where)){
				$stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$table." WHERE ".$where['this']." = '".$where['that']."' LIMIT 1;"); 
			}else{
				$stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$table." LIMIT 1;"); 
			}
		}else{
			if(isset($where)){
				$stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$table." WHERE ".$where['this']." = '".$where['that']."';"); 
			}else{
				$stmt = $this->connection->prepare("SELECT ".$columns." FROM ".$table.";"); 
			}    		
		}
		
		$stmt->execute();
	    // set the resulting array to associative
	    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

	    return array_filter($result, function($value) { return $value !== ''; });
	}
	//U
	public function update(){

	}
	//D
	public function delete(){

	}
}