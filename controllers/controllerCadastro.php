<?php
$validate=new Classes\ClassValidate();
$validate->validateFields($_POST);

$validate->validateIssetProntuario($prontuario);
$validate->validateData($dataNascimento);

$validate->validateConfSenha($senha,$senhaConf);
$validate->validateStrongSenha($senha);
echo $validate->validateFinalCad($arrVar);