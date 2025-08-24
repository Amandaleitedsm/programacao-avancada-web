<?php
require_once "api_2bim/src/routes/Router.php";
require_once "api_2bim/src/utils/Logger.php";
require_once "api_2bim/src/http/Response.php";

require_once "api_2bim/src/middlewares/AlunosMiddleware.php";
require_once "api_2bim/src/middlewares/CursosMiddleware.php";
require_once "api_2bim/src/middlewares/TurmasMiddleware.php";

require_once "api_2bim/src/DAO/alunosDAO.php";
require_once "api_2bim/src/DAO/cursosDAO.php";
require_once "api_2bim/src/DAO/turmasDAO.php";

require_once "api_2bim/src/controller/alunosControl.php";
require_once "api_2bim/src/controller/cursosControl.php";
require_once "api_2bim/src/controller/turmasControl.php";

class Roteador {
    public function __construct(Router $router = null)
    {
        $this->router = $router ?? new Router();
        $this->setUpHeaders();
        $this->setUpAlunos();
        $this->setUpCursos();
        $this->setUpTurmas();
        $this->setUp404Route();
    }
    private function setUpHeaders(): void {
        // Set up CORS headers
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    private function setUpAlunos(): void {
        $this->router->get(pattern: '/alunos', fn: function(): never {
            try{
                
                (new alunosControl())->index();
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de alunos.");
            }
            
            exit();
        });
        $this->router->get(pattern: '/alunos/(\d+)', fn: function($idAluno): never{
            try{
                (new AlunosMiddleware())
                    ->IsValidID(idAluno: (int)$idAluno);

                (new alunosControl())
                    ->show(idAluno: (int)$idAluno);

                echo "Aluno ID: " . $idAluno;
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de alunos.");
            }
            
            exit();
        });
        $this->router->post(pattern: '/alunos', fn: function(): never {
            try{
                $requestBody = file_get_contents(filename: 'php://input');
                $AlunosMiddleware = new AlunosMiddleware();
                $objStd = $AlunosMiddleware->StringJsonToStdClass(requestBody: $requestBody);
            
                $AlunosMiddleware
                    ->isValidNomeAluno($objStd->alunos->nome)
                    ->hasNotAlunoByName($objStd->alunos->nome);

                $alunosControl = new alunosControl();
                $alunosControl->store(stdAluno: $objStd);
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de alunos.");
            }
            
            exit();
        });
        $this->router->put(pattern: '/alunos/(\d+)', fn: function($idAluno): never {
            try{
                $requestBody = file_get_contents(filename: 'php://input');
                $AlunosMiddleware = new AlunosMiddleware();
                $stdAluno = $AlunosMiddleware->StringJsonToStdClass(requestBody: $requestBody);
                $AlunosMiddleware
                    ->IsValidID(idAluno: (int)$idAluno)
                    ->isValidNomeAluno(nomeAluno: $stdAluno->alunos->nome)
                    ->hasNotAlunoByName(nomeAluno: $stdAluno->alunos->nome);
                $stdAluno->alunos->idAluno = (int)$idAluno;
                $alunosControl = new alunosControl();
                $alunosControl->edit(stdAluno: $stdAluno);
                
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na atualização de alunos.");
            }
            
            exit();
        });
        $this->router->delete(pattern: '/alunos/(\d+)', fn: function($idAluno): never {
            try{
                $alunosMiddleware = new AlunosMiddleware();  
                $alunosMiddleware->IsValidID(idAluno: $idAluno); 
                $alunosControl = new alunosControl();
                $alunosControl->destroy(idAluno: (int)$idAluno);
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na deleção de alunos.");
            }
            
            exit();
        });


    }


    private function setUpCursos(): void {
        $this->router->get(pattern: '/cursos', fn: function(): never {
            try{
                (new cursosControl())->index();
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de cursos.");
            }
            
            exit();
        });
        $this->router->get(pattern: '/cursos/(\d+)', fn: function($idCurso): never {
            try{
                (new CursosMiddleware())
                    ->IsValidID(idCurso: (int)$idCurso);

                (new cursosControl())
                    ->show(idCurso: (int)$idCurso);

                echo "Curso ID: " . $idCurso;
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de cursos.");
            }
            
            exit();
        });
        $this->router->post(pattern: '/cursos', fn: function(): never {
            try{
                $requestBody = file_get_contents(filename: 'php://input');
                $cursosMiddleware = new CursosMiddleware();
                $objStd = $cursosMiddleware->StringJsonToStdClass(requestBody: $requestBody);
            
                $cursosMiddleware
                    ->isValidNomeCurso($objStd->cursos->nomeCurso)
                    ->hasNotCursoByName($objStd->cursos->nomeCurso);

                $cursosControl = new cursosControl();
                $cursosControl->store(stdCurso: $objStd);
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de cursos.");
            }
            
            exit();
        });
        $this->router->put(pattern: '/cursos/(\d+)', fn: function($idCurso): never {
            try{
                $requestBody = file_get_contents(filename: 'php://input');
                $cursosMiddleware = new CursosMiddleware();
                $stdCurso = $cursosMiddleware->StringJsonToStdClass(requestBody: $requestBody);
                $cursosMiddleware
                    ->IsValidID(idCurso: (int)$idCurso)
                    ->hasNotcursoByName(nomeCurso: $stdCurso->cursos->nomeCurso);
                $stdCurso->cursos->idCurso = (int)$idCurso;
                $cursosControl = new cursosControl();
                $cursosControl->edit(stdCurso: $stdCurso);
                
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na atualização de cursos.");
            }
            
            exit();
        });
        $this->router->delete(pattern: '/cursos/(\d+)', fn: function($idCurso): never {
            try {
                $cursosMiddleware = new CursosMiddleware();  
                $cursosMiddleware->IsValidID(idCurso: $idCurso); 
                $cursosControl = new cursosControl();
                $cursosControl->destroy(idCurso: (int)$idCurso);
                
            } catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na deleção de cursos.");
            }
            
            exit();
        });
    }


