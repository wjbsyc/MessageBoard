<?php
  header('Content-Type:text/html; charset=utf8'); 
      session_start();
     $username=$_SESSION['username'];
	 $uid=$_SESSION['uid'];
	 $backValue=$_POST['id']; 
	 $mid=$backValue; 

//if(isset($_POST['username'])&&isset($_POST['pwd'])&&isset($_POST['invite'])){
	//if($_POST['username']&&$_POST['pwd']&&$_POST['invite']){
$conn=new PDO("mysql:host=localhost;dbname=user;charset=utf8","root"," ");
$conn->exec("set names 'utf8'");
$sql1=$conn->prepare("select id,uid from userid where id = ? and uid = ? ;");
$sql1->execute(array($username,$uid));
$check=$sql1->fetch();
$sql2 =$conn->prepare("select uid,mid from message where uid= ? and mid = ?");
$sql2->execute(array($username,$mid));
$row=$sql2->fetch();
if(($row&&$check)){ 
$sql =$conn->prepare("delete from message where mid= ?");
$onerow=$sql->execute(array($mid));
}
$backValue=($row&&$check);
echo ($backValue);

//}
//}
?>