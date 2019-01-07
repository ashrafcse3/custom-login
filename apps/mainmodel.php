<?php

  class mainmodel extends PDO{
  
  	function __construct($dsn, $user, $pass){
    
  		 parent::__construct($dsn, $user, $pass);
		}
		
		public function insert($table, $data){
			$keys   = implode(',', array_keys($data));
			$values =':'. implode(', :', array_keys($data));
			$sql    = "INSERT into $table($keys) Values($values)";
	
			$statement = $this->prepare($sql);

			foreach ($data as $key => $value) {
				 $statement->bindValue(":$key", $value);
			} 

			return $statement->execute();
		}

		public function selectUserData($sql){

			$stat=$this->prepare($sql);
			$stat->execute();
	
			return $stat->fetchAll(PDO::FETCH_ASSOC);
	
	
		}
  }