    private function setUpTurmas(): void {
        $this->router->get(pattern: '/turmas', fn: function(): never {
            try{
                (new turmasControl())->index();
            }catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de turmas.");
            }
            
            exit();
        });
        $this->router->get(pattern: '/turmas/(\d+)', fn: function($idTurma): never {
            try {
                (new TurmasMiddleware())
                    ->IsValidID(idTurma: (int)$idTurma);

                (new turmasControl())
                    ->show(idTurma: (int)$idTurma);

                echo "Turma ID: " . $idTurma;
            } catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de turmas.");
            }
            
            exit();
        });
        $this->router->post(pattern: '/turmas', fn: function(): never {
            try {
                $requestBody = file_get_contents(filename: 'php://input');
                $turmasMiddleware = new TurmasMiddleware();
                $objStd = $turmasMiddleware->StringJsonToStdClass(requestBody: $requestBody);
            
                $turmasMiddleware
                    ->isValidLetra($objStd->turmas->letra)
                    ->hasNotTurmaByLetra($objStd->turmas->letra);

                $turmasControl = new turmasControl();
                $turmasControl->store(stdTurma: $objStd);
                echo "Dados da turma recebidos: " . $requestBody;
            } catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na seleção de turmas.");
            }
            
            exit();
        });
        $this->router->put(pattern: '/turmas/(\d+)', fn: function($idTurma): never {
            try {
                $requestBody = file_get_contents(filename: 'php://input');
                $turmasMiddleware = new TurmasMiddleware();
                $stdTurma = $turmasMiddleware->StringJsonToStdClass(requestBody: $requestBody);
                $turmasMiddleware
                    ->IsValidID(idTurma: (int)$idTurma)
                    ->isValidLetra(letra: $stdTurma->turmas->letra)
                    ->hasNotTurmaByLetra(letra: $stdTurma->turmas->letra);
                $stdTurma->turmas->idTurma = (int)$idTurma;
                $turmasControl = new turmasControl();
                $turmasControl->edit(stdTurma: $stdTurma);
            } catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na atualização de turmas.");
            }
            
            exit();
        });
        $this->router->delete(pattern: '/turmas/(\d+)', fn: function($idTurma): never {
            try {
                $turmasMiddleware = new TurmasMiddleware();  
                $turmasMiddleware->IsValidID(idTurma: $idTurma); 
                $turmasControl = new turmasControl();
                $turmasControl->destroy(idTurma: (int)$idTurma);
            } catch (Throwable $exception) {
                $this->handleError(exception: $exception, message: "Erro na deleção de turmas.");
            }
            
            exit();
        });
    }


    private function handleError(Throwable $exception, $message): void {
        // Log the error
        Logger::log(exception: $exception);
        (new Response(
            success: false,
            message: $message,
            error: [
                'problemCode' => $exception->getCode(),
                'message' => $exception->getMessage(),
            ],
            httpCode: 500
        ))->send();
        exit();
    }

    private function setUp404Route(): void {
        $this->router->set404(match_fn: function(): void {
            (new Response(
                success: false,
                message: "Rota não encontrada.",
                error: [
                    'problemCode' => 'routing_error',
                    'message' => "A rota solicitada não foi mapeada."
                ],
                httpCode: 404
            ))->send();
            exit();
        });
    }


    public function start(): void {
        // Start the router
            $this->router->run();
    }
}
?>