<?php
if(isset($_COOKIE['fname']) && isset($_COOKIE['lname']) && isset($_COOKIE["attending"])) {
	if($_COOKIE["attending"] < 4) {
?>
	<p><span class="required">9</span>Thank you for responding, <?php echo $_COOKIE['fname'] . " " . $_COOKIE['lname']; ?>!</p><br>
	<p>We really look forward to seeing you on the day! Don't forget to check out the location, or the wedding list</p>
<?php
	} elseif($_COOKIE["attending"] > 4) {

?>

	<p><span class="required">10</span>Thank you for responding, <?php echo $_COOKIE['fname'] . " " . $_COOKIE['lname']; ?>!</p><br>
	<p>We are really sad that you wont be coming, but you can still see our gift list if you'd like.</p>
<?php
	} 
} else {
?>
   <form name="rsvp" action="success.php" method="post" class="cent">
		<ul class="form-style-1">
			<li><label>Full Name <span class="required">*</span></label>
				<input type="text" name="firstname" class="field-divided" placeholder="First" required />&nbsp;<input type="text" name="lastname" class="field-divided" placeholder="Last" required />
			</li>
			<li>
				<p><a id="guest1toggle" href="#">Add a guest</a><p>
			<li class="hideguest" id="guest1"><label>Guest name</label>
				<input type="text" name="gfirstname" class="field-divided" placeholder="First" />&nbsp;<input type="text" name="glastname" class="field-divided" placeholder="Last" /></li>
			<li>
				<label>Email <span class="required">*</span></label>
				<input id="email1" type="email" name="email" class="field-long" required />
			</li>
			<li>
				<label>Attending <span class="required">*</span></label>
				<select name="attending" class="field-select" required>
				<option value="placeholder" disabled selected>Please Select</option>
				<option value="dayonly">Yes - Day Only</option>
				<option value="nightonly">Yes - Night Only</option>
				<option value="yesboth">Yes - Both</option>
				<option value="notattending">No</option>
				</select>
			</li>
			<li>
				<label>Additional info</label>
				<textarea name="additional" id="field5" class="field-long field-textarea"></textarea>
			</li>
			<li>
				<input type="submit" value="Submit" />
			</li>
		</ul>
	</form>
<?php
}
?>