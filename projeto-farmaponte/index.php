<!-- Trazendo o documento "usuarios.php" para utilizar a função "CADASTRAR"-->
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
    <link rel="shortcut icon" href="favicon.ico"> <!-- Icone Farma ponte-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="index.php"><img id="logo" src="imagens/logo_farmaponte.png" alt="Logo Farma Ponte" width="500px"></a>
    <form method="POST" class="mt-5">
        <div class="text-center text-info">
            <h2>Login</h2>
        </div>
        <div class="form-group">
            <label for="inputEmail3">Usuario:</label>
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagens/user.png" width="22px"></span>
                </div>
                <input type="text" name="email" id="inputEmail3" name="usuario" class="form-control" placeholder="usuario@email.com.br" maxlength="50">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3">Senha:</label>
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagens/password.png" width="22px"></span>
                </div>
                <input type="password"  name="senha"  id="inputPassword3" class="form-control" placeholder="***************" maxlength="15">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <a href="cadastrar.php">Registre-se</a>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary">ACESSAR</button>
    </form>
<?php
//Confirmando o email e senha no db
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    // Verificando se o campo Email e Senha estão vazios.
    if(!empty($email) && !empty($senha))
    {   
        $u -> conectar("projeto_farmaponte", "localhost", "root", ""); // Iniciando o db
        if($u -> msgErro == "")
        {
            if($u -> logar($email, $senha))
            {
                header("location: area-usuario.php"); //Transferido para a pagina de usuario se o login estiver correto
            } else
            {
                ?> 
                <div class="msg-erro"> <!-- Tratando possiveis erros -->
                Email e/ou senha estão incorretos!;
                </div>
                <?php
            } 
        }
        else 
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
        Preencha todos os campos!;
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