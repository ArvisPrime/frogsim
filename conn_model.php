<?php

class Db{
	//database conn
	protected static $conn;
	
	private function connect(){
		//try and connect to database
		if(!isset(self::$conn)){
			//Load configuration as an array
			$config = parse_ini_file('./config.ini'); //input .ini file
			
			//get details from .ini file
			$uname = $config['username'];
			$pass = $config['password'];
			$dbname = $config['dbname'];
			$host = $config['host'];
			self::$conn = new mysqli($host,$uname,$pass,$dbname);
		}
		
		//check if conn is true. --successful conn
		if(self::$conn===false){
			echo "connection not Successful. Check configuration file for correct details";
			return false;
		}
		return self::$conn;
	}
	
	private function query($query){
		//make the conn call
		$conn = $this->connect();
		
		//Query database
		$result = $conn->query($query);
		
		return $result;
	}
	
	private function error(){
		return $this->connect()->error;
	}
	
	public function select($query){
		$rows = array();
		$result = $this->query($query);
		if($result === false){
			echo "No result found check query";
			return false;
		}
		while($row=$result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}
	
	public function insert($query){
		$result = $this->query($query);
		if($result === false){
			echo error();
		}else{
			return true;
		}
	}
	
	public function remove($query){
		$result = $this->query($query);
		if($result === false){
			echo error();
		}else{
			return true;
		}
	}
	
	//escape string
	public function escapeString($value){
		$conn = $this->connect();
		return "'".$conn->real_escape_string($value)."'";
	}
	
	
}