    <?php include "templates/header.php"; ?>
	<ul>
      <li>
	  <h2>First Create the DB and tables with values</h2>
        <a href="install.php"><strong>Click to create Database N01304773</strong></a> - with tables(users and addresses) and values inserted into them
      </li>
      <li>
        
		<h2>Upload a file with IDs</h2>

    <form action="read.php" method="post">
    	<input type="file" id="file" name="file">
    	<input type="submit" name="submit" value="Query">
    </form>
	
	<?php
	
	if (isset($_POST["submit"])) {
	
	if (empty($_POST["file"])) {
    echo "Make sure to upload a file <br><br><br>";    
} else {  
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "eregg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


  
  $array = file('bo.txt');
  //print_r($array)
  
  
  foreach ($array as $arr){ 
  echo $arr;
  
  $sql = "SELECT users.id as id, users.firstname as fn, users.lastname as ln, addresses.user_id as auid, addresses.city as city, addresses.country as cy
FROM users
INNER JOIN addresses ON users.id=addresses.user_id
WHERE users.id=".$arr." AND addresses.user_id=".$arr;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Address.user_id</th><th>City</th><th>Country</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["fn"]."</td><td>".$row["ln"]."</td><td>".$row["auid"]."</td><td>".$row["city"]."</td><td>".$row["cy"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
  
  
  
}
$conn->close();
}
	}

 
?>
	
	<div>
	</div>
      </li>
    </ul>
  <?php include "templates/footer.php"; ?>

