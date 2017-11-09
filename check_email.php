 <?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "rsvp_1";
// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
$isTaken = 0;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['email'])){
	$email = $conn->real_escape_string($_GET['email']);
	$sql = "SELECT * FROM guests WHERE email = '$email'";
	if ($result = $conn->query($sql)) {
		//echo "Query successful";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$isTaken = $result->num_rows;
}
$result->close();
$conn->close();
echo $isTaken;
?>