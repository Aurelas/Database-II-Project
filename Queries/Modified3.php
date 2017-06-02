<?php 
include 'connect.php';

$name = $_POST['input3'];

$sql = "SELECT cid FROM customer WHERE name='$name'";

$result = mysqli_query($connect,$sql);

$row = $result->fetch_row();



$sql2 = "SELECT * FROM purchase WHERE cid=$row[0]";

$result = mysqli_query($connect,$sql2);

if($result->num_rows > 0){
  printf("Purchase history for %s: \n", $name);
  printf("ISBN13 -- CID -- DATETIME\n");
  while($row = $result->fetch_assoc()){
    printf("%s  ",$row["ISBN13"]);
    printf("%s  ",$row["cid"]);
    printf("%s  ",$row["datetime"]);
    printf("\n");
    
  }
 
}else{
  printf("There is no data for this Query. \n");
}





  
?> 