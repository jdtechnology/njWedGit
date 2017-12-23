
<?php
if($page_ref == "home_page") {
?>

<td id="tabLeft">
				<div id="leftContent">
					<p><span class="required">11</span>Welcome to the online home of The Wedding of Natalie and James</p>
					<!--<br> is temporary fix-->
					<br>
					<br>
					<br>
					<br>
					<!--[if IE]>
					<br>
					<br>
					<br>
					<br>
					<![endif]-->
				</div>
			</td>
<?php
} elseif($page_ref == "location_day") {
?>
			<td id="tabLeft">
				<div id="leftContent">
					<!--Location DAY-->
					<p><span class="required">12</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ante a magna ultricies sodales.</p>
					<br>
					<br>
					<br>
					<br>
				</div>
			</td>
<?php
} elseif($page_ref == "location_night") {
?>
<td id="tabLeft">
			<td id="tabLeft">
				<div id="leftContent">
					<!--Location NIGHT-->
					<p><span class="required">13</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ante a magna ultricies sodales.</p>
					<br>
					<br>
					<br>
					<br>
				</div>
			</td>
<?php
} elseif($page_ref == "rsvp_page") {
?>
<td id="tabLeft">
			<td id="tabLeft">
				<div id="leftContent">
					<!--RSVP-->
					<div id="microsoft_placehold1"></div>
					<p><span class="required">14</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ante a magna ultricies sodales.</p>
					<div id="microsoft_placehold2"></div>
				</div>
			</td>
<?php
} elseif($page_ref == "location_page") { //Add more
?>
			<td id="tabLeft">
				<div id="leftContent">
					<!--OTHER-->
					<div id="microsoft_placehold1"></div>
					<p><span class="required">15</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ante a magna ultricies sodales.</p>
					<div id="microsoft_placehold2"></div>
				</div>
			</td>
<?php
} elseif($page_ref == "ootd") {
?>
			<td id="tabLeft">
				<div id="leftContent">
					<!--OTHER-->
					<div id="microsoft_placehold1"></div>
					<p><span class="required">51</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id ante a magna ultricies sodales.</p>
					<div id="microsoft_placehold2"></div>
				</div>
			</td>
}
?>
<?php
} else {
	echo "FAILURE";
}
?>
