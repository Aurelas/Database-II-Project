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

$ISBN13 = $_POST["ISBN13"];
$cid= $_POST["Cid"];
$datetime=$_POST["DT"];

$sql = "INSERT INTO purchase(ISBN13,cid,datetime) VALUES('$ISBN13','$cid','$datetime')";



if($result = $myconnection->query($sql)){
  printf("New purchase history has been added!");
  
}
$myconnection->close();




  
?> 