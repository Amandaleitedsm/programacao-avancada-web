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
        <form action="../controle/controleSalario.php" method="get">
            <input type="number" step="any" name="sb" placeholder="Insira o salário bruto"><br>
            <input type="number" step="any" name="qtd" placeholder="Insira a qtd de horas"><br>
            <input type="number" step="any" name="v" placeholder="Insira o valor da hora"><br>
            <input type="submit" value="Calcular">
        </form>
        <?php
        if (isset($_GET['sl'])) {
            $sl = $_GET['sl'];
            printf("Salário líquido: R$ %.2f", $sl);
        }
        ?>
    </div>
</body>
</html>
