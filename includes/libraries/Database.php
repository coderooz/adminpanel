<?php 


class Database
{
	private $host = 'localhost';
	private $user = 'root';
	private $pwd = '';
	private $dbName = 'adminpanel';
	protected $database;
	
	public function __construct()
	{
	
		try{

			/**
				* Create database connection
			*/
				$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
				$db = new PDO($dsn, $this->user, $this->pwd );
				$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				$this->database = $db;
		} catch (PDOException $e) {
			die('Sorry! Connection problem: '.$e->getMessage());
		}
	}
}