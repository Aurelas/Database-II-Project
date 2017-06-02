<?php 
include 'connect.php';


$sql = "SELECT * FROM (((author INNER JOIN customer ON author.name = customer.name) INNER JOIN purchase ON customer.cid = purchase.cid) INNER JOIN writes ON purchase.ISBN13 = writes.ISBN13) WHERE author.aid = writes.aid && writes.ISBN13 = purchase.ISBN13";

$result = mysqli_query($connect,$sql);

if($result->num_rows > 0){
  printf("Authors who have bought books that they have wrote:\n");

  while($row = $result->fetch_assoc()){
     printf("%s\n",$row["name"]);
     
  }
  
}else{
    printf("No data in the table for this query.");
}

?> 