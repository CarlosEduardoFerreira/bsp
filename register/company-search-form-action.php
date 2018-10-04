<?php

require '../inc/connection.php';
//require './generate-log.php';

$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING);
$company = filter_input(INPUT_POST, "company", FILTER_SANITIZE_STRING);

//echo "<script>alert('$cpf, $cnpj, $company');</script>";
//logMsg("Completando o cadastro",'info');

$s = "UPDATE `client_bsp` SET `cnpj`= '$cnpj', company= '$company' WHERE cpf = '$cpf'";
$q = mysqli_query($conexao, $s);
if ($q){
    echo "<script>alert('Tudo certo, faça seu login!');window.location.href='http://bematechpartners.com.br/posgo/page-login.php';</script>";
} else {
    echo "<script>alert('Tudo certo, faça seu login!');history.back();</script>";
}
