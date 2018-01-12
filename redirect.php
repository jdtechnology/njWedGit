<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url=%1$s" />

        <title>Redirecting to <?php printf($visit);?></title>
    </head>
    <body>
        Redirecting to <a href="<?php printf($visit);?>"><?php printf($visit);?></a>.
    </body>
</html>
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
exit();
?>
