<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
    //checka se o score tem erro: set_error_handler

    
    if(!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    if ($_POST) {
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];
        $next = $number+1;
        
        //faz o select 
        $query = "SELECT * FROM questions";
        
        //Obtem o score 
        $results = $mysqli->query($query) or die($mysqli->error._LINE_);
        $total = $results->num_rows;
        
        //obtem a resposta :)

        $query = "SELECT * FROM choices
            WHERE question_number = $number AND is_correct = 1";
        
        //resultado
        $result = $mysqli->query($query) or die($mysqli->$error._LINE_);
        
        //faz o get da coluna
        $row = $result->fetch_assoc();
        
        //mete a resposta certa
        $correct_choice = $row['id'];
        
        //comparaa
        if ($correct_choice == $selected_choice) {
            //se for correta ele adiciona os ++
            $_SESSION['score']++;
        }
        //depois ele rediriciona
        if ($number == $total) {
            header("Location: final.php");
            exit();
        } else {
            header("Location: question.php?n=" .$next);
        }
    
    }