<?php
  function displayCharities($charityOption) {
    require("mysqli_connect.php");
    $sql = "SELECT charityName FROM esucharity.charity";
    $result = mysqli_query($conn, $sql);
    echo "Charity <select name='" . $charityOption . "' />";
    while($row = mysqli_fetch_array($result)) {
      echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
    }
    echo "</select>";
  }
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Order Form</title>
    <style>
        label, p {
            margin-left: 15px;
        }
        .hidden {
            width: auto;
            height: auto;
            display: none;
        }
    </style>
</head>
<body>
    <a href="index.php"><img src="logo.png" height="100" /></a>
    <br />
    <form id="orderForm" action="addorder.php" method="post">
      <br />
      <label for="customerEmail">Email*</label>
      <input type="email" name="customerEmail" required/>
      <br /><br />
      <label for="customerPassword">Password*</label>
      <input type="password" name="customerPassword" required/>
      <br /><br />
      <p>
            Choose what you would like to order. A matching pair will be donated
            to the charity of your choice. Please make checks payable to ESU and write
            Sock Donation in the check memo (Socks available starting March 22nd):<br />
        </p>

        <h3>Socks</h3>
        <input type="checkbox" name="esuMedium" />
        <label for="esuMedium">ESU Colors - Medium - Men (6-8) Women (6-9) Donation $20 </label>
        Qty <input type="number" min="0" max="5" name="esuMediumQty" />
        <?php
          displayCharities('esuMediumCharity');
        ?>
        <br /><br />
        <input type="checkbox" name="esuLarge" />
        <label for="esuLarge">ESU Colors - Large - Men (9-13) Donation $20 </label>
        Qty <input type="number" min="0" max="5" name="esuLargeQty" />
        <?php
          displayCharities('esuLargeCharity');
        ?>
        <br /><br />
        <input type="checkbox" name="neonMedium" />
        <label for="neonMedium">Neon Colors - Medium - Men (6-8) Women (6-9) Donation $20 </label>
        Qty <input type="number" min="0" max="5" name="neonMediumQty" />
        <?php
          displayCharities('neonMediumCharity');
        ?>
        <br /><br />
        <input type="checkbox" name="neonLarge" />
        <label for="neonLarge">Neon Colors - Large - Men (9-13) Donation $20 </label>
        Qty <input type="number" min="0" max="5" name="neonLargeQty" />
        <?php
          displayCharities('neonLargeCharity');
        ?>
        <br /><br />

        <h3>Hats</h3>
        <input type="checkbox" name="esuHat" />
        <label for="esuHat">ESU Colors - Donation $20 </label>
        Qty <input type="number" min="0" max="5" name="esuHatQty" />
        <?php
          displayCharities('esuHatCharity');
        ?>
        <br /><br />
        <input type="checkbox" name="neonHat" />
        <label for="neonHat">Neon Colors - Donation $20 </label>
        Qty <input type="number" min="0" max="5" name="neonHatQty" />
        <?php
          displayCharities('neonHatCharity');
        ?>
        <br /><br />

        <h3>Pickup or Delivery</h3>
        <input type="radio" name="serviceOption" value="pickup" required/>
        <label for="serviceOption">I want to pickup my socks. Socks are available for pickup from the C.R.E.A.T.E. Lab (Stroud Hall, Room 107) Tuesdays and Wednesdays 1-4pm</label>
        <br /><br />
        <input type="radio" name="serviceOption" value="deliver" required/>
        <label for="serviceOption">I want my socks delivered. Delivery available on campus only. Delivery day Tuesdays between 1-4pm</label>
        <br /><br />
        <h4>Deliver my socks to (Optional)</h4>
        <label for="buildingName">Building Name </label>
        <input type="text" name="buildingName" />
        <br /><br />
        <label for="roomNum">Room # </label>
        <input type="text" name="roomNum" />
        <br /><br />
        <input type="submit" name="orderSubmit" value="Submit" />
    </form>
</body>
</html>
