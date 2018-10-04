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
                        <button class="btn bg-navy btn-flat">Cadastrar Usuário</button>
                        <button class="btn bg-orange btn-flat">Cadastrar Empresa</button>
                        <button class="btn bg-navy btn-flat">Confirmar Informações</button>
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
                                    <h3 class="box-title">Empresa</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <?php
                                $cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
                                $cnpj = filter_input(INPUT_GET, "cnpj", FILTER_SANITIZE_STRING);
                                ?>
                                <form role="form" method="post" 
                                      action="company-form-action.php?cnpj=<?php echo $cnpj ?>&cpf=<?php echo $cpf ?>&edit=1">
                                          <?php
                                          require '../inc/connection.php';
                                          $sql = "SELECT * FROM `company_temp` WHERE cnpj = '$cnpj'";
                                          $query = mysqli_query($conexao, $sql);
                                          while ($row = mysqli_fetch_array($query)) {
                                              ?>
                                        <div class="box-body">  
                                            <div class="form-group col-lg-12">
                                                <label >CNPJ</label>               
                                                <input type="hidden" id="cpf" name="cpf"
                                                       value="<?php echo $cpf ?>">
                                                <input type="text" class="form-control" id="cnpj" name="cnpj"
                                                       value="<?php echo $cnpj ?>">     
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label >Nome</label>
                                                <input type="text" class="form-control" id="company" name="company"
                                                       value="<?php echo $row['company'] ?>">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label >Razão Social</label>
                                                <input type="text" class="form-control" id="social_name" name="social_name"
                                                       value="<?php echo $row['social_name'] ?>">
                                            </div>                                                                                                                                                                    
                                            <legend class="col-lg-12">Endereço</legend>
                                            <div class="form-group col-xs-9">
                                                <label >Logradouro</label>
                                                <input type="text" class="form-control" id="street" name="street"
                                                       value="<?php echo $row['street'] ?>">
                                            </div>
                                            <div class="form-group col-xs-3">
                                                <label >Nº</label>
                                                <input type="text" class="form-control" id="number" name="number"
                                                       value="<?php echo $row['num'] ?>">
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label >Complemento</label>
                                                <input type="text" class="form-control" id="complement" name="complement"
                                                       value="<?php echo $row['complement'] ?>">
                                            </div>
                                            <div class="form-group col-lg-8">
                                                <label >Bairro</label>
                                                <input type="text" class="form-control" id="neighborhood" name="neighborhood"
                                                       value="<?php echo $row['neighborhood'] ?>">
                                            </div>
                                            <div class="form-group col-xs-9">
                                                <label >Cidade</label>
                                                <input type="text" class="form-control" id="city" name="city"
                                                       value="<?php echo $row['city'] ?>">
                                            </div>
                                            <div class="form-group col-xs-3">
                                                <label >Estado</label>
                                                <select class="chosen-select form-control" id="state" name="state">
                                                    <?php
                                                    switch ($row['state']) {
                                                        case "AC":
                                                            $st1 = "selected='true'";
                                                            break;
                                                        case "AL":
                                                            $st2 = "selected='true'";
                                                            break;
                                                        case "AP":
                                                            $st3 = "selected='true'";
                                                            break;
                                                        case "AM":
                                                            $st4 = "selected='true'";
                                                            break;
                                                        case "BA":
                                                            $st5 = "selected='true'";
                                                            break;
                                                        case "CE":
                                                            $st6 = "selected='true'";
                                                            break;
                                                        case "DF":
                                                            $st7 = "selected='true'";
                                                            break;
                                                        case "ES":
                                                            $st8 = "selected='true'";
                                                            break;
                                                        case "GO":
                                                            $st9 = "selected='true'";
                                                            break;
                                                        case "MA":
                                                            $st10 = "selected='true'";
                                                            break;
                                                        case "MT":
                                                            $st11 = "selected='true'";
                                                            break;
                                                        case "MS":
                                                            $st12 = "selected='true'";
                                                            break;
                                                        case "MG":
                                                            $st13 = "selected='true'";
                                                            break;
                                                        case "PA":
                                                            $st14 = "selected='true'";
                                                            break;
                                                        case "PB":
                                                            $st15 = "selected='true'";
                                                            break;
                                                        case "PR":
                                                            $st16 = "selected='true'";
                                                            break;
                                                        case "PE":
                                                            $st17 = "selected='true'";
                                                            break;
                                                        case "PI":
                                                            $st18 = "selected='true'";
                                                            break;
                                                        case "RJ":
                                                            $st19 = "selected='true'";
                                                            break;
                                                        case "RN":
                                                            $st20 = "selected='true'";
                                                            break;
                                                        case "RS":
                                                            $st21 = "selected='true'";
                                                            break;
                                                        case "RO":
                                                            $st22 = "selected='true'";
                                                            break;
                                                        case "RR":
                                                            $st23 = "selected='true'";
                                                            break;
                                                        case "SC":
                                                            $st24 = "selected='true'";
                                                            break;
                                                        case "SP":
                                                            $st25 = "selected='true'";
                                                            break;
                                                        case "SE":
                                                            $st26 = "selected='true'";
                                                            break;
                                                        case "TO":
                                                            $st27 = "selected='true'";
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                    ?>
                                                    <option <?php echo $st1 ?> value="AC">AC</option>
                                                    <option <?php echo $st2 ?> value="AL">AL</option>
                                                    <option <?php echo $st3 ?> value="AP">AP</option>
                                                    <option <?php echo $st4 ?> value="AM">AM</option>
                                                    <option <?php echo $st5 ?> value="BA">BA</option>
                                                    <option <?php echo $st6 ?> value="CE">CE</option>
                                                    <option <?php echo $st7 ?> value="DF">DF</option>
                                                    <option <?php echo $st8 ?> value="ES">ES</option>
                                                    <option <?php echo $st9 ?> value="GO">GO</option>
                                                    <option <?php echo $st10 ?> value="MA">MA</option>
                                                    <option <?php echo $st11 ?> value="MT">MT</option>
                                                    <option <?php echo $st12 ?> value="MS">MS</option>
                                                    <option <?php echo $st13 ?> value="MG">MG</option>
                                                    <option <?php echo $st14 ?> value="PA">PA</option>
                                                    <option <?php echo $st15 ?> value="PB">PB</option>
                                                    <option <?php echo $st16 ?> value="PR">PR</option>
                                                    <option <?php echo $st17 ?> value="PE">PE</option>
                                                    <option <?php echo $st18 ?> value="PI">PI</option>
                                                    <option <?php echo $st19 ?> value="RJ">RJ</option>
                                                    <option <?php echo $st20 ?> value="RN">RN</option>
                                                    <option <?php echo $st21 ?> value="RS">RS</option>
                                                    <option <?php echo $st22 ?> value="RO">RO</option>
                                                    <option <?php echo $st23 ?> value="RR">RR</option>
                                                    <option <?php echo $st24 ?> value="SC">SC</option>
                                                    <option <?php echo $st25 ?> value="SP">SP</option>
                                                    <option <?php echo $st26 ?> value="SE">SE</option>
                                                    <option <?php echo $st27 ?> value="TO">TO</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-xs-4">
                                                <label >CEP</label>
                                                <input type="text" class="form-control" id="cep" name="cep"
                                                       value="<?php echo $row['cep'] ?>">
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Telefone</label>
                                                <input type="text" class="form-control" id="phone" name="work_phone"
                                                       value="<?php echo $row['work_phone'] ?>"><br>
                                            </div>
                                            <div class="col-xs-4">
                                                <?php
                                                    switch ($simples) {
                                                        case 1:
                                                            $sim = "selected='true'";
                                                            break;
                                                        case 2:
                                                            $nao = "selected='true'";
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                ?>
                                                <label>Optante do Simples Nacional</label>
                                                <select class="form-control" id="simples" name="simples">
                                                    <option value="1" <?php echo $sim ?>>Sim</option>
                                                    <option value="0" <?php echo $nao ?>>Não</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <legend class="col-lg-12">Linguagem(s) de Programação utilizada(s)</legend>
                                            </div>                                             
                                            <?php
                                            $languages = $row['programming_languages'];
                                            $langs = explode(";", $languages);
                                            for ($i = 0; $i < count($langs); $i++) {
                                                $language = $langs[$i];
                                                switch ($language) {
                                                    case "Delphi 7 ou inferior":
                                                        $lang1 = 'checked="true"';
                                                        break;
                                                    case "Delphi XE":
                                                        $lang2 = 'checked="true"';
                                                        break;
                                                    case "Delphi - Outra versão":
                                                        $lang3 = 'checked="true"';
                                                        break;
                                                    case "Kylix":
                                                        $lang4 = 'checked="true"';
                                                        break;
                                                    case "Visual Basic 6":
                                                        $lang5 = 'checked="true"';
                                                        break;
                                                    case "VB Net":
                                                        $lang6 = 'checked="true"';
                                                        break;
                                                    case "Bash/Shell":
                                                        $lang7 = 'checked="true"';
                                                        break;
                                                    case "Java Desktop":
                                                        $lang8 = 'checked="true"';
                                                        break;
                                                    case "Java Web":
                                                        $lang9 = 'checked="true"';
                                                        break;
                                                    case "Javascript":
                                                        $lang10 = 'checked="true"';
                                                        break;
                                                    case "Java Android":
                                                        $lang11 = 'checked="true"';
                                                        break;
                                                    case "Angular":
                                                        $lang12 = 'checked="true"';
                                                        break;
                                                    case "Node":
                                                        $lang13 = 'checked="true"';
                                                        break;
                                                    case "Typescript":
                                                        $lang14 = 'checked="true"';
                                                        break;
                                                    case "Matlab":
                                                        $lang15 = 'checked="true"';
                                                        break;
                                                    case "C":
                                                        $lang16 = 'checked="true"';
                                                        break;
                                                    case "C#":
                                                        $lang17 = 'checked="true"';
                                                        break;
                                                    case "C++":
                                                        $lang18 = 'checked="true"';
                                                        break;
                                                    case "ASP":
                                                        $lang19 = 'checked="true"';
                                                        break;
                                                    case "Cobol":
                                                        $lang20 = 'checked="true"';
                                                        break;
                                                    case "Lua":
                                                        $lang21 = 'checked="true"';
                                                        break;
                                                    case "Clipper":
                                                        $lang22 = 'checked="true"';
                                                        break;
                                                    case "Swift":
                                                        $lang23 = 'checked="true"';
                                                        break;
                                                    case "Fortran":
                                                        $lang24 = 'checked="true"';
                                                        break;
                                                    case "Objective C":
                                                        $lang25 = 'checked="true"';
                                                        break;
                                                    case "PHP":
                                                        $lang26 = 'checked="true"';
                                                        break;
                                                    case "Pearl":
                                                        $lang27 = 'checked="true"';
                                                        break;
                                                    case "Python":
                                                        $lang28 = 'checked="true"';
                                                        break;
                                                    case "Ruby":
                                                        $lang29 = 'checked="true"';
                                                        break;
                                                    case "Go":
                                                        $lang30 = 'checked="true"';
                                                        break;
                                                    case "R":
                                                        $lang31 = 'checked="true"';
                                                        break;
                                                    default:
                                                        $lang32 = $languages;
                                                        break;
                                                }
                                            }
                                            ?>    
                                            <div class="form-group col-sm-3">
                                                <div class="checkbox">							
                                                    <label><input type="checkbox" value="Delphi 7 ou inferior" 
                                                                  name="language[]" <?php echo $lang1 ?> >Delphi 7 ou inferior</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Delphi XE" 
                                                                  name="language[]" <?php echo $lang2 ?> >Delphi XE</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Delphi - Outra versão" 
                                                                  name="language[]" <?php echo $lang3 ?> >Delphi - Outra versão</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Kylix" 
                                                                  name="language[]" <?php echo $lang4 ?> >Kylix</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Visual Basic 6" 
                                                                  name="language[]" <?php echo $lang5 ?> >Visual Basic 6</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="VB Net" 
                                                                  name="language[]" <?php echo $lang6 ?> >VB Net</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Bash/Shell" 
                                                                  name="language[]" <?php echo $lang7 ?> >Bash/Shell</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">						                                            
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Java Desktop" 
                                                                  name="language[]" <?php echo $lang8 ?> >Java Desktop</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Java Web" 
                                                                  name="language[]" <?php echo $lang9 ?> >Java Web</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Javascript" 
                                                                  name="language[]" <?php echo $lang10 ?> >Javascript</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Java Android" 
                                                                  name="language[]" <?php echo $lang11 ?> >Java Android</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Angular" 
                                                                  name="language[]" <?php echo $lang12 ?> >Angular</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Node" 
                                                                  name="language[]" <?php echo $lang13 ?> >Node</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Typescript" 
                                                                  name="language[]" <?php echo $lang14 ?> >Typescript</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Matlab" 
                                                                  name="language[]" <?php echo $lang15 ?> >Matlab</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="C" 
                                                                  name="language[]" <?php echo $lang16 ?> >C</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="C#" 
                                                                  name="language[]" <?php echo $lang17 ?> >C#</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="C++" 
                                                                  name="language[]" <?php echo $lang18 ?> >C++</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="ASP" 
                                                                  name="language[]" <?php echo $lang19 ?> >ASP</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Cobol" 
                                                                  name="language[]" <?php echo $lang20 ?> >Cobol</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Lua" 
                                                                  name="language[]" <?php echo $lang21 ?> >Lua</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Clipper" 
                                                                  name="language[]" <?php echo $lang22 ?> >Clipper</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Swift" 
                                                                  name="language[]" <?php echo $lang23 ?> >Swift</label>
                                                </div>                                            
                                            </div>
                                            <div class="form-group col-sm-3">						
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Fortran" 
                                                                  name="language[]" <?php echo $lang24 ?> >Fortran</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Objective C" 
                                                                  name="language[]" <?php echo $lang25 ?> >Objective C</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="PHP" 
                                                                  name="language[]" <?php echo $lang26 ?> >PHP</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Pearl" 
                                                                  name="language[]" <?php echo $lang27 ?> >Pearl</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Python" 
                                                                  name="language[]" <?php echo $lang28 ?> >Python</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Ruby" 
                                                                  name="language[]" <?php echo $lang29 ?> >Ruby</label>
                                                </div> 
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="Go" 
                                                                  name="language[]" <?php echo $lang30 ?> >Go</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="R" 
                                                                  name="language[]" <?php echo $lang31 ?> >R</label>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label>Outro, especifique:</label>
                                                <input class="form-control" type="text" name="language[]" value="<?php echo $lang32 ?>" ><br><br>
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label>Atua em qual Segmento?</label>
                                            </div>                                             
                                            <?php
                                            $busi_seg = $row['business_segment'];
                                            $seg = explode(";", $busi_seg);
                                            for ($i = 0; $i < count($seg); $i++) {
                                                $segm = $seg[$i];
                                                switch ($segm) {
                                                    case "Bares, Restaurantes e Afins":
                                                        $check1 = "checked='true'";
                                                        break;
                                                    case "Mercados/Supermercados":
                                                        $check2 = "checked='true'";
                                                        break;
                                                    case "Hotéis e/ou Motéis":
                                                        $check3 = "checked='true'";
                                                        break;
                                                    case "Lojas de Vestuário/Calçados/Artigos":
                                                        $check4 = "checked='true'";
                                                        break;
                                                    case "Postos de Combustíveis":
                                                        $check5 = "checked='true'";
                                                        break;
                                                    case "Fármacias e Drogarias":
                                                        $check6 = "checked='true'";
                                                        break;
                                                    case "Materiais de Construção":
                                                        $check7 = "checked='true'";
                                                        break;
                                                    case "Comércio de Veículos e/ou Autopeças":
                                                        $check8 = "checked='true'";
                                                        break;
                                                    case "Loja de Departamentos":
                                                        $check9 = "checked='true'";
                                                        break;
                                                }
                                            }
                                            ?>
                                            <div class="form-group col-sm-4">                                                
                                                <div class="checkbox">							
                                                    <label><input type="checkbox" <?php echo $check1 ?> value="Bares, Restaurantes e Afins" 
                                                                  name="segmento[]">Bares, Restaurantes e Afins</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check2 ?> value="Mercados/Supermercados" 
                                                                  name="segmento[]">Mercados/Supermercados</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check3 ?> value="Hotéis e/ou Motéis" 
                                                                  name="segmento[]">Hotéis e/ou Motéis</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">						
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check4 ?> value="Lojas de Vestuário/Calçados/Artigos" 
                                                                  name="segmento[]">Lojas de Vestuário/Calçados/Artigos</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check5 ?> value="Postos de Combustíveis" 
                                                                  name="segmento[]">Postos de Combustíveis</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check6 ?> value="Fármacias e Drogarias" 
                                                                  name="segmento[]">Fármacias e Drogarias</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">						
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check7 ?> value="Materiais de Construção" 
                                                                  name="segmento[]">Materiais de Construção</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check8 ?> value="Comércio de Veículos e/ou Autopeças" 
                                                                  name="segmento[]">Comércio de Veículos e/ou Autopeças</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check9 ?> value="Loja de Departamentos" 
                                                                  name="segmento[]">Loja de Departamentos</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label>Outro, especifique:</label><input class="form-control" type="text" name="segmento[]"><br><br>
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label>Qual(is) produto(s) você homologou ou utiliza?</label>
                                            </div> 
                                            <?php
                                            $products = $row['approved_products'];
                                            $prod = explode(";", $products);
                                            for ($i = 0; $i < count($prod); $i++) {
                                                $product = $prod[$i];

                                                switch ($product) {
                                                    case "MP-4200 TH":
                                                        $check1 = "checked='true'";
                                                        break;
                                                    case "MP-5100 TH":
                                                        $check2 = "checked='true'";
                                                        break;
                                                    case "MP-100S TH":
                                                        $check3 = "checked='true'";
                                                        break;
                                                    case "MP-4000 TH FI":
                                                        $check4 = "checked='true'";
                                                        break;
                                                    case "MP-4200 TH FI":
                                                        $check5 = "checked='true'";
                                                        break;
                                                    case "MP-2100 TH FI":
                                                        $check6 = "checked='true'";
                                                        break;
                                                    case "LB-1000":
                                                        $check7 = "checked='true'";
                                                        break;
                                                    case "MP-20 MI":
                                                        $check8 = "checked='true'";
                                                        break;
                                                    case "SAT RB-2000":
                                                        $check9 = "checked='true'";
                                                        break;
                                                    case "Leitor(es)":
                                                        $check10 = "checked='true'";
                                                        break;
                                                    case "Gaveta GD-46":
                                                        $check11 = "checked='true'";
                                                        break;
                                                    case "Gaveta GD-56":
                                                        $check12 = "checked='true'";
                                                        break;
                                                    case "Monitor(es)":
                                                        $check13 = "checked='true'";
                                                        break;
                                                    case "Monitor Touch":
                                                        $check14 = "checked='true'";
                                                        break;
                                                    case "Computador(es)":
                                                        $check15 = "checked='true'";
                                                        break;
                                                    case "Coletor(es)":
                                                        $check16 = "checked='true'";
                                                        break;
                                                    case "Terminal(is) de Autoatendimento":
                                                        $check17 = "checked='true'";
                                                        break;
                                                    case "Microterminal FIT Básico":
                                                        $check18 = "checked='true'";
                                                        break;
                                                    case "bemaGO":
                                                        $check19 = "checked='true'";
                                                        break;
                                                    case "posGO":
                                                        $check20 = "checked='true'";
                                                        break;
                                                    case "Fiscal Manager NFC-e com VECF":
                                                        $check21 = "checked='true'";
                                                        break;
                                                    case "Fiscal Manager NFC-e com API One ou BemaOne.dll":
                                                        $check22 = "checked='true'";
                                                        break;
                                                    case "Fiscal Manager SAT com VECF":
                                                        $check23 = "checked='true'";
                                                        break;
                                                    case "Fiscal Manager SAT com API One ou BemaOne.dll":
                                                        $check24 = "checked='true'";
                                                        break;
                                                }
                                            }
                                            ?>
                                            <div class="form-group col-sm-4">
                                                <div class="checkbox">							
                                                    <label><input type="checkbox" <?php echo $check1 ?>  value="MP-4200 TH" 
                                                                  name="homologado[]">MP-4200 TH</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check2 ?>  value="MP-5100 TH" 
                                                                  name="homologado[]">MP-5100 TH</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check3 ?>  value="MP-100S TH" 
                                                                  name="homologado[]">MP-100S TH</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check4 ?>  value="MP-4000 TH FI" 
                                                                  name="homologado[]">MP-4000 TH FI</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check5 ?>  value="MP-4200 TH FI" 
                                                                  name="homologado[]">MP-4200 TH FI</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check6 ?>  value="MP-2100 TH FI" 
                                                                  name="homologado[]">MP-2100 TH FI</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check7 ?>  value="LB-1000" 
                                                                  name="homologado[]">LB-1000</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check8 ?>  value="MP-20 MI" 
                                                                  name="homologado[]">MP-20 MI</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check9 ?>  value="SAT RB-2000" 
                                                                  name="homologado[]">SAT RB-2000</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check10 ?>  value="Leitor(es)" 
                                                                  name="homologado[]">Leitor(es)</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check11 ?>  value="Gaveta GD-46" 
                                                                  name="homologado[]">Gaveta GD-46</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check12 ?>  value="Gaveta GD-56" 
                                                                  name="homologado[]">Gaveta GD-56</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check13 ?>  value="Monitor(es)" 
                                                                  name="homologado[]">Monitor(es)</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check14 ?>  value="Monitor Touch" 
                                                                  name="homologado[]">Monitor Touch</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check15 ?>  value="Computador(es)" 
                                                                  name="homologado[]">Computador(es)</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check16 ?>  value="Coletor(es)" 
                                                                  name="homologado[]">Coletor(es)</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check17 ?>  value="Terminal(is) de Autoatendimento" 
                                                                  name="homologado[]">Terminal(is) de Autoatendimento</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check18 ?>  value="Microterminal FIT Básico" 
                                                                  name="homologado[]">Microterminal FIT Básico</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check19 ?>  value="bemaGO" 
                                                                  name="homologado[]">bemaGO</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check20 ?>  value="posGO" 
                                                                  name="homologado[]">posGO</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check21 ?>  value="Fiscal Manager NFC-e com VECF" 
                                                                  name="homologado[]">Fiscal Manager NFC-e com VECF</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check22 ?>  value="Fiscal Manager NFC-e com VECF" 
                                                                  name="homologado[]">Fiscal Manager NFC-e com API One ou BemaOne.dll</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check23 ?>  value="Fiscal Manager SAT com VECF" 
                                                                  name="homologado[]">Fiscal Manager SAT com VECF</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" <?php echo $check24 ?>  value="Fiscal Manager SAT com VECF" 
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
                                    <?php } ?>
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