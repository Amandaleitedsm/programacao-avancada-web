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
            padding-bottom: 15px;
            background-color: white;
            border-radius: 20px;
            width: 25vw; height: fit-content;
            font-family: Arial;
            text-align: center; 
            color:rgb(245, 135, 113)
        }
        input[type="number"]{
            width: 140px;
            margin-bottom: 5px;
        }
        input[type="submit"]{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Calcular media </h1>
        <form action="../controle/controleCombustivel.php" method="get">
            <input type="text" step="any" name="km" placeholder="Insira os quilometros"><br>
            <input type="text" step="any" name="comb" placeholder="Insira o combustivel"><br>
            <input type="submit" value="Calcular">
        </form>
        <?php
            if(isset($_GET['media'])) {
                $media = $_GET['media'];
                printf("Média: %.2f", $media);
            }
        ?>
    </div>
</body>
</html>
