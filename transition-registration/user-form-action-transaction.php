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
$hour_register = filter_input(INPUT_POST, "hour_register", FILTER_SANITIZE_STRING);
$date_register = filter_input(INPUT_POST, "date_register", FILTER_SANITIZE_STRING);

$password = md5($pass);

//echo "<script>alert('$chek_news');</script>";

date_default_timezone_set("Brazil/East");
//$date_register = date("d/m/Y");
//$hour_register = date("H:i:s");

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

$sql = "UPDATE `client` SET `name`='$name',`last_name`='$last_name',`office`='$office',`email`='$email',`password`='$password',`id_company`=0,"
        . "`phone`='$phone',`cell`='$cell_phone',`date_register`='$date_register',`hour_register`='$hour_register',`check_send_news`=$check_news,`blocked`=0";
$query = mysqli_query($conexao, $sql);
//echo mysqli_error($conexao)."<br>".$sql;
if ($query) {
    $q = mysqli_query($conexao, "SELECT id_company FROM client WHERE id_client = $id");
    $id_company = $res['id_company'];
    if (!empty($id_company)){
        echo "<script>alert('Busque sua empresa');window.location.href='search-company.php';</script>";
    }
    echo "<script>alert('Cadastre sua empresa');window.location.href='company-form-transaction.php?id=$id_company';</script>";
    // echo "<script>alert('Cadastre sua empresa');</script>";
} else {
    echo mysqli_error($conexao) . "<br>" . $sql;
    //echo "<script>alert('Erro no cadastro, por favor verifique...');history.back();</script>";
}
    



