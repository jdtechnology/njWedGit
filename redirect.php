<?php

if(isSet($_GET["urlfrom"])) {
	$visit = $_GET["urlfrom"];
} elseif(isSet($_GET["urlto"])) {
	$visit = $_GET["urlto"];
} else {
	$visit = null;
}

switch($visit) {
	case "rsvp":
		header('Location: rsvp.php?complete=1');
		break;
	default:
		header('Location: /');
		break;
}
?>