
        <?php
            require_once "../modelo/Energia.php";
            if (isset($_GET['kw'])) {
                if (is_numeric($_GET['kw'])) {
                    $kw = $_GET['kw'];
                    $objetoEnergia = new Energia();
                    $objetoEnergia->setKw($kw);
                    $valortotal = $objetoEnergia->calcularTotal();
                    $variaveis = "?valortotal=$valortotal";
                    header("Location: ../visualizacao/FormularioEnergia.php$variaveis");
                    exit();
                }
            }      
        ?>
