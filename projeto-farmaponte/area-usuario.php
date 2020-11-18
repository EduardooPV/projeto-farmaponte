<?php // Verificando se o usuario está logado, caso não, ele é transferido para a area de login
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area do usuario</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="imagem">
    <a href="index.php"><img id="logo" src="imagens/farmaponte-usuario.png" alt="Logo Farma Ponte" width="60%"></a>
    </div>
    <div id="options"><a href="sair.php">Sair!</a></div> <!-- Saindo da sessão atual, e voltando para a tela inicial de login -->
</body>
</html>
