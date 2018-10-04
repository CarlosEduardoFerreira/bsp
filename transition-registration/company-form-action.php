<?php

require '../inc/connection.php';

$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);

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

//echo "<script>alert('$chek_news');</script>";

$edit = filter_input(INPUT_GET, "edit", FILTER_SANITIZE_STRING);

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

    $sql1 = "SELECT * FROM company WHERE cnpj = '$cnpj'";
    $query1 = mysqli_query($conexao, $sql1);
    $count = mysqli_num_rows($query1);
//echo "<script>alert('$count');</script>";
    if ($count == 0) {
        $sql = "INSERT INTO `company_temp`(`company`, `social_name`, `cnpj`, `cnae`, `work_phone`, `street`, `num`, `complement`, `neighborhood`, "
                . "`city`, `state`, `cep`, `simples`, `programming_languages`, `id_client_admin`, `business_segment`, `approved_products`, `date_register`, `hour_register`, `bsp_category`, points, `blocked`) "
                . "VALUES ('$company','$social_name','$cnpj','','$phone','$street',$number,'$complement','$neighborhood','$city','$state','$cep', $simples, '$linguagem', '1', '$segmento',"
                . "'$homolog','$date_register','$hour_register','',0,0)";
        $query = mysqli_query($conexao, $sql);
//echo mysqli_error($conexao)."<br>".$sql;
        if ($query) {
            echo "<script>window.location.href='check-register.php?cpf=$cpf&cnpj=$cnpj&insert';</script>";
        } else {
            echo mysqli_error($conexao) . "<br>" . $sql;
            //echo "<script>alert('Erro no cadastro, por favor verifique...');history.back();</script>";
        }
    } else {
        echo "<script>alert('CNPJ já cadastrado!');history.back();</script>";
    }
} else {

    $sql2 = "UPDATE `company_temp` SET `company`='$company',`social_name`='$social_name',`cnpj`='$cnpj',`work_phone`='$phone',"
            . "`street`='$street',`num`='$number',`complement`='$complement',`neighborhood`='$neighborhood',`city`='$city',"
            . "`state`='$state',`cep`='$cep',`simples`='$simples',`programming_languages`='$linguagem',`business_segment`='$segmento',`approved_products`='$homolog' WHERE cnpj = '$cnpj'";
    $query2 = mysqli_query($conexao, $sql2);
//echo mysqli_error($conexao)."<br>".$sql;
    if ($query2) {
        echo "<script>alert('Cliente editado com sucesso!');window.location.href='check-register.php?cpf=$cpf&cnpj=$cnpj&edit';</script>";
    } else {
        echo mysqli_error($conexao) . "<br>  Erro no Update<br>" . $sql2;
        //echo "<script>alert('Erro no cadastro, por favor verifique...');history.back();</script>";
    }
}




