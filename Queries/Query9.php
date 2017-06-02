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
$ISBN13 = $_POST["ISBN139"];
$title = $_POST["title9"];
$year = $_POST["year9"];
$category = $_POST["category9"];
$pname = $_POST["Pname9"];
$price = $_POST["Price9"];

$city = $_POST["City9"];
$state = $_POST["State9"];

$authorn = $_POST["Author9"];
$authora = $_POST["Address9"];
$authorid= $_POST["Authorid"];

$sql3 = "INSERT IGNORE INTO author(aid,name,address) VALUES('$authorid','$authorn','$authora')";
if($myconnection->query($sql3)===TRUE){
    echo "New record for author created";
    echo '<br/>';
}else{
    echo "Error: " .$sql3. "<br>" . $myconnection->error;
}



$sql2 = "INSERT IGNORE INTO publisher(pname,city,state) VALUES('$pname','$city','$state')";

if($myconnection->query($sql2)===TRUE){
    echo "New record for publisher created";
    echo '<br/>';
}else{
    echo "Error: " .$sql2. "<br>" . $myconnection->error;
}

$sql = "INSERT IGNORE INTO book(ISBN13,title,year,category,pname,price) VALUES('$ISBN13','$title','$year','$category','$pname','$price')";

if($myconnection->query($sql)===TRUE){
    echo "New record for book created";
    echo '<br/>';
}else{
    echo "Error: " .$sql. "<br>" . $myconnection->error;
}

$sql4 = "INSERT IGNORE INTO writes(ISBN13,aid) VALUES('$ISBN13','$authorid')";
if($myconnection->query($sql4)===TRUE){
    echo "New record for writes created";
    echo '<br/>';
}else{
    echo "Error: " .$sql4. "<br>" . $myconnection->error;
}




$myconnection->close();




  
?> 