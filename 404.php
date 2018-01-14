<?php
echo getcwd() . "\n";

$page_title = "Error 404, Not Found!";

$as_json = false;
if (isset($_GET["view_as"]) && $_GET["view_as"] == "json") {
  $as_json = true;
  ob_start();
} else {
?>

<!doctype html>

<html>
<head>
<?php
	require("head.php");
?>
</head>

<body>
<?php require("navigation.php"); ?>

<div id="ajax-content">
<?php } ?>

	<div class="container" id="main">
    <br><br>
		<p>Sorry, you seem to have followed an incorrect link.<br>If this error persists, please contact:
    <br><a href="mailto:jd@natalieandjameswedding.co.uk">jd@natalieandjameswedding.co.uk</a></p>
    <a href="home"><img class="cent" src="../../0.1.1/includes/images/404_southpark.png" alt="Even the image is 404!"></a>
  <br><br>
	</div>

<?php //End AJAX Content.
	if ($as_json) {
		echo json_encode(array("page" => $page_title, "content" => ob_get_clean()));
	} else {
?>
</div>

<?php require("footer.php"); ?>

<?php
   echo "\n</body>\n</html>";
    }
?>
