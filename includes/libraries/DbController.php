<?php 


class DbController extends Database
{
	
	/*
		* To count no of data points
	*/


	public function CountData($tableName, $rowsReq, $params='')
	{
		
		if (empty($rowsReq)) {
			$rowsReq = '*';
		}

		$Sql = "SELECT $rowsReq FROM $tableName $params";
		$stmt = $this->database->query($Sql);
		return $stmt->rowCount();

	}

	/*
		* To Insert data In a specific table  
	*/

	public function Insert($tableName,$params,$verifier='')
	{
		$coundata = $this->CountData($tableName, '*', $verifier);
		// if (!$coundata > 0) {
		// 	$Sql = "INSERT INTO $tableName $params";
		// 	$this->database->query($Sql);
		// 	return '1';
		// }

		return $coundata;
		
	}

	/*
		* To Update data In a specific table  
	*/

	public function Update($tableName,$params,$UpdateOn='')
	{
		$Sql = "UPDATE $tableName SET $params $UpdateOn";
		$this->database->query($Sql);
	}

	/*
		* To Fetch data In a specific table  
	*/

	public function Fetch($tableName, $tableRows, $fetchType, $quries='')
	{
		
		if (empty($tableRows)) {$tableRows = '*';}

		/*
			* Makes the query parameter
		*/
		$count= 1;
		$count = $this->CountData($tableName, $tableRows, $quries);

		if ($count > 0) {
			$Sql = "SELECT $tableRows FROM $tableName $quries";
			$stmt = $this->database->query($Sql);

			if ($fetchType == 'true') {

				while ($rows[] = $stmt->fetchAll());

			} elseif ($fetchType == 'false') {

				while ($rows[] = $stmt->fetch());

			}	

			return $rows;

		} else {

			return '0';
		}
		
	}

	/*
		* To Delete data In a specific table  
	*/

	public function Delete($tableName,$params)
	{
		$SQL = "DELETE FROM $tableName $params";
		$this->database->query($SQL);
	}	

}