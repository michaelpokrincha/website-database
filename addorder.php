<?php
if(isset($_POST['orderSubmit'])) {
  require_once("mysqli_connect.php");

  $email = trim($_POST['customerEmail']);
  $password = trim($_POST['customerPassword']);
  $date = date("Y-m-d");

  $sql = "SELECT email, password FROM esucharity.customers";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
    if( (strcmp($email, $row[0]) == 0) && (strcmp($password, $row[1]) == 0) ){
      $query = "INSERT INTO esucharity.orders (orders.date, orders.custID) VALUES (?, (SELECT customers.custID FROM esucharity.customers WHERE (customers.email = ?)))";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "ss", $date, $email);
      mysqli_stmt_execute($stmt);
      $orderID = mysqli_insert_id($conn);

      if(isset($_POST['esuMedium'])){
        $esuMediumQty = $_POST['esuMediumQty'];
        $esuMediumCharity = $_POST['esuMediumCharity'];
        $itemDesc = 'ESU Medium Socks';
        $query = "INSERT INTO esucharity.order_item (order_item.qty, order_item.itemID, order_item.charityID, order_item.orderID) VALUES (?, (SELECT item.itemID FROM esucharity.item WHERE(item.itemDesc = ?)), (SELECT charity.charityID FROM esucharity.charity WHERE (charity.charityName = ?)), ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "issi", $esuMediumQty, $itemDesc , $esuMediumCharity, $orderID);
        mysqli_stmt_execute($stmt);
      }

      if(isset($_POST['esuLarge'])){
        $esuLargeQty = $_POST['esuLargeQty'];
        $esuLargeCharity = $_POST['esuLargeCharity'];
        $itemDesc = 'ESU Large Socks';
        $query = "INSERT INTO esucharity.order_item (order_item.qty, order_item.itemID, order_item.charityID, order_item.orderID) VALUES (?, (SELECT item.itemID FROM esucharity.item WHERE(item.itemDesc = ?)), (SELECT charity.charityID FROM esucharity.charity WHERE (charity.charityName = ?)), ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "issi", $esuLargeQty, $itemDesc , $esuLargeCharity, $orderID);
        mysqli_stmt_execute($stmt);
      }

      if(isset($_POST['neonMedium'])){
        $neonMediumQty = $_POST['neonMediumQty'];
        $neonMediumCharity = $_POST['neonMediumCharity'];
        $itemDesc = 'Neon Medium Socks';
        $query = "INSERT INTO esucharity.order_item (order_item.qty, order_item.itemID, order_item.charityID, order_item.orderID) VALUES (?, (SELECT item.itemID FROM esucharity.item WHERE(item.itemDesc = ?)), (SELECT charity.charityID FROM esucharity.charity WHERE (charity.charityName = ?)), ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "issi", $neonMediumQty, $itemDesc , $neonMediumCharity, $orderID);
        mysqli_stmt_execute($stmt);
      }

      if(isset($_POST['neonLarge'])){
        $neonLargeQty = $_POST['neonLargeQty'];
        $neonLargeCharity = $_POST['neonLargeCharity'];
        $itemDesc = 'Neon Large Socks';
        $query = "INSERT INTO esucharity.order_item (order_item.qty, order_item.itemID, order_item.charityID, order_item.orderID) VALUES (?, (SELECT item.itemID FROM esucharity.item WHERE(item.itemDesc = ?)), (SELECT charity.charityID FROM esucharity.charity WHERE (charity.charityName = ?)), ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "issi", $neonLargeQty, $itemDesc , $neonLargeCharity, $orderID);
        mysqli_stmt_execute($stmt);
      }

      if(isset($_POST['esuHat'])){
        $esuHatQty = $_POST['esuHatQty'];
        $esuHatCharity = $_POST['esuHatCharity'];
        $itemDesc = 'ESU Hat';
        $query = "INSERT INTO esucharity.order_item (order_item.qty, order_item.itemID, order_item.charityID, order_item.orderID) VALUES (?, (SELECT item.itemID FROM esucharity.item WHERE(item.itemDesc = ?)), (SELECT charity.charityID FROM esucharity.charity WHERE (charity.charityName = ?)), ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "issi", $esuHatQty, $itemDesc , $esuHatCharity, $orderID);
        mysqli_stmt_execute($stmt);
      }

      if(isset($_POST['neonHat'])){
        $neonHatQty = $_POST['neonHatQty'];
        $neonHatCharity = $_POST['neonHatCharity'];
        $itemDesc = 'Neon Hat';
        $query = "INSERT INTO esucharity.order_item (order_item.qty, order_item.itemID, order_item.charityID, order_item.orderID) VALUES (?, (SELECT item.itemID FROM esucharity.item WHERE(item.itemDesc = ?)), (SELECT charity.charityID FROM esucharity.charity WHERE (charity.charityName = ?)), ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "issi", $neonHatQty, $itemDesc , $neonHatCharity, $orderID);
        mysqli_stmt_execute($stmt);
      }

      if(isset($_POST['serviceOption'])){
        if($_POST['serviceOption'] == "pickup"){
          $building = "Stroud Hall";
          $room = 107;
          $query = "INSERT INTO esucharity.order_delivery (buildingName, roomNum, orderID) VALUES (?, ?, ?)";
          $stmt = mysqli_prepare($conn, $query);
          mysqli_stmt_bind_param($stmt, "sii", $building, $room, $orderID);
          mysqli_stmt_execute($stmt);
        }
        elseif($_POST['serviceOption'] == "deliver"){
          $building = trim($_POST['buildingName']);
          $room = trim($_POST['roomNum']);
          $query = "INSERT INTO esucharity.order_delivery (buildingName, roomNum, orderID) VALUES (?, ?, ?)";
          $stmt = mysqli_prepare($conn, $query);
          mysqli_stmt_bind_param($stmt, "sii", $building, $room, $orderID);
          mysqli_stmt_execute($stmt);
        }
    }
  }
}
header('location: order.php');
}
?>
