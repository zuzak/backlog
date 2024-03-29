<?php

	require "xml.php";
	$id = $_GET["id"];

	if(is_numeric($id)){ // sloppy way of doing it
		$link = "profiles";
	} else {
		$link = "id";
	}
	$url = "http://steamcommunity.com/$link/$id/games/?xml=1";

	$page = file_get_contents($url);
	if (strpos($page,"The Steam Community is currently unavailable.") != false) {
		die("<div id=\"error\">The Steam Community is currently unavailable. <a href=\"javascript:location.reload(true);\">(retry?)</a></div>");
	}

	try {
		$data = xmlstr_to_array($page);
	} catch (Exception $e) {
		die("<div id=\"error\">Unable to parse the API.</div>");
	}

	if (isset($data["steamID"])) {
		echo "<h1><a href=\"http://steamcommunity.com/$link/$id\">".$data["steamID"]."'s backlog</a></h1>\n";
	} else {
		echo "<h1>Your Steam Library</h1>";
	}
	echo "<div id=\"nav\">(<a href=\"#\" id=\"all\">all</a> &middot; <a href=\"#\" id=\"played\">played</a> &middot; <a href=\"#\" id=\"unplayed\">unplayed</a>)</div>";
	$games = $data["games"]["game"];

	$playedgames = 0;
	echo "<div id=\"gamesbox\">";
	foreach($games as $game) {

//	for ($i = 0; $i <= count($games); $i++){
//		$game = $games[$i];
		$played = isset($game["hoursOnRecord"]);
		echo "\t\t<div class=\"game ";
		if (!$played) {
			echo "un";
		}
		echo "played\">\n\t\t\t<a href=\"";
		echo $game["storeLink"];
		echo "\">\n\t\t\t\t<img class=\"gamelogo\" alt=\"";
		echo $game["name"];
		echo "\" src=\"";
		echo $game["logo"];
		echo "\"/>\n\t\t\t</a>\n\t\t\t<p>\n";
		/*
		if (isset($game["statsLink"])) {
			echo "\t\t\t\t<a href=\"" . $game["statsLink"] . "\">\n\t\t\t\t\t<img src=\"star.png\" class=\"achievlink\" />\n\t\t\t\t</a>\n";
		} */
		echo "\t\t\t\t<a href=\"steam://run/". $game["appID"] . "\">\n\t\t\t\t\t<img src=\"game.png\" class=\"playlink\" />\n\t\t\t\t</a>\n\t\t\t\t";
		if ($played) {
			echo $game["hoursOnRecord"]. " hours";
			$playedgames++;
		} else {
			echo "Unplayed";
		}
		echo "</p>\n\t\t</div>\n";
	}
	echo "</div>";
	echo "<p class=\"footer\">$playedgames games out of ".count($games)." played (".round(($playedgames/count($games)*100))."%).";

?>
