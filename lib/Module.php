<?php
	
	defined('WG_PATH') or die;
	
	class Module {
		protected $query;
		function set_query($query) {
			// this is to be overwritten
			// it just sets the query with which to get a recordset
			$this->query = $query;
		}
		function render() {
			// what will be displayed when this module is rendered
			// this is to be overwritten as each module has a very unique display
			// for now we will have this default lame content
			return "<div style=\"border:1px solid blue;display:table\">Empty Module</div>";
		}
	}
?>