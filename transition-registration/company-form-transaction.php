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
                                <!-- form start -->
                                <form role="form" action="company-form-action.php" method="post">
                                    <div class="box-body">  
                                        <div class="form-group col-lg-12">
                                            <label >CNPJ</label>                                        
                                            <?php $cnpj = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING); ?>
                                            <!--<input type="hidden" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>">-->
                                            <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $cnpj?>">                                             
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label >Nome</label>
                                            <input type="text" class="form-control" id="company" name="company">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label >Razão Social</label>
                                            <input type="text" class="form-control" id="social_name" name="social_name">
                                        </div>       
                                        <br>
                                        <legend class="col-lg-12">Endereço</legend>
                                        <div class="form-group col-xs-9">
                                            <label >Logradouro</label>
                                            <input type="text" class="form-control" id="street" name="street">
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <label >Nº</label>
                                            <input type="text" class="form-control" id="number" name="number">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label >Complemento</label>
                                            <input type="text" class="form-control" id="complement" name="complement">
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <label >Bairro</label>
                                            <input type="text" class="form-control" id="neighborhood" name="neighborhood">
                                        </div>
                                        <div class="form-group col-xs-9">
                                            <label >Cidade</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <label >Estado</label>
                                            <select class="chosen-select form-control" id="state" name="state">
                                                <option selected="true">Selecione...</option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AP">AP</option>
                                                <option value="AM">AM</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MT">MT</option>
                                                <option value="MS">MS</option>
                                                <option value="MG">MG</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PR">PR</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SP">SP</option>
                                                <option value="SE">SE</option>
                                                <option value="TO">TO</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-4">
                                            <label >CEP</label>
                                            <input type="text" class="form-control" id="cep" name="cep">
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" id="work_phone" name="work_phone"><br>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Optante do Simples Nacional</label>
                                            <select class="form-control" id="simples" name="simples">
                                                <option value="1" selected="true">Sim</option>
                                                <option value="0">Não</option>
                                            </select>
                                        </div>
                                         <div class="form-group col-sm-12">
                                             <legend class="col-lg-12">Linguagem(s) de Programação utilizada(s)</legend>
                                        </div> 
                                        <div class="form-group col-sm-3">
                                            <div class="checkbox">							
                                                <label><input type="checkbox" value="Delphi 7 ou inferior" 
                                                              name="language[]">Delphi 7 ou inferior</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Delphi XE" 
                                                              name="language[]">Delphi XE</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Delphi - Outra versão" 
                                                              name="language[]">Delphi - Outra versão</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Kylix" 
                                                              name="language[]">Kylix</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Visual Basic 6" 
                                                              name="language[]">Visual Basic 6</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="VB Net" 
                                                              name="language[]">VB Net</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Bash/Shell" 
                                                              name="language[]">Bash/Shell</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">						                                            
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Java Desktop" 
                                                              name="language[]">Java Desktop</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Java Web" 
                                                              name="language[]">Java Web</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Javascript" 
                                                              name="language[]">Javascript</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Java Android" 
                                                              name="language[]">Java Android</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Angular" 
                                                              name="language[]">Angular</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Node" 
                                                              name="language[]">Node</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Typescript" 
                                                              name="language[]">Typescript</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Matlab" 
                                                              name="language[]">Matlab</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="C" 
                                                              name="language[]">C</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="C#" 
                                                              name="language[]">C#</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="C++" 
                                                              name="language[]">C++</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="ASP" 
                                                              name="language[]">ASP</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Cobol" 
                                                              name="language[]">Cobol</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Lua" 
                                                              name="language[]">Lua</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Clipper" 
                                                              name="language[]">Clipper</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Swift" 
                                                              name="language[]">Swift</label>
                                            </div>                                            
                                        </div>
                                        <div class="form-group col-sm-3">						
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Fortran" 
                                                              name="language[]">Fortran</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Objective C" 
                                                              name="language[]">Objective C</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="PHP" 
                                                              name="language[]">PHP</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Pearl" 
                                                              name="language[]">Pearl</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Python" 
                                                              name="language[]">Python</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Ruby" 
                                                              name="language[]">Ruby</label>
                                            </div> 
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Go" 
                                                              name="language[]">Go</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="R" 
                                                              name="language[]">R</label>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group col-sm-12">
                                            <label>Outro, especifique:</label><input class="form-control" type="text" name="language[]"><br><br>
                                        </div>
                                        
                                        <div class="form-group col-sm-12">
                                            <label>Atua em qual Segmento?</label>
                                        </div> 
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">							
                                                <label><input type="checkbox" value="Bares, Restaurantes e Afins" 
                                                              name="segmento[]">Bares, Restaurantes e Afins</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Mercados/Supermercados" 
                                                              name="segmento[]">Mercados/Supermercados</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Hotéis e/ou Motéis" 
                                                              name="segmento[]">Hotéis e/ou Motéis</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">						
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Lojas de Vestuário/Calçados/Artigos" 
                                                              name="segmento[]">Lojas de Vestuário/Calçados/Artigos</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Postos de Combustíveis" 
                                                              name="segmento[]">Postos de Combustíveis</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Fármacias e Drogarias" 
                                                              name="segmento[]">Fármacias e Drogarias</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">						
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Materiais de Construção" 
                                                              name="segmento[]">Materiais de Construção</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Comércio de Veículos e/ou Autopeças" 
                                                              name="segmento[]">Comércio de Veículos e/ou Autopeças</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Loja de Departamentos" 
                                                              name="segmento[]">Loja de Departamentos</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Outro, especifique:</label><input class="form-control" type="text" name="segmento[]"><br><br>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label>Qual(is) produtos você homologou ou utiliza?</label>
                                        </div> 
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">							
                                                <label><input type="checkbox" value="MP-4200 TH" 
                                                              name="homologado[]">MP-4200 TH</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="MP-5100 TH" 
                                                              name="homologado[]">MP-5100 TH</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="MP-100S TH" 
                                                              name="homologado[]">MP-100S TH</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="MP-4000 TH FI" 
                                                              name="homologado[]">MP-4000 TH FI</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="MP-4200 TH FI" 
                                                              name="homologado[]">MP-4200 TH FI</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="MP-2100 TH FI" 
                                                              name="homologado[]">MP-2100 TH FI</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="LB-1000" 
                                                              name="homologado[]">LB-1000</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="MP-20 MI" 
                                                              name="homologado[]">MP-20 MI</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="SAT RB-2000" 
                                                              name="homologado[]">SAT RB-2000</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Leitor(es)" 
                                                              name="homologado[]">Leitor(es)</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Gaveta GD-46" 
                                                              name="homologado[]">Gaveta GD-46</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Gaveta GD-56" 
                                                              name="homologado[]">Gaveta GD-56</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Monitor(es)" 
                                                              name="homologado[]">Monitor(es)</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Monitor Touch" 
                                                              name="homologado[]">Monitor Touch</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Computador(es)" 
                                                              name="homologado[]">Computador(es)</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Coletor(es)" 
                                                              name="homologado[]">Coletor(es)</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Terminal(is) de Autoatendimento" 
                                                              name="homologado[]">Terminal(is) de Autoatendimento</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Microterminal FIT Básico" 
                                                              name="homologado[]">Microterminal FIT Básico</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="bemaGO" 
                                                              name="homologado[]">bemaGO</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="posGO" 
                                                              name="homologado[]">posGO</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Fiscal Manager NFC-e com VECF" 
                                                              name="homologado[]">Fiscal Manager NFC-e com VECF</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Fiscal Manager NFC-e com VECF" 
                                                              name="homologado[]">Fiscal Manager NFC-e com API One ou BemaOne.dll</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Fiscal Manager SAT com VECF" 
                                                              name="homologado[]">Fiscal Manager SAT com VECF</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Fiscal Manager SAT com VECF" 
                                                              name="homologado[]">Fiscal Manager SAT com API One ou BemaOne.dll</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="pull-right">
                                            <button type="reset" class="btn btn-warning">
                                                Limpar Formulário <i class="fa fa-eraser"></i></button>
                                            <button type="submit" class="btn btn-primary">
                                                Continuar <i class="fa fa-external-link-square"></i></button>
                                        </div>
                                    </div>
                                </form>
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