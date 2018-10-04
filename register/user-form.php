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

        <script type="text/javascript">
            unction valida(form) {
            if (form.phone.value == "") {
            alert("Preencha o campo telefone");
            document.getElementById('#phone_div').className = "form-control has-error";
            form.nome.focus();
            return false;
            }
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
                        <button onclick="#" class="btn bg-orange btn-flat">Cadastrar Usuário</button>
                        <button class="btn bg-navy btn-flat disabled">Cadastrar Empresa</button>
                        <button class="btn bg-navy btn-flat disabled">Confirmar Informações</button>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-9">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Usuário</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="user-form-action.php">
                                    <div class="box-body">     
                                        <div class="form-group col-lg-12">
                                            <p class="pull-right text-red">* Campos obrigatórios</p>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label >Nome</label><span class="text-red">*</span>
                                            <input required="true"  required="true" type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label >Sobrenome</label><span class="text-red">*</span>
                                            <input required="true"  type="text" class="form-control" id="last_name" name="last_name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label >CPF</label><span class="text-red">*</span>
                                            <input required="true"  type="text" class="form-control" id="cpf" name="cpf">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label >Cargo</label><span class="text-red">*</span>
                                            <select class="chosen-select form-control" id="office" name="office">
                                                <option value="Desenvolvedor/ Programador">Desenvolvedor/Programador</option>
                                                <option value="Analista/Técnico - Outros">Analista/Técnico - Outros</option>
                                                <option value="Analista/Técnico de Sistemas">Analista/Técnico de Sistemas</option>
                                                <option value="Analista/Técnico de Suporte">Analista/Técnico de Suporte</option>
                                                <option value="Analista/Técnico de Redes">Analista/Técnico de Redes</option>
                                                <option value="Analista/Técnico de Testes">Analista/Técnico de Testes</option>
                                                <option value="Analista de UX e Design">Analista de UX e Design</option>
                                                <option value="Contador">Contador</option>
                                                <option value="Coordenador Comercial">Coordenador Comercial</option>
                                                <option value="Coordenador de Desenvolvimento">Coordenador de Desenvolvimento</option>
                                                <option value="Coordenador Técnico/Suporte">Coordenador Técnico/Suporte</option>
                                                <option value="Gerente Comercial">Gerente Comercial</option>
                                                <option value="Gerente de Desenvolvimento">Gerente de Desenvolvimento</option>
                                                <option value="Gerente Técnico/Suporte">Gerente Técnico/Suporte</option>
                                                <option value="Diretor Comercial">Diretor Comercial</option>
                                                <option value="Diretor de Desenvolvimento">Diretor de Desenvolvimento</option>
                                                <option value="Diretor - Outro">Diretor - Outro</option>
                                                <option value="CEO">CEO</option>
                                                <option value="Engenheiro da Computação">Engenheiro da Computação</option>
                                                <option value="Executivo de Vendas">Executivo de Vendas</option>
                                                <option value="Assistente de Vendas">Assistente de Vendas</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6" id="phone_div">
                                            <label>Telefone</label><span class="text-red">*</span>
                                            <input required="true"  type="text" class="form-control" id="phone" name="phone">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Celular</label><span class="text-red">*</span>
                                            <input required="true"  type="text" class="form-control" id="cell" name="cell"><br>
                                        </div>                                            

                                        <div class="form-group col-lg-8">
                                            <label >E-mail</label><span class="text-red">*</span>
                                            <input required="true"  type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group col-lg-4">                                              
                                            <label>Senha</label><span class="text-red">*</span>                                                                                                                                    
                                            <input required="true"  type="password" minlength="5" maxlength="8" class="form-control" id="pass" name="password">
                                            <p class="text-info">A senha deve ter de 5 a 8 caracteres.</p>
                                        </div>

                                        <div class="form-group checkbox-inline">
                                            <label>
                                                <input required="true" checked="true"  type="checkbox" name="check_send" id="check_send" 
                                                       value=1> Desejo receber informativos e newsletter da Bematech por e-mail
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            Continuar <i class="fa fa-external-link-square"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col-md-9-->
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
        <script src="../AdminLTE/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript">
                            /* ===Mask Plugin=================== */
                            jQuery.noConflict();
                            jQuery(function ($) {
                            //	$("#versao").mask("99.99.99");
                            $("#cnpj").mask("99.999.999/9999-99");
                            $("#cpf").mask("999.999.999-99");
                            $("#phone").mask("(99)-9999-9999");
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