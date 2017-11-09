<?php
$page_title = "Location TEXT SHIZ";

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
	include "head.php";
	echo "<title>" . $page_title . "</title>";
?>
</head>

<body>
<?php require("navigation.php"); ?>

<div id="ajax-content">
<?php } ?>

	<table id="mainCen">
		<tr>
			<?php
				$page_ref = "location_page";
				require("table_left.php");
			?>
		
			<td id="tabRight">
				<div class="container" id="main">
					<?php 
						require("main_general.php");
						echo "\n";
					?>
					<p><span class="required">3</span>Text to link to day time location <a class="ajax-nav" href="day.php">Daytime location link</a></p>
					<!--Update maps iframe to my style of embed.-->
					<p><span class="required">4</span>Text to link to night time location <a class="ajax-nav" href="day.php">Night time location link</a></p>
				</div>
			</td>
		</tr>
	</table>

<?php
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