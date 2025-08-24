
        <?php
        require_once "../modelo/Terreno.php";
        if (isset($_GET['larg'])) {
            if (isset($_GET['comp'])) {
                if (is_numeric($_GET['larg'])) {
                    if (is_numeric($_GET['larg'])) {
                        $larg = $_GET['larg'];
                        $comp = $_GET['comp'];
                        $objetoTerreno = new Terreno();
                        $objetoTerreno->setComp($comp);
                        $objetoTerreno->setLarg($larg);
                        $area = $objetoTerreno->area();
                        $p = $objetoTerreno->perimetro();
                        $variaveis = "?area=$area&p=$p";
                        header("Location: ../visualizacao/FormularioTerreno.php$variaveis");
                    }
                }
            }
        }
        ?>
