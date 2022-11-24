<?php
session_start();
include("dbh.php");

$original = $_GET['original'];
$action = $_GET['action'];
$bid = $_GET['bid'];

$sql = "select * from records where state ='$action' and bid ='$bid' and uid='$_SESSION[username]'";

$rs = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($rs);
$num = mysqli_num_rows($rs);

if($num>0){
  echo '<script type="text/javascript">alert("Do not repeat the selection!");history.go(-1);</script>';
}else{
  $rs=mysqli_query($connection,"delete from records where state ='$original' and bid ='$bid' and uid='$_SESSION[username]'");
	$insql="insert into records (state,bid,uid) values('$action','$bid','$_SESSION[user]')";
  $inrs = mysqli_query($connection, $insql);
  echo '<script type="text/javascript">alert("Sueess!");history.go(-1)</script>';
}
 


 
?>