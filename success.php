<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rsvp_1";
// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
//$conn->real_escape_string
$name1 = $_REQUEST["firstname"];
$name1 = $conn->real_escape_string($name1);
$name2 = $_REQUEST["lastname"];
$name2 = $conn->real_escape_string($name2);
$email = $_REQUEST["email"];
$email = $conn->real_escape_string($email);
$attending = $_REQUEST["attending"];
$additional = $_REQUEST["additional"];
$additional = $conn->real_escape_string($additional);
$attending_int = 8;
$success = false;

if(isset($_REQUEST["gfirstname"])) {
	$g1 = true;
	$gname1 = $_REQUEST["gfirstname"];
	$gname1 = $conn->real_escape_string($gname1);
} else {
	$g1 = false;
}
if(isset($_REQUEST["glastname"])) {
	$gname2 = $_REQUEST["glastname"];
	$gname2 = $conn->real_escape_string($gname2);
}

switch($attending) { //maybe update to arrays
	case "dayonly":
		$attending_int = 1;
		break;
	case "nightonly":
		$attending_int = 2;
		break;
	case "yesboth":
		$attending_int = 3;
		break;
	case "notattending":
		$attending_int = 4;
		break;
	default:
		$attending_int = 0;
		break;
}
$attending_int = intval($attending_int);

echo $name1 . "\n" . $name2 . "\n" . $email . "\n" . $attending . "\n" . $additional . "\n" . $attending_int;;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!$g1) {
	$sql = "INSERT INTO guests (fname, lname, email, attending, additional)
	VALUES('$name1', '$name2', '$email', '$attending_int', '$additional')";
} else {
	$sql = "INSERT INTO guests (fname, lname, email, attending, additional, gfname, glname)
	VALUES('$name1', '$name2', '$email', '$attending_int', '$additional', '$gname1', '$gname2')";
}
if ($conn->query($sql) === TRUE) { //Modify to write error to error log file.
    //echo "New record created successfully";
	$success = true;
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
	$success = false;
}

$conn->close();
setcookie("fname", $name1, time() + 2.419e+6);
setcookie("lname", $name2, time() + 2.419e+6);
setcookie("attending", $attending_int, time() + 2.419e+6);
if($success) {
	header('Location: rsvp.php?complete=1');
} else {
	header('Location: rsvp.php?complete=0');
}
?>