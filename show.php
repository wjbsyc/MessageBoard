<?php
header('Content-Type:text/html; charset=utf8');
       session_start();
       $value=$_POST['ask'];      
       $username=$_SESSION['username'];
	   $uid=$_SESSION['uid']; 
       $conn=new PDO("mysql:host=localhost;dbname=user;charset=utf8","root"," ");
       $conn->exec("set names 'utf8'");
       $flag=25*$value;
       $sql =$conn->prepare("select uid,mes,mid from message limit ? , ? ");
       $sql->bindValue(1, $flag, PDO::PARAM_INT);
       $sql->bindValue(2, 25, PDO::PARAM_INT);
	   $try=$sql->execute();
	   $backValue="<tbody>";
	   if($try){
	       $isnull=0;
       while($res=$sql->fetch(PDO::FETCH_ASSOC)){
	  $isnull=1;
	  $backValue=$backValue."<tr>";
	  $backValue=$backValue."<td>".$res['uid']."</td>";
	  $backValue=$backValue."<td>".$res['mes']."</td>";
	  $backValue=$backValue."<td><a onclick='del(".$res['mid'].")'>删除</a>";
	  $backValue=$backValue."</tr>";
	  }
	 $backValue=$backValue."<tr>";
	 $backValue=$backValue."<td><a onclick='last()'>上一页</a></td>";
	 $backValue=$backValue."<td align='center'>Akemi_Homura: 欢迎小伙伴留言，也欢迎干各种奇怪的事情。</td>";
	 $backValue=$backValue."<td><a onclick='next()'>下一页</a></td>";
	 $backValue=$backValue."</tbody>";
	 if($isnull){echo $backValue;}
	   }
?>