<?php 
  include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Tour</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Update Tour</h2>
</div>
<?php
        $cid = '';
      $cid=$_GET["cid"];
      $_SESSION["cid"] = $cid;
      ?>
<form action="updatetour.php" method="post" enctype="multipart/form-data">
      <?php include('error.php'); 
      ?>
      <div class="input-group"> 
      <label for="Place" class="form-label">Place</label>
          	<input type="text" name="Place">
      </div>
      <div class="input-group"> 
      <label for="Picture" class="form-label">Picture</label>
            <input type="file" name="uploadfile" value="">
      </div>
      <div class="input-group"> 
      <label for="Amount" class="form-label">Amount</label>
            <input type="text" name="Amount">
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="update_tour">Update</button>
  	</div>
  </form>
</body>
</html>
