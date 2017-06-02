<?php 
$myconnection = new mysqli('localhost', 'root', '')  
    or die ('Could not connect: ' . mysql_error()); 
  echo 'Connected successfully<br><br>'; 

$myconnection->select_db("booksdb");

if ($result = $myconnection->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    $result->close();
    echo '<br/>';
}

$where = $_POST["Where"];
$state = $_POST["state13"];
$city = $_POST["city13"];
$street = $_POST["street13"];
$website = $_POST["Website13"];

$sql = "INSERT INTO locations(location,state,city,street,website) VALUES('$where','$state','$city','$street','$website')";

if($myconnection->query($sql)===TRUE){
    echo "New record for locations created";
    echo '<br/>';
}else{
    echo "Error: " .$sql. "<br>" . $myconnection->error;
}






  
?> 