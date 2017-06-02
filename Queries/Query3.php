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

$name = $_POST["Cname"];

$sql = "SELECT cid FROM customer WHERE name='$name'";

$result = $myconnection->query($sql);
$row = $result->fetch_row();

$sql2 = "SELECT * FROM purchase WHERE cid=$row[0]";

if($result = $myconnection->query($sql2)){
  printf("Purchase history for %s: ", $name);
  echo '<br/>';
  printf("ISBN13 -- CID -- DATETIME");
  echo '<br/>';
  while($row = $result->fetch_assoc()){
    printf("%s\n",$row["ISBN13"]);
    printf("%s\n",$row["cid"]);
    printf("%s\n",$row["datetime"]);
    echo '<br/>';
  }
  $result->free();
}
$myconnection->close();




  
?> 