<?php

function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "lab3";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

return $conn;
}

function CloseCon($conn)
{
$conn -> close();
}

function new_line($n,$p,$b){
    $conn=OpenCon();
    $sql="INSERT INTO `tabel` (`id`, `name`, `power`, `beats`) VALUES (NULL, '$n', '$p', '$b');";
    mysqli_query( $conn, $sql );
    CloseCon($conn); 
 }

function read(){
    $conn=OpenCon();  
    $sql="SELECT * FROM tabel ;";
    $query = mysqli_query( $conn, $sql );
    if(mysqli_num_rows($query) > 0){
   while($row = $query->fetch_array()){
      $rows[]=$row;
   }
   return $rows;
   }
   else return 0;
 }

 function update($id,$n,$p,$b){
    $conn=OpenCon();
    $sql="UPDATE tabel SET name='$n', power='$p', beats='$b' WHERE id=$id;";
    mysqli_query( $conn, $sql );
 
    CloseCon($conn);
 }

 function delete($id){
    $conn=OpenCon();
    $sql="DELETE FROM tabel WHERE id=$id;";
    mysqli_query( $conn, $sql );
 
    CloseCon($conn);
 }


?>