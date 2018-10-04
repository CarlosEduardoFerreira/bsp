<?php

require '../inc/connection.php';

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
$office = filter_input(INPUT_POST, "office", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
$cell_phone = filter_input(INPUT_POST, "cell", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$check_news = filter_input(INPUT_POST, "check_send", FILTER_SANITIZE_STRING);

$password = md5($pass);

//echo "<script>alert('$chek_news');</script>";

date_default_timezone_set("Brazil/East");
$date_register = date("d/m/Y");
$hour_register = date("H:i:s");

//echo "<script>alert('Passou aqui');</script>";
$sql1 = "SELECT * FROM client_bsp WHERE cpf = '$cpf'";
$query1 = mysqli_query($conexao, $sql1);
$cont = mysqli_num_rows($query1);
if ($cont == 0 || NULL ) {
    $sql = "INSERT INTO `client_bsp`(`name`, `last_name`, `cpf`, `office`, `email`, `password`, "
            . "`company`,`cnpj`,`phone`, `cell`, `date_register`, `hour_register`, `profile`, `check_send_news`, `blocked`) "
            . "VALUES ('$name','$last_name','$cpf','$office','$email','$password','','','$phone','$cell_phone',"
            . "'$date_register','$hour_register',0,$check_news,0)";
    $query = mysqli_query($conexao, $sql);
//echo mysqli_error($conexao)."<br>".$sql;
    if ($query) {
        echo "<script>alert('Cadastro realizado com sucesso, agora selecione sua empresa');window.location.href='company-search-form.php?cpf=$cpf';</script>";
        // echo "<script>alert('Cadastre sua empresa');</script>";
    } else {
        echo mysqli_error($conexao) . "<br>" . $sql;
        //echo "<script>alert('Erro no cadastro, por favor verifique...');history.back();</script>";
    }
} else {
    echo "<script>alert('CPF já cadastrado!');history.back();</script>";
}


