<?php 

session_start(); // Inicia a sessão

function validaLogin($login, $senha) {
    $loginBD = "Hils";
    $senhaBD = "0405";

    if ($login == $loginBD && $senha == $senhaBD) {
        $_SESSION['usuario'] = $loginBD;
        return true;
    } else {
        return false;
    }
}
?>
