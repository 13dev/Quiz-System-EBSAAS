<?php 
include('database.php');
session_start(); 

	if (empty($_SESSION['nome']) or empty($_SESSION['turma']) or is_null($_SESSION['nome']) or is_null($_SESSION['turma'])){
		header("Location: index.php");
		session_destroy();
		exit();
	} 
	
	$select = $mysqli->query("SELECT * FROM `questions`");
	$total = $select->num_rows;
	//echo $total;

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="13">

    <title>Ebsaas - Quiz</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
	<!--<link rel="stylesheet" type="text/css" href="css/easydropdown.metro.css"/>-->

	
	    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	
	 <!-- <script src="js/jquery.easydropdown.js" type="text/javascript"></script>-->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body>
    
       <header id="top" class="header" align="center"> 
        <div class="">
<div class="text-left" style="     background-color: rgba(0, 0, 0, 0.42);">
 <div class="">
<img src="img/logo.png" class="img-responsive center-left">
</a>
<div class="slogan" style="color: #f0f0f0; font-size: 13px; padding-left: 50px; position: absolute; top: 40px; width: 234px;">Escola da Levada</div>
	</div>
		  </div>
		   

		  
		  
		  
  <div class="col-md-6 col-md-offset-3">
             <h2><strong>Acabaste o Questionário!</strong><small> Parábens!</small></h2>
			<HR>
			<?php
			if($_SESSION['score'] == null or empty($_SESSION['score'])) {
			?>
			<h3>Nota: <span class="label label-danger"> Nota Indefinida! </span></h3>
			<?php
			} elseif($_SESSION['score'] < 3) {
			?>
			<h3>Nota: <span class="label label-danger"> Péssimo! </span></h3>
			<?php
			}elseif($_SESSION['score'] >= 3 && $_SESSION['score'] < 7){
			
			?>
			<h3>Nota: <span class="label label-warning"> Suficiente! </span></h3>
			
			<?php
			}elseif($_SESSION['score'] >= 7 && $_SESSION['score'] <= 12) {
			?>
			<h3>Nota: <span class="label label-primary"> Bom! </span></h3>
			<?php
			
			}elseif($_SESSION['score'] > 12 && $_SESSION['score'] <= 18) {
			
			?>
			<h3>Nota: <span class="label label-primary"> Muito Bom! </span></h3>
			<?php
			}
			
		?>
            <h1><span class="label label-info">Total de Pontos: [ <?php echo $_SESSION['score']; ?> ]</span></h1>
			<hr>
            <p><strong><a href="question.php?n=1" class="btn btn-success btn-lg">Começar de Novo</a>
			
              
            <?php
			
						$data = @date("d-m-Y h:i");
						$data = $data."min";
						$teste = @date("i");
						$teste = $teste . @date("s");
						$segundosf = $teste - $_SESSION['segundos'];
						if( $segundosf > 60){
							$tempofinal = gmdate('i:s', $segundosf). " Minutos";
						}else{
							$tempofinal = gmdate('s', $segundosf). " Segundos";
						}
						
						$pontos = $_SESSION['score'];
		
				//$insert = $mysqli->query("UPDATE `name_score` SET `score`='$score' WHERE `name`='$name'");

				
				if($_SESSION['score'] == null or empty($_SESSION['score']) or !isset($_SESSION['segundos'])) {
				
					// echo dont isset
				} else {
								$insert = $mysqli->query("INSERT INTO `name_score`(`name`,`turma`,`data`,`score`,`tempo`) VALUES ('".$_SESSION['nome']."','".$_SESSION['turma']."','".$data."','".$pontos."','".$tempofinal."')");
					if($insert){
						 //header("Location: index.php");
						 unset($tempofinal);
						 unset($_SESSION['segundos']);
						 session_destroy();
						 
					} else { 
						unset($tempofinal);
						unset($_SESSION['segundos']);
						 session_destroy();
							//header("Location: index.php");

					
					}
				}
			
			?>
            </form>
            </strong></p>
            <p>&nbsp;</p> 
			   <strong>Copyright &copy; 2016, Ultra - Configs 
        </strong>
        
  
  </div>
</div>
		 	

        </div>
     
	</header>
    
    
</body>

</html>
