<?php
	// This is a query object
	// It is the parent class for all data objects
	// Most of its functions will modify the object then return itself (for method chaining)
	// Example use so far: $name = $query_obj->project(array("name", "address"))->with("id=5")->value("name");
	// From children: (in constructor) $this->project("name", "id")->with("name=".$name); (in body) $id = $this->value("id");
	
	defined('WG_PATH') or die;
	
	class Query {
		protected $columns_to_get, $where, $table_name, $recordset, $row;
		function __construct() {
			$this->where = array();
			$this->columns_to_get = array("*");
		}

		// public interface functions
		// choose columns to be included in result
		function project($cols) {
			$all_present = false;
			if ($this->columns_to_get[0] == "*") {
				$all_pesent = true;
				$this->columns_to_get = array();
			}

			foreach ($cols as $value) if (!in_array($value, $this->columns_to_get)) {
				if (!$all_present) unset($this->recordset);
				array_push($this->columns_to_get, $value);
			}
			return $this;
		}
		// takes array of where expressions, e.g. array("name='george'")
		function with($where) {
			$this->where = $where;
			unset($this->recordset);
			return $this;
		}
		function fetch_array() {
			global $framework;
			if (!isset($this->recordset)) $this->run();
			$this->row = $framework->db->fetch_array($this->recordset);
			return $this;
		}
		function value($field) {
			if (!isset($this->row)) $this->fetch_array();
			return $this->row[$field];
		}
		
		// internal use functions
		protected function run() {
			global $framework;
			$where_clause = "(" . implode(") AND (", $this->where) . ")";
			$columns = "`" . implode("`,`", $this->columns_to_get) . "`";
			$this->recordset = $framework->db->query("SELECT " . $columns . " FROM `" . $this->table_name . "` WHERE " . $where_clause);
			unset($this->row);
		}
	}
?>
