<style>

table#database_table {
    font-size:16px;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    border-spacing: 0;
}

#database_table td, #database_table th {
    border: 1px solid #ddd;
    text-align: left;
    padding: 8px;
}

#database_table tr:nth-child(even){background-color: #f2f2f2}

#database_table th {
    padding-top: 11px;
    padding-bottom: 11px;
    background-color: black;
    color: white;
}

</style>
<head>  
            
      </head>  
      <body >  

           <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
  <th>Tour ID </th>
  <th>Place </th>
  <th>Picture</th>
  <th>Avaliable</th>
  <th>Join Tour</th>
  <th>Cancel Tour</th>
   </tr>  
    </thead>  
    <tbody>

<?php
include 'connection.php' ;
$db = mysqli_connect('localhost', 'root', '', 'final1');

$sql_transactions="SELECT * FROM `tour`";
$result = $db->query($sql_transactions);
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo " <td>";
    echo $row["ID"];
    echo "</td> ";
    echo " <td>";
    echo $row["Place"];
    echo "</td> ";
    echo "<td>"; ?> <img src="./image/<?php echo $row['Picture']; ?>" height="100" width="100"> <?php echo "</td>";
    echo "<td>";
    echo $row["Remain"]."/".$row["Amount"];
    echo "</td> ";
    echo '<td><a href="join.php?cid='.$row["ID"].' ">Join</a></td>
        <td><a href="cancel.php?cid='.$row["ID"].' ">Cancel</a></td>';
}
?>
</tbody>
</table>
</div>
 <script>  
 $(document).ready(function() {
    $('#database_table').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} ); 
 </script>  
