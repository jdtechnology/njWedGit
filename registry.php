<?php
$page_title = "Registry";

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
<input type="text" value="729200" id="codeInput">
<?php require("navigation.php"); ?>

<div id="ajax-content">
<?php } ?>

	<table id="mainCen">
		<tr>
			<?php
				$page_ref = "registry_page";
				require("table_left.php");
			?>

			<td id="tabRight">
        <div class="container" id="main">
          <?php
            require("main_general.php");
            echo "\n";
          ?>
          <p>Whilst your attendance at our wedding is all we ask, should you wish to bring a gift we kindly direct you to our gift list...
          </p>
          <p>You can now view our giftlist by visiting
            <a class="container" href="https://www.johnlewisgiftlist.com/giftint/JSPs/GiftList/BuyGifts/GuestFindAList.jsp" target="_blank">JohnLewis/GiftLists</a>
            <br><br>and entering our code:
            <br>
            <table id="codeAndCopy">
              <tr>
            <td><code id="codeForJL">729200</code></td>
            <td><button id="copyButt" title="Copy code to clipboard"><img id="cCodeToClip" src="https://deb5pi665ie8w.cloudfront.net/generic/kez.icon-clipboard.png" /></button><td>
            </tr>
          </table>
            <!-- <button id="cCodeToClip"></button> -->
          </p>
          <!--Do cookie stuff-->
          <p>Thanks again, we look forward to seeing you!</p>
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
