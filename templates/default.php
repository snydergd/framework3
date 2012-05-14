<html>
	<!--
		Default template
		
		Use the $page object to put content in the page
			$page->position($name) shows everything which is assigned to a position
			$page->config($name) shows something from the config
			$page->templ_filename($name) show the template files path + $name (e.g. "C:/Users/George/dev/WG/$name")
	-->
	<head>
		<title><?php echo $page->position("title") . " - " . $page->config("site_name"); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $page->templ_filename('content/main.css'); ?>" />
	</head>
	<body>
		<div id="nav-wrap">
			<div id="nav-top">
				<?php echo $page->position("nav-top"); ?>
			</div>
			<div id="nav-logo">
				<?php echo $page->position("nav-logo"); ?>
			</div>
			<div id="nav-bottom">
				<?php echo $page->position("nav-bottom"); ?>
			</div>
		</div>
		<div id="content-wrap">
			<div style="display:table" id="left-nav">
				<?php echo $page->position("left-nav"); ?>
			</div>
			<div style="display: table" id="content">
				<?php echo $page->position("content"); ?>
			</div>
			<div style="display: table" id="right-side">
				<?Php echo $page->position("right-side"); ?>
			</div>
		</div>
		<div id="footer">
			<?php echo $page->position("footer"); ?>
		</div>
	</body>
</html>
