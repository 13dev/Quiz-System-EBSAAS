<?php 
include("dbconfig.php");
session_start();
if(!isset($_SESSION['login_user']))
	{
	header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">
<title>Painel de Controlo</title>
   <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
	<!--<link rel="stylesheet" type="text/css" href="css/easydropdown.metro.css"/>-->

	
	    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
</head>

<body>

<div class="logo"></div>
<div class="login-block">

  <div class="container">
     <div class="row-fluid">
      <div class="span6">      <div class="span6 pull-right" style="text-align:right">
           <a href="logout.php" class="btn btn-primary">Sair</a>
      </div>

           <p>
		       <?php
	
	if(isset($_SESSION['login_user']))
	{
	$login_session=$_SESSION['login_user'];
	echo '<h1>Bem - Vindo '.$login_session.'</h1>';
?>
		   </p>
      </div>

	  
  </div>	  <?php
	  	include "add.php";
	}

	  
	  ?>
 </div>      
 </div>
 



</div>
</body>

</html>