<?php

require '../inc/connection.php';

$cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_GET, "cnpj", FILTER_SANITIZE_STRING);
$q = "INSERT INTO `client_bsp`(`name`, `last_name`, `cpf`, `office`, `email`, `password`, `company`, `cnpj`, `phone`, "
        . "`cell`, `date_register`, `hour_register`, `profile`, `check_send_news`, `blocked`) SELECT `name`, "
        . "`last_name`, `cpf`, `office`, `email`, `password`, `company`, `cnpj`, `phone`, `cell`, `date_register`, "
        . "`hour_register`, `profile`, `check_send_news`, `blocked` FROM client_temp WHERE cpf = '$cpf'";
$query = mysqli_query($conexao, $q)or die(mysqli_error($conexao));
if ($query) {
    $query2 = mysqli_query($conexao, "INSERT INTO `company_bsp`(`company`, `social_name`, `cnpj`, `cnae`, `activity`, `work_phone`, "
            . "`street`, `num`, `complement`, `neighborhood`, `city`, `state`, `cep`, `simples`, `programming_languages`, "
            . "`id_client_admin`, `business_segment`, `approved_products`, `date_register`, `hour_register`, `bsp_category`, "
            . "`points`, `blocked`) SELECT `company`, `social_name`, `cnpj`, `cnae`, `work_phone`, "
            . "`street`, `num`, `complement`, `neighborhood`, `city`, `state`, `cep`, `simples`, `programming_languages`, "
            . "`id_client_admin`, `business_segment`, `approved_products`, `date_register`, `hour_register`, "
            . "`bsp_category`, `points`, `blocked` FROM company_temp WHERE cnpj = '$cnpj'") or die(mysqli_error($conexao));
    if ($query2) {
        
        $sql3 = "DELETE FROM `client_temp` WHERE cpf = '$cpf'";
        $query3 = mysqli_query($conexao, $sql3)or die(mysqli_error($conexao));;
        if (!$query3) {
            echo "<br>" . mysqli_error($conexao) . "<br>" . $sql3;
        }
        $sql4 = "DELETE FROM `company_temp` WHERE cnpj = '$cnpj'";
        $query4 = mysqli_query($conexao, $sql4);
        if (!$query4) {
            echo "<br>" . mysqli_error($conexao) . "<br>" . $sql4;
        } 
         echo "<script>window.location.href='send-register-action-ends.php?cpf=$cpf&cnpj=$cnpj';</script>";
    } else{
        echo "<script>alert('Erro ao cadastrar a empresa...');history.back();</script>";        
    } 
} else {
        //echo "<script>alert('$cpf, $cnpj');</script>";
        echo "<script>alert('Erro ao cadastrar o usuário...');history.back();</script>";
    }


