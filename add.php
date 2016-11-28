<?php
header('Content-Type:text/html; charset=utf8');
       session_start();
       $backValue=$_POST['trans_data'];      
       $mess=$backValue;
       $username=$_SESSION['username'];
	   $uid=$_SESSION['uid']; 
       $conn=new PDO("mysql:host=localhost;dbname=user;charset=utf8","root"," ");
       $conn->exec("set names 'utf8'");


$mess=preg_replace("/</","&lt",$mess);
$mess=preg_replace("/>/","&gt",$mess);
$mess=preg_replace("/\n|\r\n/","<br>",$mess);
$mess=preg_replace("/document./"," ",$mess);
$mess=preg_replace("/\"/","”",$mess);
//$mess=preg_replace("/\$/","￥",$mess);
$mess=preg_replace("/\'/","‘",$mess);
$mess=preg_replace("/\?/","？",$mess);
$mess=preg_replace("/\:/","：",$mess);
$mess=preg_replace("/\;/","；",$mess);

//$onerow=$sql->fetch();
if($mess){
  $sql3=$conn->prepare("insert into message(uid,mes) values(?,?) ");
  $sql3->execute(array($username,$mess));
  $sql3->fetch();
  $ok=1;
}
echo json_encode($ok);
?>