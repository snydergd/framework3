<?php
	// Main page to handle requests
	// From here we figure out which page and template to use
	// then we load the template, then the page
	// the page can then put content into positions
	// content must be some type of module with parameters
	// Finally after we have the modules loaded up we can render the content
	
	// modules each have their own subdirectory of the modules directory
	// for now each module contains a single "main.php" file which defines a module object
	// module objects can be rendered, and read various arguments from the framework that come from the user
	// modules are also given a recordset object by the page object that includes them
	// there might be a "simple-article" module which takes the first row of the recordsets and displays the content with edit/date information on "render"
	
	// all recordsets must have a name in the model directory
	// the model directory contains files for various data objects
	// the names of recordsets are of the format "objectName.someFunc(arg1, arg2, ...)"
	// there can be more than one someFunc (e.g. "objectName.someFunc(arg1).otherFunc(arg2, arg3)")
	// inside the framework's recordset name functions, these functions are called, each of which returns a query object
	// 		the query object then gets executed compiled and executed, returning a recordset to the modules
	//		these query objects have common functions (project, with(array("name = bob")), etc.)
	// The data objects in the directory can initialize themselves into the database.  This way installation is easier
	
	// So this files main function is to initialize the framework with the context, then render the output
	// it's pretty much useless
	
	if (!defined('WG_PATH')) define("WG_PATH", dirname(__FILE__));
	if (!defined('DS')) define('DS', '/');
	require_once(WG_PATH.DS."framework.php");
	
	global $framework;
	$framework = new Framework();
	
	echo $framework->render();
?>