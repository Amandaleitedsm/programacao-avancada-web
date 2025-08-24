
        <?php
        require_once "../modelo/Idade.php";
        if (isset($_GET['txtidade'])) {
            if (is_numeric($_GET['txtidade'])) {
                $idade = $_GET['txtidade'];
                $objetoIdade = new Idade();
                $objetoIdade->setIdade($idade);
                $dias = $objetoIdade->dias();
                $horas = $objetoIdade->horas();
                $minutos = $objetoIdade->minutos();
                $segundos = $objetoIdade->segundos();
                $variaveis = "?dias=$dias&horas=$horas&minutos=$minutos&segundos=$segundos";
                header("Location: ../visualizacao/FormularioIdade.php$variaveis");
            }
        }
        ?>
   
