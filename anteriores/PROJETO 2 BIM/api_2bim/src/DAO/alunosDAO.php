<?php
require_once 'api_2bim/src/db/Database.php';
require_once 'api_2bim/src/models/Aluno.php';

    class alunosDAO{
        public function readAll(){
            $resultados = [];
            $query = 'SELECT 
                matricula,
                nome,
                data_nascimento,
                id_turma
                FROM alunos ORDER BY matricula ASC';

            $statement =  Database::getConnection()->query(query: $query); // impedir sql injection
            $statement->execute();
            $I = 1;
            /* while ($stdLinha = $statement->fetch(mode: PDO::FETCH_OBJ)) {
                $Aluno = new Aluno();
                $Aluno
                    ->setIdAluno(id_Aluno: $stdLinha->id_Aluno)
                    ->setNomeAluno(nome_Aluno: $stdLinha->nome_Aluno)
                    ->setCoordenador(coordenador: $stdLinha->coordenador);
                $resultados[] = $Aluno;
            }*/
            $resultados = $statement->fetchAll(mode: PDO::FETCH_ASSOC);

            return $resultados;
        }
        public function readById(int $idAluno): Aluno | array{
            $resultados = [];
            $query = 'SELECT 
                matricula,
                nome,
                data_nascimento,
                id_turma
                FROM alunos
                WHERE matricula = :idAluno
                ORDER BY matricula ASC;';

            $statement =  Database::getConnection()->prepare(query: $query); // impedir sql injection
            $statement->execute(
                params:[':idAluno' => (int)$idAluno]
            );
            $resultados = $statement->fetchAll(mode: PDO::FETCH_ASSOC);
            return $resultados;
        }
        public function readByName(string $nomeAluno): Aluno|null{
            $resultados = [];
            $query = 'SELECT 
                matricula,
                nome,
                data_nascimento,
                id_turma
                FROM alunos
                WHERE nome = :nomeAluno
                ORDER BY matricula ASC;';

            $statement =  Database::getConnection()->prepare(query: $query); // impedir sql injection
            $statement->execute(
                params:[':nomeAluno' => $nomeAluno]
            );
            $objStdAluno = $statement->fetch(mode: PDO::FETCH_OBJ);
            if(!$objStdAluno){
                return null;
            }

            return (new Aluno())
                ->setNome(nome: $objStdAluno->nome)
                ->setDataNascimento(dataNascimento: $objStdAluno->data_nascimento)
                ->setIdTurma(idTurma: $objStdAluno->id_turma);

        }
        public function create(Aluno $aluno): Aluno|false{
            $query = 'INSERT INTO 
                    alunos (nome, data_nascimento, id_turma) 
                    VALUES (:nome, :dataNascimento, :idTurma);';

            $statement =  Database::getConnection()->prepare(query: $query); // impedir sql injection
            $statement->execute(
                params:[
                    ':nome' => $aluno->getNome(),
                    ':dataNascimento' => $aluno->getDataNascimento(),
                    ':idTurma' => $aluno->getIdTurma()
                ]
            );
            $aluno->setIdTurma(idTurma: Database::getConnection()->lastInsertId());

            return $aluno;
        }
        public function update(Aluno $Aluno): Aluno|false{
            $query = 'UPDATE alunos
                     SET nome = :nomeAluno,
                         data_nascimento = :dataNascimento,
                         id_turma = :idTurma
                     WHERE matricula = :idAluno;';

            $statement =  Database::getConnection()->prepare(query: $query); // impedir sql injection
            $success = $statement->execute(
                params:[
                    ':idAluno' => $Aluno->getIdAluno(),
                    ':nomeAluno' => $Aluno->getNome(),
                    ':dataNascimento' => $Aluno->getDataNascimento(),
                    ':idTurma' => $Aluno->getIdTurma()
                ]
            );
            if ($success) {
                return $Aluno;
            }
                return false;
            }
        public function delete(int $idAluno): bool{
            $query = 'DELETE FROM alunos
                WHERE matricula = :idAluno;';

            $statement =  Database::getConnection()->prepare(query: $query); // impedir sql injection
            $statement->execute(
                params:[':idAluno' => $idAluno]
            );

            return $statement->rowCount() > 0;
        }
    }
?>