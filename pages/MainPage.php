<?php
	// included from index.php if specified or defaulted
	defined('WG_PATH') or die;
	
	class MainPage extends Page {
		function __construct() {
			// this is where we perform most of the actions

			$current_user = new User();
			$current_user = $current_user->logged_in();
			$mod = $this->add_module("nav-login", "nav-top");
			$mod->set_query($current_user);

			$mod = $this->add_module("text", "nav-logo", "Website #1");
			$mod = $this->add_module("text", "content", "Hello");
		}
	}
?>