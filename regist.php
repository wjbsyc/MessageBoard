<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>地狱通信</title>
<style type="text/css"> 

#align-center{ 
text-align:middle;
vertical-align:middle;
font-family:'微软雅黑';
}
/*
body {
	background-color: #000;
}
*/
h{color: transparent;-webkit-text-stroke: 0.5px black;}
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
 <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>

<div class="page-container">
 <h style="color:#FFF;font-family:'黑体';font-size:30px">あ な た の 怨 み 、 晴 ら し ま す 。</h>
<form method="post" action="">
  <p>&nbsp;    </p>
  
    <p id="box1"><input type="text" name='username' class="table-condensed" placeholder="Username" style="color:#fff;" maxlength="20"/><br> </p>
    <p style="font-size:9px">&nbsp;</p>
    <p id="box2"><input type="password" name="pwd"  class="password" placeholder="Password" style="color:#fff;" maxlength="20"/><br /></p>
    <p style="font-size:9px">&nbsp;</p>
    <p id="box5"><input type="password" name="cpwd"  class="password" placeholder="confirmpwd" style="color:#fff;" maxlength="20"/><br></p>
    <p style="font-size:9px">&nbsp;</p>
    <p id="box4"><input type="text" name="invite"  class="table-condensed" placeholder="invitecode" style="color:#fff;" /><br /></p>
  <p style="color:#FFF; font-family:微软雅黑; font-size:18px" id="box3"><br /></p>
  <p><br>
    <button type="submit" class="btn btn-primary" id="align-center">注册</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary" id="align-center" onClick="location.href='test.php'" >返回</button>
  </p>
</form>
</div>
<script src="assets/js/jquery-1.8.2.min.js"></script>
<script src="assets/js/supersized.3.2.7.min.js"></script>
<script src="assets/js/supersized-init.js"></script>
<script src="assets/js/scripts.js"></script>
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
var result1 = "<input type=\"text\" name=\'username\' class=\"table-condensed\" placeholder=\"Username\" style=\"color:#fff;\" value=\"<?php echo $_POST['username'];?>\"  maxlength=\"20\" /><br>";
var result2 = "<input type=\"password\" name=\"pwd\"  class=\"password\" placeholder=\"Password\" style=\"color:#fff;\" value=\"<?php echo $_POST['pwd']; ?>\"  maxlength=\"20\" /><br>";
var result5 = "<input type=\"text\" name=\"invite\"  class=\"table-condensed\" placeholder=\"invitecode\" style=\"color:#fff;\" value=\"<?php echo $_POST['invite']; ?>\"/><br />";
var result7 = "<input type=\"password\" name=\"cpwd\"  class=\"password\" placeholder=\"confirmpwd\" style=\"color:#fff;\" value=\"<?php echo $_POST['cpwd']; ?>\" maxlength=\"20\"/><br />";
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