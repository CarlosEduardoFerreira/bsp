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

<!--<script type="text/javascript" src="custom-cnpj.js"></script>-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">                    
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
                        <button class="btn bg-orange btn-flat">Cadastrar Empresa</button>
                        <button class="btn bg-navy btn-flat disabled">Confirmar Informações</button>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-9 col-lg-9">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <legend class="col-lg-12">Empresa</legend>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">  
                                    <?php $cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_STRING); ?>
                                    <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>?search=true&cpf=<?php echo $cpf ?>" method="post">
                                        <label >Digite o CNPJ:</label>
                                        <div class="input-group col-lg-6">                                            
                                            <input type="text" class="form-control" id="cnpj" name="cnpj" autofocus="true">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-success">Buscar</button>
                                            </span>
                                        </div><br>
                                    </form>
                                    <?php
                                    include '../inc/connection.php';
                                    $search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);
                                    if ($search == "true") {
                                        $cnpj = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING);
                                        $sql = "SELECT * FROM company_bsp WHERE cnpj = '$cnpj'";
                                        $query = mysqli_query($conexao, $sql);
                                        $cont = mysqli_num_rows($query);
                                        if ($cont > 0) {
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id_company = $row['id_company'];
                                                $company = $row['company'];
                                                $id_client_admin = $row['id_client_admin'];

                                                $s = "SELECT name, last_name FROM client_bsp WHERE id_client = $id_client_admin";
                                                $q = mysqli_query($conexao, $s);
                                                if ($q) {
                                                    while ($res = mysqli_fetch_array($q)) {
                                                        $nome = $res['name'];
                                                        $sobreNome = $res['last_name'];
                                                    }
                                                }
                                            }
                                            //echo "<script>alert('Empresa: $company')</script>";
                                            ?>   
                                            <form method="post" action="company-search-form-action.php">                                      
                                                <div class="input-group col-xs-6">
                                                    <label >Empresa</label>
                                                    <input type="text" readonly="true" style="font-weight: bold;" class="form-control" id="company" name="company" 
                                                           value="<?php echo $company ?>">
                                                    <input type="hidden" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>">
                                                    <input type="hidden" class="form-control" id="cnpj" name="cnpj" value="<?php echo $cnpj ?>">
                                                    <input type="hidden" class="form-control" id="company" name="company" value="<?php echo $company ?>">
                                                </div><br>
                                                <div class="input-group col-xs-6">
                                                    <label >Administrador</label>
                                                    <?php
                                                    if ($id_client_admin != "") {
                                                        ?>
                                                        <input type="text" class="form-control" readonly="true" style="font-weight: bold;" 
                                                               name="admin" value="<?php echo $nome . " " . $sobreNome ?>">
                                                               <?php
                                                           } else {
                                                               ?>
                                                        <input type="text" class="form-control" readonly="true" style="font-weight: bold;" 
                                                               name="admin" value="Não encontrado...">
                                                           <?php } ?>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn-primary">Selecionar Empresa</button>
                                                </div>
                                            </form>
                                            <?php
                                        } else {
                                            ?>
                                            <form method="post" action="company-form.php">
                                                <?php $cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_STRING); ?>
                                                <div class="alert alert-warning">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <h4><i class="icon fa fa-warning"></i> Atenção</h4>
                                                    CNPJ <?php echo $cnpj ?> não cadastrado, cadastre sua empresa.
                                                </div>
                                                <div class="input-group">
                                                    <input type="hidden" class="form-control" id="cnpj" name="cnpj" value="<?php echo $cnpj ?>">
                                                    <input type="hidden" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>">
                                                    <button type="submit" class="btn btn-primary"><i class="icon fa fa-plus-circle"></i> Cadastrar Empresa</button>
                                                </div>
                                            </form>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <br><br>
                                </div>                            
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
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


        <script type="text/javascript" src="autocomplete/jquery.js"></script>
        <script type="text/javascript" src="autocomplete/jquery-ui.js"></script>
        <script type="text/javascript" src="autocomplete/custom.js"></script>

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
        <script src="../AdminLTE/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript">
            /* ===Mask Plugin=================== */
            jQuery.noConflict();
            jQuery(function ($) {
                $("#cep").mask("99999-999");
                $("#cnpj").mask("99.999.999/9999-99");
                $("#cpf").mask("999.999.999-99");
                $("#work_phone").mask("(99)-9999-9999");
                $('#cell').focusout(function () {
                    var phone, element;
                    element = $(this);
                    element.unmask();
                    phone = element.val().replace(/\D/g, '');
                    if (phone.length > 10) {
                        element.mask("(99) 99999-999?9");
                    } else {
                        element.mask("(99) 9999-9999?9");
                    }
                }).trigger('focusout');
            });
        </script>

    </body>
</html>