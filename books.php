<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<title></title>
	<style>
	body{	
		
		 background-image:url("bgbook.jpg");}
		
	.menu {
		text-align: center;
		
	}
	.menu a{text-decoration: none;
	        font-size: 200%;
	    display: inline-block;
	  
	}
	a:link{color:black;}
	a:hover{color:blue;}
	p{width:200px;  height: 100px;border: solid 1px; padding-top: 50px; border-radius: 20px 20px 20px 20px;}

</style>
</head>

<body>
    <h2 align="center" style="font-style:oblique;color:#383838;">Choose a language :</h2>
	<div class="menu">
	  
        <a href="b1.php" target="frame2"><p>English</p></a>
       <a href="b2.php" target="frame2"><p>Arabic</p></a>     
       <a href="b3.php" target="frame2"><p>French</p></a>
       
      
    </div>
 
</body>
</html>