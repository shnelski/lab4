<?php 
include 'functions.php';

 
if(isset($_POST["Nume"])){
if ($_POST["Nume"] != "" && $_POST["Power"] != "" && $_POST["Beats"] != "") {
  $Nume = $_POST["Nume"];
  $Power = $_POST["Power"];
  $Beats = $_POST["Beats"];
  new_line($Nume,$Power,$Beats);
  echo 'success';
}}


  

?>