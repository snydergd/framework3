<?php
	// This is a query object
	// It is the parent class for all data objects
	// Most of its functions will modify the object then return itself (for object chaining)
	
	defined('WG_PATH') or die;
	
	class Query {
		protected $columns_to_get, $where, $table_name, $recordset, $row;
		function __construct() {
			$this->where = array();
			$this->columns_to_get = array("*");
		}
		function project($cols) {
			if ($this->columns_to_get[0] == "*") $this->columns_to_get = array();
			
			foreach ($cols as $value) if (!in_array($value, $this->columns_to_get)) array_push($this->columns_to_get, $value);
		}
		function with($where) {
			foreach ($cols as $value) if (!in_array($value, $this->columns_to_get)) array_push($this->columns_to_get, $value);
		}
		function run() {
			global $framework;
			$where_clause = "(" . implode(") AND (", $this->where) . ")";
			$columns = "`" . implode("`,`", $this->columns_to_get) . "`";
			$this->recordset = $framework->db->query("SELECT " . $columns . " FROM `" . $this->table_name . "` WHERE " . $where_clause);
			unset($this->row);
			return $this;
		}
		function fetch_array() {
			global $framework;
			$this->row = $framework->db->fetch_array($this->recordset);
		}
		function value($field) {
			if (!isset($this->row)) $this->fetch_array();
			return $this->row[$field];
		}
	}
?>