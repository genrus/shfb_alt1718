<!DOCTYPE html>

<html lang="it">
    <head>
        <?php 
            include "inc/mysql.class.php";
            $db= new MySQL();
        ?>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        
        include 'structure/header.php';
        
        if(isset($_GET["page"]))
        {
            if(is_numeric($_GET["page"]))
            {
                $db->Query("SELECT * FROM menu WHERE idMenu='{$_GET['page']}' AND stato='1'");
                $righe = $db->Row();
                switch ($_GET['page']) {
                    case $righe->idMenu:
                        include "pages/".$righe->nome;
                    break;
                    default:
                        include "pages/default.php";
                    break;
                }
            }
            else
                include "pages/default.php";
        }else{
            include "pages/default.php";
        }
        
        
        ?>
    </body>
</html>
