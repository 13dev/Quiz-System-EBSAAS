<?php session_start(); ?>
<?php include 'database.php'; ?>
<?php
    //ele aqui seta o n da questao
    $number = (int) $_GET['n'];
    
    //get total questooess
    $query = "SELECT * FROM questions";
        
    //obtem o resultado e apresenta erro se tiver
    $results = $mysqli->query($query) or die($mysqli->error._LINE_);
    $total = $results->num_rows;

    
    //a opção
    $query = "SELECT * FROM questions
                WHERE question_number = $number";
    //obtem o resultado da query feita
    $result = $mysqli->query($query) or die($mysqli->error._LINE_);
    
    $question = $result->fetch_assoc();
    


    //obtem as escolhas da db
    $query = "SELECT * FROM choices
                WHERE question_number = $number";
    //resultadoo 
    $choices = $mysqli->query($query) or die($mysqli->error._LINE_);
	
	
	if (empty($_SESSION['nome']) or empty($_SESSION['turma']) or is_null($_SESSION['nome']) or is_null($_SESSION['turma'])){
		header("Location: index.php");
		session_destroy();
		exit();
	}
    
    


?>
<!DOCTYPE html>

<html>

<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ebsaas - Quiz</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
	<link href="css/radio.css" rel="stylesheet">
	
	
	    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	 <script src="js/countup.js"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>


<body>
    <script>
	window.onload = function() {
	var options = {
  useEasing : false, 
  useGrouping : true, 
  separator : ',', 
  decimal : '.', 
  prefix : '', 
  suffix : '' 
};
var demo = new CountUp("myTargetElement", 0, 1000, 1, 1000, options);
demo.start();
	}
	

	</script>

				<?php
				$erro = null;
			if(isset($_POST['sub'])){
				if(!isset($_POST['choice'])) {
				$erro = "Escolha uma Opção";
				}
			}
			
			?>		 
    <header id="top" class="header">

        <div class="text-vertical-center">
		<h1>Questionario</h1><br><br>
		
		
		<div class="row" style=" margin-right: 0px;">
		 
		   <div class="col-md-10 col-md-offset-1">
		   <div class="panel panel-primary">
				  <div class="panel-heading">Quiz</div>
				  <div class="panel-body">
            <div class="current"><h3><span class="label label-success">
Questão <strong> <?php echo $question['question_number']; ?></strong> De <strong><?php echo $total; ?></strong></span></h3></div>
			<h1 class="jumbo" id="myTargetElement">0</h1>
            <p class="question">
              <h2><?php echo $question['text']; ?></h2>
            </p>
			<div class="row centered">
			<div class="col-md-12" style="/*text-align: start;*/">
            <form method="post" action="process.php" id="cf">

                <ul class="choices" style="list-style-type: none;font-size: 22px;">
                   	<div class="checkbox checkbox-default"> 
					<?php while ($row = $choices->fetch_assoc()) : ?>
					
					<input type="radio" class="ola" name="choice" id="<?php echo "radio".$row['id']; ?>" value="<?php echo $row['id']; ?>" required='required' />
					<label for="<?php echo "radio".$row['id']; ?>"><?php echo $row['text']; ?></label><br>
				
                    <?php endwhile; ?>
					</div>
					<input type="radio" name="choice" style="opacity: 0; display:none;" checked>
										


                </ul>
				</div>
				</div>

				
               <h1> <input type="submit" class="btn btn-primary btn-large" value="Enviar" style="width:300px;" onclick="$.get('question.php?' + $('#cf').serialize())" name="sub" id="ola" /></h1>
                <input type="hidden" name="number" value="<?php echo $number; ?>" />
				
            </form>



	</div>
	</div>
	</div>
	</div>
	</div>
	</header>
	
	

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
				<script>
$(document).ready(function(){
  $('#ola').click(function() {
    if (!$("input[class='ola']:checked").val()) {
       alert('Escolhe uma Opção!');
        return false;
    }
    else {

    }
  });
});	
			</script>

    
    
</body>

</html>
