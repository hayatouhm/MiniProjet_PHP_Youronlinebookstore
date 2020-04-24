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
       overflow-y: hidden; 
  	background-image:url("bgbook.jpg");
  	   }
  	   #slide1{width:1330px;height:460px;border-radius:30px;visibility:hidden;}
       #slide2{width:1330px;height:460px;border-radius:30px;position:relative;bottom: 464px;visibility:hidden;}
       #slide3{width:1330px;height:460px;border-radius:30px;position:relative;bottom: 929px;visibility:hidden;}
       #slide{height:500px;}
     
 </style>
</head>

<body>
	<script type="text/javascript">
      var cp =0;

    function f() {
    
    var a=document.getElementById('slide1');
    var b=document.getElementById('slide2');
    var c=document.getElementById('slide3');
    if (cp==0) {
    a.style.visibility="visible";
    b.style.visibility="hidden";
    c.style.visibility="hidden";
      cp++;
  }
  else if (cp==1) {
    a.style.visibility="hidden";
    b.style.visibility="visible";
    c.style.visibility="hidden";
      cp++;}
    else if (cp==2) {
    a.style.visibility="hidden";
    b.style.visibility="hidden";
    c.style.visibility="visible";
      cp=0;
    }
    setTimeout(f,3000);}
  </script>
  

<body onload="f()">

<div id="slide">
  
<img src="slide1.jpg" id="slide1">
<img src="slide2.jpg" id="slide2">
<img src="slide3.jpg" id="slide3">

</div>

</body>

</html>