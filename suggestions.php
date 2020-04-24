<?php
session_start();
   if (isset($_POST['Send']))
     {     if(isset($_SESSION['id'])){
         $_SESSION['Suggestions']=$_POST['suggestion'];
      try{
          $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
       $cnx=new PDO('mysql:host=localhost;dbname=id12823789_youronlinebookstore','id12823789_hayat','veLXQifM*st@w9E');
           $sql = "INSERT INTO Suggestions (id_suggest,id_client, Suggestions) VALUES (?,?,?)";
          $cnx->prepare($sql)->execute([NULL,$_SESSION['id'],$_SESSION['Suggestions']]);
      } catch(PDOException $e) {    echo  $e->getMessage();}
      $cnx= null;
        } 
    
      else{
            header("location:login.php");
          }
      }
          
      
     
?>
<!DOCTYPE html>
<html>
<head><style>
	label{color: white;
	    font-style:oblique;
	}
	textarea{border-radius: 20px 20px 20px 20px;}
	body{	background-image:url("sug.jpeg");}
    div{position: relative;left: 250px;}
body {
  background-repeat: no-repeat;
  overflow-x: hidden; 
   background-size: 100% 125%;
}
 input{border-radius: 4px;
  box-sizing: border-box;}

</style>
</head>

<body>
<div>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" ?enctype="application/x-www-form-urlencoded">
	<label for="suggestion"><b>Suggestions<b></label><br>
    <form method="post" name="suggestion" ></form><textarea name="suggestion" cols=100 rows=20 id="suggestion" placeholder="  Add a comment or a suggestion..."></textarea></form><br>
	<input type="submit"  name="Send" value="Send">
	</form>
</div>

</body>
</html>