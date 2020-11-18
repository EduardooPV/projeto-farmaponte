<?php

Class Usuario
{   
    private $pdo; //Varial local
    public $msgErro = ""; //Varial global

    //Conectar ao PDO
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        // Tratando possiveis erros
        try
        {   //Conectar no db
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) { //Tratand erros referentes ao PDO
            $msgErro = $e -> getMessage();
        }

    }
    //Cadastrar usuarios no db
    public function cadastrar($nome, $email, $telefone, $senha)
    {
        global $pdo; // Se referindo a varial privada criada fora do bloco
        //Verificar se já existe o email cadastrado
        $sql = $pdo -> prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql -> bindValue(":e", $email);
        $sql -> execute();
        if($sql -> rowCount() > 0) 
        {
            return false; //Já está cadastrada
        } else  
        {
            $sql = $pdo -> prepare("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)");
            $sql -> execute(array("$nome",$email,$telefone,$senha));
            return true; //Cadastrado com sucesso
        }
    }

    public function logar($email, $senha)
    {
        global $pdo;
        //Verificar email e senha cadastrados
        $sql = $pdo -> prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql -> bindValue(":e", $email);
        $sql -> bindValue(":s", ($senha));
        $sql -> execute();
        if($sql -> rowCount() > 0)
        {
            $dado = $sql -> fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //Logado com sucesso e transferido para a area do usuario 
        } else 
        {
            return false; //Não foi possivel logar
        }
    }
}
?>