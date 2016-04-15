<?php
include('database.php');
if(isset($_POST['enviarr'])){

	$select = $mysqli->query("SELECT `name` FROM `name_score` WHERE `name` = '".$_POST['name']."'");
	if(mysqli_num_rows($select)){
		$erro = "Este Nome Já esta registado na nossa Base de dados, Tenta Outro";
		
	} else {
	header("Location: question.php?n=1");
	}
}


$query ="SELECT * FROM questions";

$results = $mysqli->query($query) or die($mysqli->error._LINE_);
$total = $results->num_rows;
session_start();

?>

<!DOCTYPE html>
<html lang="en">

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

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>

    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >Menu</a>
            </li>
            <!--<li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#about" onclick = $("#menu-close").click(); >About</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >Portfolio</a>
            </li>-->
            <li>
                <a href="/Admin" onclick = $("#menu-close").click(); >Admin</a>
            </li>
        </ul>
		
    </nav>

    <!-- Header -->

			 
    <header id="top" class="header">

	
	
        <div class="text-vertical-center">
<div class="text-left" style="     background-color: rgba(0, 0, 0, 0.42);">
 <div class="container">
			 				<img src="img/logo.png" class="img-responsive center-left"></a>
							<div class="slogan" style="color: #f0f0f0;font-size: 13px;padding-left: 50px;position: absolute;top: 40px;">Escola da Levada</div>
							</div>
								</div>
		 



         <div class="row" style="margin-right: 0;">		

<br><br>

<?php
	$select = $mysqli->query("SELECT * FROM `name_score`");
	$jogadores = $select->num_rows;

?>
		 <h1>JÁ <?=$jogadores?> JOGADORES JOGARAM, FALTA TU!</h1><hr style="width:100px;border-color: #333333;">
		 <h4><p>Vamos Testar o teu conhecimento sobre a escola !</p><h4><br>

		   <div class="col-lg-10 col-lg-offset-1">

		   <div class="panel panel-primary">
				  <div class="panel-heading"><h4>QUESTIONÁRIO</h4></div>
				  <div class="panel-body">
				  

			<h3>
            <ul class="text-vertical-left">
                <li style="list-style-type: none;"><strong>Numero de Questões: </strong><?php echo $total; ?></li>
                <li style="list-style-type: none;"><strong>Tipo de Questionário: </strong>Múltipla escolha</li>
                <li style="list-style-type: none;"><strong>Tempo Estimado: </strong><?php echo $total * .5; ?> Minutos</li>
            </ul>
			</h3>
		<?php if(isset($erro)) {
		?>
           <div class="alert alert-danger">
  <strong>Erro!</strong><br><?=$erro?>
</div>

<?php }?>
			<form method="POST" action="" class="form-inline">
			
			<ul class="list-group">
  <li class="list-group-item">
				<div class="form-group">
				<label for="Input1">Nome:&nbsp;&nbsp;&nbsp;</label>
				<input type="text" class="form-control" id="Input1" name="name" placeholder="Introduz o teu nome" required='required'>
			  </div>
	</li>
	
	
  <li class="list-group-item">
				<center>
				<div class="form-group">
				<label for="Input2">Turma:&nbsp;&nbsp;&nbsp;</label>
<select id="Input2" onchange="document.getElementById('get_turma').value=this.options[this.selectedIndex].text" name="turma" required='required' class="form-control">
<option value="" class="label">Selecione Uma Turma</option>
<option value="1">5º1</option>
<option value="2">5º2</option>
<option value="3">5º3</option>
<option value="4">5º4</option>
<option value="5">5º5</option>
<option value="6">5º6</option>
<option value="7">6º1</option>
<option value="8">6º2</option>
<option value="9">6º3</option>
<option value="10">6º4</option>
<option value="11">6º5</option>
<option value="12">6º6</option>
<option value="13">7º1</option>
<option value="14">7º2</option>
<option value="15">7º3</option>
<option value="16">7º4</option>
<option value="17">7º5</option>
<option value="18">7º6</option>
<option value="19">7º7</option>
<option value="20">8º1</option>
<option value="21">8º2</option>
<option value="22">8º3</option>
<option value="23">8º4</option>
<option value="24">8º5</option>
<option value="25">8º6</option>
<option value="26">9º1</option>
<option value="27">9º2</option>
<option value="28">9º3</option>
<option value="29">9º4</option>
<option value="30">9º5</option>
<option value="31">10º1</option>
<option value="32">10º2</option>
<option value="33">10º3</option>
<option value="34">11º1</option>
<option value="35">11º2</option>
<option value="36">12º1</option>
<option value="37">12º2</option>
<option value="38">ASADM1-T3</option>
<option value="39">CAR1-T2</option>
<option value="40">COSTM2-T2</option>
<option value="41">EPCOM1A-T2</option>
<option value="42">EPCOM1B-T2</option>
<option value="43">PP_1-T2</option>
<option value="44">TAGD_3</option>
<option value="45">TAINF_3</option>
<option value="46">TAS_1</option>
<option value="47">TAS_2</option>
<option value="48">TAS_3</option>
<option value="49">TCPM_2</option>
<option value="50">TESE-T6</option>
<option value="51">TGPSI_1</option>
<option value="52">TGPSI_2</option>
<option value="53">TGPSI_3</option>
<option value="54">TS_1</option>
<option value="55">TTUR_2</option>
<option value="56">TTUR_3</option>
<option value="57">TAG-T7</option>
</select> 
</div>
<input type="hidden" name="get_turman" id="get_turma" value="0" />



