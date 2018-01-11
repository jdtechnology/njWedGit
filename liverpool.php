<?php
$page_title = "About Liverpool";

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
				$page_ref = "liverpool_page";
				require("table_left.php");
			?>

			<td id="tabRight">
				<div class="container" id="main">
					<?php
						require("main_general.php");
						echo "\n";
					?>
            <!--BEGIN IMAGE GALLERY-->
            <ul>
              <li>
                <a href="#">
                  <img src="includes/images/liverpool/cathederal_small.jpeg">
                  <span></span>
                  <h2>
                   This is a text
                  </h2>
              	</a>
              </li>
              <li>
                <img src="includes/images/liverpool/cavernclub_small.jpeg">
                <span></span>
                  <h2>This is another text</h2>
              </li>
              <li>
                <img src="includes/images/liverpool/centrallib_small.jpeg">
                <span></span>
                  <h2>This is yet another text slightly larger to go to 2 lines</h2>
              </li>
              <li>
                <img src="includes/images/liverpool/anfield_small.jpeg">
                  <span></span>
                  <h2>This is a text</h2>
               </li>
              <li>
                <img src="includes/images/liverpool/chinatown_small.jpeg">
                <span></span>
                  <h2>This is another text</h2>
              </li>
              <li>
                <img src="includes/images/liverpool/cabtour_small.jpeg">
                <span></span>
                  <h2>This is yet another text slightly larger</h2>
              </li>
              <li>
                <a href="#">
                	<img src="includes/images/liverpool/citytour_small.jpeg">
                  <span></span>
                  <h2>
                   This is a text
                  </h2>
              	</a>
              </li>
              <li>
                <a href="#">
                	<img src="includes/images/liverpool/privatetour_small.jpeg">
                  <span></span>
                  <h2>
                   This is a text
                  </h2>
              	</a>
              </li>

            </ul>

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
