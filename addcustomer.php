<?php
if(isset($_POST[submit])){
  $data_missing = array();
  if(empty($_POST[firstName])){
    $data_missing[] = 'First Name';
  } else {
    $firstName = trim($_POST['firstName']);
  }

  if(empty($_POST[lastName])){
    $data_missing[] = 'Last Name';
  } else {
    $lastName = trim($_POST['lastName']);
  }

  if(empty($_POST[creditCard])){
    $data_missing[] = 'Credit Card';
  } else {
    $creditCard = trim($_POST['creditCard']);
  }

  if(empty($_POST[cvs])){
    $data_missing[] = 'CVS';
  } else {
    $cvs = trim($_POST['cvs']);
  }

  if(empty($_POST[email])){
    $data_missing[] = 'Email';
  } else {
    $email = trim($_POST['email']);
  }

  if(empty($_POST[password])){
    $data_missing[] = 'Password';
  } else {
    $userPass = trim($_POST['password']);
  }

  if(!empty($_POST[phoneNumber])){
    $phoneNumber = trim($_POST['phoneNumber']);
  }

  if(empty($data_missing)){
    require_once('mysqli_connect.php');
    $query = "INSERT INTO customers (firstName, lastName, creditCard, cvs, email, password, phoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssiissi", $firstName, $lastName, $creditCard, $cvs, $email, $userPass, $phoneNumber);
    mysqli_stmt_execute($stmt);
  }
}
 ?>
