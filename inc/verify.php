<?php 
session_start();

// Verifica se existe os dados da sessão de login
if (! isset($_SESSION["email"])) {
    // Usuário não logado! Redireciona para a página de login
    echo "<script language='javascript' type='text/javascript'>alert('Você não está logado!');</script>";
    header("Location:../index.php");
    exit();
    
    /* Verifica se é da Bematech================================= */
    $logado = $_SESSION['email'];
    $query = mysqli_query($conexao, "SELECT * FROM `client_bsp` WHERE email = '$logado'");
    while ($result = mysqli_fetch_array($query)) {
        $admin = $result['profile'];
        $idCliente = $result['id_client'];
    }
    if ($admin != 1 ) {
        header("Location:admin/admin-home.php");
    }
    /* ============================================================= */
}

