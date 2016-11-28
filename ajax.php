<?php
  header('Content-Type:text/html; charset=utf8'); 
     $backValue=array();
     $backValue=$_POST['trans_data'];   

     $username=$backValue[0];    
     $pas=$backValue[1];    
     $invite=$backValue[2];
     $cpas=$backValue[3];

//if(isset($_POST['username'])&&isset($_POST['pwd'])&&isset($_POST['invite'])){
	//if($_POST['username']&&$_POST['pwd']&&$_POST['invite']){
$conn=new PDO("mysql:host=localhost;dbname=user;charset=utf8","root"," ");

$conn->exec("set names 'utf8'");
//$username=$_POST['username'];
//$pas=$_POST['pwd'];
//$invite=$_POST['invite'];
$sql1=$conn->prepare("select ic,pass from code where ic = ? and pass = 1 ;");
$sql1->execute(array($invite));
$check=$sql1->fetch();
$sql2 =$conn->prepare("select id from userid where id= ? ");
$sql2->execute(array($username));
$row=$sql2->fetch();
if(!$row&&$check&&($pas==$cpas)){ 
$sql =$conn->prepare("insert into userid(id,pass) values( ? , ? )");
$onerow=$sql->execute(array($username,$pas));
if (  $onerow ){
	session_start();
	$_SESSION['username'] = $username;
}
}
$backValue[0]=$check;
$backValue[1]=$row;
$backValue[2]=(!$row&&$check);
$backValue[3]=($pas==$cpas);
echo json_encode($backValue);

//}
//}
?>