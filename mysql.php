<?php
  
class MySQL {

	var $host;
	var $dbUser;
	var $dbPass;
	var $dbName;
	var $dbConn;
	var $connectError;

	//Constructor for the classs tht sets all the necessary variables and connects to the DB.
	function MySql($host, $dbUser, $dbPass, $dbName)
	{
		
		$this->host = $host;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;
		$this->dbName = $dbName;
		$this->connectToDb();
	}

	function connectToDb()
	{
		// Make connection to MySQL server
		if (!$this->dbConn = @mysql_connect($this->host, $this->dbUser, $this->dbPass)) 
		{
			//TO DO: Replace with a call to a trigger_error method
			echo "Could not connect to database: " . mysql_error();
			$this->connectError = true;
			exit;
		} 
	
		//Try to select the desired database
		//echo "Selecting the database: $this->dbName";
		else if (!@mysql_select_db($this->dbName,$this->dbConn))
		{
			echo "DEBUG #2";
			//TO DO: Replace with a call to a trigger_error method		
			echo "Could not select database: " . mysql_error();
			$this->connectError = true;
			exit;
		}
	}

	function isError()
	{
		if ($this->connectError)
		{
			return true;
		}
	   
		$error = mysql_error($this->dbConn);
	   
		if (empty($error))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function &query($sql)
	{
		if(!$sql)
		{
			echo "Invalid SQL statement";
		}
		
		$resultSet = mysql_query($sql, $this->dbConn);
		
		if (!$resultSet)
		{
			
			echo "Query failed: " . mysql_error($this->dbConn) . " SQL: " . $sql;
			exit;	
		}
		
		else
		{
			return $resultSet;
		}
	}
}
 ?>
