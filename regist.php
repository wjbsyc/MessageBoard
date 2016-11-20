<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>地狱通信</title>
<style type="text/css"> 
.align-center{ 
margin:0 auto;  
width:600px; 
text-align:center; 
color:#FFF;
} 
body {
	background-color: #000;
}
#box1{
	maxlength:20;
}
#box2{
	maxlength:20;
}
#box4{
	maxlength:30;
}
#box5{
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
</head>

<body>

<div class="align-center">

<form method="post" action="">
  <p>&nbsp;    </p>
  <p style="color:#FFF">&nbsp;</p>
  <p style="color:#FFF;font-family:'黑体';font-size:30px">あ な た の 怨 み 、 晴 ら し ま す 。</p>
  <p style="color:#FFF">&nbsp;</p>
  <p style="color:#FFF">&nbsp;</p>
    <p style="color:#FFF; font-family:微软雅黑; font-size:20px" id="box1">username: <input type="text" name='username' size='30' maxlength="20"/><br> </p>
    <p style="font-size:9px">&nbsp;</p>
    <p style="color:#FFF; font-family:微软雅黑; font-size:20px" id="box2">password: <input type="password" name="pwd"  size='30' maxlength="20"/><br /></p>
    <p style="font-size:9px">&nbsp;</p>
    <p style="color:#FFF; font-family:微软雅黑; font-size:18px" id="box5">confirmpwd: <input type="password" name="cpwd"  size='30' maxlength="20"/><br></p>
    <p style="font-size:9px">&nbsp;</p>
    <p style="color:#FFF; font-family:微软雅黑; font-size:20px" id="box4">invitecode: <input type="text" name="invite"  size='30' /><br /></p>
  <p style="color:#FFF; font-family:微软雅黑; font-size:20px" id="box3"><br /></p>
  <p><br>
    <input type="submit" value="送信"/>
  </p>
</form>
</div>
<script type="text/javascript">

var username="<?php echo $_POST['username']; ?>";
var pwd="<?php echo $_POST['pwd']; ?>";
var invite="<?php echo $_POST['invite']; ?>";
var cpwd="<?php echo $_POST['cpwd']; ?>";
$(function(){
     var my_data=new Array();
     my_data[0]="<?php echo $_POST['username']; ?>";
     my_data[1]="<?php echo $_POST['pwd']; ?>";
     my_data[2]="<?php echo $_POST['invite']; ?>";
     my_data[3]="<?php echo $_POST['cpwd']; ?>"; 
     console.log(my_data);
	 $.ajax({
         url: "ajax.php",  
         type: "POST",
         data:{trans_data:my_data},
         dataType: "json",
         error: function(){  
             console.log('error');
			 alert('Error loading XML document');  
        },  
         success: function(data,status){//如果调用php成功    
			 console.log(data);
			 var check=data[0];
			 var row=data[1];
			 var jump=data[2];
			 var tpass=data[3];
			 var start=<?php echo isset($_POST['username'])&&isset($_POST['pwd']);?>;
var result1 = "username: <input type=\"text\" name=\'username\' size=\'30\' value=\"<?php echo $_POST['username'];?>\"  maxlength=\"20\" /><br>";
var result2 = "password: <input type=\"password\" name=\"pwd\"  size=\'30\' value=\"<?php echo $_POST['pwd']; ?>\"  maxlength=\"20\" /><br>";
var result5 = "invitecode: <input type=\"text\" name=\"invite\"  size=\'30\' value=\"<?php echo $_POST['invite']; ?>\"/><br />";
var result7 = "confirmpwd: <input type=\"password\" name=\"cpwd\"  size=\'30\' value=\"<?php echo $_POST['cpwd']; ?>\" maxlength=\"20\"/><br />";
var result3 = "邀请码错误";
var result4 = "该用户已存在";
var result6 = "密码不一致";
if(start){ 
$("#box1").html(result1);
$("#box2").html(result2);
$("#box4").html(result5);
$("#box5").html(result7);
if(tpass){
if(!check){$("#box3").html(result3);}
if(row){$("#box3").html(result4);}
     if((!row)&&check){window.location.href="liuyan.php"; }
   
		 }
else{$("#box3").html(result6);}
}
}
	 });
     
 });


</script>
</body>
</html>