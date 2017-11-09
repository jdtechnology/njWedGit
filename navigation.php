<?php require("share_tab.php"); ?>
<div class="container" id="head">
	<table id="contextmen">
		<tr>
			<th><a class="ajax-nav" href="index.php">Home</a></th>
			<th>
				<!--<div class="dropdown">-->
				<a class="dropme ajax-nav" id="dropdown" href="location.php">Location</a>
					  <div id="myDropdown" class="dropdown-content">
						<a class="ajax-nav" href="day.php">Daytime</a>
						<a class="ajax-nav" href="night.php">Nighttime</a>
					  </div>
					<!--</div> -->
			</th>
			<th><a class="ajax-nav" href="rsvp.php">RSVP</a></th>
			<th><a class="ajax-nav" href="contact.php">Contact Us</a></th>
			<th>Hotels</th>
		</tr>
	</table>
</div>