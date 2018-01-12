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
            <h2>Here are some suggestions we like that you could do while in Liverpool</h2>
            <!--BEGIN IMAGE GALLERY-->
            <table id="livTable">
              <tr>
                <td>
                  <p>Anglican Cathederal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                  <img src="includes/images/liverpool/cathederal_big.jpg">
                </td>
                <td>
                  <p>It’s website describes it as ‘a great place to visit’, and Trip Advisor voters obviously agree because Britain’s largest cathedral is currently the top destination on the web giant’s site.
                        The Giles Gilbert Scott-designed landmark boasts the world’s highest and widest Gothic arches, a tower offering spectacular city wide panoramas, the UK’s largest, most magnificent organ, an Awesome and Intimate trail, and a thought provoking Tracey Emin sculpture among its attractions.</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Possibly the world’s most famous clubs in one of music’s most famous streets, the Cavern recreates the atmosphere of those Merseybeat days with regular live music in a faithful recreation of the original club billed ‘the cradle of British pop’.
                     Part of Beatles’ folklore, there’s plenty for non-Fab Four fans to enjoy too. And of course, Cavern City Tours also runs the Magical Mystery Tour too.</p>
                </td>
                <td>
                  <p>Cavern Club</p>
                  <img src="includes/images/liverpool/cavernclub_big.jpg">
                </td>
              </tr>
              <tr>
                <td>
                  <img src="includes/images/liverpool/centrallib_big.jpg">
                </td>
                <td>
                  <p>How many libraries are also real tourist attractions? Not many we’d wager.
                    <br><br>The multiple award-winning Liverpool Central Library certainly is, from its spectacular four-storey atrium and rooftop terrace, to the historic Picton Reading Room, Oak Room and Hornby Library, housing 15,000 rare books.</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>You may never walk alone, but you can get to see behind the scenes at one of the world’s most famous football grounds.
                  <br><br>Reds from all over the world can walk in the footsteps of their heroes, hear about the new development taking place and visit The Liverpool FC Story, Anfield’s interactive museum, plus its new exhibition: The Steven Gerrard Collection.</p>
                </td>
                <td>
                  <img src="includes/images/liverpool/anfield_big.jpg">
                </td>
              </tr>
              <tr>
                <td>
                  <img src="includes/images/liverpool/chinatown_big.jpg">
                </td>
                <td>
                  <p>Chinatown is an area of Liverpool that is an ethnic enclave home to the oldest Chinese community in Europe.
                  <br><br>The entrance of Liverpool’s Chinatown is landmarked by a beautifully crafted traditional Chinese arch. The structure was imported piece by piece from Shanghai. The archway stands at 15m high, which makes it the largest Chinese Arch outside China.</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>The Beatles Fab Four Taxi Tour is included under this ‘tours’ banner, along with Seecret Tours.
                  <br>The cabs provide more personalised service where tourists could take as long as they liked at Beatles’ sites and where a taxi could have more accessibility than a larger vehicle.
                  <br>Combined, the company’s drivers have more than 200 years’ experience navigating the streets of Liverpool in Black Cabs.</p>
                </td>
                <td>
                  <img src="includes/images/liverpool/cabtour_big.jpg">
                </td>
              </tr>
              <tr>
                <td>
                  <img src="includes/images/liverpool/citytour_big.jpg">
                </td>
                <td>
                  <p>One of the eight venues under the National Museums Liverpool umbrella, the Albert Dock-based museum offers a treasure trove of maritime history – and it’s free (although donations are increasingly welcome).
                  <br><br>Current exhibitions include Lusitania: life, loss and legacy and a Cunard 175 celebration, while the basement houses the hands-on Seized! Border and Customs gallery.</p>
                </td>
              </tr>
              <!-- <tr>
                <td>
                  <img src="includes/images/liverpool/citytour_big.jpg">
                </td>
                <td>
                  <span>Private Tour</span>
                </td>
              </tr> -->
          </table>
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
