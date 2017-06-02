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

$name =$_POST["Cname12"];

$sql = "SELECT COUNT(location) FROM (SELECT location FROM (((customer INNER JOIN purchase ON customer.cid = purchase.cid) INNER JOIN purchase_location ON purchase.ISBN13 = purchase_location.ISBN13) INNER JOIN locations ON locations.lid = purchase_location.lid) WHERE name ='$name') WHERE location='offline'";

$sql2 = "SELECT COUNT(location) FROM (SELECT location FROM (((customer INNER JOIN purchase ON customer.cid = purchase.cid) INNER JOIN purchase_location ON purchase.ISBN13 = purchase_location.ISBN13) INNER JOIN locations ON locations.lid = purchase_location.lid) WHERE name ='$name') WHERE location='online'";

$result = $myconnection->query($sql);
$result2 = $myconnection->query($sql2);

$row = $result;
$row2 = $result2;

printf("%s buys his books:",$name);
echo '<br/>';
if($row > $row2){
    printf("offline");
}else{
    printf("online");
}

?> 