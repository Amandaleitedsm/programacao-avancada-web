<?php
require_once 'Router.php';
require_once 'Controle/ControleHoras.php';
require_once 'Controle/ControleIdade.php';
require_once 'Controle/ControleMedia.php';
require_once 'Controle/ControleTerreno.php';
require_once 'Controle/ControleTemperatura.php';
require_once 'Controle/ControleTrapezio.php';
require_once 'Controle/ControleSalario.php';
require_once 'Controle/ControleEnergia.php';
require_once 'Controle/ControleCombustivel.php';
require_once 'Controle/ControleClassificacao.php';
require_once 'Controle/ControleBhaskara.php';

class Roteador{
    private $router;

    public function iniciarRoteamento(){
        $this->router = new Router();

        $this->router->get('/horas/minutos/(\d+)', function($horas){
            header('Content-Type: application/json');
            $controle = new ControleHoras();
            $controle->controleCalcularMinutos($horas);
        });

        $this->router->get('/horas/segundos/(\d+)', function($horas){
            header('Content-Type: application/json');
            $controle = new ControleHoras();
            $controle->controleCalcularSegundos($horas);
        });

        $this->router->get('/horas/(\d+)', function($horas){
            header('Content-Type: application/json');
            $controle = new ControleHoras();
            $controle->controleCalcularTudo($horas);
        });

        $this->router->get('/idades/dias/(\d+)', function($idade){
            header('Content-Type: application/json');
            $controle = new ControleIdade();
            $controle->controleCalcularDias($idade);
        });

        $this->router->get('/idades/horas/(\d+)', function($idade){
            header('Content-Type: application/json');
            $controle = new ControleIdade();
            $controle->controleCalcularHoras($idade);
        });

        $this->router->get('/idades/minutos/(\d+)', function($idade){
            header('Content-Type: application/json');
            $controle = new ControleIdade();
            $controle->controleCalcularMinutos($idade);
        });

        $this->router->get('/idades/segundos/(\d+)', function($idade){
            header('Content-Type: application/json');
            $controle = new ControleIdade();
            $controle->controleCalcularSegundos($idade);
        });

        $this->router->get('/idades/(\d+)', function($idade){
            header('Content-Type: application/json');
            $controle = new ControleIdade();
            $controle->controleCalcularTudo($idade);
        });

        $this->router->get('/alunos/notas/([0-9.]+)/([0-9.]+)', function($n1, $n2){
            header('Content-Type: application/json');
            $controle = new ControleMedia();
            $controle->controleCalcularMedia($n1, $n2);
        });

        $this->router->get('/alunos/notas/([0-9.]+)', function($n1){
            header('Content-Type: application/json');
            $controle = new ControleMedia();
            $controle->controleNota($n1);
        });

        $this->router->get('/terrenos/([0-9.]+)/([0-9.]+)', function($base, $altura){
            header('Content-Type: application/json');
            $controle = new ControleTerreno();
            $controle->controleCalcularArea($base, $altura);
        });

        $this->router->post('/terrenos/', function(){
            header('Content-Type: application/json');
            $stringJson = file_get_contents('php://input');
            $objJson = json_decode($stringJson);

            if (json_last_error() !== JSON_ERROR_NONE) {
                http_response_code(400); 
                $erro = new stdClass();
                $erro->status = false;
                $erro->erro = 'JSON inválido.';

                echo json_encode($erro);
                exit(); // Encerra a execução da função
            }

            $base = $objJson->base;
            $altura = $objJson->altura;

            $controle = new ControleTerreno();
            $controle->controleCalcularArea($base, $altura);
        });

        $this->router->get('/temperaturas/([0-9.]+)', function($temperatura){
            header('Content-Type: application/json');
            $controle = new ControleTemperatura();
            $controle->controleCalcularCelsius($temperatura);
        });

        $this->router->get('/temperaturas/([0-9.]+)/([0-9.]+)', function($n1, $n2){
            header('Content-Type: application/json');
            $controle = new ControleTemperatura();
            $controle->controleCelsiusIntervalo($n1, $n2);
        });

        $this->router->get('/trapezios/([0-9.]+)/([0-9.]+)/([0-9.]+)', function($baseMaior, $baseMenor, $altura){
            header('Content-Type: application/json');
            $controle = new ControleTrapezio();
            $controle->controleCalcularArea($baseMaior, $baseMenor, $altura);
        });

        $this->router->post('/funcionarios/salarios', function(){
            header('Content-Type: application/json');
            $stringJson = file_get_contents('php://input');
            $objJson = json_decode($stringJson);

            if (json_last_error() !== JSON_ERROR_NONE) {
                http_response_code(400); 
                $erro = new stdClass();
                $erro->status = false;
                $erro->erro = 'JSON inválido.';

                echo json_encode($erro);
                exit(); // Encerra a execução da função
            }

            $salario = $objJson->salarioBruto;
            $valorhoras = $objJson->valorHoraExtra;
            $horasx = $objJson->totalHorasExtras;

            $controle = new ControleSalario();
            $controle->controleCalcularSalario($salario, $horasx, $valorhoras);
        });

        $this->router->get('/quilowatts/([0-9.]+)', function($kw){
            header('Content-Type: application/json');
            $controle = new ControleEnergia();
            $controle->controleCalcularTotal($kw);
        });

        $this->router->post('/combustiveis/medias', function(){
            header('Content-Type: application/json');
            $stringJson = file_get_contents('php://input');
            $objJson = json_decode($stringJson);

            if (json_last_error() !== JSON_ERROR_NONE) {
                http_response_code(400); 
                $erro = new stdClass();
                $erro->status = false;
                $erro->erro = 'JSON inválido.';

                echo json_encode($erro);
                exit(); // Encerra a execução da função
            }

            $km = $objJson->kmRodados;
            $combustivel = $objJson->litrosCombustivel;

            $controle = new ControleCombustivel();
            $controle->controleCalcularMedia($combustivel, $km);
        });

        $this->router->get('/classificacoes/nadadores/(\d+)', function($idade){
            header('Content-Type: application/json');
            $controle = new ControleClassificacao();
            $controle->controleClassificar($idade);
        });
        
        $this->router->get('/bhaskaras/([0-9.]+)/([0-9.]+)/([0-9.]+)', function($a, $b, $c){
            header('Content-Type: application/json');
            $controle = new ControleBhaskara();
            $controle->controleBhaskara($a, $b, $c);
        });
        
        $this->router->run();
    }
}
// Cria uma instância da classe Roteador
$objetoRoteador = new Roteador();

// Inicia o roteamento chamando o método público
$objetoRoteador->iniciarRoteamento();

?>