</center>
  
  </li>
  
  <li class="list-group-item"><button class="btn btn-info btn-lg" name="enviarr" type="submit" style="width:400px;">Começar!</button></li>
</ul>
</form>
<?php
			if(isset($_POST['enviarr'])){
				
				$select = $mysqli->query("SELECT `name` FROM `name_score` WHERE `name` = '".$_POST['name']."'");
				if(mysqli_num_rows($select)){
					//exit("Este Nome Já esta registado na nossa Base de dados, Tenta Outro");
				} Else{
					//Nome 
				$name=$_POST['name'];
				$_SESSION['nome'] = $name;
					// Turma
				$turma = $_POST['get_turman'];
				$_SESSION['turma'] = $turma;
					// Segundos
					$_SESSION['i'] = date("i");
					$segundos = $_SESSION['i'];
					$_SESSION['s'] = date("s");
					$segundos = $segundos .$_SESSION['s'];
					$_SESSION['segundos'] = $segundos;
				
				// Redirect
					
				// echo "<meta http-equiv='refresh' content='0;url=../mili/question.php?n=1'>";
				 
				
				/*$mysqli->set_charset("utf8");
				$insert = $mysqli->query("INSERT INTO `name_score`(`name`,`turma`) VALUES ('".$_SESSION['nome']."','$turma')");
				
				if($insert){
					 echo "<meta http-equiv='refresh' content='0;url=../mili/question.php?n=1'>";
					// header("Location: question.php?n=1");
					 exit();
					 
				}*/
					
				}}?>

				  </div>
				</div></div>
			

				</div>
				
			
						<div class="col-lg-10 col-lg-offset-1">
			<div class="panel panel-primary" style="margin-left: -10px;">
			  <div class="panel-heading"><h4>RECORDES POR PONTOS</h4></div>
			  <div class="panel-body">
			<table class="table table-striped" style="width: 100%;color: #7D7D7D;">
			<thead>
				  <tr>
					
					<th style="text-align: center;">NOME DO JOGADOR</th>
					<th style="text-align: center;">PONTUAÇÃO DO JOGADOR</th>
					<th style="text-align: center;">TURMA DO JOGADOR</th>
					<th style="text-align: center;">JOGOU AS:</th>
					<th style="text-align: center;">DEMOROU:</th>
				  </tr>
				</thead>
			<tbody>
			<?php
					$select = $mysqli->query("SELECT * FROM `name_score` ORDER BY `name_score`.`score` DESC");
					$row = $select->num_rows;
					if($row) { 
						while($get = $select->fetch_array()) {
                            $cor = "";
                            if ($get["score"] >= 8 && $get["score"] <= 10) {

                                $cor = "success";
                            } 
                           if ($get["score"] >= 6 && $get["score"] <= 7) {

                                $cor = "info";
                            } 
                           if ($get["score"] >= 3 && $get["score"] <= 5) {

                                $cor = "warning";
                            } 
                           if ($get["score"] == 1 || $get["score"] == 2 || $get["score"] == 0) {

                                $cor = "danger";
                            } 

				?>

				<tr class="<?=$cor?>">
				
					<td> <?=$get["name"]?></td>
					<td> <?php 
					 $get["score"];
					If($get["score"] == 1){
						$get["score"] = $get["score"]." Ponto";
						echo $get["score"];
						
					} else {
						$get["score"] = $get["score"]. " Pontos";
						echo $get["score"];
					} ?> 

                    </td>
					<td> <?=$get["turma"]?> </td>
					<td> <?=$get["data"]?> </td>
					<td> <?=$get["tempo"]?> </td>
					
				</tr>
				<?php } } ?>
			
			</tbody>
			
			</table>
			  </div>
			</div>
						
			
			</div>
				
         
            <!--<a href="#about" class="btn btn-dark btn-lg">Find Out More</a>-->
			   
				
        <div class="container">
		
		<div class="left h4" style="color:white">
	
		
            Developed by <a href="http://www.Happycloud.tk">Leonardo Gomes</a>, TGPSI_1 &copy;
			 <br><br>
			 
			  </div>
        </div>
        
        
   
			
        </div>
    </header>

    <!-- About 
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Stylish Portfolio is the perfect theme for your next project!</h2>
                    <p class="lead">This theme features some wonderful photography courtesy of <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a>.</p>
                </div>
            </div>
            <!-- /.row 
        </div>
        <!-- /.container 
    </section>


    <!-- Call to Action 
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-light">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Footer 
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Start Bootstrap</strong>
                    </h4>
                    <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">name@example.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>-->



    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
