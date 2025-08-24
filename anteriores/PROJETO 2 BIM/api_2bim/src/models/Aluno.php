<?php // representa sgbd
    class Aluno implements JsonSerializable {
        
        public function __construct(
            private ?int $idAluno = null,
            private string $nome = '',
            private string $dataNascimento = '',
            private ?int $idTurma = null
        ) {}

       
        
        public function JsonSerialize(): array{
            return [
                'matricula' => $this->idAluno,
                'nome' => $this->nome,
                'dataNascimento' => $this->dataNascimento,
                'idTurma' => $this->idTurma
            ];
        }
        public function getIdAluno(): ?int {
            return $this->idAluno;
        }
        public function setidAluno(?int $idAluno): self {
            $this->idAluno = $idAluno;
            return $this;
        }
        public function getNome(): string {
            return $this->nome;
        }

        public function setNome(string $nome): self {
            $this->nome = $nome;
            return $this;
        }

        public function getDataNascimento(): string {
            return $this->dataNascimento;
        }

        public function setDataNascimento(string $dataNascimento): self {
            $this->dataNascimento = $dataNascimento;
            return $this;
        }

        public function getIdTurma(): ?int {
            return $this->idTurma;
        }

        public function setIdTurma(?int $idTurma): self {
            $this->idTurma = $idTurma;
            return $this;
        }


    }
?>