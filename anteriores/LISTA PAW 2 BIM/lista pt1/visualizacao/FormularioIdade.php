<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de idade</title>
    <style>
        body{
            background-color: #FAB7AA;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            height: 100vh;
        }
        .box{
            padding-top: 15px;
            padding-bottom: 20px;
            background-color: white;
            border-radius: 20px;
            width: 25vw; height: fit-content;
            font-family: Arial;
            justify-items: center;
            color:rgb(245, 135, 113);
            text-align: center;
        }
        input[name="txtidade"]{
            width: 60px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Converter idade</h1>
        <form action="../controle/controleIdade.php" method="get">
            <input type="number" name="txtidade" placeholder="Digite">
            <input type="submit" value="Calcular">
        </form>
        <?php
        if (isset($_GET['dias'])) {
            $dias = $_GET['dias'];
            $horas = $_GET['horas'];
            $minutos = $_GET['minutos'];
            $segundos = $_GET['segundos'];
            echo "<p>$dias dias</p>";
            echo "<p>$horas horas</p>";
            echo "<p>$minutos minutos</p>";
            echo "<p>$segundos segundos</p>";
        }
        ?>
    </div>
    
</body>
</html>
