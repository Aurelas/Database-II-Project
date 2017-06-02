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

$name = $_POST["Name8"];
$address = $_POST["Address8"];
$naddress = $_POST["NAddress"];

$sql = "UPDATE people SET address='$naddress' WHERE name='$name' && address='$address'";

if($myconnection->query($sql)===TRUE){
    echo "New record updated for people ";
    echo '<br/>';
}else{
    echo "Error: " .$sql. "<br>" . $myconnection->error;
}


$myconnection->close();




  
?> 