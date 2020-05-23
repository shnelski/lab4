<?php 
include 'functions.php';
if (isset($_POST['name'])) {  
   $name=$_POST['name'];
   $power=$_POST['power'];
   $beats=$_POST['beats'];
   $id=$_POST['id'];
   update($id,$name,$power,$beats);
   echo 'data updated';
  }
  

?>