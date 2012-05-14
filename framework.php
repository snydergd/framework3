<?php
	// this is the framework file.
	// see the index file to know where the framework fits in a little more
	// also maybe check out the Diagram1.dia file
	
	// first, we need to make sure that someone isn't trying to view this file.
	// it is for include by index.php only
	
	
	// set up the constants
	if (!defined('WG_PATH')) define("WG_PATH", dirname(__FILE__));
	if (!defined('WG_URI_PATH')) define("WG_URI_PATH", dirname($_SERVER['PHP_SELF']));
	if (!defined('DS')) define('DS', '/');
	
	// Now require the appropriate config and class definition files
	require_once(WG_PATH.DS."config.php");
	require_once(WG_PATH.DS."lib".DS."Page.php");
	require_once(WG_PATH.DS."lib".DS."Query.php");
	require_once(WG_PATH.DS."lib".DS."Module.php");
	require_once(WG_PATH.DS."lib".DS."MySQL_Database.php");

	
	// Now the framework object
	class Framework {
		public $page, $db;
		function __construct() {
			// When we initialize this object we need to get the context ready for the pages and modules to use
			// Also, we need to decide what page is being used for this instance of the variable
			// One more thing we need to determine is which template to use when we render
			
			$this->page = Page::with_name("MainPage");
			$this->template = WG_PATH.DS."templates".DS."default.php";
			$this->db = new MySQL_Database();
		}
		function render() {
			// call the page's render function
			// then when that variable is defined, start the output buffer and include the appropriate template file
			// finally, return the output buffer
			$page = $this->page;
			include($this->template);
		}
		
	}
?>