<!DOCTYPE html>
<html>
<head>
<title>地狱通信</title>
<style type="text/css"> 
h{color: transparent;-webkit-text-stroke: 0.5px black;}
/*
.align-center{ 
margin:0 auto;  
width:600px; 
text-align:center; 
color:#FFF;
} 
body {
	background-color: #000;
}
*/
#box1{
	maxlength:20;
}
#box2{
	maxlength:20;
}
#box3{
	margin:0px;
	color:#FFF;
	height:20px;
}
</style> 
<script type="text/javascript" src="jquery.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
 <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<?php
if(isset($_POST['username'])&&isset($_POST['pwd'])){
	if($_POST['username']&&$_POST['pwd']){
$conn=new PDO("mysql:host=localhost;dbname=user;charset=utf8","root","wjbs19950104");
$conn->exec("set names 'utf8'");
//$conn = mysql_connect("localhost","root","APTX4869");
//mysql_select_db("user", $conn);
//mysql_query("SET NAMES 'UTF8'",$conn);
//$sql="select id,pass from userid where id='$username' and pass=$pas "
$username=$_POST['username'];
$pas=$_POST['pwd'];
$sql =$conn->prepare("select id,pass from userid where id= ? and pass= ?");
$sql->execute(array($username,$pas));
$onerow=$sql->fetch();
//$Result = mysql_query($sql, $conn);
//$onerow = mysql_fetch_array($Result);

 
if (  $onerow ){
	session_start();
	$_SESSION['username'] = $username;
	if($username=='admin'){Header("Location: /kodexplorer/index.php");}
   else{	Header("Location: liuyan.php");}
}
else
	   {  
		   if($username=='admin')  {Header("Location: test3.html");}
	   }
}
}
?>
<div class="page-container">
  <h style="color:#FFF;font-family:'黑体';font-size:30px">あ な た の 怨 み 、 晴 ら し ま す 。</h>
<form method="post" action="">
  <p>&nbsp;    </p>
 
    <p id="box1"><input type="text" name="username" class="table-condensed" placeholder="Username" style="color:#fff;" maxlength="20"/><br> </p>
    <p style="font-size:9px">&nbsp;</p>
    <p id="box2"><input type="password" name="pwd" class="password" placeholder="Password" style="color:#fff;" maxlength="20"/><br /></p>
    <p style="color:#FFF; font-family:微软雅黑; font-size:18px" id="box3"><br /></p>
  <p><br>
    <button type="submit" class="btn btn-primary">登录</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary" onClick="location.href='regist.php'" >注册</button>
  </p>
</form>
</div>
<script src="assets/js/jquery-1.8.2.min.js"></script>
<script src="assets/js/supersized.3.2.7.min.js"></script>
<script src="assets/js/supersized-init.js"></script>
<script src="assets/js/scripts.js"></script>

<script type="text/javascript">
var result1 = "<input type=\"text\" name=\'username\' class=\"table-condensed\" placeholder=\"Username\" style=\"color:#fff;\" value=\"<?php echo $_POST['username'] ?>\"maxlength=\"20\" /><br>";
var result2 = "<input type=\"password\" name=\"pwd\"  class=\"password\" placeholder=\"Password\" style=\"color:#fff;\" value=\"<?php echo $_POST['pwd'] ?>\" maxlength=\"20\" /><br>";
var result3= "<?php if(isset($_POST['username'])){echo '用户名或密码错误\n';} ?>";

$("#box1").html(result1);
$("#box2").html(result2);
$("#box3").html(result3);
</script>
</body>
</html>