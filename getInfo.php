<?php
if(isset($_POST[getInfo])) {
  require_once('mysqli_connect.php');
  $query = "SELECT * FROM customers";
  $response = @mysqli_query($conn, $query);
  if($response) {
    echo '<table align="left" cellspacing="5" cellpadding="8">
    <tr>
      <td align="left"><b>First Name</b></td>
      <td align="left"><b>Last Name</b></td>
      <td align="left"><b>Credit Card</b></td>
      <td align="left"><b>CVS</b></td>
      <td align="left"><b>Email</b></td>
      <td align="left"><b>Password</b></td>
      <td align="left"><b>Phone Number</b></td>
    </tr>';
    while($row = mysqli_fetch_array($response)){
      echo '<tr><td align="left">' .
        $row['firstName'] . '</td><td align="left">' .
        $row['lastName'] . '</td><td align="left">' .
        $row['creditCard'] . '</td><td align="left">' .
        $row['cvs'] . '</td><td align="left">' .
        $row['email'] . '</td><td align="left">' .
        $row['password'] . '</td><td align="left">' .
        $row['phoneNumber'] . '</td><td align="left">';
        echo '</tr>';
    }
    echo '</table>';

  }
  $stmt = mysqli_prepare($conn, $query);
  //mysqli_stmt_bind_param($stmt);
  mysqli_stmt_execute($stmt);
}

?>
