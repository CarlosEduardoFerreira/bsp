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

        <script type="text/javascript">
            //$(document).ready(function () {
            //$("#cnpj").focusout(function () {
//            $('#pesquisar').on('click', function (e) {
            //$('html').click(function() {
            function buscaCNPJ() {
                // Apesar do botão estar com o type="button", é prudente chamar essa função para evitar algum comportamento indesejado
                //e.preventDefault();
                // Aqui recuperamos o cnpj preenchido do campo e usamos uma expressão regular para limpar da string tudo aquilo que for diferente de números
                var cnpj = $('#cnpj').val().replace(/[^0-9]/g, '');
                // Fazemos uma verificação simples do cnpj confirmando se ele tem 14 caracteres
                if (cnpj.length == 14) {
                    // Aqui rodamos o ajax para a url da API concatenando o número do CNPJ na url
                    $.ajax({
                        url: 'https://www.receitaws.com.br/v1/cnpj/' + cnpj,
                        method: 'GET',
                        dataType: 'jsonp', // Em requisições AJAX para outro domínio é necessário usar o formato "jsonp" que é o único aceito pelos navegadores por questão de segurança
                        complete: function (xhr) {
                            // Aqui recuperamos o json retornado
                            response = xhr.responseJSON;
                            alert(response);
                            // Na documentação desta API tem esse campo status que retorna "OK" caso a consulta tenha sido efetuada com sucesso                                
                            if (response.status == 'OK') {
                                // Agora preenchemos os campos com os valores retornados
                                $('#company').val(response.fantasia);
                                $('#social_name').val(response.nome);
                                $('#street').val(response.logradouro);
                                $('#number').val(response.numero);
                                $('#complement').val(response.complemento);
                                $('#neighborhood').val(response.bairro);
                                $('#city').val(response.municipio);
                                $('#state').val(response.uf);
                                $('#cep').val(response.cep);
                                $('#neighborhood').val(response.bairro);

                                response.forEach(function (atividade_principal) {
                                    $('#atividade').val(response.atividade_principal[0].text);
                                });

                                $('#cnae').val(response.forEach(
                                        function (atividade_principal) {
                                            atividade_principal.code;
                                        }));

                                ('#atividade_sec').val(response.forEach(
                                        function (atividades_secundarias) {
                                            atividades_secundarias.text;
                                        }));
                                $('#cnae_sec').val(response.forEach(
                                        function (atividades_secundarias) {
                                            atividades_secundarias.code;
                                        }));

//                    $('#atividade').val(response.atividade_principal[0].text);
//                    $('#cnae').val(response.atividade_principal[0].code);
//                    $('#atividade_sec').val(response.atividades_secundarias[0].text);
//                    $('#cnae_sec').val(response.atividades_secundarias[0].code);
                                // Aqui exibimos uma mensagem caso tenha ocorrido algum erro
                            } else {
                                alert(response.message); // Neste caso estamos imprimindo a mensagem que a própria API retorna
                            }
                        }
                    });
                    // Tratativa para caso o CNPJ não tenha 14 caracteres
                } else {
                    alert('CNPJ inválido');
                }
            }
            ;
            //});
        </script>
    </head>

    <body class="hold-transition skin-blue sidebar-mini" onload="buscaCNPJ()">
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
                                <!-- general form elements -->             <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="form" action="company-form-action.php" method="post">
                                    <div class="box-body"> 
                                        <div class="form-group col-lg-12">
                                            <p class="pull-right text-red">* Campos obrigatórios</p>
                                        </div>
                                        <?php $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING); ?>
                                        <input type="hidden" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>">
                                        <input class="form-control" type="hidden" name="atividade" id="atividade">
                                        <input class="form-control" type="hidden" name="atividade_sec" id="atividade_sec">
                                        <input class="form-control" type="hidden" name="cnae" id="cnae">
                                        <input class="form-control" type="hidden" name="cnae_sec" id="cnae_sec">
                                        <?php $cnpj = filter_input(INPUT_POST, "cnpj", FILTER_SANITIZE_STRING); ?>
                                        <div class="form-group col-lg-12">
                                            <label >CNPJ <span class="text-red">*</span></label>                                                                                    
                                            <div class="input-group col-lg-6">
                                                <input type="text" class="form-control" id="cnpj" name="cnpj" autofocus="true" readonly="true" value="<?php echo $cnpj ?>">                                             
                                                <!--                                                <div class="input-group-btn">
                                                                                                    <button type="button" id="pesquisar" class="btn btn-primary"><span class="fa fa-search"></span> Pesquisar</button>
                                                                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label >Nome Fantasia <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="company" name="company" required="true">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label >Razão Social <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="social_name" readonly="true" name="social_name" required="true">                                            
                                        </div>
                                        <legend class="col-lg-12">Endereço</legend>
                                        <div class="col-lg-12">
                                            <p class="pull-right text-red">Para fins fiscais, será necessário a utilização do endereço na SEFAZ. Caso tenha divergência, 
                                                verifique se seu cadastro na Receita está atualizado.</p>                                           
                                        </div>
                                        <div class="form-group col-xs-9">
                                            <label >Logradouro <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="street" name="street" readonly="true" required="true">
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <label >Nº</label>
                                            <input type="text" class="form-control" id="number" name="number" readonly="true" required="true">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label >Complemento</label>
                                            <input type="text" class="form-control" id="complement" name="complement">
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <label >Bairro <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="neighborhood" name="neighborhood" readonly="true" required="true">
                                        </div>
                                        <div class="form-group col-xs-9">
                                            <label >Cidade <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="city" name="city" readonly="true" required="true">
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <label >Estado <span class="text-red">*</span></label>
                                            <select class="chosen-select form-control" id="state" name="state"  readonly="true">
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
                                            <label >CEP <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="cep" name="cep" readonly="true" required="true">
                                        </div>
                                        <div class="form-group col-xs-4">
                                            <label>Telefone <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="work_phone" name="work_phone" required="true">
                                            <!--<label class='control-label msg-phone'></label><br>-->
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Optante do Simples Nacional <span class="text-red">*</span></label>
                                            <select class="form-control" id="simples" name="simples" required="true">                                                
                                                <option value="1" selected="true">Sim</option>
                                                <option value="0">Não</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" id="ckeck_address"
                                                              name="check_address">O endereço de entrega é diferente do informado.</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Informações Adicionais</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12">                                            
                                            <div class="col-xs-5 form-inline">
                                                <label>Também faz revenda de produtos? <span class="text-red">*</span></label>
                                                <select class="form-control" id="resale" name="resale" required="true">
                                                    <option value="1">Sim</option>
                                                    <option value="0" selected="true">Não</option>
                                                </select><br><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <br>
                                            <legend class="col-lg-12">Informações do Negócio</legend>
                                        </div> 
                                        <div class="form-group col-xs-12">                                            
                                            <div class="col-xs-5 form-inline">
                                                <label>Tem aplicativo Android? <span class="text-red">*</span></label>
                                                <select class="form-control" id="has_android_app" name="has_android_app" required="true">

                                                    <option value="1" selected="true">Sim</option>
                                                    <option value="0">Não</option>
                                                </select><br><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <label class="col-xs-12">Interface de Desenvolvimento: <span class="text-red">*</span></label>
                                        </div>
                                        <div class="form-group col-sm-4">                                            
                                            <div class="checkbox">							
                                                <label><input type="checkbox" value="Android Studio Java" 
                                                              name="development_interface[]">Android Studio Java</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Android Studio Kotlin" 
                                                              name="development_interface[]">Android Studio Kotlin</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Xamarin" 
                                                              name="development_interface[]">Xamarin</label>
                                            </div>                                        
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Delphi" 
                                                              name="development_interface[]">Delphi</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Ionic/Cordoba" 
                                                              name="development_interface[]">Ionic/Cordoba</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Html5" 
                                                              name="development_interface[]">Html5</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label>Outro, especifique:</label><input class="form-control" type="text" name="development_interface[]">
                                        </div>
                                        <div class="col-xs-12">
                                            <label>Utiliza Meio de Pagamento? <span class="text-red">*</span></label>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Cielo" 
                                                              name="payment_options[]">Cielo</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Stone" 
                                                              name="payment_options[]">Stone</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="SiTef" 
                                                              name="payment_options[]">SiTef</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Rede" 
                                                              name="payment_options[]">Rede</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Outro, especifique:</label><input class="form-control" type="text" name="payment_options[]">
                                        </div>
                                        <br>
                                        <div class="form-group col-xs-4">
                                            <label>Quantidade de Clientes: <span class="text-red">*</span></label>
                                            <select class="form-control" id="number_client" name="number_client" required="true" >
                                                <!--<option value="" selected="true">Selecione...</option>-->
                                                <option value="De 1 a 50">De 1 a 50</option>
                                                <option value="De 50 a 100">De 50 a 100</option>
                                                <option value="De 100 a 500">De 100 a 500</option>
                                                <option value="De 500 a 1.000">De 500 a 1.000</option>
                                                <option value="De 1.000 a 5.000">De 1.000 a 5.000</option>
                                                <option value="De 5.000 a 10.000">De 5.000 a 10.000</option>
                                                <option value="Mais de 10.000">Mais de 10.000</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-4">
                                            <label>Quantidade com Android: <span class="text-red">*</span></label>
                                            <select class="form-control" id="android_customers" name="android_customers" required="true" >
                                                <!--<option value="" selected="true">Selecione...</option>-->
                                                <option value="De 1 a 50">De 1 a 50</option>
                                                <option value="De 50 a 100">De 50 a 100</option>
                                                <option value="De 100 a 500">De 100 a 500</option>
                                                <option value="De 500 a 1.000">De 500 a 1.000</option>
                                                <option value="De 1.000 a 5.000">De 1.000 a 5.000</option>
                                                <option value="De 5.000 a 10.000">De 5.000 a 10.000</option>
                                                <option value="Mais de 10.000">Mais de 10.000</option>
                                            </select>
                                        </div>                                       
                                        <div class="form-group col-sm-12">
                                            <br>
                                            <label>Linguagem(s) de Programação utilizada(s): <span class="text-red">*</span></label>
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
                                            <label>Atua em qual Segmento? <span class="text-red">*</span></label>
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
                                                <label><input type="checkbox" value="Farmácias e Drogarias" 
                                                              name="segmento[]">Farmácias e Drogarias</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">						
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Materiais de Construção" 
                                                              name="segmento[]">Materiais de Construção</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Comércio de Veículos e/ou Autopeças" 
                                                              name="segmento[]">Comércio de Veículos/Autopeças</label>
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
                                            <label>Qual(is) produtos você homologou ou utiliza? <span class="text-red">*</span></label>
                                        </div> 
                                        <div class="form-group col-sm-4">
                                            <div class="checkbox">							
                                                <label><input type="checkbox" value="Impressoras de Recibo" 
                                                              name="homologado[]">Impressoras de Recibo e etiquetas</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Impressoras Fiscais" 
                                                              name="homologado[]">Impressoras Fiscais</label>
                                            </div>                                                                                        
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Coletor(es)" 
                                                              name="homologado[]">Coletor(es)</label>
                                            </div> 
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="Microterminal FIT Básico" 
                                                              name="homologado[]">Microterminal FIT Básico</label>
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
                                                <label><input type="checkbox" value="Gaveta" 
                                                              name="homologado[]">Gaveta</label>
                                            </div>                                                                                          
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="bemaGO" 
                                                              name="homologado[]">bemaGo</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="posGO" 
                                                              name="homologado[]">posGo</label>
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
                                            <button type="submit" onclick="validaCadastro()" class="btn btn-primary">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- jQuery 3 -->
        <script src="../AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!--<script type="text/javascript" src="valida-form-company.js"></script>-->

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