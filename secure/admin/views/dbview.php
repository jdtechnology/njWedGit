<?php
require("../../../../config.php");
// Create connection
$conn = new mysqli(hostname, username, password, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!doctype html>
<html>
<head>
<title>Secure admin</title>
<style>
td {
  padding: 5px 5px 5px 5px;
}
.fbutton {
  font-size: 30px;
}
#dbStats {
  position: absolute;
  right: 0;
}
</style>
</head>

<body>
  <div id="dbView">
    <table border='1'>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>email</th>
        <th>Attending</th>
        <th>Additional</th>
        <th>G2 Fname</th>
        <th>G2 Lname</th>
        <th>Date rsvp</th>
        <th>userAgent</th>
      </tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM guests");
function displayTable($res) {


    while($row = mysqli_fetch_array($res)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['fname'] . "</td>";
      echo "<td>" . $row['lname'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['attending'] . "</td>";
      echo "<td>" . $row['additional'] . "</td>";
      echo "<td>" . $row['gfname'] . "</td>";
      echo "<td>" . $row['glname'] . "</td>";
      echo "<td>" . $row['datersvpd'] . "</td>";
      echo "<td>" . $row['useragent'] . "</td>";
      echo "</tr>";
    }
    // echo "</table>";

}
displayTable($result);
// mysqli_close($conn);
?>
  <tr>
    <form action="success.php" method="post">
    <td>x</td>
    <td><input type="text" name="firstname" /></td>
    <td><input type="text" name="lastname" /></td>
    <td><input type="text" name="email" /></td>
    <td><input type="text" name="attending" /></td>
    <td><input type="text" name="additional" /></td>
    <td><input type="text" name="gfirstname" /></td>
    <td><input type="text" name="glastname" /></td>
    <td>TODAY</td>
    <td>MANUAL INPUT</td>
    <input type="hidden" name="useragent" value="MANUAL INPUT" />

  </tr>
</table>
  </div>
  <div id="dbFunctions">
    <br><br>
      <input class="fbutton" type="submit" value="Add Guest Manually" />
    </form>
    <button class="fbutton" onclick="javascript:location.reload(true)">Refresh</button>
  </div>
  <div id="dbStats">
    <table border="1">
      <tr>
        <th>RSVPS</th>
        <th>Number attending</th>
        <th>Not attending</th>
        <th>Most popular browser</th>
      </tr>

<?php
$resTotal = mysqli_query($conn, "SELECT * FROM guests");
$resTotal = $resTotal->num_rows;
$resYes = mysqli_query($conn, "SELECT * FROM guests WHERE attending = 3");
$resYes = $resYes->num_rows;
$resNo = mysqli_query($conn, "SELECT * FROM guests WHERE attending = 4");
$resNo = $resNo->num_rows;

mysqli_close($conn);
?>
    <tr>
      <td><?php echo $resTotal; ?></td>
      <td><?php echo $resYes; ?></td>
      <td><?php echo $resNo; ?></td>
      <td>DUMMY</td>
    </tr>
  </table>
