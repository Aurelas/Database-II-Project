<?php 
include 'connect.php';


$name =$_POST['input2'];

$sql = "SELECT title FROM ((writes INNER JOIN book ON writes.ISBN13 = book.ISBN13) INNER JOIN author ON writes.aid = author.aid) WHERE name='$name'";

$result = mysqli_query($connect,$sql);


if($result->num_rows > 0){
  printf("All books created by %s: \n",$name);
  
  while($row = $result->fetch_assoc()){
    printf("%s\n",$row["title"]);
    
  }
  
}else{
  printf("There is no data for this Query. \n");
}





  
?> 