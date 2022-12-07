<?php
      include 'connection.php';
      $cid=$_GET['cid'];

if ($cid) {
  $sql_transactions = "SELECT * FROM `tour` WHERE ID=$cid";
  $result = $db->query($sql_transactions);
  $row = $result->fetch_assoc();
  $remain = $row['Remain'];
  $amt = $row['Amount'];
  if ($remain == $amt) {
    $sql = "DELETE FROM `tour` WHERE `ID`= $cid";
    mysqli_query($db, $sql);
    header('location: index.php');
  }
  else {
    header('location: index.php');
  }
}
?>