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

$name = $_POST["Bname"];

$sql = "SELECT * FROM book WHERE title LIKE'%$name%'";



if($result = $myconnection->query($sql)){
  printf("ISBN13  ,  title  ,  year  ,  category  ,  pname  ,  price  ");
    echo '<br/>';
  while($row = $result->fetch_assoc()){
    
    printf("%s,  \n",$row["ISBN13"]);
    
    printf("%s,  \n",$row["title"]);
    
    printf("%s,  \n",$row["year"]);
    
    printf("%s,  \n",$row["category"]);
     
    printf("%s,  \n",$row["pname"]);
     
    printf("%s,  \n",$row["price"]);
     
    echo '<br/>';

  }
  $result->free();
}
$myconnection->close();




  
?> 