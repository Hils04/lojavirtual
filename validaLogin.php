<?php

require_once("funcaoValidaLogin.php");

$login = $_POST["f_login"];
$senha = $_POST["f_senha"];

$validar = validaLogin($login, $senha);

if ($validar == true) {
    
    header("Location: index.php");
    exit();
} else {
    echo "Acesso Negado!";
}

?>

 


 ?>