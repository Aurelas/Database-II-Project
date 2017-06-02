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

$name =$_POST["Aname"];

$sql = "SELECT title FROM ((writes INNER JOIN book ON writes.ISBN13 = book.ISBN13) INNER JOIN author ON writes.aid = author.aid) WHERE name='$name'";

if($result = $myconnection->query($sql)){
  printf("All books created by %s: ",$name);
  echo '<br/>';
  while($row = $result->fetch_assoc()){
    printf("%s\n",$row["title"]);
    echo '<br/>'; 
  }
  $result->free();
}
$myconnection->close();




  
?> 