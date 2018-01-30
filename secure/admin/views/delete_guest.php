<?php
require("../../../../config.php");
// Create connection
$conn = new mysqli(hostname, username, password, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$eStmt = $conn->prepare("DELETE FROM guests WHERE id = ?");
$eStmt->bind_param("i", $value);

$successfull = array(TRUE);

if(isset($_POST['uid'])){
  $idsToDel = $_POST['uid'];
  if (is_array($idsToDel)) {
    foreach($idsToDel as $value){
      $eStmt->bind_param("i", $value);
      $successfull[] = $eStmt->execute();
    }
  } else {
    $value = $idsToDel;
    $eStmt->bind_param("i", $value);
    $successfull[] = $eStmt->execute();
  }
}

$eStmt->close();
$conn->close();

if(in_array(FALSE, $successfull, TRUE)) {
  header('Location: dbview.php?deleted=0');
} else {
  header('Location: dbview.php?deleted=1');
}
?>
