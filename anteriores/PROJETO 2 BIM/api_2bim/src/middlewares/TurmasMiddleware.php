<?php
require_once 'api_2bim/src/http/Response.php';
require_once 'api_2bim/src/DAO/turmasDAO.php';
    class TurmasMiddleware 
    {
        public function stringJsonToStdClass($requestBody): stdClass{
            $stdTurma = json_decode(json: $requestBody);
            if (json_last_error() !== JSON_ERROR_NONE){
                (new Response(
                    success: false,
                    message: "Turma inválida",
                    error:[
                        "code" => 'validation_error',
                        "message" => 'Json inválido.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }
            else if (!isset($stdTurma->turmas)){
                (new Response(
                    success: false,
                    message: "Turma inválida",
                    error:[
                        "code" => 'validation_error',
                        "message" => 'Não foi enviado o objeto Turmas.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }
            else if (!isset($stdTurma->turmas->anoTurma)){
                (new Response(
                    success: false,
                    message: "Turma inválida",
                    error:[
                        "code" => 'validation_error',
                        "message" => 'Não foi enviado o ano de uma Turma.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }
            else if (!isset($stdTurma->turmas->letra)){
                (new Response(
                    success: false,
                    message: "Turma inválida",
                    error:[
                        "code" => 'validation_error',
                        "message" => 'Não foi enviado a letra de uma Turma.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }
            else if (!isset($stdTurma->turmas->idCurso)){
                (new Response(
                    success: false,
                    message: "Turma inválida",
                    error:[
                        "code" => 'validation_error',
                        "message" => 'Não foi enviado o ID do curso de uma Turma.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }    

            return $stdTurma;
        }
        public function isValidLetra($letra): self
        {
            if(!isset($letra))
            {
                (new Response(
                    success: false,
                    message: "Letra da Turma não foi informada.",
                    error:[
                        "code" => 'Turma_validation_error',
                        "message" => 'A letra da Turma deve ser informada para a operação.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }else if(!is_string($letra) || strlen($letra) > 1)
            {
                (new Response(
                    success: false,
                    message: "Letra da Turma inválida.",
                    error:[
                        "code" => 'Turma_validation_error',
                        "message" => 'A letra da Turma deve ser uma string de um único caractere.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
            }
               return $this; 
        }
        public function hasNotTurmaByLetra($letra): self
        {
            $turmasDAO = new TurmasDAO();
            $turma = $turmasDAO->readByLetra(letra: $letra);
            if(isset($turma)){
                (new Response(
                    success: false,
                    message: "Turma já cadastrada",
                    error:[
                        "code" => 'Turma_validation_error',
                        "message" => 'Já existe uma turma cadastrada com a letra informada.'
                    ],
                    httpCode: 400
                ))->send();
                exit();
                return $this;
            }
            return $this;
        }
        public function IsValidID($idTurma): self
        {
            if(!isset($idTurma))
            {
               (new Response(
                success: false,
                message: "ID da Turma não foi informado.",
                error:[
                    "code" => 'Turma_validation_error',
                    "message" => 'O ID da Turma deve ser informado para a operação.'
                ],
                httpCode: 400
            ))->send();
            exit();
            }else if(!is_numeric($idTurma) || ((int)$idTurma) <= 0)
            {
                (new Response(
                    success: false,
                    message: "ID da Turma inválido.",
                    error:[
                        "code" => 'Turma_validation_error',
                        "message" => 'O ID da Turma deve ser um número positivo.'
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