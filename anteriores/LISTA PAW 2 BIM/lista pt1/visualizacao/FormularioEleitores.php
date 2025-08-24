<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            padding: 15px;
            background-color: white;
            border-radius: 20px;
            width: fit-content; height: fit-content;
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
        label{
            justify-content: left;
            color: black;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Porcentagem eleição</h1>
        <form action="../controle/controleEleitores.php" method="get">
            <label for="eleitores">Insira o total de eleitores</label><br>
            <input type="number" name="eleitores"><br>
            <label for="votobranco">Insira os votos em branco</label><br>
            <input type="number" name="votobranco"><br>
            <label for="votonulo">Insira os votos nulos</label><br>
            <input type="number" name="votonulo"><br>
            <label for="votovalido">Insira os votos válidos</label><br>
            <input type="number" name="votovalido"><br>
            <input type="submit" value="Calcular">
        </form>
        <?php
            if (isset($_GET['valido'],$_GET['nulo'],$_GET['branco'])) {
                $vv = $_GET['valido'];
                $vn = $_GET['nulo'];
                $vb = $_GET['branco'];
                echo "<p>Porcentagem votos válidos: $vv%</p>";
                echo "<p>Porcentagem votos nulos: $vn%</p>";
                echo "<p>Porcentagem votos em branco: $vb%</p>";
            }
        ?>
    </div> 
</body>
</html>
