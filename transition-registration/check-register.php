<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BSP | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../AdminLTE/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../AdminLTE/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">        
    <script language=”JavaScript”>
            window.history.forward();
        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>                        
                        <img src="../images/svg/logo-bematech-quadrado.svg" width="5%" height="5%"> 
                        Cadastro
                        <small>Bematech Software Partners</small>
                    </h1>                     
                </section>
                <section class="content-wrapper">
                    <div class="row center-block">
                        <button class="btn bg-navy btn-flat disabled">Cadastrar Usuário</button>
                        <button class="btn bg-navy btn-flat disabled">Cadastrar Empresa</button>
                        <button class="btn bg-orange btn-flat">Confirmar Informações</button>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="box">
                            <div class="col-md-9 col-lg-9">                            
                                <!-- /.box-header -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Confira os Dados</h3>
                                    </div>
                                    <?php
                                    require '../inc/connection.php';
                                    ?>
                                    <table class="table table-striped">
                                        <tbody>
                                            <?php
                                            $cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
                                            $sql = "SELECT * FROM client_temp WHERE cpf = '$cpf'";
                                            $query = mysqli_query($conexao, $sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['id_client_temp'];
                                                ?>
                                                <tr>
                                                    <th colspan="2" class="btn-primary"><strong>Usuário</strong></th>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nome</strong></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Sobrenome</strong></td>
                                                    <td><?php echo $row['last_name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>CPF</strong></td>
                                                    <td><?php echo $row['cpf'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cargo</strong></td>
                                                    <td><?php echo $row['office'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>E-mail</strong></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Telefone</strong></td>
                                                    <td><?php echo $row['phone'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Celular</strong></td>
                                                    <td><?php echo $row['cell'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Deseja receber informativos?</strong></td>
                                                    <?php
                                                    if ($row['check_send_news'] == 1) {
                                                        echo "<td>Sim</td>";
                                                    } else {
                                                        echo "<td>Nao</td>";
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            $cnpj = filter_input(INPUT_GET, "cnpj", FILTER_SANITIZE_STRING);
                                            $sql1 = "SELECT * FROM company_temp WHERE cnpj = '$cnpj'";
                                            $query1 = mysqli_query($conexao, $sql1);
                                            while ($row1 = mysqli_fetch_array($query1)) {
                                                $id_comp = $row1['id_company_temp'];
                                                ?>
                                                <tr>
                                                    <th colspan="2" class="btn-primary"><strong>Empresa</strong></th>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nome</strong></td>
                                                    <td><?php echo $row1['company'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Razão Social</strong></td>
                                                    <td><?php echo $row1['social_name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>CNPJ</strong></td>
                                                    <td><?php echo $row1['cnpj'] ?></td>
                                                </tr>                                        
                                                <tr>
                                                    <td><strong>Telefone</strong></td>
                                                    <td><?php echo $row1['work_phone'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Logradouro</strong></td>
                                                    <td><?php echo $row1['street'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nº</strong></td>
                                                    <td><?php echo $row1['num'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Complemento</strong></td>
                                                    <td><?php echo $row1['complement'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Bairro</strong></td>
                                                    <td><?php echo $row1['neighborhood'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cidade</strong></td>
                                                    <td><?php echo $row1['city'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Estado</strong></td>
                                                    <td><?php echo $row1['state'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>CEP</strong></td>
                                                    <td><?php echo $row1['cep'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Optante do Simples Nacional</strong></td>
                                                    <td><?php 
                                                        if ($row1['simples'] == 1){
                                                            echo "Sim";
                                                        } else {
                                                            echo "Não";
                                                        }
                                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Linguagem(ns) de Programação</strong></td>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            $prog = $row1['programming_languages'];
                                                            $programing = explode(";", $prog);
                                                            for ($i = 0; $i < count($programing); $i++) {
                                                                $prog_lang = $programing[$i];
                                                                echo "<li>$prog_lang</li>";
                                                            }
                                                            ?>  
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Área(s) de Atuação</strong></td>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            $busi_seg = $row1['business_segment'];
                                                            $business = explode(";", $busi_seg);
                                                            for ($i = 0; $i < count($business); $i++) {
                                                                $business_segment = $business[$i];
                                                                echo "<li>$business_segment</li>";
                                                            }
                                                            ?>  
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Produto(s) Homologado(s)</strong></td>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            $products = $row1['approved_products'];
                                                            $prod = explode(";", $products);
                                                            for ($i = 0; $i < count($prod); $i++) {
                                                                $product = $prod[$i];
                                                                echo "<li>$product</li>";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <a href="user-form-edit.php?id=<?php echo $id ?>&cnpj=<?php echo $cnpj ?>" class="btn btn-primary">
                                            Editar Usuário <i class="fa fa-user-circle"></i></a>
                                        <a href="company-form-edit.php?cnpj=<?php echo $cnpj ?>&cpf=<?php echo $cpf ?>" class="btn btn-primary">
                                            Editar Empresa <i class="fa fa-briefcase"></i></a>
                                        <a href="send-register-action.php?cnpj=<?php echo $cnpj ?>&cpf=<?php echo $cpf ?>" class="btn btn-success">
                                            Finalizar Cadastro <i class="fa fa-check"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (main row) -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.0.1
                </div>
                <strong>Copyright &copy; <?php echo date("Y") ?> <a href="http://bematechpartners.com.br/" target="blank">Bematech Software Partners</a>.</strong> Todos os Direitos Reservados.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="../AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="../AdminLTE/bower_components/raphael/raphael.min.js"></script>
        <script src="../AdminLTE/bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="../AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="../AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../AdminLTE/bower_components/moment/min/moment.min.js"></script>
        <script src="../AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="../AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="../AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../AdminLTE/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../AdminLTE/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../AdminLTE/dist/js/demo.js"></script>
        <script type="text/javascript">
            $(document).ajaxStart(function () {
                Pace.restart();
            });
        </script>
    </body>
</html>