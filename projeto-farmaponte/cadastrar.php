<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Farma Ponte</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="index.php"><img id="logo" src="imagens/logo_farmaponte.png" alt="Logo Farma Ponte" width="400px"></a>
    <form method="POST" class="mt-5">
        <div class="text-center text-info">
            <h2>Cadastrar</h2>
            </div>
        <div class="form-group"> <!-- Inputs do cadastro -->
            <label for="inputEmail3">*Nome Completo:</label>
            <div class="input-group mb-1">
                <input type="text" name="nome" id="inputEmail3" name="usuario" class="form-control" placeholder="ex: Maria de Jesus" maxlength="50">
            </div>
        </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3">*Email:</label>
            <div class="input-group mb-1">
                <input type="text" name="email" id="inputEmail3" name="usuario" class="form-control" placeholder="usuario@email.com.br" maxlength="50">
            </div>
        </div>
        <div class="form-group">
        <label for="inputEmail3">*Telefone/Celular:</label>
            <div class="input-group mb-1">
                <input type="" name="telefone" id="inputEmail3" class="form-control" placeholder="(15) 99999-9999" maxlength="11">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3">*Senha:</label>
            <div class="input-group mb-1">
                <input type="password" id="inputEmail3" name="senha" class="form-control" placeholder="*****************" maxlength="15">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3">*Confirmação Senha:</label>
            <div class="input-group mb-1">
                <input type="password" id="inputEmail3" name="confSenha" class="form-control" placeholder="*****************" maxlength="15">
            </div>
        <button type="submit" class="btn btn-outline-primary">CADASTRAR</button>
        <a href="index.php" class="btn btn-primary">ENTRAR</a> <hr>
    </form>

<?php

//Verificar se clicou no botão "CADASTRAR"
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //Verificar se todos os campos estão preenchidos
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {   //Função para utilizar o db
        $u -> conectar("projeto_farmaponte", "localhost", "root", "");
        if($u -> msgErro == "") //Sem erros, está tudo certo
        {
            if($senha == $confirmarSenha)
            {
                if($u -> cadastrar($nome, $email, $telefone, $senha))
                { 
                    ?>
                    <div id="msg-sucesso"> 
                        Cadastrado realizado com sucesso, acesse para utilizar sua pagina!
                    </div>                    
                    <?php
                } else
                {
                    ?>
                    <div class="msg-erro"> <!-- Tratando possiveis erros de cadastramento -->
                        Email já cadastrado, tente novamente!
                    </div>  
                    <?php
                }
            } else
            {
                    ?>
                    <div class="msg-erro">
                        Senhas diferentes, por favor, use a mesma para os dois campos!
                    </div>  
                    <?php
            }
        } else
        {
            ?>
            <div class="msg-erro">
                <?php echo "Erro: ".$u -> msgErro; ?>
            </div>
            <?php
        }
    } else 
    {
        ?>
        <div class="msg-erro">
        Preencha todos os campos corretamente!
        </div>  
        <?php
    }
}
?>
    <!-- Importar Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>