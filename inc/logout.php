<?php
session_start(); // iniciamos a sessão que foi aberta

include 'connection.php';
//include './generate-log.php';
//
//logMsg("=======================================================================================");
//logMsg("------------------------------ INICIANDO LOGOUT ---------------------------------------");
//logMsg("=======================================================================================");


$logado = $_SESSION['email'];

$query = mysqli_query($conexao, "SELECT * FROM `client` WHERE email = '$logado'");
while ($resultado = mysqli_fetch_array($query)) {
    $idContato = $resultado['id_client'];
    $nome = $resultado['name'];
}

$sql = mysqli_query($conexao, "SELECT * FROM access WHERE id_client = $idContato ORDER BY id_client DESC LIMIT 1");
while ($result = mysqli_fetch_array($sql)) {
    $idAcesso = $result['id_access'];
}

$row = mysqli_num_rows($sql);
if ($row) {    
    date_default_timezone_set("Brazil/East");
    $dataAtual = date("d/m/Y");
    $horaLogout = date('H:i:s');
    // echo "<script language='javascript' type='text/javascript'>alert('$horaLogout, $idAcesso, $idContato');</script>";
    $query2 = mysqli_query($conexao, "UPDATE access SET `logout_hour`= '$horaLogout' WHERE id_access = $idAcesso");
    session_destroy(); // destruimos a sessão ;)    
    session_unset(); // limpamos as variaveis globais das sessões    
    echo "<script>document.location.href='../index.php';</script>";
} else {
    echo "<script>document.location.href='../index.php';</script>";
}
//logMsg("=======================================================================================");
//logMsg("----------------------------- FINALIZANDO LOGOUT --------------------------------------");
//logMsg("=======================================================================================");
?>
