<?php
 session_start();
   $p="";
   $e="";
   $emp=0;
  	if (isset($_POST['login'])){
  	  $em=$_POST["email"];
  	  $ps=$_POST["pwd"];
  	  $emp="";
       try{
           $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
          $cnx = new PDO('mysql:host=localhost;dbname=id12823789_youronlinebookstore', 'id12823789_hayat', 'veLXQifM*st@w9E', $pdo_options);
  	  $test=$cnx->query('SELECT id_client,surname,name,email,password FROM Client');
  	  while ($t2 = $test->fetch()){
  	      $emp=0;
        if($t2['email'] != $em){
            if($t2['password']==$ps){
             $e="<span>  Invalid email address. Please try again.</span>";
                }}
  	    if( $t2['email'] == $em){
  	                if($t2['password']!=$ps){
                 $p="<span> Password invalid. Please try again.</span>";
  	                }}
          if($t2['email']!=$em  && $t2['password']!=$ps){
               }
        if($t2['email']==$em  && $t2['password']==$ps){
              $_SESSION['id']=$t2['id_client'];
              $_SESSION['surname']=$t2['surname'];
              header("Location: books.php");
             
              }}
  	  
          $test->closeCursor();
          }catch (Exception $e){
                  die('Erreur : ' . $e->getMessage());}
                  $cnx= null;
  	}

?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset=UTF-8>
  
  	<style>
  		 body{
  	background-image:url("bgbook.jpg");
  	   }
  		 label {
  	   font-style: oblique;
  	   font-size: 200%;
  	   position: relative;left: 250px;
  }
  p{
       font-style: oblique;
  	   position: relative;left: 230px;
  }
  div{position: relative;left: 350px;}
  	input {
  width: 30%;
  padding: 12px 20px;
  margin:8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  position: relative;left:100px;
}
input[type=submit] {
  width: 10%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
   span {
       color:#A52A2A;
       position: relative;left:95px;
  }

  	</style>
  </head>
  <body>

  	<div id="login">
 	<form name="form" method="post" >
    <label><i>Login</i></label><br><br>
 	<input type="text" name="email" size=20  placeholder=" Email " required ><br>
 	<span><?php echo "$e"; ?></span><br>
    <input type="password" name="pwd" id="m"  placeholder=" Password " required><br>
    <span><?php echo "$p"; ?></span><br>
    <input type="submit" name="login" value="LOG-IN">
    <p>You don't have an account ? </p><a href="register.php"><p> Register here !</p></a>
    
    </form>
    </div>
   
  </body>
  
 </html>