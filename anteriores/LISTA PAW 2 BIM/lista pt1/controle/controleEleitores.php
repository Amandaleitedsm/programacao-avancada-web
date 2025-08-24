
        <?php
            require_once "../modelo/Eleitores.php";
            if (isset($_GET['eleitores'],$_GET['votonulo'],$_GET['votovalido'],$_GET['votobranco'])) {
                if (
                    is_numeric($_GET['eleitores']) &&
                    is_numeric($_GET['votonulo']) &&
                    is_numeric($_GET['votovalido']) &&
                    is_numeric($_GET['votobranco'])
                ) {
                    $el = $_GET['eleitores'];
                    $valido = $_GET['votovalido'];
                    $nulo = $_GET['votonulo'];
                    $branco = $_GET['votobranco'];
                    $objetoEleitores = new Eleitores();
                    $objetoEleitores->setValor($el);
                    $objetoEleitores->setVotos($valido);
                    $vv = $objetoEleitores->porcentagem();
                    $objetoEleitores->setVotos($nulo);
                    $vn = $objetoEleitores->porcentagem();
                    $objetoEleitores->setVotos($branco);
                    $vb = $objetoEleitores->porcentagem();
                    $variaveis = "?valido=$vv&nulo=$vn&branco=$vb";
                    header("Location: ../visualizacao/FormularioEleitores.php$variaveis");
                }
            }
        ?>