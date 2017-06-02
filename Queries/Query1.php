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



$sql = "SELECT * FROM (((author INNER JOIN customer ON author.name = customer.name) INNER JOIN purchase ON customer.cid = purchase.cid) INNER JOIN writes ON purchase.ISBN13 = writes.ISBN13) WHERE author.aid = writes.aid && writes.ISBN13 = purchase.ISBN13";




if($result = $myconnection->query($sql)){
  printf("Authors who have bought books that they have wrote:");
  echo '<br/>';
  while($row = $result->fetch_assoc()){
     printf("%s\n",$row["name"]);
     echo '<br/>';
  }
  $result->free();
}
$myconnection->close();




  
?> 