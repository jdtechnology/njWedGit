<?php
$page_title = "Where to stay";

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
	echo "<title>" . $page_title . "</title>";
	include "head.php";
?>
</head>

<body>
<?php require("navigation.php"); ?>

<div id="ajax-content">
<?php } ?>

	<table id="mainCen">
		<tr>
			<?php
				$page_ref = "hotels_page";
				require("table_left.php");
			?>

			<td id="tabRight">
				<div class="container" id="main">
					<?php
						require("main_general.php");
						echo "\n";
					?>
					<!-- <p><span class="required">1</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum turpis vel diam finibus, vel vehicula ligula aliquet. Vivamus vel risus aliquet, scelerisque ipsum id, hendrerit diam. Sed cursus, est sed efficitur aliquet, eros lacus mollis ligula, ac finibus ante justo vel turpis. Aenean ac neque sapien. Nulla non luctus massa, eget fermentum lacus.</p> -->
          <br>
          <br>
          <br>
					<img class="central" id="mainimg" src="includes/images/home_1.jpeg" alt="Loading..."><!--Convert to png for continuity-->
					<p><!--<span class="required">2</span>-->Welcome to our wedding website! We hope you find this information helpful as you plan your trip to Liverpool. We are so excited to celebrate our big day with all of you!</p>
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
