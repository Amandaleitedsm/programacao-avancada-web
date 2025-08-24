<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliária</title>
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
    </style>
</head>
<body>
    <div class="box">
        <h1>Área e perímetro</h1>
        <form action="../controle/controleTerreno.php" method="get">
            <input type="number" step="any" name="larg" placeholder="Largura"><br>
            <input type="number" step="any" name="comp" placeholder="Comprimento"><br>
            <input type="submit" value="Calcular">
        </form>
        <?php
        if (isset($_GET['area'])) {
            $area = $_GET['area'];
            $p = $_GET['p'];
            printf("Área terreno: %.2f<br>",$area) ;
            printf("Perímetro terreno: %.2f",$p) ;
        }
        ?>
    </div>
    
</body>
</html>
