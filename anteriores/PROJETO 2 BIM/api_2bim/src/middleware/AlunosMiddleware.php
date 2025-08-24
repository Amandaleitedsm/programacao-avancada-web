<?php
require_once 'api_2bim/src/http/Response.php';
    class AlunosMiddleware 
    {
        public function IsValidID($idAluno): self
        {
            if(!isset($idAluno))
            {
               (new Response(
                success: false,
                message: "ID do aluno não foi informado.",
                error:[
                    "code" => 'aluno_validation_error',
                    "message" => 'O ID do aluno deve ser informado para a operação.'
                ],
                httpCode: 400
            ))->send();
            exit();
            }else if(!is_numeric($idAluno) || ((int)$idAluno) <= 0)
            {
                (new Response(
                    success: false,
                    message: "ID do aluno inválido.",
                    error:[
                        "code" => 'aluno_validation_error',
                        "message" => 'O ID do aluno deve ser um número positivo.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }else{
               return $this; 
            } 
        }
    }
?>