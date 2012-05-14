<?php
	// Query class for users
	
	defined('WG_PATH') or die;
	
	class User extends Query {
		function __construct() {
			parent::__construct();
			$this->table_name = 'Users';
		}
		function logged_in() {
			global $framework;
			// only select the currently logged in user
			
			$user_id = $framework->session["user_id"];
			
			return $this->with("id = " . $user_id);
		}
	}
?>