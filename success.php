<?php
require("config.php");
// Create connection
$conn = new mysqli(hostname, username, password, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$gStmt = $conn->prepare("INSERT INTO guests (fname, lname, email, attending, additional)
	VALUES(?, ?, ?, ?, ?)");
$gStmt->bind_param("sssis", $name1, $name2, $email, $attending_int, $additional);
$gStmtExtra = $conn->prepare("INSERT INTO guests (fname, lname, email, attending, additional, gfname, glname)
	VALUES(?, ?, ?, ?, ?, ?, ?)");
$gStmtExtra->bind_param("sssisss", $name1, $name2, $email, $attending_int, $additional, $gname1, $gname2);

//$conn->real_escape_string
$name1 = $_POST["firstname"];
$name1 = $conn->real_escape_string($name1);
$name2 = $_POST["lastname"];
$name2 = $conn->real_escape_string($name2);
$email = $_POST["email"];
$email = $conn->real_escape_string($email);
$attending = $_POST["attending"];
$additional = $_POST["additional"];
$additional = $conn->real_escape_string($additional);
$attending_int = 8;
$success = false;

if(isset($_POST["gfirstname"])) {
	$g1 = true;
	$gname1 = $_POST["gfirstname"];
	$gname1 = $conn->real_escape_string($gname1);
} else {
	$g1 = false;
}
if(isset($_POST["glastname"])) {
	$gname2 = $_POST["glastname"];
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


if(!$g1) {
	if($gStmt->execute()) {
		$success = true;
	} else {
		$success = false;
	}
} else {
	if($gStmtExtra->execute()) {
		$success = true;
	} else {
		$success = false;
	}
}
$gStmt->close();
$gStmtExtra->close();
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