<?php
require("../../../../config.php");
// Create connection
$conn = new mysqli(hostname, username, password, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$backUp2G = $conn->prepare("INSERT INTO guestsdel (fname, lname, email, attending, additional, gfname, glname, useragent)
	VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
$backUp2G->bind_param("sssissss", $name1, $name2, $email, $attending_int, $additional, $gname1, $gname2, $ua);
$eStmt = $conn->prepare("DELETE FROM guests WHERE id = ?");
$eStmt->bind_param("i", $value);

// $result = mysqli_query($conn, "SELECT * FROM guests WHERE id = $value");
//
// $name1 = result['fname'];
// $name2 = result['lname'];
// $email = result['email'];
// $attending_int = result['attending'];
// $additional = result['additional'];
// $ua = result['useragent'];

$successfull = array(TRUE);

if(isset($_POST['uid'])){
  $idsToDel = $_POST['uid'];
  if (is_array($idsToDel)) {
    foreach($idsToDel as $value){
      $result = mysqli_query($conn, "SELECT * FROM guests WHERE id = $value");
      $row = mysqli_fetch_array($result);
      $name1 = $row['fname'];
      $name2 = $row['lname'];
      $email = $row['email'];
      $attending_int = $row['attending'];
      $additional = $row['additional'];
      $gname1 = $row['gfname'];
      $gname2 = $row['glname'];
      $ua = $row['useragent'];
      $successfull[] = $backUp2G->execute();

      $eStmt->bind_param("i", $value);
      $successfull[] = $eStmt->execute();
    }
  } else {
    $value = $idsToDel;
    $result = mysqli_query($conn, "SELECT * FROM guests WHERE id = $value");
    $row = mysqli_fetch_array($result);
    $name1 = $row['fname'];
    $name2 = $row['lname'];
    $email = $row['email'];
    $attending_int = $row['attending'];
    $additional = $row['additional'];
    $gname1 = $row['gfname'];
    $gname2 = $row['glname'];
    $ua = $row['useragent'];
    $successfull[] = $backUp2G->execute();

    $eStmt->bind_param("i", $value);
    $successfull[] = $eStmt->execute();
  }
}

$eStmt->close();
$backUp2G->close();
$conn->close();

if(in_array(FALSE, $successfull, TRUE)) {
  header('Location: dbview.php?deleted=0');
} else {
  header('Location: dbview.php?deleted=1');
}
?>
