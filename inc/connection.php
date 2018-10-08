<?php
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

//$host = "wordpress.c60mnkwusy5s.sa-east-1.rds.amazonaws.com:3306";
//$user = "root";
//$pass = "Nfcer00tp155";
//$conexao = mysqli_connect($host,$user,$pass) or die(mysqli_error($conexao));
//mysqli_select_db($conexao,"bsp") or die(mysqli_error($conexao));
//mysqli_set_charset($conexao, 'utf8'); 

$host = "wordpress.c60mnkwusy5s.sa-east-1.rds.amazonaws.com:3306";
$user = "root";
$pass = "Nfcer00tp155";
$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());
mysqli_select_db($conexao, "bsp") or die(mysqli_error());
mysqli_set_charset($conexao, 'utf8');
if (!$conexao) {
    echo "<script>alert('Problema com o banco de dados, contacte o administrador');history.back();</script>";
}

?>