<?php

require '../inc/connection.php';

$cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_GET, "cnpj", FILTER_SANITIZE_STRING);

// Pegando o id_company da empresa pelo cnpj
$s = "SELECT id_company FROM company WHERE cnpj = '$cnpj'";
$q = mysqli_query($conexao, $s);
$row = mysqli_fetch_array($q);
$id_company = $row['id_company'];

// Pegando o id_client do cliente pelo cpf
$s1 = "SELECT id_client FROM client WHERE cpf = '$cpf'";
$q1 = mysqli_query($conexao, $s1);
$row1 = mysqli_fetch_array($q1);
$id_client = $row1['id_client'];

// Inserindo na tabela client_company o id_company e o id_client - Relacionamento cliente/empresa
$sql1 = "INSERT INTO `client_company`(`id_company`, `id_client`) VALUES ($id_company, $id_client)";
$query1 = mysqli_query($conexao, $sql1);
if (!$query1) {
    echo "<br>" . mysqli_error($conexao) . "<br>" . $sql1;
} else {
    echo "<script>window.location.href='info-register.php';</script>";
}

