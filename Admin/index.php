<?php 
include("dbconfig.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 
$username=mysqli_real_escape_string($dbconfig,$_POST['username']);
$password=mysqli_real_escape_string($dbconfig,$_POST['password']);

$sql_query="SELECT id FROM user WHERE username='$username' and password='$password'";
$result=mysqli_query($dbconfig,$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);


//se retornar 1 fixe
// se retorna 0 tá errado
// se for maior, tem mais que 1 row
if($count==1)
{
$_SESSION['login_user']=$username;

header("location: welcome-home.php");
}
else
{
$error="Username ou password incorreta";
}
}
?><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Painel - Quiz Ebsaas</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
	<!--<link rel="stylesheet" type="text/css" href="css/easydropdown.metro.css"/>-->

	
	    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
	
	 <!-- <script src="js/jquery.easydropdown.js" type="text/javascript"></script>-->

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	



</head>




<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 align="center" class="text-center login-title" style="text-align: center">ADMIN PAINEL</h1>
            <div class="account-wall">
                <div align="center"><span style="text-align: center"><img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="" class="profile-img" align="middle">
                </span>
                </div>
                <form class="form-signin" name="login-form" action="" method="POST">
                <p align="center">
                  <span style="text-align: center">
                  <input name="username" type="text" autofocus required class="form-control" id="username" placeholder="Username">
                  </span></p>
                <p align="center">
                  <span style="text-align: center">
                  <input name="password" type="password" required class="form-control" id="password" placeholder="Password" autocomplete="on">
                  </span></p>
                <div align="center"><span style="text-align: center">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="cmdlogin">Entrar</button>
                </span>
                </div>
                <p align="center">&nbsp;</p>
                <p>&nbsp;</p>
                </form>
            </div>
        </div>
    </div>
</div>