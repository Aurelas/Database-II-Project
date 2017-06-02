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

$ISBN13 = $_POST["ISBN1310"];

$sql = "SELECT COUNT(ISBN13),aid FROM writes WHERE writes.aid = (SELECT aid FROM writes WHERE writes.ISBN13 = '$ISBN13')";

if($result = $myconnection->query($sql)){
    $row = $result->fetch_assoc();
    if($row["COUNT(ISBN13)"] > 1){
        $sql2 = "DELETE FROM book WHERE book.ISBN13='$ISBN13'";
        if($result = $myconnection->query($sql2)){
            printf("Book deleted!");
            echo '<br/>';
        }
    
  
    }else{
        $aid = $row["aid"];
        $sql2 = "DELETE FROM book WHERE book.ISBN13='$ISBN13'";
        $sql3 = "DELETE FROM author WHERE author.aid='$aid'";
        if($result = $myconnection->query($sql3)){
            if($result = $myconnection->query($sql2)){
                printf("Book and author deleted!");
                echo '<br/>';
            }
        }
    }
    
  
}
  

$myconnection->close();
  





  
?> 