<?php

require '../inc/connection.php';

$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
$cnae = filter_input(INPUT_POST, "cnae", FILTER_SANITIZE_STRING);
$activity = filter_input(INPUT_POST, "atividade", FILTER_SANITIZE_STRING);
$cnae_sec = filter_input(INPUT_POST, "cnae_sec", FILTER_SANITIZE_STRING);
$activity_sec = filter_input(INPUT_POST, "atividade_sec", FILTER_SANITIZE_STRING);

echo "<script>alert('$cnae,$activity,$cnae_sec,$activity_sec')</script>";

$check = filter_input(INPUT_POST, "check_address", FILTER_SANITIZE_STRING);
if (empty($check)) {
    $check_address = "0";
}
$additional_information = filter_input(INPUT_POST, "additional_information", FILTER_SANITIZE_STRING);

$company = filter_input(INPUT_POST, "company", FILTER_SANITIZE_STRING);
$social_name = filter_input(INPUT_POST, "social_name", FILTER_SANITIZE_STRING);
$cnpj = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING);
$street = filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING);
$number = filter_input(INPUT_POST, "number", FILTER_SANITIZE_STRING);
$complement = filter_input(INPUT_POST, "complement", FILTER_SANITIZE_STRING);
$neighborhood = filter_input(INPUT_POST, "neighborhood", FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING);
$state = filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, "work_phone", FILTER_SANITIZE_STRING);
$simples = filter_input(INPUT_POST, "simples", FILTER_SANITIZE_STRING);
$has_android_app = filter_input(INPUT_POST, "has_android_app", FILTER_SANITIZE_STRING);
$number_client = filter_input(INPUT_POST, "number_client", FILTER_SANITIZE_STRING);
$android_customers = filter_input(INPUT_POST, "android_customers", FILTER_SANITIZE_STRING);
$resale = filter_input(INPUT_POST, "resale", FILTER_SANITIZE_STRING);

//echo "<script>alert('$cnae, $activity, $cnae_sec, $activity_sec');</script>";

$interface = $_POST['development_interface'];
if (!empty($interface)) {
    foreach ($_POST['development_interface'] as $interfaceDev) {
        $interfaceDev = implode(";", $_POST['development_interface']);
    }
}

$payment_options = $_POST['payment_options'];
if (!empty($payment_options)) {
    foreach ($_POST['payment_options'] as $payment) {
        $payment = implode(";", $_POST['payment_options']);
    }
}

$language = $_POST['language'];
if (!empty($language)) {
    foreach ($_POST['language'] as $linguagem) {
        $linguagem = implode(";", $_POST['language']);
    }
}
//echo "<script>alert('$linguagem');</script>";

$segment = $_POST['segmento'];
if (!empty($segment)) {
    foreach ($_POST['segmento'] as $segmento) {
        $segmento = implode(";", $_POST['segmento']);
    }
}
//echo "<script>alert('$segmento');</script>";

$homologado = $_POST['homologado'];
if (!empty($homologado)) {
    foreach ($_POST['homologado'] as $homolog) {
        $homolog = implode(";", $_POST['homologado']);
    }
}
//echo "<script>alert('$homolog');</script>";

if (empty($edit)) {
    date_default_timezone_set("Brazil/East");
    $date_register = date("d/m/Y");
    $hour_register = date("H:i:s");

    $sql1 = "SELECT * FROM company_bsp WHERE cnpj = '$cnpj'";
    $query1 = mysqli_query($conexao, $sql1);
    $count = mysqli_num_rows($query1);
//echo "<script>alert('$count');</script>";
    if ($count == 0) {
        $sql = "INSERT INTO `company_bsp`(`company`, `social_name`, `cnpj`, `cnae`, `activity`, `cnae_sec`, `activity_sec`, `work_phone`, `street`, `num`, `complement`, `neighborhood`, "
                . "`city`, `state`, `cep`, `check_address`, `additional_information`, `resale`, `simples`, `programming_languages`, `business_segment`, `approved_products`, "
                . "`date_register`, `hour_register`, `has_android_app`, `payment_options`, `number_client`, `android_customers`,`bsp_category`, points, `blocked`) "
                . "VALUES ('$company','$social_name','$cnpj','$cnae','$activity','$cnae_sec','$activity_sec','$phone','$street','$number','$complement','$neighborhood',"
                . "'$city','$state','$cep', $check_address, '$additional_information',$resale, $simples, '$linguagem', '$segmento',"
                . "'$homolog','$date_register','$hour_register','$has_android_app','$payment','$number_client','$android_customers','',0,0)";
        $query = mysqli_query($conexao, $sql);
        if (!$query) {
            echo "<script>alert('Verifique os campos obrigatórios em branco');history.back();</script>";
        } else {
            $mysql = mysqli_query($conexao, "UPDATE `client_bsp` SET `company`='$company',`cnpj`='$cnpj' WHERE cpf='$cpf'");
            if (!$mysql){
                echo "<script>alert('Erro ao inserir os dados da empresa para o cliente');history.back();</script>";
            }
        }
//echo mysqli_error($conexao)."<br>".$sql;
        if ($query) {
            echo "<script>window.location.href='info-register.php';</script>";
        } else {
            echo mysqli_error($conexao) . "<br>" . $sql;
            //echo "<script>alert('Erro no cadastro, por favor verifique...');history.back();</script>";
        }
    } else {
        echo "<script>alert('CNPJ já cadastrado!');history.back();</script>";
    }
} 




