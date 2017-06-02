<?php 
include 'connect.php';

$name = $_POST['input4'];

$sql = "SELECT * FROM book WHERE title LIKE'%$name%'";

$result = mysqli_query($connect,$sql);

if($result->num_rows > 0){
  printf("ISBN13  ,  title  ,  year  ,  category  ,  pname  ,  price  \n");
    
  while($row = $result->fetch_assoc()){
    
    printf("%s,  \n",$row["ISBN13"]);
    
    printf("%s,  \n",$row["title"]);
    
    printf("%s,  \n",$row["year"]);
    
    printf("%s,  \n",$row["category"]);
     
    printf("%s,  \n",$row["pname"]);
     
    printf("%s,  \n",$row["price"]);

  }
 
}else{
    printf("There is no data for this Query. \n");
}





  
?> 