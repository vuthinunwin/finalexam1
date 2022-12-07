<?php
session_start();
$username = "";
$email    = "";
$errors = array();
$id = "";
$db = mysqli_connect('localhost', 'root', '', 'final1');

if (isset($_POST['add_tour'])) {
    $place = $_POST['Place'];
    $amt = $_POST['Amount'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    if (empty($place)) { array_push($errors, "Place is required"); }
    if (empty($filename)) { array_push($errors, "Picture is required"); }
    if (empty($amt)) { array_push($errors, "Amount is required"); }

    if (count($errors) == 0) {

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        $sql = "INSERT INTO tour SET Place='$place' ,Picture='$filename',Remain='$amt',Amount='$amt'";
        mysqli_query($db, $sql);
        header('location: index.php');
    }
  }

  if (isset($_POST['update_tour'])) {
    $cid = $_SESSION["cid"];
    $place = $_POST['Place'];
    $amt = $_POST['Amount'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    if (empty($place)) { array_push($errors, "Place is required"); }
    if (empty($filename)) { array_push($errors, "Picture is required"); }
    if (empty($amt)) { array_push($errors, "Amount is required"); }

    if (count($errors) == 0) {

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        $sql = "UPDATE tour SET Place='$place' ,Picture='$filename',Remain='$amt',Amount='$amt'WHERE ID = '$cid'";
        mysqli_query($db, $sql);
        header('location: index.php');
    }
      }

      if (isset($_POST['join_tour'])) {
        $cid = $_SESSION["cid"];
        $email = $_POST['Email'];
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (count($errors) == 0) {

            $sql_transactions="SELECT * FROM `tour` WHERE ID=$cid";
            $result = $db->query($sql_transactions);
            $row = $result->fetch_assoc();
            $remain = $row['Remain']-1;
            $sql = "INSERT INTO `transaction`(`Tour_ID`, `Email`) VALUES ('$cid','$email')";
            $sql2 = "UPDATE `tour` SET `Remain`=$remain WHERE ID=$cid";
            mysqli_query($db, $sql);
            mysqli_query($db, $sql2);
            header('location: index.php');
        }
          }

          if (isset($_POST['cancel_tour'])) {
            $cid = $_SESSION["cid"];
            $email = $_POST['Email'];
            if (empty($email)) { array_push($errors, "Email is required"); }
            if (count($errors) == 0) {
                $sql_transactions="SELECT * FROM `tour` WHERE ID=$cid";
                $result = $db->query($sql_transactions);
                $row = $result->fetch_assoc();
                $remain = $row['Remain']+1;
                $sql = "DELETE FROM `transaction` WHERE `Email`= $email AND`Tour_ID`== $cid";
                $sql2 = "UPDATE `tour` SET `Remain`=$remain WHERE ID=$cid";
                mysqli_query($db, $sql2);
                mysqli_query($db, $sql);
                header('location: index.php');
            }
              }

?>