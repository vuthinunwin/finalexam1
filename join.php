<?php 
  include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Join Tour</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Join Tour</h2>
</div>
<?php
      $cid = '';
      $cid=$_GET["cid"];
      $_SESSION["cid"] = $cid;
      ?>
<form action="" method="post" >
      <?php include('error.php'); 
      ?>
      <div class="input-group"> 
      <label for="Email" class="form-label">Email</label>
          	<input type="text" name="Email">
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="join_tour">Join</button>
  	</div>
  </form>
</body>
</html>