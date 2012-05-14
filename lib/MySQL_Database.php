<?php
	
	// basic mysql database object
	
	class MySQL_Database {
		protected $connection;
		protected $last_insert_id;
		function __construct() {
			global $config;
			
			$this->connection = mysql_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_password']);
			mysql_select_db($config['mysql_database'], $this->connection);
			$this->TP = $config['table_prefix'];
		}
		function query($q) {
			$r = mysql_query($q) or die("MySQL Error: " . mysql_error() . " WITH QUERY " . $q;
			$this->last_insert_id = mysql_insert_id($this->connection);
		}
		function __destruct() {
			mysql_close($this->connection);
		}
	}
	
?>