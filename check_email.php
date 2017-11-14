 <?php
require("config.php");
// Create connection
$conn = new mysqli(hostname, username, password, dbname);
$isTaken = 0;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$eStmt = $conn->prepare("SELECT * FROM guests WHERE email = ? LIMIT 1");
$eStmt->bind_param("s", $email);

if(isset($_GET['email'])){
	$email = $conn->real_escape_string($_GET['email']);
	if ($eStmt->execute()) {
		//echo "Query successful";
		$eStmt->store_result();
		$isTaken = $eStmt->num_rows;
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$eStmt->close();
$conn->close();
echo $isTaken;
?>