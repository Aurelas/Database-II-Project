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

$name =$_POST["Cname11"];

$sql = "SELECT * FROM (((customer INNER JOIN purchase ON customer.cid = purchase.cid) INNER JOIN purchase_location ON purchase.ISBN13 = purchase_location.ISBN13) INNER JOIN locations ON locations.lid = purchase_location.lid) WHERE name ='$name'";


if($result = $myconnection->query($sql)){
  printf("All books bought by %s: ",$name);
  echo '<br/>';
  while($row = $result->fetch_assoc()){
    printf("%s\n",$row["ISBN13"]);
    printf("%s\n",$row["location"]);
    printf("%s\n",$row["state"]);
    printf("%s\n",$row["city"]);
    printf("%s\n",$row["street"]);
    printf("%s\n",$row["website"]);
    echo '<br/>'; 
  }
  
    }else{
        echo "Error: " .$sql. "<br>" . $myconnection->error;
    }

?> 