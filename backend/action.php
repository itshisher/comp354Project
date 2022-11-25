<?php
session_start();
require_once 'dbh.php';

//get values submited at home.php page
$original = $_GET['original'];
$action = $_GET['action'];
$bid = $_GET['bid'];

$sql = "select * from records where state ='$action' and bid ='$bid' and uid='$_SESSION[username]'";

$rs = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($rs);
$num = mysqli_num_rows($rs);

if($num>0){
  //js function window alert after successfully performing add books functions 
  //history.go(-1) causes the browser to move back one page in the session history
  echo '<script type="text/javascript">alert("Do not repeat the selection!");history.go(-1);</script>';
}else{
  $rs=mysqli_query($connection,"delete from records where state ='$original' and bid ='$bid' and uid='$_SESSION[username]'");
  //insert the book status(bid, status) related to a specific user
	$insql="insert into records (state,bid,uid) values('$action','$bid','$_SESSION[username]')";
  $inrs = mysqli_query($connection, $insql);
  echo '<script type="text/javascript">alert("Sueess!");history.go(-1)</script>';
}
 


 
?>