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

$name = $_POST["Name"];
$address = $_POST["Address"];

$sql = "INSERT INTO people(name,address) VALUES('$name','$address')";

if($myconnection->query($sql)===TRUE){
    echo "New record for people created";
    echo '<br/>';
}else{
    echo "Error: " .$sql. "<br>" . $myconnection->error;
}

$sql2 = "INSERT INTO customer(name,address) VALUES('$name','$address')";

if($myconnection->query($sql2)===TRUE){
    echo "New record for customer created";
    echo '<br/>';
}else{
    echo "Error: " .$sql. "<br>" . $myconnection->error;
}

$myconnection->close();




  
?> 