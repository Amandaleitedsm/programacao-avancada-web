
        <?php
        require_once "../modelo/Horas.php";
        if (isset($_GET['txthoras'])) {
            if (is_numeric($_GET['txthoras'])) {
                $userhoras = $_GET['txthoras'];
                $objetoHoras = new Horas();
                $objetoHoras->setHoras($userhoras);
                $minutos = $objetoHoras->calcularMinutos();
                $variaveis = "?valor=$minutos";
                header("Location: ../visualizacao/FormularioHoras.php$variaveis");
                exit();

            }
        }else{
            $variaveis = "?resposta = 'Não foi fornecida uma hora'";
            header("Location: /lista%20pt1/visualizacao/FormularioHoras.php$variaveis");
            exit();
        }