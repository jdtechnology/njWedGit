
<?php
if($page_ref == "home_page") {
?>

<td id="tabLeft">
				<div id="leftContent">
					<p><!--<span class="required">11</span>-->Natalie and James' Wedding 21<sup>st</sup> April 2018</p>
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
					<p><!--<span class="required">12</span>-->Ceremony at St Georges Hall</p>
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
					<p><!--<span class="required">13</span>-->Reception at Oh Me Oh My</p>
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
					<p>If you're having any problems, please email:
					<a href="mailto:jd@natalieandjameswedding.co.uk">jd@natalieandjameswedding.co.uk</a></p>
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
					<p>Order of the day</p>
					<div id="microsoft_placehold2"></div>
				</div>
			</td>
<?php
} elseif($page_ref == "registry_page") {
?>
				<td id="tabLeft">
					<div id="leftContent">
						<!--OTHER-->
						<div id="microsoft_placehold1"></div>
							<p>Registry by John Lewis</p>
							<div id="microsoft_placehold2"></div>
						</div>
					</td>
<?php
} elseif($page_ref == "liverpool_page") {
?>
	<!--NOTHING TO SHOW, LIVERPOOL PAGE... HI FROM JACK!-->
<?php
} elseif($page_ref == "hotels_page") {
?>
	<!--NOTHING TO SHOW, HOTEL PAGE... HI FROM JACK!-->
<?php
} else {
	echo "<!--THERE IS AN ERROR WITH PAGEVAR, please check page name, and come back-->";
}
?>
