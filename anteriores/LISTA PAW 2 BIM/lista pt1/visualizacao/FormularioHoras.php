<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas em minutos</title>
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
            background-color: white;
            border-radius: 20px;
            width: 25vw; height: 30vh;
            font-family: Arial;
            text-align: center; 
            color:rgb(245, 135, 113)
        }
        input[name="txthoras"]{
            width: 60px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Converter horas</h1>
        <form action="../controle/controleHoras.php" method="get">
            <input type="number" name="txthoras" placeholder="Digite">
            <input type="submit" value="Calcular">
        </form>
        <?php
        $variaveis = 0;
        if (isset($_GET['valor'])) {
            echo "$_GET[valor] minutos";
        }else if (isset($_GET['resposta'])) {
            echo "<br>$_GET[resposta]";
        }
        ?>
    </div>
    
</body>
</html>

