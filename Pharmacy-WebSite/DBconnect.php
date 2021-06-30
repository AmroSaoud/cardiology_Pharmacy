<?php 
	
    
        session_start(); 
    
        
	
	$dsn 		 = 'mysql:host=localhost;dbname=pharmacy';
	$user 		 = 'root';
	$password	 = '';

	$option 	 = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',); // it can de deleted 

	try {
		$con = new PDO($dsn, $user, $password, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo 'YOU ARE CONNECTED';
	    }
		

	catch(PDOException $e){

		echo 'FAILD TO CONNECT' . $e->getMessage();
	}




	 function checkItem($select, $from, $value)
	{
		# code...
		global $con;

		$statment = $con->prepare("SELECT $select FROM $from WHERE $select = ? ");
		$statment->execute(array($value));
		$count = $statment->rowCount();
		return $count;
	}

	




