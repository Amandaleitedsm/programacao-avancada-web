
        <?php
            require_once "../modelo/Temperatura.php";
            $objetoTemperatura = new Temperatura();
            $resultados = array();
                for ($i = 40; $i <= 70; $i++){
                    $objetoTemperatura->setF($i);
                    $C = $objetoTemperatura->calcularCelsius();
                    $resultados[] = sprintf("%.0f°F = %.2f°C", $i, $C);
                }
            $mensagem = urlencode(implode('|', $resultados));
            header("Location: ../visualizacao/FormularioTemperatura.php?dados=$mensagem");
            exit();
        ?>
