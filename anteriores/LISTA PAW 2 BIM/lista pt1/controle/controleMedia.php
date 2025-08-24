
        <?php
        require_once "../modelo/Media.php";
        if (isset($_GET['nota1'])) {
            if (isset($_GET['nota2'])) {
                if (is_numeric($_GET['nota1'])) {
                    if (is_numeric($_GET['nota1'])) {
                        $nota1 = $_GET['nota1'];
                        $nota2 = $_GET['nota2'];
                        $objetoHoras = new Media();
                        $objetoHoras->setNota1($nota1);
                        $objetoHoras->setNota2($nota2);
                        $media = $objetoHoras->calcularMedia();
                        $variaveis = "?media=$media";
                        header("Location: ../visualizacao/FormularioMedia.php$variaveis");
                        exit();
                    }
                }
            }
        }
        ?>
   
