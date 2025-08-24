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
        <h1>Fahrenheit e Celsius</h1>
        <form action="../controle/ControleTemperatura.php" method="get">
        </form>
        <?php
            if (isset($_GET['dados'])) {
                $msg = explode('|', urldecode($_GET['dados']));
                foreach ($msg as $linha) {
                    echo $linha . "<br>";
                }
            }
        ?>


    </div> 
</body>
</html>
