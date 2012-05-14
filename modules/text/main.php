<?php
	// Simple text module which does not use the database
	
	defined('WG_PATH') or die;
	
	class text extends Module {
		private $content;
		function __construct($text) {
			$this->content = $text;
		}
		function set_content($content) {
			$this->content = $content;
		}
		function get_content() {
			return $this->content;
		}
		function render() {
			return $this->content;
		}
	}
?>