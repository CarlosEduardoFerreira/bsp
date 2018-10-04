<?php

//$cnpj = "01432667000126"; //82373077000171
$cnpj = filter_input(INPUT_POST, "cnpj",FILTER_SANITIZE_STRING);
  
echo "history.back()?cnpj=$cnpj;";
$teste = curlExec("http://receitaws.com.br/v1/cnpj/".$cnpj);
$obj = json_decode($teste);

//busca a atividade principal
$atividade_principal = $obj->atividade_principal;
foreach ($atividade_principal as $a) {
   echo "atividade: $a->text  -  $a->code </br>";   
}

