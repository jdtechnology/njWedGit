<?php
$page_title = "Day Location";

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
				$page_ref = "location_day";
				require("table_left.php");
			?>

			<td id="tabRight">
				<div class="container" id="main">
					<?php
						require("main_general.php");
						echo "\n";
					?>
					<p><!--<span class="required">5</span>-->Our wedding ceremony is being held at the beautiful St. Georges Hall in the centre of Liverpool. You will enter the hall via the South Entrance and head to the Power and Glory Landing.  If you have difficulty using the steps, you may enter the Heritage Entrance and take the lift to level 2 (the Power and Glory Landing is opposite the lift exit).
                                            St. Georges is just over the road from Liverpool Lime Street train station and there are many public carparks within a short walk of the hall including:
                                            </p>
                                            <ul class="carpark">
                                              <li>Lime Street Station Long Stay, Lord Nelson Street, L3 5QB.</li>
                                              <li>St John's Shopping Centre, St George's Place, L1 1LQ.</li>
                                              <li>Queen Square, Whitechapel, L1 1RH.</li>
                                            </ul>

					<!--Update maps iframe to my style of embed.-->
          <div id="maps">
					<!--&nbsp;&nbsp;-->&nbsp;&nbsp;&nbsp;&nbsp;<iframe width="450" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJxYehPjshe0gRHDrHXLpplt0&key=AIzaSyC7_nSrdaPBru14Q6uYHB7XgiQvnHqD32s" allowfullscreen></iframe>
        </div>
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

<div id="foot">
	<p>Copyright Jack Fisher 2017 &copy;</p>
</div>

<?php require("footer.php"); ?>
<?php
	echo "</body>\n</html>";
    }
?>
