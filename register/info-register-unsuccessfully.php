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


        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">        
        <script language=”JavaScript”>

            window.history.forward();

            function noBack() {
                window.history.forward();
            }

        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini"  onload=”noBack();">
        <br>
        <div class="callout callout-danger col-lg-6">
            <h4>Problemas com o cadastro</h4>

            <p>O CNPJ informado não é válido para a Receita Federal.</p><br>
            
            <span>
                <strong>Copyright &copy; <?php echo date("Y") ?> <a href="http://bematechpartners.com.br/" target="blank">Bematech Software Partners</a>.</strong> Todos os Direitos Reservados.
            </span>
        </div>
        <!-- /.content -->
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