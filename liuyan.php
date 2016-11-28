<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>homura</title>
<link href="wjbsyc.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<style>
#messagess{}
#delete{}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script>
 window.value=0;
 function fresh(page){
$.ajax({
         url: "show.php",  
         type: "POST",
         data:{ask:value},
         dataType: "text",
		 error: function(){  
             console.log('error');
			 alert('Error loading XML document');  
        },  
         success: function(data,status){//如果调用php成功    
		  if(data){
		  var result1=data;
		  $("#messagess").html(result1);
		          }
		  else{
		      if(page==1){value--;}
		      if(page==2){value++;}
		      alert('已经没有啦');
		      }    
		  }
	 });
}
function made(){
     var my_data=$('#tijiao').val();
	 console.log(my_data);
	
	// my_data=my_data.replace(/</g,"&lt");
	// my_data=my_data.replace(/>/g,"&gt");
	// my_data=my_data.replace(/\n|\r\n/g,"<br>");  
	// my_data=my_data.replace(/document./g," ");
//my_data=my_data.replace(/\"/g, "”");
//my_data=my_data.replace(/\$/g,"￥");
//my_data=my_data.replace(/\'/g,"‘");
//my_data=my_data.replace(/\?/g,"？");
//my_data=my_data.replace(/\:/g,"：");
//my_data=my_data.replace(/\;/g,"；");
	 $.ajax({
         url: "add.php",  
         type: "POST",
         data:{trans_data:my_data},
         dataType: "text",
		 error: function(){  
             console.log('error');
			 alert('Error loading XML document');  
        },  
         success: function(data,status){//如果调用php成功    
		  fresh(0);
		  document.getElementById("f").reset();
		  }
	 });
     
 }
 function del(mid){
     $.ajax({
     type: "POST",
     url:  "delete.php",
     data: {id:mid},
    dataType: "text",
	 error: function(){  
			 alert('发生错误');  
       },  
     success: function(data,status) 
     {   if(data){fresh(0);}
		 if(!data){alert('你只能删除自己的留言');}
		 
	 }
      });
   
}
function next(){
		 value+=1;
		 fresh(1);
}
function last(){
		 value-=1;
		 fresh(2);
}
</script>
<body>

<form method="POST" action="" id="f">
    <textarea rows="4" cols="50" name="subject" id="tijiao" placeholder="Please enter your message" class="message" required></textarea>
    <input name="submit" class="btn" type="button" value="Send" onclick="made()"/>
</form>

<?php 
session_start();
if(!isset($_SESSION['username']))
{
   Header("Location: test3.html");
}
else{
$username=$_SESSION['username'];
}
$conn=new PDO("mysql:host=localhost;dbname=user;charset=utf8","root"," ");
$conn->exec("set names 'utf8'");
$sql2=$conn->prepare("select uid from userid where id = ? ");
$sql2->execute(array($username));
$uid=$sql2->fetch(PDO::FETCH_ASSOC);
$_SESSION['uid']=$uid['uid'];


?>

<div class="z">
    <div class="smallbox">
    	<div class="facebox"><img src="myface.jpg" /></div>
        <div class="s_box">
        	<p class="verify" style="display:none;">0</p>
        	<h4 class="uname"><?php echo $username;?></h4>
          
            <p>
            
            </p>
            </div>
   </div>
    <div class="largebox">
    	
    	    	<div class="w_info">
        <div class="beTitle"><strong>留言板</strong></div>
        <table width="670" align="center" class="tList" id="messagess">
          <tbody>
          <tr>
            <td>id:</td>
            <td>message</td>
          </tr>
          
         
        </tbody>
        </table>
        </div>
</div>
</div>
<script type="text/javascript">
fresh(0);

</script>

</body>
</html>
