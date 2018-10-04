<?php
session_start();
include 'connection.php';

$email = mysqli_real_escape_string($conexao, filter_input(INPUT_POST, "email",FILTER_SANITIZE_STRING));
$senha = mysqli_real_escape_string($conexao, filter_input(INPUT_POST, "pwd",FILTER_SANITIZE_STRING));
$pwd = md5($senha);

date_default_timezone_set("Brazil/East");
$dataAcesso = date('d/m/Y');
$horaLogin = date('H:i:s');


$verifica = mysqli_query($conexao, "SELECT * FROM client_bsp WHERE email = '$email' AND password = '$pwd'") or die(mysqli_error($conexao));
if (mysqli_num_rows($verifica) <= 0) {
    echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../index.php';</script>";
    die();
} else {    
    while ($resultado = mysqli_fetch_array($verifica)) {
        $perfil = $resultado['profile'];
        $nome = $resultado['name'];
        $sobrenome = $resultado['last_name'];
        $idCliente = $resultado['id_client'];
        $bloq = $resultado['blocked'];

        if ($bloq == 0) {
                $_SESSION['email'] = $email;
                $_SESSION['data_acesso'] = $dataAcesso;
                $_SESSION['id_client'] = $idCliente;
                $_SESSION['nome'] = $nome;
                $_SESSION['sobrenome'] = $sobrenome;
                $sql = "INSERT INTO `acesso`(`idContato`, `dataAcesso`, `horaLogin`, `horaLogout`) "
                        . "VALUES ($idCliente, '$dataAcesso','$horaLogin','')";
                $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                echo "<script language='javascript' type='text/javascript'>window.location.href='../client/home.php';</script>";
                exit();
            
        } else {            
            echo "<div class='callout callout-danger col-lg-9'>
                <h4>Usuário Bloqueado</h4>

                <p>$nome seu acesso está bloqueado, contacte o suporte</p><br>
                <span>
                    <strong>Copyright &copy; <?php echo date('Y') ?> <a href='http://bematechpartners.com.br/chatbsp/index.php/por/chat/startchat/(leaveamessage)/true/(theme)/1/(vid)/5xt036v90ugmslqrj3wp/(er)/1?URLReferer=%2F%2Fbematechpartners.com.br%2FportalPartners%2F' target='blank'>Clique aqui para acessar o chat de suporte</a>.</strong> Todos os Direitos Reservados.
                </span>
              </div>";           
        }
    }
}
mysqli_close($conexao);
?>
