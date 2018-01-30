<?php
$login_required = true;
require_once('login_check.php');
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
<script>
var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        return function (table, name, filename) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }

            document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = filename;
            document.getElementById("dlink").click();

        }
    })()
var sanitiseAttends = function() {
  var $ = document.getElementsByClassName("attends");
  for(i = 0; i < $.length; i++) {
    if($[i].innerHTML == 3) {
      $[i].innerHTML = "Yes";
    } else if ($[i].innerHTML == 4) {
      $[i].innerHTML = "No";
    } else {
      return 0;
    }
  }
}
</script>
</head>

<body onload="sanitiseAttends()">
  <div id="dbView">
    <div id="dbExelExport">
    <table border='1'>
      <tr>
        <th>Sel</th>
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
<form id="delGuest" action="delete_guest.php" method="post">
<?php
$result = mysqli_query($conn, "SELECT * FROM guests");
function displayTable($res) {


    while($row = mysqli_fetch_array($res)) {
      echo "<tr>\n";
      echo "<td><input type=\"checkbox\" name=\"uid[]\" value=\"" . $row['id'] . "\" /></td>\n";
      echo "<td>" . $row['id'] . "</td>\n";
      echo "<td>" . $row['fname'] . "</td>\n";
      echo "<td>" . $row['lname'] . "</td>\n";
      echo "<td>" . $row['email'] . "</td>\n";
      echo "<td class=\"attends\">" . $row['attending'] . "</td>\n";
      echo "<td>" . $row['additional'] . "</td>\n";
      echo "<td>" . $row['gfname'] . "</td>\n";
      echo "<td>" . $row['glname'] . "</td>\n";
      echo "<td>" . $row['datersvpd'] . "</td>\n";
      echo "<td>" . $row['useragent'] . "</td>\n";
      echo "</tr>\n";
    }
    // echo "</table>";

}
displayTable($result);
// mysqli_close($conn);
?>
</form>
</div>
  <tr>
    <form action="success.php" method="post">
    <td>-</td>
    <td>x</td>
    <td><input type="text" name="firstname" /></td>
    <td><input type="text" name="lastname" /></td>
    <td><input type="text" name="email" /></td>
    <td><input type="text" name="attending" placeholder="y/n (must be lower case)"/></td>
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
    <a id="dlink"  style="display:none;"></a>

    <input class="fbutton" type="button" onclick="tableToExcel('dbExelExport', 'RSVPS', 'weddingrsvps.xls')" value="Export to Excel">

    <button class="fbutton" onclick="document.forms.delGuest.submit()">Delete Selected</button>

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
