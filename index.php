<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="stylesheet.css" type="text/css" rel="stylesheet" media="screen">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="isotope/jquery.isotope.min.js"></script>
	<script src="scripts.js"></script>
	<meta name="description" content="">
	<meta name="author" content="Douglas Gardner">
</head>
<body>
		<?php
			if(isset($_GET["id"])) {
				include "lookup.php";
			} else {
		?>
		<form id="welcome" method="get" action="">
			<p id="intro">Please enter the SteamID you wish to view below:</p>
			<div id="prompt">
					steamcommunity.com/id/<input name="id" type="text" id="steamid" autofocus required placeholder="robinwalker" />
			<!--		<input type="submit">foo</input>  -->
			</div>
		</div>
		<?php
			}
		?>
	</div>
	<p class="footer">Powered by <a href="http://steamcommunity.com/dev">Steam</a>. Fork me on <a href="http://github.com/zuzak/backlog">Github</a>.</p>
</body>
</html>
