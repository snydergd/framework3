<?php
	// This is the Page object
	// All pages extend this object
	// They have functions for adding and managing modules on the page (in positions)
	// They get put into a $page object for the template to use when it is included
	
	defined('WG_PATH') or die;
	
	class Page {
		private $positions;
		public $position_texts;
		function __construct() {
			$this->positions = array();
			$this->position_texts = array();
		}
		static function with_name($name) {
			require_once(WG_PATH.DS."pages".DS.$name.".php");
			return new $name();
		}
		function add_module($module_name, $position, $argument = null) {
			require_once(WG_PATH.DS."modules".DS.$module_name.DS."main.php");
			$mod = new $module_name($argument);
			
			if (!isset($this->positions[$position])) $this->positions[$position] = array();
			array_push($this->positions[$position], $mod);
			return $mod;
		}
		function render() {
			foreach ($this->positions as $position => $arr) {
				$position_text = "";
				foreach ($arr as $module) {
					$position_text .= $module->render();
				}
				$this->position_texts[$position] = $position_text;
			}
			
		}
		function position($name) {
			// this is for the framework to use to get content for a specific position after it has been rendered
			if (count($this->position_texts) == 0) $this->render();
			return $this->position_texts[$name];
		}
		function config($name) {
			// return a piece of the configuration variable for data
			global $config;
			return $config[$name];
		}
		function templ_filename($name) {
			return WG_URI_PATH.DS."templates".DS.$name;
		}
	}
?>