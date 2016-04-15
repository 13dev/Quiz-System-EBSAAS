<?php
 include '../database.php'; 
 
 include("dbconfig.php");
if(!isset($_SESSION['login_user']))
	{
	header("Location: index.php");
	}


?>

<?php
    if (isset($_POST['submit'])) {
        //post variaveiss
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];
        //escolhe no arrayy
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];
        
        //faz query tem erros aquio !!!!
        $query = "INSERT INTO questions (question_number, text)
                    VALUES ('$question_number', '$question_text')";
        
        //faz o exec dele
        $insert_row = $mysqli->query($query) or die($mysqli->error._LINE_);
    
        
        //vvalidaçãoo
        if (isset($insert_row)) {
            foreach($choices as $choice => $value) {
                if($value != '') {
                    if($correct_choice == $choice) {
                        $is_correct = 1; 
                    } else {
                        $is_correct = 0;
                    }

                    $query = "INSERT INTO choices (question_number, is_correct, text)
                                VALUES ('$question_number', '$is_correct', '$value')";
                    

                    $insert_row = $mysqli->query($query) or die($mysqli->error._LINE_);
                    
                    if ($insert_row) {
                        continue;
                    } else {
                        die('Error: ('.$mysqli->errno .') ' . $mysqli->error);
                        
                    }
                }
            }
            
            $msg = 'Adicionado';
        }
    }
    $query = "SELECT * FROM questions";

    $questions = $mysqli->query($query) or die($mysqli->error._LINE_);
    $total = $questions->num_rows;
    $next = $total+1;
    


?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/styles.css" type="text/css" />
</head>


<body>
   <hr>
    
    <main>
        <div class="container">
		
            <?php
                if (isset($msg)) {
                    echo '<p>' . $msg . '</p>';
                } 
            ?>
            <form method="post" action="add.php">
                <p>
                    <label>Numero da Questão</label> 
                    <input type="number" value="<?php echo $next; ?>" name="question_number" />
                </p>
                <p>
                    <label>Pergunta:</label> 
                    <input type="text" name="question_text" />
                </p>
                <p>
                    <label>Escolha #1:</label> 
                    <input type="text" name="choice1" />
                </p>
                <p>
                    <label>Escolha #2:</label> 
                    <input type="text" name="choice2" />
                </p>
                <p>
                    <label>Escolha #3:</label> 
                    <input type="text" name="choice3" />
                </p>
                <p>
                    <label>Escolha #4:</label> 
                    <input type="text" name="choice4" />
                </p>
                <p>
                    <label>Escolha #5:</label> 
                    <input type="text" name="choice5" />
                </p>
                <p>
                    <label>Escolha correta:</label> 
                    <input type="number" name="correct_choice" />
                </p>
                <p>
                    
                    <input type="submit" name="submit" value="Submit" />
                </p>
            </form>
        </div>
    </main>
    
    
    <footer>
        <div class="container">
           Copyright &copy; 2016, Ultra - Configs
        </div>
        
        
        
    </footer>

    
    
</body>

</html>
