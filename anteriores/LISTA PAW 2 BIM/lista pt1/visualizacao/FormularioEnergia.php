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
        <h1>Calcular energia</h1>
        <form action="../controle/controleEnergia.php" method="get">
            <input type="text" step="any" name="kw" placeholder="Insira os quilowatts consumidos"><br>
            <input type="submit" value="Calcular">
        </form>
        <?php
            if (isset($_GET['valortotal'])) {
                $valortotal = $_GET['valortotal'];
                printf("Total a pagar: R$ %.2f", $valortotal);
            }    
        ?>
    </div>
</body>
</html>
