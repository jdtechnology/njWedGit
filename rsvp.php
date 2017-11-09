<?php
$page_title = "RSVP TEXT SHIZ";

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
				$page_ref = "rsvp_page";
				require("table_left.php");
			?>
		
			<td id="tabRight">
				<div class="container" id="main">
					<?php 
						require("main_general.php");
						echo "\n";
					?>
					<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum turpis vel diam finibus, vel vehicula ligula aliquet. Vivamus vel risus aliquet, scelerisque ipsum id, hendrerit diam. Sed cursus, est sed efficitur aliquet, eros lacus mollis ligula, ac finibus ante justo vel turpis. Aenean ac neque sapien. Nulla non luctus massa, eget fermentum lacus.</p>-->
					<?php 
						require "rsvp_form.php";
					?>
					<!--<p>Sed quis odio nec risus pellentesque bibendum id eget augue. Donec egestas a eros nec bibendum. Aliquam facilisis mattis metus, a lacinia quam venenatis eu. Duis dolor turpis, dictum in nisl nec, pulvinar semper sem. Vivamus quis auctor magna. Suspendisse dignissim suscipit pulvinar. Maecenas rhoncus lobortis consequat. Nam lorem elit, consequat eget quam vitae, ullamcorper ullamcorper diam. Etiam vitae erat sed tellus consectetur cursus vitae eu tortor. Suspendisse id arcu quis diam efficitur vulputate. Praesent eget enim fringilla, lobortis lacus eu, viverra neque.</p>-->
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
   echo "</body>\n</html>";
    }
?>