<?php 

class Database{
	private $host = "localhost:8080";
	private $use = "root";
	private $pw = "root";
	private $dbname = "phpwebsite";

	private $dbh;
	private $error;
	private $stmt;


	public function __construct(){
		//set DSN
		$dsn = "mysql:host=".$this->host."dbname=".$this->dbname;
		//set options
		$options = array(
			PDO::ATTR_PERSISTENT  	=> true,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION
			);
		//create new PDO instance
		try{
			$this->dbh = new PDO($dsn, $this->user, $this->pw, $options);
		} catch(PDOException $e){
			$this->error = getMessage();
		}
	}
}

?>