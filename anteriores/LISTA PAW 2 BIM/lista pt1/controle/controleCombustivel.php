
        <?php
            require_once "../modelo/Combustivel.php";
            if (isset($_GET['km'])) {
                if (isset($_GET['comb'])) {
                    if (is_numeric($_GET['comb'])) {
                        if (is_numeric($_GET['km'])) {
                            $km = $_GET['km'];
                            $comb = $_GET['comb'];
                            $objetoCombustivel = new Combustivel();
                            $objetoCombustivel->setCombustivel($comb);
                            $objetoCombustivel->setKm($km);
                            $media = $objetoCombustivel->calcularMedia();
                            $variaveis = "?media=$media";
                            header("Location: ../visualizacao/FormularioCombustivel.php$variaveis");
                            exit();
                        }
                    }
                }
            }
        ?>
