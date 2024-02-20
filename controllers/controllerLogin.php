<?php

$validate=new Classes\ClassValidate();
$validate->validateFields($_POST);
// $validate->validateEmail($email);
$valid=$validate->validateIssetProntuario($prontuario,"login");
#$validate->validateStrongSenha($senha);
if($valid == true){
    $validate->validateSenha($prontuario,$senha);
}
#$validate->validateUserActive($email);
$validate->validateAttemptLogin();
echo $validate->validateFinalLogin($prontuario);
