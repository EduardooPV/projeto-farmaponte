<?php
session_start();
unset($_SESSION['id_usuario']);
header("location: index.php");
?>
<!-- Finalizando a sessão após clicar em "SAIR" na pagina do usuario -->