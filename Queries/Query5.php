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

$name = $_POST["Year"];

$sql = "SELECT title,COUNT(*) FROM (book INNER JOIN purchase ON book.ISBN13 = purchase.ISBN13) WHERE year='$name' GROUP BY title ORDER BY COUNT(*) DESC LIMIT 1";


if($result = $myconnection->query($sql)){
  printf("Best selling book in the year %s\n", $name);
  echo '<br/>';
  while($row = $result->fetch_assoc()){
    
    printf("%s\n",$row["title"]);
    echo '<br/>';
    
  }
  $result->free();
}
$myconnection->close();




  
?> 