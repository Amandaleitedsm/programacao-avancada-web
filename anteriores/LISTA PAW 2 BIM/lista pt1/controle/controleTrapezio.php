
        <?php
        require_once "../modelo/Trapezio.php";
        if (isset($_GET['BaseM'])) {
            if (isset($_GET['base'])) {
                if (isset($_GET['altura'])) {
                    if (is_numeric($_GET['base'])) {
                        if (is_numeric($_GET['BaseM'])) {
                            if (is_numeric($_GET['altura'])) {
                                $B = $_GET['BaseM'];
                                $b = $_GET['base'];
                                $h = $_GET['altura'];
                                $objetoTrapezio = new Trapezio();
                                $objetoTrapezio->setBM($B);
                                $objetoTrapezio->setb($b);
                                $objetoTrapezio->seth($h);
                                $area = $objetoTrapezio->areaTrapezio();
                                $variaveis = "?area=$area";
                                header("Location: ../visualizacao/FormularioTrapezio.php$variaveis");
                                exit();
                            }
                        }
                    }
                }
            }
        }
        ?>
