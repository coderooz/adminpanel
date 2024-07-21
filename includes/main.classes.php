<?php 

class ServerConn
{
	private $Server_Host = "localhost";
	private $Server_User = "root";
	private $Server_Pwd = "";
	private $Server_db = "adminpanel";

	private $UserFirst;
	private $UserLast;
	private $UserName;
	private $UserId;
	private $PageId;
	private $UserEmail;
	private $Pwd;
	private $RePwd;


	protected function DBConn()
	{	
		$dbc = 'mysql:host='.$this->host.';dbname='.$this->dbname;
		$conn = new PDO($dbc, $this->dbUser, $this->pwd);
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $conn;
	}

	public function DBSelect( )
	{

	}

	public function queryExecute($query, $exec)
	{
		
	}		

}

