
        <?php
        require_once "../modelo/Salario.php";
        if (isset($_GET['sb'])) {
            if (isset($_GET['qtd'])) {
                if (isset($_GET['v'])) {
                    if (is_numeric($_GET['qtd'])) {
                        if (is_numeric($_GET['sb'])) {
                            if (is_numeric($_GET['v'])) {
                                $sb = $_GET['sb'];
                                $qtd = $_GET['qtd'];
                                $v = $_GET['v'];
                                $objetoSalario = new Salario();
                                $objetoSalario->setSalario($sb);
                                $objetoSalario->setHorasx($qtd);
                                $objetoSalario->setValorhoras($v);
                                $sl = $objetoSalario->calcularSalario();
                                $variaveis = "?sl=$sl";
                                header("Location: ../visualizacao/FormularioSalario.php$variaveis");
                                exit();
                            }
                        }
                    }
                }
            }
        }
        ?>