<?php
   session_start();
   $b=false;
   $p="";
   $e="";
   $t="";
  	if (isset($_POST['register'])){
  	  $em=$_POST["email"];
  	  $tel=$_POST["num_tel"];
  	  $ps=$_POST["pwd"];
  	  $n=$_POST["prenom"];
  	  $sn=$_POST["nom"];
  	  $ad=$_POST["adresse"];
  	  
    if(!preg_match("^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,3})$^", $em)){
        $e="<span>  Invalid email address fotmat.</span>";
        $b=true;
    }
    if (!preg_match('#^[0-9]{10}$#', $tel)) {
           $t="<span>   Phone number invalid !</span>";
           $b=true;
               }
   if(strlen($ps)<8){
   	  $p="<span> Too short ! Please Enter at least 8 characters. </span>";
       $b=true;
   }
   if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $ps)){
        $p="<span> Password invalid.</span>";
        $b=true;
        }
         if(!$b)
  {
      $_SESSION['surname']=$sn;
      $_SESSION['name']=$n;
      try{
          $cnx=new PDO('mysql:host=localhost;dbname=id12823789_youronlinebookstore', 'id12823789_hayat', 'veLXQifM*st@w9E' );
          $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql="";
         $sql = "INSERT INTO Client (id_client,name,surname,email,num_tel,adresse,password)
                     VALUES (NULL,'$n','$sn','$em','$tel','$ad','$ps')";
                     
            $cnx->exec($sql);
            $test=$cnx->query("select id_client,surname from Client where surname='$sn'");
             while ($t2 = $test->fetch()){
                  $_SESSION['id']=$t2['id_client'];
                 }
              $test->closeCursor();
           header("Location: books.php");
      } catch(PDOException $e) {    echo  $e->getMessage();}
      $cnx= null;
  	}}
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset=UTF-8>
  	<title></title>
  	<style>
  		 body{
  	background-image:url("bgbook.jpg");
  	   }
  	     label {
  	   font-style: oblique;
  	   font-size: 200%;
  	   position: relative;left: 200px;


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
     <div id="reg">
     <form  name="form" method="post" >
       <label><i>Create an account</i></label><br><br>
       <input  type="text" name="prenom" id="p"  placeholder="Name..."  required><br><br>
       <input  type="text" name="nom" id="n"  placeholder="Surname... " required><br><br>
       <input type="text" name="email" size=50 id="em" placeholder="Email "  required><br>
       <span><?php echo "$e"; ?></span><br>
        <input  type="text" name="num_tel" id="t"  placeholder="Phone Number..." required ><br>
        <span><?php echo "$t"; ?></span><br>
         <input  type="text" name="adresse" id="a"  placeholder="Address..." required ><br><br>
       <input type="password" name="pwd" id="pw"  placeholder="Password... " required><br>
       <span><?php echo "$p"; ?></span><br>
       <input type="submit" name="register" value="REGISTER">
     </form>
     </div>
    
  </body>
 </html>